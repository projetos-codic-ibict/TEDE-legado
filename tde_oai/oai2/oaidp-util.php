<?    
/*
* +----------------------------------------------------------------------+
* | PHP Version 4                                                        |
* +----------------------------------------------------------------------+
* | Copyright (c) 2002 Heinrich Stamerjohanns                            |
* |                                                                      |
* | oaidp-util.php -- Utilities for the OAI Data Provider                |
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
// $Id: oaidp-util.php,v 1.03 2003/04/08 14:40:23 stamer Exp $
//

function get_token() {
	list($usec, $sec) = explode(" ", microtime());
	return ((int)($usec*1000) + (int)($sec*1000));
}

function oai_error($code, $argument='', $value='')
{
	global $request;
	global $request_err;

	switch ($code) {
		case 'badArgument' :
			$text = "The argument '$argument' (value='$value') included in the request is not valid.";
			break;

		case 'badGranularity' :
			$text = "The value '$value' of the argument '$argument' is not valid.";
			$code = 'badArgument';
			break;

		case 'badResumptionToken' :
			$text = "The resumptionToken '$value' does not exist or has already expired.";
			break;

		case 'badRequestMethod' :
			$text = "The request method '$argument' is unknown.";
			$code = 'badVerb';
			break;

		case 'badVerb' :
			$text = "The verb '$argument' provided in the request is illegal.";
			break;

		case 'cannotDisseminateFormat' :
			$text = "The metadata format '$value' given by $argument is not supported by this repository.";
			break;

		case 'exclusiveArgument' :
			$text = 'The usage of resumptionToken as an argument allows no other arguments.';
			$code = 'badArgument';

		case 'idDoesNotExist' :
			$text = "The value '$value' of the identifier is illegal for this repository.";
			break;

		case 'missingArgument' :
			$text = "The required argument '$argument' is missing in the request.";
			$code = 'badArgument';
			break;

		case 'noRecordsMatch' :
			$text = 'The combination of the given values results in an empty list.';
			break;

		case 'noMetadataFormats' :
			$text = 'There are no metadata formats available for the specified item.';
			break;

		case 'noVerb' :
			$text = 'The request does not provide any verb.';
			$code = 'badVerb';
			break;

		case 'noSetHierarchy' :
			$text = 'This repository does not support sets.';
			break;

		case 'sameArgument' :
			$text = 'Do not use them same argument more than once.';
			$code = 'badArgument';
			break;

		case 'sameVerb' :
			$text = 'Do not use verb more than once.';
			$code = 'badVerb';
			break;

		default:
			$text = "Unknown error: code: '$code', argument: '$argument', value: '$value'";
			$code = 'badArgument';
	}

	if ($code == 'badVerb' || $code == 'badArgument') {
		$request = $request_err;
	}
	$error .= ' <error code="'.xmlstr($code, 'iso8859-1', false).'">'.xmlstr($text, 'iso8859-1', false)."</error>\n";
	return $error;
}

function xmlstr($string, $charset="iso8859-1", $xmlescaped="false")
{
	// just remove invalid characters
	$pattern ="/[\x-\x8\xb-\xc\xe-\x1f]/";
	$string = preg_replace($pattern,'',$string);
	// AQUI

	// escape only if string is not escaped
	if (!$xmlescaped) {
		$xmlstr = htmlspecialchars($string, ENT_QUOTES);
	}

	if ($charset != "utf-8") {
		$xmlstr = utf8_encode($xmlstr);
	}

	return $xmlstr;
}

// will split a string into elements and return XML
// supposed to print values from database
function xmlrecord($sqlrecord, $element, $indent = 0)
{
	global $SQL;
	global $xmlescaped;
	global $charset;

	$str = '';

	if ($sqlrecord != '') {
		if (isset($SQL['split'])) {
			$temparr = explode($SQL['split'], $sqlrecord);
			foreach ($temparr as $val) {
				$str .= str_pad('', $indent).'<'.$element.'>'.xmlstr($val, $charset, $xmlescaped).'</'.$element.">\n";
			}
			return $str;
		} else {
			return str_pad('', $indent).'<'.$element.'>'.xmlstr($val, $charset, $xmlescaped).'</'.$element.">\n";
		}
	} else {
		return '';
	}
}

// takes either an array or a string and outputs them as XML entities
// this function assumes that the strings are written in iso8859-1 and have
// not been escaped yet.
function xmlformat($record, $element, $indent = 0)
{

	$str = '';
	if (is_array($record)) {
		foreach  ($record as $val) {
			$str .= str_pad('', $indent).'<'.$element.'>'.xmlstr($val, 'iso8859-1', false).'</'.$element.">\n";
		}
		return $str;
	} elseif ($record != '') {
		return str_pad('', $indent).'<'.$element.'>'.xmlstr($record, 'iso8859-1', false).'</'.$element.">\n";
	} else {
		return '';
	}
}

function date2UTCdatestamp($date)
{
	global $granularity;

	switch ($granularity) {

		case 'YYYY-MM-DDThh:mm:ssZ':
			// we assume common date ("YYYY-MM-DD") or 
			// datetime format ("YYYY-MM-DD hh:mm:ss")
			// in the database
			if (strstr($date, ' ')) {
				// date is datetime format
				return str_replace(' ', 'T', $date).'Z';
			} else {
				// date is date format
				// granularity 'YYYY-MM-DD' should be used...
				return $date.'T00:00:00Z';
			}
			break;

		case 'YYYY-MM-DD':
			if (strstr($date, ' ')) {
				// date is datetime format
				list($date, $time) = explode(" ", $date);
				return $date;
			} else {
				return $date;
			}
			break;

		default: die("Unknown granularity!");
	}
}

function checkDateFormat($date) {

  global $granularity;
  global $message;

  if ($granularity == 'YYYY-MM-DDThh:mm:ssZ') {
    $checkstr = '([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})T([0-9]{2}):([0-9]{2}):([0-9]{2})Z$';
  } else {
    $checkstr = '([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}$)';
  }
  if (ereg($checkstr, $date, $regs)) {
    if (checkdate($regs[2], $regs[3], $regs[1])) {
      return 1;
    } else {
      $message = "Invalid Date: $date is not a valid date. $checkstr";
      return 0;
    }
  } else {
      $message = "Invalid Date Format: $date does not comply to the date format $granularity.";
      return 0;
  }
}

function formatDatestamp($datestamp)
{
	global $granularity;

	$datestamp = date2UTCdatestamp($datestamp); 
	if (!checkDateFormat($datestamp)) {
		if ($granularity == 'YYYY-MM-DD') {
			return '2002-01-01';
		} else {
			return '2002-01-01T00:00:00Z';
		}
	} else {
		return $datestamp;
	}
}

function oai_close()
{
	global $compress;

	echo "</OAI-PMH>\n";

	if ($compress) {
		ob_end_flush();
	}
}

function oai_exit()
{
	global $CONTENT_TYPE;
	global $xmlheader;
	global $request;
	global $errors;

	header($CONTENT_TYPE);
	echo $xmlheader;
	echo $request;
	echo $errors;

	oai_close();
	exit();
}

function php_is_at_least($version) {

	list($c_r, $c_mj, $c_mn) = explode('.', phpversion());
    list($v_r, $v_mj, $v_mn) = explode('.', $version);

	if ($c_r >= $v_r && $c_mj >= $v_mj && $c_mn >= $v_mn) return TRUE;
	else return FALSE;
}


function metadataHeader($prefix)
{

	global $METADATAFORMATS;
	global $XMLSCHEMA;

	$myformat = $METADATAFORMATS[$prefix];

	$str = '<';

	if ($myformat['metadataPrefix']){
		$str .= $myformat['metadataPrefix'];
	}
	if ($myformat['record_prefix'] && $myformat['metadataPrefix']){
		$str .= ':';
	}
	if ($myformat['record_prefix']){
		$str .= $myformat['record_prefix'];
	}
	$str .= "\n";

	// MetadataNamespace 
	$str .= '       xmlns';
	if ($myformat['metadataPrefix']){
		$str .= ':'.$myformat['metadataPrefix'];
	}
	$str .= '="'.$myformat['metadataNamespace'].'"';
	$str .= "\n";

	// RecordNamespace 
	if ($myformat['record_namespace']){
		$str .= '       xmlns';
		if ($myformat['record_namespace'] && $myformat['record_prefix']){
			$str .= ':'.$myformat['record_prefix'];
		}
		$str .= '="'.$myformat['record_namespace'].'"';
		$str .= "\n";
	}

	// above lines are the same ever.
	$str .= 
	'       xmlns:xsi="'.$XMLSCHEMA.'"'."\n".
	'       xsi:schemaLocation="'.$myformat['metadataNamespace']."\n".
	'       '.$myformat['schema'].'">'."\n";

	return $str;
}


/*
* GABRIEL
*
*	We need to convert a much larger type of metadata in smaller/simplest
* 	format, like oai_dc ou etd-ms.
*
*	By using sablotron, or any other XSL interpreter we intent to make this happen
*
*
*/

