<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_contato.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc"; 
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head> 
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | ADMINISTRA&Ccedil;&Atilde;O | Contato</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_contato.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
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
                <td width="138" height="20" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
            </table></td>
          <td width="32" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="68" class="menuContato"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_contato.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="100%" height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle">
                        <? echo $txSPETD_T; ?>
                        <span class="tituloPos"> | 
                        <? echo $txContato_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuContato"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuContato">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        <? echo $txBusca_T; ?> </a> | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        </a><a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(6,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_contato.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" -->
     <table width="100%" height="100%">
	 <tr>
	 <td align="center" valign="top">
	 <? if ($Submit!="") {
	 require "biblioteca/envia_email.inc";
	 }
	  ?>
	  <table width="60%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
        <tr>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top" class="txt"><p class="loginContato"><? echo $txContato; ?>
                        </p>
                    <? if ($sucesso!="") {
						echo $sucesso;
						} else { ?>
                </td>
              </tr>
              <tr>
                <td><form name="form1" method="post" action="" onSubmit="return checkForm(this.name); return true;">
                          <table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                            <tr align="left"> 
                              <td colspan="5" valign="middle"><span class="txt"><? echo $txUFEMQPS; ?></span></td>
                            </tr>
                            <tr align="left"> 
                              <td height="30" colspan="5" valign="middle"><? echo $txVGEMP; ?> 
                                <select name="ctEmail" class="select">
                                  <option>Seleciona</option>
                                  <? 
							require "../conexao/conexao.inc";
							$SEL_ct="SELECT * FROM Contatos WHERE ctDispEmail='Sim' ORDER BY ctNome";
$SEL_ct_query=mysql_db_query($base,$SEL_ct,$conexao);
$SEL_ct_RES=mysql_fetch_array($SEL_ct_query);
				while ($SEL_ct_RES!="") {
				$ctCod=$SEL_ct_RES["ctCod"];
				$ctNome=$SEL_ct_RES["ctNome"];
							?>
                                  <option value="<?echo $ctCod;?>"><?echo $ctNome;?></option>
                                  <?
				 $SEL_ct_RES=mysql_fetch_array($SEL_ct_query); }
				 
				 ?>
                                </select> </td>
                            </tr>
                            <tr> 
                              <td height="24" colspan="5" align="center" valign="middle"><div align="left"><strong><? echo $txECSD; ?></strong> 
                                </div></td>
                            </tr>
                            <tr> 
                              <td width="9" height="24" align="center" valign="middle"><img src="../tde_layout1/imagens/arrow.gif" width="7" height="7"></td>
                              <td width="70" height="24" valign="middle" class="txtBold"><? echo $txNome; ?></td>
                              <td height="24" colspan="3" valign="middle"><input name="ctNomeUsuario" type="text" class="req" id="ctNomeUsuario5" size="54"> 
                              </td>
                            </tr>
                            <tr> 
                              <td width="9" height="24" align="center" valign="middle"><img src="../tde_layout1/imagens/arrow.gif" width="7" height="7"></td>
                              <td width="70" height="24" valign="middle" class="txtBold"><? echo $txEMail; ?></td>
                              <td height="24" colspan="3" valign="middle"><input name="ctEmailUsuario" type="text" class="email" id="ctEmailUsuario5" size="54"> 
                              </td>
                            </tr>
                            <tr> 
                              <td width="9" height="24" align="center" valign="middle"><img src="../tde_layout1/imagens/arrow.gif" width="7" height="7"></td>
                              <td width="70" height="24" valign="middle" class="txtBold"><? echo $txAssunto; ?></td>
                              <td height="24" colspan="3" valign="middle"><input name="ctAssuntoUsuario" type="text" class="req" id="ctAssuntoUsuario5" size="54"> 
                              </td>
                            </tr>
                            <tr> 
                              <td width="9" height="24" align="center" valign="middle"><img src="../tde_layout1/imagens/arrow.gif" width="7" height="7"></td>
                              <td width="70" height="24" class="txtBold"><? echo $txTexto; ?></td>
                              <td colspan="3" rowspan="2" align="left" valign="top"><textarea name="ctTextoUsuario" cols="52" rows="3" wrap="VIRTUAL" class="req" id="textarea4"></textarea> 
                              </td>
                            </tr>
                            <tr> 
                              <td width="9" align="center" valign="middle">&nbsp;</td>
                              <td width="70" class="txtBold">&nbsp;</td>
                            </tr>
                            <tr> 
                              <td width="9" height="30" align="center" valign="bottom">&nbsp;</td>
                              <td width="70" height="30" align="left" valign="top" class="txtBold"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank"><? echo $txAjuda; ?><img src="../tde_layout1/imagens/ajuda.gif" hspace="3" border="0" align="top"></a></td>
                              <td width="166" height="30" align="left"> <input name="limpar" type="reset" class="botao" id="limpar6" value="&laquo; <? echo $txLimpar; ?>"> 
                              </td>
                              <td width="154" align="right"> <input name="Submit" type="submit" class="botao" value="<? echo $txEnviar; ?> &raquo;"></td>
                              <td width="176" height="30" align="right" valign="bottom">&nbsp; 
                              </td>
                            </tr>
                          </table>
                  </form>
				        <? } ?>
                      </td>
              </tr>
            </table>
		</td>
        </tr>
      </table>
	  <br />
	  </td>
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
