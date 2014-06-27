<? session_start();
if(!session_is_registered("ScnCod")) {
header("Location: login.php");
}else{
if ($Alterar!="") {
require "biblioteca/alterar_conta_bib.inc";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_biblioteca.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Login</title>
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
          <td width="139" height="80" align="center" valign="top"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a></td>
              </tr>
              <tr> 
                <td width="139" height="20" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
            </table></td>
          <td width="31" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuBiblio"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_biblio.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle"> <? echo $txSPETD_T; ?> 
                        <span class="tituloBib"> | <? echo $txBiblioteca_T; ?> 
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
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="92%" valign="top"><br>
            <table width="700" border="0" align="center" cellpadding="5" cellspacing="0" >
              <tr> 
                <td width="92%" valign="top">
                  <? if ($erro!="" or $erro2!="" or $erro3!="") { ?>
                  
                    <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                      <tr> 
                        <td align="center" valign="middle"><? 
						if ($erro!="") {
						echo $erro;
						}
						if ($erro2!="") {
						echo $erro2;
						}
						if ($erro3!="") {
						echo $erro3;
						}
				 ?> </td>
                      </tr>
                    </table>
                  <br>
                
                  <?  } ?>
                  <div> <form name="Form1" method="post" action="">
                    <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                      <tr> 
                        <td>
						
						<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                            <tr align="center" class="tdBiblioteca"> 
                              <td colspan="2" class="txtBold"><? echo $txAlterar." "; echo $txContaCatalogador; ?></td>
                            </tr>
                            <tr> 
                              <td height="20" class="txtBold"><? echo $txBiblioteca; ?></td>
                                <td height="20"> 
                                  <? //Selecionar programa
				require "../conexao/conexao.inc";
				$SEL_bd="SELECT bdNome FROM BibliotecaDepositaria WHERE bdCod='$SbdCod'";
				$SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
				$SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
				echo $SEL_bd_RES["bdNome"];
				$SEL_cn="SELECT * FROM Contas WHERE cnCod='$ScnCod'";
				$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
				$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
				$cnNome=$SEL_cn_RES["cnNome"];
				$cnTipo=$SEL_cn_RES["cnTipo"];
				$cnLogin=$SEL_cn_RES["cnLogin"];
				$cnSenha=$SEL_cn_RES["cnSenha"];
				$cnEmail=$SEL_cn_RES["cnEmail"];
				$cnBloqueado=$SEL_cn_RES["cnBloqueado"];
								
						?>
                                </td>
                            </tr>
                            <tr> 
                              <td width="16%" height="20" class="txtBold"><? echo $txNome; ?></td>
                              <td width="84%" height="20"><input name="cnNome" type="text" class="req" id="cnNome2" value="<? echo $cnNome; ?>" size="60" maxlength="100"> 
                                <input type="hidden" name="cnNomeAtual" value="<? echo $cnNome; ?>"></td>
                            </tr>
                            <tr> 
                              <td height="20" class="txtBold"><? echo $txLogin; ?></td>
                              <td height="20"><input name="cnLogin" type="text" class="req" id="cnNome" value="<? echo $cnLogin; ?>" size="30" maxlength="100">
                                  <input type="hidden" name="cnLoginAtual" value="<? echo $cnLogin; ?>"></td>
                            </tr>
                            <tr> 
                              <td height="20" class="txtBold"><? echo $txSenha; ?></td>
                              <td height="20"><input name="cnSenha" type="password" class="req" id="cnSenha2" value="<? echo $cnSenha; ?>" size="15" maxlength="30"></td>
                            </tr>
                            <tr> 
                              <td height="20" class="txtBold"><? echo $txConfirmarSenha; ?></td>
                              <td height="20"><input name="cnSenha2" type="password" class="req" id="cnSenha" value="<? if ($erro=="") { echo $cnSenha; } ?>" size="15" maxlength="30"></td>
                            </tr>
                            <tr> 
                              <td height="20" class="txtBold"><? echo $txEMail; ?></td>
                              <td height="20"><input name="cnEmail" type="text" class="email" value="<? echo $cnEmail; ?>" size="40" maxlength="100">
                                  <input type="hidden" name="cnEmailAtual" value="<? echo $cnEmail; ?>">
                                  <input type="hidden" name="cnBloqueado" value="<? echo $cnBloqueado; ?>"></td>
                            </tr>
                            <tr>
                              <td height="20" colspan="2">&nbsp;</td>
                            </tr>
                            <tr> 
                              <td height="20" colspan="2" class="tdBiblioteca"><strong><? echo $txStatus; ?></strong></td>
                            </tr>
                            <tr class="tdBiblioteca"> 
                              <td height="20"><? echo $txBloqueado; ?></td>
                              <td height="20"> 
                                <? if ($cnBloqueado==1) { echo "Sim"; }else{ echo "N&atilde;o"; } ?>
                              </td>
                            </tr>
                            <tr> 
                              <td>&nbsp;</td>
                              <td align="right" valign="bottom">&nbsp;</td>
                            </tr>
                            <tr> 
                              <td><input name="cnTipo" type="hidden" value="<? echo $cnTipo; ?>"> 
                                <input name="cod" type="hidden" value="Editar"> 
                                <input name="cnCod" type="hidden" id="cnCod" value="<? echo $cnCod; ?>"> 
                                <input type="hidden" name="CprCod" value="<? echo $CprCod; ?>"></td>
                              <td align="right" valign="bottom"><input name="Alterar" type="submit" class="botao" id="Alterar" value="<? echo $txAlterar; ?> &raquo;"></td>
                            </tr>
                          </table>
						 
						  </td>
                      </tr>
                    </table> </form>
                  </div>
              </tr>
            </table>
            <br>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  <? require "../bibliotecas/versao_sistema.bib"; echo $versao; ?>
                  | COPYRIGHT &copy;<br>
                  desenvolvido para IE 5.0+</td>
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
