<?
/*
* +----------------------------------------------------------------------+
* | PHP Version 4                                                        |
* +----------------------------------------------------------------------+
* | Copyright (c) 2002 Heinrich Stamerjohanns                            |
* |                                                                      |
* | getrecord.php -- Utilities for the OAI Data Provider                 |
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
* |            stamer@uni-oldenburg.de                                   |
* +----------------------------------------------------------------------+
*/
//
// $Id: getrecord.php,v 1.02 2003/04/08 14:22:07 stamer Exp $
//

// parse and check arguments
foreach($args as $key => $val) {

	switch ($key) { 
		case 'identifier':
			$identifier = $val; 
			break;

		case  'metadataPrefix':
                       if ($val == 'oai_dc') $TEDE->setversion('oai_dc');
                       if ($val == 'oai_etdms') $TEDE->setversion('oai_etdms');
			if (is_array($METADATAFORMATS[$val])
					&& isset($METADATAFORMATS[$val]['myhandler'])) {
				$metadataPrefix = $val;
				$inc_record  = $METADATAFORMATS[$val]['myhandler'];
			} else {
				$errors .= oai_error('cannotDisseminateFormat', $key, $val);
			}
			break;

		default:
			$errors .= oai_error('badArgument', $key, $val);
	}
}

if (!isset($args['identifier'])) {
	$errors .= oai_error('missingArgument', 'identifier');
}
if (!isset($args['metadataPrefix'])) {
	$errors .= oai_error('missingArgument', 'metadataPrefix');
} 

if (!isset($errors)) {
	$getrecord = $TEDE->getRecord($identifier,$args['$metadataPrefix']);

	if (count($getrecord['err'])>0) {
		$errors .= oai_error('idDoesNotExist', '', $identifier); 
	}
}

// break and clean up on error
if (isset($errors)) {
	oai_exit();
}

$output .= "  <GetRecord>\n";
$output .= $getrecord['verb'];
$output .= '  </GetRecord>'."\n"; 

$output = $inc_record($output);


// End GetRecord

?>
