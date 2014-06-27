<? session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_admin_menu.dwt" codeOutsideHTMLIsLocked="false" --> 
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<head> 
<!-- InstanceBeginEditable name="doctitle" -->
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | ADMINISTRA&Ccedil;&Atilde;O | Altera&ccedil;&atilde;o de Logo do Sistema</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
          <td width="139" height="80" align="center" valign="top" class="subMenuAdmin"><table width="100%" height="20"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="20" align="left" valign="top"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="32" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="68" class="menuAdmin"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_admin.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
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
                        <span class="tituloPos"> | 
                        <? echo $txAdministracao_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuAdmin"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuAdmin">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txBusca_T; ?> </a> | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        </a><a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(5,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_admin.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" --><table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
<? if ($cod!="") {
require "biblioteca/al.inc";
exit;
}

	  ?>
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuAdmin"> 
            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txAmericaLatina; ?></span></td>
              </tr>
			   <tr> 
                <td class="subMenuOver" onClick="location='al.php'"><a href="al.php" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?></a></td>
              </tr>
             <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_admin.php'"><a href="tde_admin.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='logout.php'"><a href="logout.php" class="linkpreto">&laquo; 
                  <? echo $txSair; ?></a></td>
              </tr>
              <tr> 
                <td class="td"></td>
              </tr>
              <tr>
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
          </table></td>
          <td height="100%" valign="top" class="tdConteudo"> 
            <div>
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><form name="form" action="" method="post">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                        <tr class="tdAdmin">
                          <td align="center" class="txtBold"><? echo $txLinkDoLattes; ?></td>
                        </tr>
                        <tr> 
                          <td class="txtBold">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td height="34" align="left" valign="bottom"> 
                            <?
						  require "../bibliotecas/linkLattes.bib";
						  ?>
                            <input name="linkLattes" type="text" id="linkLattes" value="<? echo $linkLattes; ?>" size="60"> 
                            <input name="cod" type="hidden" id="cod" value="linkLattes"> 
                          </td>
                        </tr>
                        <tr> 
                          <td align="right" valign="bottom"><input name="Alterar" type="submit" class="botao" value="<? echo $txAlterarLinkDoLattes; ?> &raquo;"> 
                          </td>
                        </tr>
                      </table>
                    </form> </td>
                </tr>
              </table>
              <br><? require "../bibliotecas/campoExtra.bib"; ?>
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><form name="form2" action="" method="post">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr align="center" class="tdAdmin">
                          <td colspan="2" class="txt"><strong><? echo $txCampoExtra; ?></strong></td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><? echo $txNomeDoCampo; ?>1 
                            <input name="tsCampo1" type="text" id="tsCampo12" value="<? echo $VtsCampo1; ?>" size="20"> 
                          </td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><? echo $txQTDLinhas; ?>: 
                            <input name="c1_qtdLinhas" type="text" id="c1_qtdLinhas2" value="<? echo $c1_qtdLinhas; ?>" size="2" maxlength="2"></td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><strong><? echo $txAparecerNa; ?></strong>: 
                          </td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txt"><input name="c1_pos" type="checkbox" id="c1_pos" value="1" <? if ($c1_pos=="1") { echo "Checked";}?>>
                            <? echo $txPos; ?></td>
                          <td align="left" valign="bottom" class="txt"><input name="c1_pos_tipo" type="radio" value="a" <? if ($c1_pos_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c1_pos_tipo" value="v" <? if ($c1_pos_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?></td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txt"><input name="c1_bib" type="checkbox" id="c1_bib" value="1" <? if ($c1_bib=="1") { echo "Checked";}?>>
                            <? echo $txBiblioteca; ?>&nbsp;</td>
                          <td align="left" valign="bottom" class="txt"><input name="c1_bib_tipo" type="radio" value="a" <? if ($c1_bib_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c1_bib_tipo" value="v" <? if ($c1_bib_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?></td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txt"><input name="c1_aut" type="checkbox" id="c1_aut" value="1" <? if ($c1_aut=="1") { echo "Checked";}?>>
                            <? echo $txAutor; ?></td>
                          <td align="left" valign="bottom" class="txt"><input name="c1_aut_tipo" type="radio" value="a" <? if ($c1_aut_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c1_aut_tipo" value="v" <? if ($c1_aut_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?></td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt">&nbsp; 
                          </td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><? echo $txNomeDoCampo; ?>2 
                            <input name="tsCampo2" type="text" id="tsCampo2" value="<? echo $VtsCampo2; ?>" size="20"> 
                          </td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><? echo $txQTDLinhas; ?>: 
                            <input name="c2_qtdLinhas" type="text" id="c2_qtdLinhas2" value="<? echo $c2_qtdLinhas; ?>" size="2" maxlength="2"></td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom" class="txt"><strong><? echo $txAparecerNa; ?></strong>:</td>
                        </tr>
                        <tr> 
                          <td width="21%" align="left" valign="bottom" class="txt"><input name="c2_pos" type="checkbox" id="c2_pos2" value="1" <? if ($c2_pos=="1") { echo "Checked";}?>>
                            <? echo $txPos; ?>&nbsp;</td>
                          <td width="79%" align="left" valign="bottom" class="txt"><input name="c2_pos_tipo" type="radio" value="a" <? if ($c2_pos_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c2_pos_tipo" value="v" <? if ($c2_pos_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?></td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txt"><input name="c2_bib" type="checkbox" id="c2_bib" value="1" <? if ($c2_bib=="1") { echo "Checked";}?>>
                            <? echo $txBiblioteca; ?></td>
                          <td align="left" valign="bottom" class="txt"><input name="c2_bib_tipo" type="radio" value="a" <? if ($c2_bib_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c2_bib_tipo" value="v" <? if ($c2_bib_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?></td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txt"> <input name="c2_aut" type="checkbox" id="c2_aut2" value="1" <? if ($c2_aut=="1") { echo "Checked";}?>>
                            <? echo $txAutor; ?></td>
                          <td align="left" valign="bottom" class="txt"><input name="c2_aut_tipo" type="radio" value="a" <? if ($c2_aut_tipo=="a") { echo "checked"; } ?>>
                            <? echo $txAlterar; ?> 
                            <input type="radio" name="c2_aut_tipo" value="v" <? if ($c2_aut_tipo=="v") { echo "checked"; } ?>>
                            <? echo $txVisualizar; ?> </td>
                        </tr>
                        <tr> 
                          <td colspan="2" align="right" valign="bottom" class="txt"><input name="cod" type="hidden" value="campoExtra"> 
                            <input name="Alterar2" type="submit" class="botao" value="<? echo $txAlterarCampos; ?> &raquo;"> 
                          </td>
                        </tr>
                      </table>
                      <br>
                    </form> 
                  </td>
                </tr>
              </table>
              <? require "../bibliotecas/cpf_cnpj.bib"; ?>
              <br>
              <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr align="left" class="tdAdmin"> 
                  <td align="center" class="txtBold"><? echo $txCPF; ?> 
                    / <? echo $txCNPJ; ?> </td>
                </tr>
                <tr> 
                  <td height="14"> 
                    <form name="form3" action="" method="post">
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td width="3%" align="left" valign="bottom" class="txtBold"><? echo $txCPF; ?> 
                          </td>
                          <td width="47%" align="left" valign="bottom" class="txt"><? echo $txQTDCaractere; ?> 
                            <input name="qtdCPF" type="text" id="nomeCampo122" value="<? echo $qtdCPF; ?>" size="3" maxlength="2">
                            <? echo $txMaximo; ?> 20</td>
                          <td width="18%" align="left" valign="bottom" class="txt"><? echo $txComMascara; ?> </td>
                          <td width="32%" align="left" valign="bottom" class="txt"><input type="radio" name="CPFMascara" value="Sim" <? if ($CPFMascara=="Sim") { echo "Checked"; } ?>>
                            <? echo $txSim; ?> 
                            <input name="CPFMascara" type="radio" value="Nao" <? if ($CPFMascara=="Nao" or $CPFMascara=="") { echo "Checked"; } ?>>
                            <? echo $txNao; ?> </td>
                        </tr>
                        <tr> 
                          <td align="left" valign="bottom" class="txtBold"><? echo $txCNPJ; ?></td>
                          <td align="left" valign="bottom" class="txt"><? echo $txQTDCaractere; ?>
<input name="qtdCNPJ" type="text" id="nomeCampo222" value="<? echo $qtdCNPJ; ?>" size="3" maxlength="2">
                            <? echo $txMaximo; ?> 30 
                            <input name="cod" type="hidden" value="cpf_cnpj"></td>
                          <td align="left" valign="bottom" class="txt"><? echo $txComMascara; ?></td>
                          <td align="left" valign="bottom" class="txt"><input type="radio" name="CNPJMascara" value="Sim" <? if ($CNPJMascara=="Sim") { echo "Checked"; } ?>>
                            <? echo $txSim; ?> 
                            <input name="CNPJMascara" type="radio" value="Nao" <? if ($CNPJMascara=="Nao" or $CNPJMascara=="") { echo "Checked"; } ?>>
                            <? echo $txNao; ?></td>
                        </tr>
                        <tr> 
                          <td align="right" valign="bottom" class="txt">&nbsp;</td>
                          <td colspan="3" align="right" valign="bottom" class="txt">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="right" valign="bottom" class="txt">&nbsp; </td>
                          <td colspan="3" align="right" valign="bottom" class="txt"><input name="Alterar3" type="submit" class="botao" value="<? echo $txAlterar; ?> &raquo;"></td>
                        </tr>
                      </table>
                    </form></td>
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
          <td width="139" nowrap class="subMenuAdmin"><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
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