function mtdbr2oaidc($mtdbr,$i=10)
{
	return $mtdbr;
  $i = rand(1, 123912399);
	$i=10;
  $f = fopen("/tmp/mtdbr$i","w");
  $xheader = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  fwrite($f,$xheader.utf8_encode($mtdbr));
  fclose($f);
  $result = system("sabcmd $TEDE_HOME/tde_oai/mtdbr-oaidc.xsl /tmp/mtdbr$i > /tmp/oaidc$i 2> /tmp/errou");
  $res = implode("",file("/tmp/oaidc$i"));
	//mail('gabrielmathias@ibict.br','Das',$res);
  //unlink("/tmp/mtdbr$i");
  //unlink("/tmp/oaidc$i");
  return $res;
}

function mtdbr2etdms($mtdbr,$i=10)
{
  $f = fopen("/tmp/mtdbr$i","w");
  $xheader = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  //fwrite($f,$xheader.$mtdbr);
  fwrite($f,$xheader.utf8_encode($mtdbr));
  fclose($f);
  $result = system("sabcmd $TEDE_HOME/ted_oai/mtdbr-etdms.xsl /tmp/mtdbr$i > /tmp/etdms$i");
  $res = implode("",file("/tmp/etdms$i"));
  //  unlink("/tmp/mtdbr$i");
  return $res;
}

function nada($str)
{
	return $str;
}

?>
