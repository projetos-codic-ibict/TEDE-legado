<?php
/*
* +----------------------------------------------------------------------+
* | PHP Version 4                                                        |
* +----------------------------------------------------------------------+
* | Copyright (c) 2002 Heinrich Stamerjohanns                            |
* |                                                                      |
* | oai2.php -- An OAI Data Provider for version OAI v2.0                |
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
// $Id: oai2.php,v 1.11 2003/04/08 14:27:21 stamer Exp $
//

// Override sobre a saida de erros pois muitas IES nao conseguem configurar o PHP.INI
@error_reporting(0);
@set_time_limit(0);

include_once('oai2/oaidp-util.php');

$CONTENT_TYPE = 'Content-Type: text/xml; charset=UTF-8';
header($CONTENT_TYPE);

// register_globals does not need to be set
if (!php_is_at_least('4.1.0')) {
	$_SERVER = $HTTP_SERVER_VARS;
	$_SERVER['REQUEST_METHOD'] = $REQUEST_METHOD;
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$args = $_GET;
	$getarr = explode('&', $_SERVER['QUERY_STRING']);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$args = $_POST;
} else {
	$errors .= oai_error('badRequestMethod', $_SERVER['REQUEST_METHOD']);
}

foreach ( $args as $key => $val){
	if (strlen($val)>0){
		$args2[$key] = $val;
	}
}
unset($args);
$args=$args2;

include_once('oai2/oaidp-config3.php');

//
// Set charecters set parameters according to MySql version.
//
$result = mysql_query('SELECT VERSION()') or die('Query failed: ' . mysql_error());
$mysql_version = mysql_fetch_array($result, MYSQL_ASSOC);
list($mysql_version_majour,$mysql_version_minor,$mysql_version_patch) = split('\.',$mysql_version['VERSION()']);
if (($mysql_version_majour >=4) && ($mysql_version_minor>=1))
{
	$result = mysql_query('SET character_set_client = utf8') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_results = utf8') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_connection = utf8') or die('Query failed: ' . mysql_error());
}

// and now we make the OAI Repository Explorer really happy
// I have not found any way to check this for POST requests.
if (isset($getarr)) {
	if (count($getarr) != count($args)) {
		$errors .= oai_error('sameArgument');
	}
}

$reqattr = '';
if (is_array($args)) {
	foreach ($args as $key => $val) {
		$reqattr .= ' '.$key.'="'.htmlspecialchars($val).'"';
	}
}

// in case register_globals is on, clean up polluted global scope
$verbs = array ('from', 'identifier', 'metadataPrefix', 'set', 'resumptionToken', 'until');
foreach($verbs as $val) {
	unset($$val);
}

$request .= ' <request'.$reqattr.'>'.$MY_URI."</request>\n";
$request_err .= ' <request>'.$MY_URI."</request>\n";

if (is_array($compression)) {
	if (in_array('gzip', $compression)) {
		$compress = TRUE;
	} else
		$compress = FALSE;
}

if (isset($args['verb'])) {
	switch ($args['verb']) {

		case 'GetRecord':
			unset($args['verb']);
			include 'oai2/getrecord.php';
			break;

		case 'Identify':
			unset($args['verb']);
			// we never use compression in Identify
			$compress = FALSE;
			include 'oai2/identify.php';
			break;

		case 'ListIdentifiers':
			unset($args['verb']);
			include 'oai2/listidentifiers.php';
			break;

		case 'ListMetadataFormats':
			unset($args['verb']);
			include 'oai2/listmetadataformats.php';
			break;

		case 'ListRecords':
			unset($args['verb']);
			include 'oai2/listrecords.php';
			break;

		case 'ListSets':
			unset($args['verb']);
			include 'oai2/listsets.php';
			break;

		default:
			// we never use compression with errors
			$compress = FALSE;
			$errors .= oai_error('badVerb', $args['verb']);
	} /*switch */

} else {
	$errors = oai_error('noVerb');
}

if (isset($errors)) {
	oai_exit();
}

if ($compress) {
	ob_start('ob_gzhandler');
}

echo $xmlheader;
echo $request;
//echo mb_convert_encoding($output,"UTF-8","iso-8859-1");
echo $output;
oai_close(); 

?>
