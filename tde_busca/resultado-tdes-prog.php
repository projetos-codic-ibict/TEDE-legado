<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<head> 
<title>TEDE | Layout P&aacute;gina 1 - Inicio da Se&ccedil;&atilde;o</title>
 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_busca.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style2 {
	font-size: 14px;
	font-weight: bold;
}
.style4 {font-size: 14}
-->
</style>

<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<?
if ($grau!="") {
if ($grau=="Todos") {
$termoGrau="";
} else {
$termoGrau="and Teses.tsGrau='".$grau."'";
}
}
if ($mes_inicio=="00") {
$mes_inicio="";
}
if ($mes_fim=="00") {
$mes_fim="";
}
?>
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="left" valign="top">
      <br>      <table width="95%" border="0" align="center" class="loginTable">
        <tr>
          <td><span class="loginTableTitle"><? echo $txTDEPG;?></span></td>
          <td><a href="javascript:print()"><img src="../tde_layout1/imagens/print.gif" width="27" height="28" border="0"></a></td>
        </tr>
        <tr bgcolor="#F5F5F5">
          <td colspan="2"><span class="style1">&nbsp;<br>
		  <?
		   require "../conexao/conexao_fim.php";  
		    if ($programa=="Todos") {
		  $SEL_pr="SELECT * FROM Programa ORDER BY prNome";
		  $SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
          $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
               $pr=$programa; 
               }else { 
			   $SEL_pr="SELECT * FROM Programa WHERE prCod='$programa'";
		  $SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
          $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  $pr=$SEL_pr_RES['prNome']; }
			   echo $txPrograma.": ".$pr."<br>";  if ($ano_fim=="" and $ano_inicio!="" and $mes_fim!="" and $mes_inicio!="") { $ano_fim=$ano_inicio; } if ($mes_inicio!="") { echo $mes_inicio; if ($mes_inicio!="" and $ano_inicio!="") { echo "/"; } } if ($ano_inicio!="") { echo $ano_inicio; } echo " ".$txAte." "; if ($mes_fim!="") { echo $mes_fim;  echo "/";  } echo $ano_fim; if ($grau!="") { echo "<br>".$txGrau.": ".$grau; }?>
            <br>
            </span>
              </td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" class="txt">
            <?
		 
		 

