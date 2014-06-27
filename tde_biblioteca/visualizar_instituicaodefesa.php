<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Visualiza&ccedil;&atilde;o de Contribuidores</title>
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
  <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
    <tr> 
		<td width="139" height="100%" valign="top" class="subMenuBib">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td height="19" class="td"> <span class="txtBold"> 
                  <?
		  //Visualizar a Biblioteca dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_bd="SELECT * FROM BibliotecaDepositaria WHERE bdCod=$SbdCod";
          $SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
          $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
		  
		  $bdNome=$SEL_bd_RES["bdNome"];
		  echo $bdNome;
		  ?>
                  <br>
                  </span> </td>
              </tr>
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txInstituicaoDefesa; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_instituicaodefesa.php'"><a href="inserir_instituicaodefesa.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOver" onClick="location='visualizar_instituicaodefesa.php?v=Editar'"><a href="visualizar_instituicaodefesa.php?v=Editar" class="linkpreto"> 
                  &raquo; <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="tde_pos.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
            </table>
	</td>
    <td height="100%" align="center" valign="top" class="tdConteudo">
	<? if ($sucesso!="" or $erro!="") { ?>
	<div>
	<table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
	  <tr> 
		<td align="center" valign="middle"> 
		<?  echo $sucesso; echo $erro; ?>
		  </td>
	  </tr>
	</table></div><br><? } ?>
	<div>
<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
  <tr> 
  	<td width="90%">
	<table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" valign="middle" class="tdBiblioteca"> 
                        <td height="13" colspan="4" class="txtBold"><? echo $txInstituicaoDefesa; ?></td>
                      </tr>
                      <?
	  require "../conexao/conexao_fim.inc";
	  $estiloTR="tr";
include "../bibliotecas/funcoes.bib";

$SEL_in="SELECT * FROM Instituicao ORDER BY inNome ";
$SEL_in_query=mysql_db_query($base_fim,$SEL_in,$conexao_fim);
$SEL_in_RES=mysql_fetch_array($SEL_in_query);

if ($SEL_in_RES=="") {
	  ?>
                      <tr class="tdOperacoes"> 
                        <td height="13" colspan="4"><? echo $txNenhumRegistroC; ?>.</td>
                      </tr>
                      <? } else { ?>
                      <tr class="tdOperacoes"> 
                        <td height="13" colspan="2"><? echo $txNome; ?></td>
                        <td width="54" align="center"><? echo $txAlterar; ?></td>
                        <td width="56" align="center"><? echo $txExcluir; ?></td>
                      </tr>
                      <?
	

while ($SEL_in_RES!="") {

mudaEstiloTR(&$estiloTR);

$inCod=$SEL_in_RES["inCod"];
$inNome=$SEL_in_RES["inNome"];
if ($EVinCod==$inCod) {
$inSigla=$SEL_in_RES["inSigla"];
$inPais=$SEL_in_RES["inPais"];
$inUF=$SEL_in_RES["inUF"];
$inCNPJ=$SEL_in_RES["inCNPJ"];
$inURL=$SEL_in_RES["inURL"];
}

if ($inCod=="$EVinCod") {
$estiloTR="trResposta";
}
	?>
                      <tr> 
                        <td colspan="2" class=<? echo $estiloTR; ?>><? echo $inNome; ?></td>
                        <td width="54" align="center" valign="middle" class=<? echo $estiloTR; ?>><? if ($inCod!="1") {?><a href="editar_instituicaodefesa.php?inCod=<? echo $inCod; ?>" class="linkpreto"><img src="../tde_layout1/imagens/alterar.gif" / alt="alterar" hspace="0" vspace="0" border="0" align="absmiddle"></a><? } ?></td>
                        <td width="56" align="center" valign="middle" class=<? echo $estiloTR; ?>><? if ($inCod!="1") {?><a href="excluir_instituicaodefesa.php?inCod=<? echo $inCod; ?>" class="linkpreto"><img src="../tde_layout1/imagens/excluir.gif" / alt="excluir" hspace="0" vspace="0" border="0" align="absmiddle"></a><? } ?></td>
                      </tr>
                      <? if ($EVinCod==$inCod) { ?>
                      <tr> 
                        <td width="36" valign="top" class=<? echo $estiloTR; ?>><strong><? echo $txSigla; ?> 
                          </strong></td>
                        <td width="324" valign="top" class=<? echo $estiloTR; ?>><?echo $inSigla;?>
                          
                        </td>
                        <td width="54" rowspan="5" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="56" rowspan="5" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td valign="top" class=<? echo $estiloTR; ?> ><strong><? echo $txPais; ?></strong></td>
                        <td width="324" valign="top" class=<? echo $estiloTR; ?>>
                          <?
						$SEL_ps="SELECT * FROM Pais WHERE psSigla='$inPais'";
						   $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
				
						   $inPais=$SEL_ps_RES["psNome"];
						   echo $inPais;?>
                        </td>
                      </tr>
                      <tr> 
                        <td valign="top" class=<? echo $estiloTR; ?>><strong><? echo $txUF; ?></strong></td>
                        <td width="324" valign="top" class=<? echo $estiloTR; ?>><?echo $inUF;?></td>
                      </tr>
                      <tr> 
                        <td valign="top" class=<? echo $estiloTR; ?>><strong><? echo $txCNPJ; ?></strong></td>
                        <td width="324" valign="top" class=<? echo $estiloTR; ?>><?echo $inCNPJ;?></td>
                      </tr>
                      <tr> 
                        <td valign="top" class=<? echo $estiloTR; ?>><strong><? echo $txURL; ?></strong></td>
                        <td width="324" valign="top" class=<? echo $estiloTR; ?>><?echo $inURL;?></td>
                      </tr>
                      <? }
		$SEL_in_RES=mysql_fetch_array($SEL_in_query);
		} } ?>
                    </table></td>

  </tr>

</table>
</div>

<br>
</td>

</tr>
</table>

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
<!-- InstanceEnd --></html>

<? } ?>