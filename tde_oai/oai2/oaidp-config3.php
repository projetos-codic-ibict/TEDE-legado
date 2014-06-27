<?    
/*
* +----------------------------------------------------------------------+
* | PHP Version 4                                                        |
* +----------------------------------------------------------------------+
* | Copyright (c) 2002-2003 Heinrich Stamerjohanns                            |
* |                                                                      |
* | oaidp-config.php -- Configuration of the OAI Data Provider           |
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
// $Id: oaidp-config.php,v 1.06 2003/04/09 16:59:57 stamer Exp $
//

// This is the configuration file for the PHP OAI Data-Provider.
// Please read through the whole file, there are several things, that 
// need to be adjusted, especially the DB connection and table values
// further below.

// use PEAR classes
// if you do not find PEAR, use something like this
// ini_set('include_path', '.:/usr/local/lib/php:/www/oai/PEAR');
// Windows users might like to try this
// ini_set('include_path', '.;c:\php\pear');

// if there are problems with unknown 'numrows', then make sure
// to upgrade to a decent PEAR version. 
// require_once('DB.php');

// Biblioteca do TEDE

require_once('./biblioteca/mtdbr.1.0.14.php');
require_once('../conexao/conexao_fim.inc');
require_once('../bibliotecas/oai.bib');
require_once("../bibliotecas/versao_sistema.bib");

// 
// DATABASE SETUP
//

// change according to your local DB setup. // CONF CONF CONF
$DB_HOST   = $server_fim;
$DB_USER   = $usuario_fim;
$DB_PASSWD = $passwd_fim;
$DB_NAME   = $base_fim;

$db=&$conexao_fim;
@mysql_select_db($DB_NAME,$db);

// do not change
//$MY_URI = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
//$baseURL = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

// MUST (only one)
// please adjust

// $repositoryName       = 'Nome do seu repositório';
//$baseURL			  = $MY_URI;
//$baseURL = "http://baru.ibict.br/tede-ibict/tde_oai/oai3.php";
$MY_URI = $baseURL;

// You can use a static URI as well.
// $baseURL 			= "http://my.server.org/oai/oai2.php";
// do not change
$protocolVersion      = '2.0';

// How your repository handles deletions
// no: 			The repository does not maintain status about deletions.
//				It MUST NOT reveal a deleted status.
// persistent:	The repository persistently keeps track about deletions 
//				with no time limit. It MUST consistently reveal the status
//				of a deleted record over time.
// transient:   The repository does not guarantee that a list of deletions is 
//				maintained. It MAY reveal a deleted status for records.
// 
// If your database keeps track of deleted records change accordingly.
// Currently if $record['deleted'] is set to 'true', $status_deleted is set.
// Some lines in listidentifiers.php, listrecords.php, getrecords.php  
// must be changed to fit the condition for your database.
$deletedRecord        = 'persistent'; 

// MAY (only one)
//granularity is days
//$granularity          = 'YYYY-MM-DD';
// granularity is seconds
$granularity          = 'YYYY-MM-DDThh:mm:ssZ';

// MUST (only one)
// the earliest datestamp in your repository,
// please adjust
$earliestDatestamp    = '1990-01-01'; // CONF

// this is appended if your granularity is seconds.
// do not change
if ($granularity == 'YYYY-MM-DDThh:mm:ssZ') {
	$earliestDatestamp.= 'T00:00:00Z';
}

// MUST (multiple)
// please adjust
$adminEmail			= array($adminEmail);  //CONF

// MAY (multiple) 
// Comment out, if you do not want to use it.
// Currently only gzip is supported (you need output buffering turned on, 
// and php compiled with libgz). 
// The client MUST send "Accept-Encoding: gzip" to actually receive 
// compressed output.
$compression		= array('gzip');

// MUST (only one)
// should not be changed
$delimiter			= ':';

// MUST (only one)
// You may choose any name, but for repositories to comply with the oai 
// format for unique identifiers for items records. 
// see: http://www.openarchives.org/OAI/2.0/guidelines-oai-identifier.htm
// Basically use domainname-word.domainname
// please adjust
// $repositoryIdentifier = 'oai:ibict.br'; // CONF


// description is defined in identify.php 
$show_identifier = false;

// You may include details about your community and friends (other
// data-providers).
// Please check identify.php for other possible containers 
// in the Identify response

// maximum mumber of the records to deliver
// (verb is ListRecords)
// If there are more records to deliver
// a ResumptionToken will be generated.
$MAXRECORDS = 30; //CONF

// maximum mumber of identifiers to deliver
// (verb is ListIdentifiers)
// If there are more identifiers to deliver
// a ResumptionToken will be generated.
$MAXIDS = 120; //CONF

// After 24 hours resumptionTokens become invalid.
$tokenValid = 24*3600;
//$expirationdatetime = gmstrftime('%Y-%m-%dT%TZ', time()+$tokenValid); // Parece que é incompatível com W2k.
$expirationdatetime = gmstrftime('%Y-%m-%dT%H:%M:%SZ',time()+$tokenValid);

// use this for testing purposes
//$CONTENT_TYPE = 'Content-Type: text/plain';

// use this for production purposes
$CONTENT_TYPE = 'Content-Type: text/xml; charset=UTF-8';

// define all supported sets in your repository
$SETS = null;	
        //array (
				// array('setSpec'=>'pucrio', 'setName'=>'Puc Rio', 'setDescription'=>'') ,
				// array('setSpec'=>'usp', 'setName'=>'USP', 'setDescription'=>'') //,
				// array('setSpec'=>'math', 'setName'=>'Mathematics') ,
				// array('setSpec'=>'phys', 'setName'=>'Physics') 
        //);

// define all supported metadata formats

//
// myhandler is the name of the file that handles the request for the 
// specific metadata format.
// [record_prefix] describes an optional prefix for the metadata
// [record_namespace] describe the namespace for this prefix

$METADATAFORMATS = 	array (
/*						'oai_dc' => array(
              'metadataPrefix'=>'oai_dc', 
							'schema'=>'http://www.openarchives.org/OAI/2.0/oai_dc.xsd',
							'metadataNamespace'=>'http://www.openarchives.org/OAI/2.0/oai_dc/',
							'myhandler'=>'record_dc.php',
							'record_prefix'=>'dc',
							'record_namespace' => 'http://purl.org/dc/elements/1.1/'
						),*/
						  'oai_dc' => array(
              'metadataPrefix' => 'oai_dc',
              'schema'=>'http://www.openarchives.org/OAI/2.0/oai_dc.xsd',
              'metadataNamespace'=>'http://www.openarchives.org/OAI/2.0/oai_dc/',
							'myhandler'=>'utf8_encode',
              'record_prefix'=>'oai_dc'
            ), 
						  'oai_etdms' => array(
              'metadataPrefix' => 'oai_etd-ms',
              'schema'=>'http://www.ndltd.org/standards/metadata/etdms/1.0/etdms.xsd',
              'metadataNamespace'=>'http://www.ndltd.org/standards/metadata/etdms/',
							'myhandler'=>'utf8_encode',
              'record_prefix'=>'thesis'
            ), 
              'mtd2-br' => array(
           		'metadataPrefix'=>'mtd2-br',
      				'schema'=>'http://oai.ibict.br/mtd2-br/mtd2-br.xsd',
		     			'metadataNamespace'=>'http://oai.ibict.br/mtd2-br/',
		    			'myhandler'=>'utf8_encode',
			    		'record_prefix'=>'mtd2-br'
		   		 )						
				);