if ($ano_inicio!="" and $mes_inicio=="" and $mes_fim=="" and $ano_fim=="") {
$termoData="and Teses.tsDataDefesa like '".$ano_inicio."-%'";
}
if ($ano_inicio!="" and $mes_inicio!="" and $mes_fim=="" and $ano_fim=="") {
$termoData="and Teses.tsDataDefesa like '".$ano_inicio."-".$mes_inicio."%'";
}
if ($ano_inicio!="" and $mes_inicio!="" and $mes_fim!="" and $ano_fim=="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_inicio."-".$mes_inicio."-00' and Teses.tsDataDefesa <= '".$ano_inicio."-".$mes_fim."-31')";
}
if ($ano_inicio!="" and $mes_inicio!="" and $mes_fim!="" and $ano_fim!="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_inicio."-".$mes_inicio."-00' and Teses.tsDataDefesa <= '".$ano_fim."-".$mes_fim."-31')";
}
if ($ano_inicio!="" and $mes_inicio=="" and $mes_fim=="" and $ano_fim!="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_inicio."-00-00' and Teses.tsDataDefesa <= '".$ano_fim."-12-31')";
}
if ($ano_inicio!="" and $mes_inicio!="" and $mes_fim=="" and $ano_fim!="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_inicio."-".$mes_inicio."-00' and Teses.tsDataDefesa <= '".$ano_fim."-12-31')";
}
if ($ano_inicio!="" and $mes_inicio=="" and $mes_fim!="" and $ano_fim!="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_inicio."00-00' and Teses.tsDataDefesa <= '".$ano_fim."-".$mes_fim."-31')";
}
if ($ano_inicio=="" and $mes_inicio!="" and $mes_fim!="" and $ano_fim!="") {
$termoData="and (Teses.tsDataDefesa >= '".$ano_fim."-".$mes_inicio."-00' and Teses.tsDataDefesa <='".$ano_fim."-".$mes_fim."-31')";
}
		 
			 	 while ($SEL_pr_RES!="") {
		 		 $prCod=$SEL_pr_RES["prCod"];
		 		 $prNome=$SEL_pr_RES["prNome"];
				 if ($termoData=="" and $termoGrau=="") {
				 $SEL_tsqtd="SELECT count(*) FROM TSPF
INNER JOIN Teses ON Teses.tsIdentificador = TSPF.tsIdentificador
LEFT JOIN OAIControle ON TSPF.tsIdentificador = OAIControle.tsIdentificador 
INNER JOIN PessoaFisica ON PessoaFisica.pfCod = TSPF.pfCod
WHERE TSPF.prCod =$prCod AND TSPF.tspfTipo = 'Autor'  AND OAIControle.tsIdentificador IS NULL "; 
} else{
 $SEL_tsqtd="SELECT count(*) FROM TSPF
INNER JOIN Teses ON Teses.tsIdentificador = TSPF.tsIdentificador
LEFT JOIN OAIControle ON TSPF.tsIdentificador = OAIControle.tsIdentificador 
INNER JOIN PessoaFisica ON PessoaFisica.pfCod = TSPF.pfCod
WHERE TSPF.prCod =$prCod AND TSPF.tspfTipo = 'Autor'  AND OAIControle.tsIdentificador IS NULL $termoGrau $termoData";
} 
//echo  $SEL_tsqtd;
//exit;
          $SEL_tsqtd_query=mysql_db_query($base_fim,$SEL_tsqtd,$conexao_fim);
          $SEL_tsqtd_RES=mysql_fetch_array($SEL_tsqtd_query); 
		  $qtd=$SEL_tsqtd_RES['count(*)'];
		 	  ?>
            <tr>
              <td><span class="style2">
                <? if ($ver==$prCod) { if ($qtd!=0) { echo " <img src=\"../tde_layout1/imagens/menos.gif\" hspace=\"3\" border=\"0\"> "; }else { echo " <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"> "; }?>
                <a href="resultado-tdes-prog.php?ver=nao&programa=<? echo $programa; ?>&ano_inicio=<? echo $ano_inicio;?>&mes_inicio=<? echo $mes_inicio;?>&mes_fim=<? echo $mes_fim;?>&ano_fim=<? echo $ano_fim;?>&grau=<? echo $grau;?>"><? echo $prNome; ?></a> (<? echo $qtd; ?> TDE(s))</span>
                  <? }else{ if ($qtd!=0) { echo " <img src=\"../tde_layout1/imagens/mais.gif\" hspace=\"3\" border=\"0\"> "; } else { echo " <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"> "; } ?>
                  <a href="resultado-tdes-prog.php?ver=<? echo $prCod;?>&programa=<? echo $programa; ?>&ano_inicio=<? echo $ano_inicio;?>&mes_inicio=<? echo $mes_inicio;?>&mes_fim=<? echo $mes_fim;?>&ano_fim=<? echo $ano_fim;?>&grau=<? echo $grau;?>"><? echo $prNome; ?></a> (<? echo $qtd; ?> TDE(s))
                  <? }?>
                  <? if ($ver==$prCod) { ?>
                  <br>
                <? 
				 if ($termoData=="" and $termoGrau=="") {
				$SEL_ts="SELECT Teses.tsIdentificador,Teses.tsIdioma,PessoaFisica.pfCod, PessoaFisica.pfNome 
FROM TSPF
INNER JOIN Teses ON Teses.tsIdentificador = TSPF.tsIdentificador
LEFT JOIN OAIControle ON TSPF.tsIdentificador = OAIControle.tsIdentificador 
INNER JOIN PessoaFisica ON PessoaFisica.pfCod = TSPF.pfCod
WHERE TSPF.prCod =$prCod AND TSPF.tspfTipo = 'Autor'  AND OAIControle.tsIdentificador IS NULL ORDER BY PessoaFisica.pfNome";
}else{

$SEL_ts="SELECT Teses.tsIdentificador,Teses.tsGrau,Teses.tsIdioma,Teses.tsDataDefesa,PessoaFisica.pfCod, PessoaFisica.pfNome 
FROM TSPF
INNER JOIN Teses ON Teses.tsIdentificador = TSPF.tsIdentificador
LEFT JOIN OAIControle ON TSPF.tsIdentificador = OAIControle.tsIdentificador 
INNER JOIN PessoaFisica ON PessoaFisica.pfCod = TSPF.pfCod
WHERE TSPF.prCod =$prCod AND TSPF.tspfTipo = 'Autor'  AND OAIControle.tsIdentificador IS NULL $termoGrau $termoData ORDER BY PessoaFisica.pfNome";
} 
          $SEL_ts_query=mysql_db_query($base_fim,$SEL_ts,$conexao_fim);
          $SEL_ts_RES=mysql_fetch_array($SEL_ts_query); 
		 
		  while ($SEL_ts_RES!="") {
		  $tsIdentificador=$SEL_ts_RES['tsIdentificador'];
		  $tsIdioma=$SEL_ts_RES['tsIdioma'];
		  $SEL_tt="SELECT * FROM Titulo WHERE  tsIdentificador = '$tsIdentificador' and ttIdioma='$tsIdioma'";
          $SEL_tt_query=mysql_db_query($base_fim,$SEL_tt,$conexao_fim);
          $SEL_tt_RES=mysql_fetch_array($SEL_tt_query); 
		 
		   echo "<b><a href=\"processaPesquisa.php?pesqExecutada=1&id=".$SEL_ts_RES['tsIdentificador']."\">".$SEL_ts_RES['pfNome']."</b> - ".$SEL_tt_RES['ttTitulo']."</a><br>";
		    $SEL_ts_RES=mysql_fetch_array($SEL_ts_query);  
		   }
		  
		   } ?>              </td>
            </tr>
            <?
			  $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  }
		 
		  ?>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
