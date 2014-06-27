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
<title>| Sistema de Sumiss&atilde;o de Teses e Disserta&ccedil;&otilde;es Eletr&ocirc;nicas | ADMINISTRA&Ccedil;&Atilde;O DO SISTEMA</title>
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
	<table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
          <td width="139" height="100%" align="left" valign="top" class="subMenuAdmin"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td height="18" class="td"><span class="txtBold"><? echo $txCadastro; ?></span></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_inst.php'"><a href="visualizar_inst.php" class="linkpreto">&raquo; 
                  <? echo $txInstituicaoDoSistema; ?></a></td>
              </tr>
              <? require "../conexao/conexao_fim.inc";
			  $SEL_inst="SELECT inCod, inPais FROM Instituicao";
            $SEL_inst_query=mysql_db_query($base_fim,$SEL_inst,$conexao_fim);
            $SEL_inst_RES=mysql_fetch_array($SEL_inst_query);
			$inPais=$SEL_inst_RES["inPais"];
			if ($SEL_inst_RES=="") {
			header("Location:inserir_inst.php");
			 } else { ?>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_bib_dig.php'"><a href="visualizar_bib_dig.php" class="linkpreto">&raquo; 
                  <? echo $txBibliotecaDigital; ?></a></td>
              </tr>
              <? $SEL_bb="SELECT bbCod FROM BibliotecaDigital";
            $SEL_bb_query=mysql_db_query($base_fim,$SEL_bb,$conexao_fim);
            $SEL_bb_RES=mysql_fetch_array($SEL_bb_query);
			if ($SEL_bb_RES=="") {
			header("Location:inserir_bib_dig.php");
			
			 } else { ?>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_bib.php?v=Editar'"><a href="visualizar_bib.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txBibliotecaDepositaria; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_prog.php?v=Editar'"><a href="visualizar_prog.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txProgramaDePG; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contato.php'"><a href="visualizar_contato.php" class="linkpreto">&raquo; 
                  <? echo $txContato; ?></a></td>
              </tr>
              <tr> 
                <td height="18">&nbsp;</td>
              </tr>
              <tr> 
                <td height="18" class="td"><span class="txtBold"><? echo $txContas; ?></span></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contas_cat.php?v=Editar'"><a href="visualizar_contas_cat.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txCatalogador; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_contas_admin.php?v=Editar'"><a href="visualizar_contas_admin.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAdministracao; ?></a></td>
              </tr>
              <tr> 
                <td height="18">&nbsp;</td>
              </tr>
              <? } } ?>
              <tr> 
                <td height="18" class="td"><span class="txtBold"><? echo $txCustomizacao; ?></span></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='colocar_logo.php'"><a href="colocar_logo.php" class="linkpreto">&raquo; 
                  <? echo $txLogomarca; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_layout.php'"><a href="alterar_layout.php" class="linkpreto">&raquo; 
                  <? echo $txLayout; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_servidor_email.php'"><a href="alterar_servidor_email.php" class="linkpreto">&raquo; 
                  <? echo $txEMailGeral; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_servidor_diretorio.php'"><a href="alterar_servidor_diretorio.php" class="linkpreto">&raquo; 
                  <? echo $txServidorDeArquivos; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_bloqueio_arquivo.php'"><a href="alterar_bloqueio_arquivo.php" class="linkpreto">&raquo; 
                  <? echo $txBloqueioDeArquivo; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_ip_restrito.php'"><a href="alterar_ip_restrito.php" class="linkpreto">&raquo; 
                  <? echo $txIPRestrito; ?></a></td>
              </tr>
              <? if ($inPais!="BR") { ?>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_idioma.php'"><a href="alterar_idioma.php" class="linkpreto">&raquo; 
                  <? echo $txIdioma; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='al.php'"><a href="al.php" class="linkpreto">&raquo; 
                  <? echo $txAmericaLatina; ?></a></td>
              </tr>
              <? } ?>
              <tr> 
                <td height="18" class="td">&nbsp;</td>
              </tr>
                            <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tela_export.php'"><a href="tela_export.php" class="linkpreto">&raquo; 
                  Exportador DSPACE</a></td>
              </tr>
               <tr> 
                <td height="18" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="18" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='logout.php'"><a href="logout.php" class="linkpreto">&laquo; 
                  <? echo $txSair; ?></a></td>
              </tr>
              <tr> 
                <td height="18" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
              <tr> 
                <td height="15">&nbsp;</td>
              </tr>
            </table> </td>                
          <td height="100%" valign="top" class="tdConteudo"><br>
            <table width="90%" height="120" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr> 
                <td align="center" valign="middle" class="loginTableTitle"> <span class="loginAdmin">
                <? echo $txAdminSistema; ?></span></td>
              </tr>
            </table>
            
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