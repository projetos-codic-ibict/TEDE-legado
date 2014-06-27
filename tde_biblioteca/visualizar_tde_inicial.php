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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Altera&ccedil;&atilde;o de TDE</title>
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
	  
	  
	  require "biblioteca/dados_alteracao_tde_inicial.inc";
			
			require "../conexao/conexao.inc";
				
				?>
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib">
            <? require "menu_tde.php"; ?>
          </td>
          <td height="100%" align="center" valign="top" class="tdConteudo">
            <? if ($sucesso!="" or $erro!="") { ?>
            <div> 
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><? echo $sucesso; echo $erro; ?></td>
                </tr>
              </table>
            </div>
            <br> 
            <? } ?>
            <br>
              <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                    <tr align="center" class="tdBiblioteca"> 
                      <td colspan="2" class="txtBold"><? echo $txTDE; ?></td>
                    </tr>
                    <tr> 
                      <td width="20%" class="txtBold"><? echo $txAutor; ?></td>
                      <td width="80%"><? echo $pfNome; ?> </td>
                    </tr>
                    <tr> 
                      <td class="txtBold"><? echo $txGrau; ?></td>
                      <td><? echo $tsGrau; ?> </td>
                    </tr>
                    <tr> 
                      <td class="txtBold"><? echo $txTitulacao; ?></td>
                      <td> <? echo $tsTitulacao; ?></td>
                    </tr>
                    <tr align="left"> 
                      <td colspan="2" valign="middle" class="txtBold"><? echo $txLocalDeDefesa; ?></td>
                    </tr>
                    <tr> 
                      <td height="18" class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                      <td>
                        <?
						$SEL_ps="SELECT * FROM Pais WHERE psSigla='$AtsPaisLocalDefesa'";
						   $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
				
						   $tsPaisLocalDefesa=$SEL_ps_RES["psNome"];
						   echo $tsPaisLocalDefesa; ?></td>
                    </tr>
                    <tr> 
                      <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txUF; ?></td>
                      <td> <? echo $tsUFLocalDefesa; ?> </td>
                    </tr>
                    <tr> 
                      <td height="17" class="txtBold"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                      <td><? echo $tsCidadeLocalDefesa; ?></td>
                    </tr>
                    <tr> 
                      <td class="txtBold"><? echo $txDataDaDefesa; ?></td>
                      <td> 
                        <?

				  $tsDataDefesa_split=split("-",$tsDataDefesa);
				  if ($tsDataDefesa_split[2]=='00' or $tsDataDefesa_split[1]=='00') {
				  if ($tsDataDefesa_split[2]=='00' and $tsDataDefesa_split[1]!='00'){
                  echo $tsDataDefesa_split[1]."/".$tsDataDefesa_split[0];
				  }else{
				  echo $tsDataDefesa_split[0];
				  }
				  } else {
				  echo $tsDataDefesa_split[2]."/".$tsDataDefesa_split[1]."/".$tsDataDefesa_split[0];
				  }

				  ?>
                      </td>
                    </tr>
                    <tr> 
                      <td bgcolor="ffffff" class="txtBold"><? echo $txIdioma; ?></td>
                      <td bgcolor="ffffff">
                        <?
						   $SEL_id="SELECT * FROM Idiomas WHERE idSigla='$tsIdioma'";
						   $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
						   $SEL_id_RES=mysql_fetch_array($SEL_id_query);
								
							$tsIdioma=$SEL_id_RES["idIdioma"];
						   echo $tsIdioma; ?></td>
                    </tr>
                    <tr align="left" valign="top"> 
                      <td class="txtBold"><span class="txtBold"><? echo $txTitulo; ?></span></td>
                      <td><? echo $ttTitulo; ?></td>
                    </tr>
					<? 
						require "../bibliotecas/campoExtra.bib";
						if ($c1_pos=='1' or $c2_pos=='1') { ?>
                        <tr align="left"> 
                          <td colspan="2" valign="bottom" class="txtBold">&nbsp;</td>
                        </tr>
						<? if ($c1_pos=='1') { ?>
                        <tr> 
                          <td align="left" class="txtBold"><? echo $VtsCampo1; ?></td>
                          <td width="88%" align="left"><? echo $tsCampo1;?></td>
                        </tr>
						<? } if ($c2_pos=='1') { ?>
                        <tr> 
                          <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                          <td align="left">
                            <?  echo $tsCampo2; ?>
                          </td>
                        </tr>
						<? } ?>
                        <tr> 
                          <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                        </tr>
						<? } ?>
                  </table></td>
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
