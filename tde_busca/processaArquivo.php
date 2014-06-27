<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
  //Arquivos complementares
  //Conexao
  require "../conexao/conexao_fim.inc";
  require "../bibliotecas/ip.bib";

  //Recupera variavel passada por parametro
  $codArquivo = $HTTP_GET_VARS["codArquivo"];

  //Arquivos
  $query = "select arURL, arDireitos from Arquivos where arCod = $codArquivo";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (arquivos): " . mysql_error());
   //Preenche array com resultado
  $elemResultQuery = mysql_fetch_array($resultQuery);
  
  //while ($elemResultQuery!="") {
  $arDireitos = $elemResultQuery['arDireitos'];

  if ($arDireitos=="Restrito") {
  $ipUsuario=$REMOTE_ADDR;

  $ipUsuarioSplit=split("\.",$ipUsuario);
  $ipPermitidoSplit=split("/",$ipPermitido);
  $qtdipPermitido=count($ipPermitidoSplit);
  $i=0;
  for ($i=0; $i<=$qtdipPermitido; $i++) {
  $ipPermitidoT=$ipPermitidoSplit[$i];

  $ipPermitidoTSplit=split("\.",$ipPermitidoT);
  $ip0="";
  $ip1="";
  $ip2="";
  $ip3="";

  if ($ipUsuarioSplit[0]==$ipPermitidoTSplit[0] or $ipPermitidoTSplit[0]=="*") {
  $ip0="OK";
  }
  if ($ipUsuarioSplit[1]==$ipPermitidoTSplit[1] or $ipPermitidoTSplit[1]=="*") {
  $ip1="OK";
  }
  if ($ipUsuarioSplit[2]==$ipPermitidoTSplit[2] or $ipPermitidoTSplit[2]=="*") {
  $ip2="OK";
  }
  if ($ipUsuarioSplit[3]==$ipPermitidoTSplit[3] or $ipPermitidoTSplit[3]=="*") {
  $ip3="OK";
  }
  if ($ip0=="OK" and $ip1=="OK" and $ip2=="OK" and $ip3=="OK") {
  $liberado="Sim";
  }
  $i=$i+1;
  }
  }
  if ($liberado=="Sim" or $arDireitos=="Publico") {

  $urlArquivo = $elemResultQuery['arURL'];
  mysql_free_result($resultQuery);
   } else {
   $urlArquivo = 'arquivo_restrito.php';
  mysql_free_result($resultQuery);
   }
  ?>
<body>
<?
//Direciona para a URL do arquivo
header("Location:$urlArquivo");
?>
</body>
</html>