// Data Source Name: This is the universal connection string
// if you use something other than mysql edit accordingly.
// Example for MySQL

// the charset you store your metadata in your database
// currently only utf-8 and iso8859-1 are supported
$charset = "iso8859-1";
$charset = "utf-8";

// if entities such as < > ' " in your metadata has already been escaped 
// then set this to true (e.g. you store < as &lt; in your DB)
$xmlescaped = false;

$SQL['split'] = ';';

// Current Date
$datetime = gmstrftime('%Y-%m-%dT%H:%M:%S');
$responseDate = $datetime.'Z';

// do not change
$oainav ='<?xml-stylesheet type="text/xsl" href="oainav3.php" ?>';
//$oainav='';

$XMLHEADER = 
'<?xml version="1.0" encoding="UTF-8"?>'.$oainav.'
<OAI-PMH xmlns="http://www.openarchives.org/OAI/2.0/"
         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:schemaLocation="http://www.openarchives.org/OAI/2.0/
         http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd">'."\n";

$xmlheader .= $XMLHEADER . 
			  ' <responseDate>'.$responseDate."</responseDate>\n";

// the xml schema namespace, do not change this
$XMLSCHEMA = 'http://www.w3.org/2001/XMLSchema-instance';

$TEDE =& new OAI_MTDBR($mtdbr_sigla,$repositoryIdentifier.$delimiter,"2.0"); // Prefixo do identificador , versão MTD-BR

//
// A linha abaixo está comentada até a implementação correta do metadado OAI_DC
//$TEDE =& new OAI_MTDBR($mtdbr_sigla,$repositoryIdentifier.$delimiter,"oaidc"); // Prefixo do identificador , versão MTD-BR
//

// {{{ VIM Configuration 
/*
 * vim600:  et sw=2 ts=2 
 * vim<600: et sw=2 ts=2 
 */
// }}}
?>
