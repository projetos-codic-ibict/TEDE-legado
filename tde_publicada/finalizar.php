<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../tde_biblioteca/login.php");
}else{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/Templates/tde_biblioteca_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" --> 

<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | ALUNO | Submioss&atilde;o finalizada</title>

<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_cat.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --> <!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" align="left" valign="top"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="80" align="center" valign="top" class="subMenuBib">
<table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a></td>
              </tr>
              <tr> 
                <td width="139" height="20" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="62" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuBiblio"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_biblio.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td class="tdConteudo">&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle"> 
                        <? echo $txSPETD_T; ?>
                        <span class="tituloBib"> | 
                        <? echo $txBiblioteca_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuBiblio"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuBiblio">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txBusca_T; ?> </a> |<a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(4,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_biblio.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" --> 

      <?

if ($finalizar!="") {

require "../conexao/conexao.inc";
require "../bibliotecas/servidor.bib";

//Verificação dos campos obrigatórios
//Verifica campo Disponibilizar e-mail

$SEL_TSPF="SELECT tspfDispEmail FROM TSPF WHERE tsIdentificador=$VtsIdentificador";
$SEL_TSPF_query=mysql_db_query($base,$SEL_TSPF,$conexao);
$SEL_TSPF_RES=mysql_fetch_array($SEL_TSPF_query);

$tspfDispEmail=$SEL_TSPF_RES["tspfDispEmail"];

//Verifica campo Data defesa

$SEL_TESE="SELECT tsDataDefesa FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$SEL_TESE_query=mysql_db_query($base,$SEL_TESE,$conexao);
$SEL_TESE_RES=mysql_fetch_array($SEL_TESE_query);

$tsDataDefesa=$SEL_TESE_RES["tsDataDefesa"];

//Verifica campo Titulo

$SEL_TITULO="SELECT ttTitulo FROM Titulo WHERE tsIdentificador=$VtsIdentificador";
$SEL_TITULO_query=mysql_db_query($base,$SEL_TITULO,$conexao);
$SEL_TITULO_RES=mysql_fetch_array($SEL_TITULO_query);

$ttTitulo=$SEL_TITULO_RES["ttTitulo"];

//Verifica campo Assunto

$SEL_ASSUNTO="SELECT asAssunto FROM Assunto WHERE tsIdentificador=$VtsIdentificador";
$SEL_ASSUNTO_query=mysql_db_query($base,$SEL_ASSUNTO,$conexao);
$SEL_ASSUNTO_RES=mysql_fetch_array($SEL_ASSUNTO_query);

$asAssunto=$SEL_ASSUNTO_RES["asAssunto"];

//Verifica campo Resumo

$SEL_RESUMO="SELECT rsResumo FROM Resumo WHERE tsIdentificador=$VtsIdentificador";
$SEL_RESUMO_query=mysql_db_query($base,$SEL_RESUMO,$conexao);
$SEL_RESUMO_RES=mysql_fetch_array($SEL_RESUMO_query);

$rsResumo=$SEL_RESUMO_RES["rsResumo"];

// Verifica os campos que estao vazios e armazena o valor da mensagem que aparecerá para o usuario

if ($tspfDispEmail=="" or $tsDataDefesa=="" or $ttTitulo=="" or $asAssunto=="" or $rsResumo=="") {

if ($tspfDispEmail=="") {

$valida_1="* O campo \"Seu email pode ser disponibilizado na p&aacute;gina de rosto?\" é obrigatório<br>";
}

if ($tsDataDefesa=="") {

$valida_2="* O campo \"Data da defesa\" é obrigatório<br>";
}

if ($ttTitulo=="") {
$valida_3="* O campo \"Titulo\" é obrigatório<br>";

}

if ($asAssunto=="") {
$valida_4="* O campo \"Area/Sub-area do CNPQ\" ou \"Palavras-chave\" é obrigatório<br>";

}

if ($rsResumo=="") {
$valida_5="* O campo \"Resumo\" é obrigatório<br>";

}
//header("Location:finalizar.php?valida_1=$valida_1&valida_2=$valida_2&valida_3=$valida_3&valida_4=$valida_4&valida_5=$valida_5");
//exit;
} //else {

//Caso os campos obrigatórios tiverem sidos preenchidos corretamentes ele bloqueia a conta do aluno

// Bloquear a Conta do Aluno
require "../conexao/conexao.inc";
$total_cn="UPDATE Contas SET cnBloqueado='1' WHERE pfCod=$VpfCod and tsIdentificador=$VtsIdentificador";
$editar_cn=mysql_db_query($base, $total_cn, $conexao);

// Mudar o Status da Tese do Aluno

$total_cn="UPDATE TSPF SET tspfDisponivel='2' WHERE pfCod=$VpfCod and tsIdentificador=$VtsIdentificador";
$editar_cn=mysql_db_query($base, $total_cn, $conexao);

$SEL_cn="SELECT cnEmail, cnNome, prCod FROM Contas WHERE pfCod=$VpfCod and tsIdentificador=$VtsIdentificador and cnTipo='Autor'";
$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);

$cnprCod=$SEL_cn_RES[prCod];
$cnNome=$SEL_cn_RES["cnNome"];
$cnEmail=$SEL_cn_RES["cnEmail"];

$SEL="SELECT cnEmail FROM Contas WHERE prCod='$cnprCod' and cnTipo='Pos'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

while ($SEL_RES!="") {

$emails[]=$SEL_RES["cnEmail"];
$SEL_RES=mysql_fetch_array($SEL_query);
}

$qtd_email=count($emails);

for ($i=0; $i<=$qtd_email; $i++) {

if ($to=="") {

$to=$emails[$i];

} else {

$to=$to.",".$emails[$i];
}
}

//Enviar e-mail para as pessoas do PRograma referente a TDE do Autor

$de=$cnEmail;

//$to=$cnEmail;

$LinkSubmissao="http://".$servidor_diretorio."tde_pos/login.php";
$data_atual=date("d/m/Y");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloFinalizarAutor;
$mensagem=$emMensagemFinalizarAutor;
mail($to,"$titulo",$mensagem,"From: $de");

//session_start();
session_destroy();
}

?>

      <br>

      <table width="600" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">

        <tr> 

          <td> <p><br>
              <?
		  if ($finalizar!="") {
		  require "../bibliotecas/idioma_sistema.bib";
		  require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
          require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
            		
		  echo "<div align='center'>".$sg001; echo "<br></div>";
		 echo $s006; 
		 
		 } else { ?>
              <strong><? echo $txSuaTDEPG; ?>:</strong><br>
            </p>
            <table width="100%" border="0">
              <tr> 
                <td width="6%">&nbsp;</td>
                <td width="68%"><table width="78" align="right" cellpadding="4" cellspacing="0" class="txt">
                    <tr> 
                      <td width="62" align="center" valign="middle" class="botao" onClick="location='visualizar_tde.php'" ><a href="visualizar_tde.php" class="menu"><? echo $txCancelar; ?></a></td>
                    </tr>
                  </table></td>
                <td width="24%" align="right"><table width="78" align="right" cellpadding="4" cellspacing="0" class="txt">
                    <tr> 
                      <td width="68" align="center" valign="middle" class="botao" onClick="location='finalizar.php?finalizar=sim'" ><a href="finalizar.php?finalizar=sim" class="menu"><? echo $txConfirmar; ?> &raquo;</a></td>
                    </tr>
                  </table></td>
                <td width="2%" align="right">&nbsp;</td>
              </tr>
            </table>
            <p>
              <? }?>
              <br>
            </p>
            </td>

        </tr>
      </table>

      <br>

      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="subMenuBib">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  <? require "../bibliotecas/versao_sistema.bib"; echo $versao ?>
                  | <? echo $txCopyright; ?></td>
              </tr>
            </table></td>
          <td width="100%" valign="middle"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
            <tr align="center" valign="middle">
              <td width="25%" align="center"><a href="<? echo $link2; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede1.gif" / alt="<? echo $texto2; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $link3; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede2.gif" / alt="<? echo $texto3; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $url_bdtd; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/teses_logo_tede.jpg" alt="<? echo $url_bdtd; ?>" name="bdtdLogo" border="0" id="bdtdLogo"></a></td>
              <td width="25%" align="center" valign="middle"><a href="<? echo $url_ibict; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/ibict_logo_tede.jpg" alt="<? echo $url_ibict; ?>" name="ibictLogo" border="0" id="ibictLogo"></a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html><? } ?>

