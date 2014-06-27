<? session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{
if ($Editar!="") {
require "biblioteca/manutencao_contas.inc";
}
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
<title>| Sistema de Sumiss&atilde;o de Teses e Disserta&ccedil;&otilde;es Eletr&ocirc;nicas | ADMINISTRA&Ccedil;&Atilde;O | Edi&ccedil;&atilde;o de Conta do Administrador</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_admin.css" rel="stylesheet" type="text/css">
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
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" -->
     <?

require "../conexao/conexao.inc";
  if ($erro==""){
$SEL_cn="SELECT * FROM Contas WHERE cnCod=$cnCod";
$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
				
				$cnCod=$SEL_cn_RES["cnCod"];
				$cnNome=$SEL_cn_RES["cnNome"];
				$cnSenha=$SEL_cn_RES["cnSenha"];
				$cnLogin=$SEL_cn_RES["cnLogin"];
				$cnEmail=$SEL_cn_RES["cnEmail"];
				
				$cnBloqueado=$SEL_cn_RES[cnBloqueado];

}
?>
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuAdmin"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txContaAdministracao; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='conta_admin.php'"><a href="conta_admin.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOver" onClick="location='visualizar_contas_admin.php?v=Editar'"><a href="visualizar_contas_admin.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_admin.php'"><a href="tde_admin.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
            </table></td>
          <td height="100%" valign="top" class="tdConteudo"> <form name="form1" method="post" action="" onSubmit="return checkForm(this.name); return true;">
              <? if ($sucesso!="" or $erro!="") { ?>
             <div>
			 <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"> 
                  <? echo $erro;echo $sucesso;
				  
				  if ($sucesso!="") {
				  header("Location: visualizar_contas_admin.php?v=Editar&sucesso=$sucesso");
				  exit;
				  }?>				  </td>
                </tr>
              </table> <br> </div><? } ?>
             <div>
			 <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                        <tr align="center" class="tdAdmin"> 
                          <td colspan="2" class="txtBold"> <? echo $txContaAdministracao; ?></td>
                        </tr>
                        <tr> 
                          <td width="16%" class="txtBold"><? echo $txNome; ?></td>
                          <td width="84%"><input name="cnNome" type="text" class="req" id="cnNome" value="<? echo $cnNome; ?>" size="60" maxlength="100"> 
                            <input type="hidden" name="cnNomeAtual" value="<? echo $cnNome; ?>"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txLogin; ?></td>
                          <td><input name="cnLogin" type="text" class="req" id="cnLogin" value="<? echo $cnLogin; ?>" size="30" maxlength="100"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txSenha; ?></td>
                          <td><input name="cnSenha" type="password" class="req" id="cnSenha" value="<? echo $cnSenha; ?>" size="15" maxlength="30"></td>
                        </tr>
                        <tr>
                          <td class="txtBold"><? echo $txConfirmarSenha; ?></td>
                          <td><input name="cnSenha2" type="password" class="req" id="cnSenha2" value="<? if ($erro=="") { echo $cnSenha; } ?>" size="15" maxlength="30"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txEMail; ?></td>
                          <td><input name="cnEmail" type="text" class="input" id="cnEmail" value="<? echo $cnEmail; ?>" size="40" maxlength="100"></td>
                        </tr>
                        <tr class="tdAdmin"> 
                          <td height="21" colspan="2"><strong><? echo $txStatus; ?></strong></td>
                        </tr>
                        <tr class="tdAdmin"> 
                          <td height="21"><? echo $txBloqueado; ?></td>
                          <td><input type="radio" name="cnBloqueado" value="1" <? if ($cnBloqueado=="1") {?> checked <? } ?>>
<? echo $txSim; ?>
  <input name="cnBloqueado" type="radio" value="0" <? if ($cnBloqueado=="0" or $cnBloqueado=="") {?> checked <? } ?>>
<? echo $txNao; ?></td>
                        </tr>
                        <tr> 
                          <td><input name="cnTipo" type="hidden" value="Administrador"> 
                            <input name="cod" type="hidden" value="Editar"> <input name="cnCod" type="hidden" id="cnCod2" value="<? echo $cnCod; ?>"></td>
                          <td align="right" valign="bottom"><input name="Editar" type="submit" class="botao" id="Editar3" value="<? echo $txAlterar; ?> &raquo;"></td>
                        </tr>
                      </table></td>
                </tr>
              </table></div>
              <br>
          </form></td>
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