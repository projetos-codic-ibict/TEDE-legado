<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
   <?php 
   session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{
				
require "../conexao/conexao_fim.inc";
$data=$_GET["data"];
$SEL_le="SELECT * FROM log_export WHERE le_data='$data'";
$SEL_le_query=mysql_db_query($base_fim,$SEL_le,$conexao_fim);
$SEL_le_RES=mysql_fetch_array($SEL_le_query);
?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td colspan="3">Data da exportação: <?php echo $_GET[data];?></td>
      </tr>
      <tr>
        <td width="15%">Identificador da TDE</td>
        <td width="56%">Erros de metadados</td>
        <td width="29%">Erro de arquivos</td>
      </tr>
      <?php while ($SEL_le_RES!="") {
		  $tsIdentificador=$SEL_le_RES["tsIdentificador"];
		  $erro_m=$SEL_le_RES["le_metadados"];
		  $erro_m=str_replace(";","<br>",$erro_m);
		  $erro_a=$SEL_le_RES["le_arquivos"];
		  $erro_a=str_replace(";","<br>",$erro_a);
		  ?>
      <tr>
        <td><?php echo $tsIdentificador; ?></td>
        <td><?php if ($erro_m!="") { echo $erro_m; } else { echo "OK";  } $erro_m=""; ?></td>
        <td><?php if ($erro_a!="") { echo $erro_a; } else { echo "OK"; } $erro_a=""; ?></td>
      </tr>
      <?php $SEL_le_RES=mysql_fetch_array($SEL_le_query); } } ?>
    </table></td>
  </tr>
</table>
</body>
</html>