<?
 $usuario = "root";
 $server = "localhost";
 $passwd = "";
 $conexao = mysql_connect("$server","$usuario","$passwd");
 $base = "TEDEUFG_SUBMISSAO";
 
 if (($mysql_version_majour >=4) && ($mysql_version_minor>=1))
{
	$result = mysql_query('SET character_set_client = iso-8859-1') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_results = iso-8859-1') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_connection = iso-8859-1') or die('Query failed: ' . mysql_error());
}
 ?>