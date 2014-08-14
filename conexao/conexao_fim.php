<?
 $usuario_fim = "root";
 $server_fim = "localhost";
 $passwd_fim = "";
 $conexao_fim = mysql_connect("$server_fim","$usuario_fim","$passwd_fim");
 $base_fim = "TEDE_TDE";
 
 if (($mysql_version_majour >=4) && ($mysql_version_minor>=1))
{
	$result = mysql_query('SET character_set_client = iso-8859-1') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_results = iso-8859-1') or die('Query failed: ' . mysql_error());
	$result = mysql_query('SET character_set_connection = iso-8859-1') or die('Query failed: ' . mysql_error());
}
?>