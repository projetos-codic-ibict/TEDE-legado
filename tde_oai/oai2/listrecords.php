<?
/*
* +----------------------------------------------------------------------+
* | PHP Version 4                                                        |
* +----------------------------------------------------------------------+
* | Copyright (c) 2002 Heinrich Stamerjohanns                            |
* |                                                                      |
* | listrecords.php -- Utilities for the OAI Data Provider               |
* |                                                                      |
* | This is free software; you can redistribute it and/or modify it under|
* | the terms of the GNU General Public License as published by the      |
* | Free Software Foundation; either version 2 of the License, or (at    |
* | your option) any later version.                                      |
* | This software is distributed in the hope that it will be useful, but |
* | WITHOUT  ANY WARRANTY; without even the implied warranty of          |
* | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the         |
* | GNU General Public License for more details.                         |
* | You should have received a copy of the GNU General Public License    |
* | along with  software; if not, write to the Free Software Foundation, |
* | Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA         |
* |                                                                      |
* +----------------------------------------------------------------------+
* | Derived from work by U. Müller, HUB Berlin                           |
* |                                                                      |
* | Written by Heinrich Stamerjohanns, May 2002                          |
* /            stamer@uni-oldenburg.de                                   |
* +----------------------------------------------------------------------+
*/
//
// $Id: listrecords.php,v 1.02 2003/04/08 14:24:21 stamer Exp $
//

// parse and check arguments
foreach($args as $key => $val) {

   switch ($key) { 
      case 'from':
         $from = $val;
         break;

      case 'until':
         $until = $val; 
         break;

      case 'metadataPrefix':
         if (is_array($METADATAFORMATS[$val])
               && isset($METADATAFORMATS[$val]['myhandler'])) {
            $metadataPrefix = $val;
            $inc_record  = $METADATAFORMATS[$val]['myhandler'];
            $SQL['metadataPrefix'] = $val;
         } else {
            $errors .= oai_error('cannotDisseminateFormat', $key, $val);
         }
         break;

      case 'set':
         $set = $val;
         break;      

      case 'resumptionToken':
         $resumptionToken = $val;
         break;

      default:
         $errors .= oai_error('badArgument', $key, $val);
   }
}

// Resume previous session?

if (isset($args['resumptionToken'])) {       
   if (isset($args['metadataPrefix']) || isset($args['$set_from']) 
         || isset($args['set_until']) || isset($args['set'])) {
      $errors .= oai_error('exclusiveArgument');
   } else {
      $textparts = explode('!', $resumptionToken);
      if (count($textparts) == 5){
         $from = $textparts[1];
         $until = $textparts[2];
         $metadataPrefix = $textparts[3];
         $deliveredrecords = (int)$textparts[4]; 

         if (is_array($METADATAFORMATS[$metadataPrefix])
            && isset($METADATAFORMATS[$metadataPrefix]['myhandler'])) {
            $inc_record  = $METADATAFORMATS[$metadataPrefix]['myhandler'];
         } else {
            $errors .= oai_error('cannotDisseminateFormat', $key, $val);
         }
         if ( (strlen($from) > 0 && !checkDateFormat($from))
            ||(strlen($until)> 0 && !checkDateFormat($until))){
            $errors .= oai_error('badResumptionToken', '', $resumptionToken); 
         }
      } elseif(strlen($resumptionToken)>0 ){
         $errors .= oai_error('badResumptionToken', '', $resumptionToken);
      }else{
         $errors .= oai_error('badArgument', 'resumptionToken', $resumptionToken);
      }
   }
} else {
   $deliveredrecords = 0; 
   if (!$args['metadataPrefix']) {
      $errors .= oai_error('missingArgument', 'metadataPrefix');
   }
   if (isset($args['from'])) {
      if (!checkDateFormat($from)) {
         $errors .= oai_error('badGranularity', 'from', $from); 
      }
   }
   if (isset($args['until'])) {
      if (!checkDateFormat($until)) {
         $errors .= oai_error('badGranularity', 'until', $until);
      }
   }
   if (isset($args['set'])) {
      if (!is_array($SETS)) {
         $errors .= oai_error('noSetHierarchy'); 
         oai_exit();
      }
   }
}

if ($metadataPrefix == 'oai_dc')   $TEDE->setversion('oai_dc'); 
if ($metadataPrefix == 'oai_etdms')$TEDE->setversion('oai_etdms');

if (!isset($errors)) {
   $list = $TEDE->listRecords($MAXRECORDS,$from,$until,$set,$deliveredrecords);
   if (count($list['err'])>0) {
      $errors .= oai_error('noRecordsMatch'); 
   }
}

// break and clean up on error
if (isset($errors)) {
   oai_exit();
}

$output .= " <ListRecords>\n";

// Will we need a ResumptionToken?
if (isset($list['continue'])) {
   $thendeliveredrecords = (int)$deliveredrecords + $MAXRECORDS;  
   $new_rt = "!$from!$until!$metadataPrefix!$thendeliveredrecords";

   $restoken = 
'  <resumptionToken expirationDate="'.$expirationdatetime.'"
     completeListSize="'.$list['count'].'"
     cursor="'.$deliveredrecords.'">'.$new_rt."</resumptionToken>\n"; 
}
// Last delivery, return empty ResumptionToken
elseif (isset($args['resumptionToken'])) {
   $restoken =
'  <resumptionToken completeListSize="'.$list['count'].'"
     cursor="'.$deliveredrecords.'"></resumptionToken>'."\n";
}

//Output of TEDE Object
//$output.=trata($list['verb'],true);

$output.=$list['verb'];

// ResumptionToken
if (isset($restoken)) {
   $output .= $restoken;
}

// end ListRecords
$output .= 
' </ListRecords>'."\n";

$output=$inc_record($output);
  
?>
