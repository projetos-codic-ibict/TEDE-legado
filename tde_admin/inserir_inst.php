<? session_start();
if(!session_is_registered("VAdmin_cnCod")) {
header("Location: ../index.php");
}else{
require "../bibliotecas/cpf_cnpj.bib";

if ($erro==""){
require "../conexao/conexao_fim.inc";

if ($Inserir!="") {
require "biblioteca/manutencao_inst.inc";
}
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
<title>| Sistema de Sumiss&atilde;o de Teses e Disserta&ccedil;&otilde;es Eletr&ocirc;nicas | ADMINISTRA&Ccedil;&Atilde;O | Programas</title>
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
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" --> 
     
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuAdmin"> 
            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txInstituicaoDoSistema; ?></span></td>
              </tr>
              <? require "../conexao/conexao.inc";
			  require "../conexao/conexao_fim.inc";
			  $SEL_inst="SELECT inCod FROM Instituicao";
            $SEL_inst_query=mysql_db_query($base_fim,$SEL_inst,$conexao_fim);
            $SEL_inst_RES=mysql_fetch_array($SEL_inst_query);
			if ($SEL_inst_RES=="") {?>
              <tr> 
                <td height="13" class="subMenuOver" onClick="location='inserir_inst.php'"><a href="inserir_inst.php" class="linkvermelho">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <? } else { 
			  header("Location:visualizar_inst.php");
			   } ?>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_admin.php'"><a href="tde_admin.php" class="linkpreto">&laquo; <? echo $txMenuPrincipal; ?></a></td>
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
          </table> </td>
          <td height="100%" valign="top" class="tdConteudo"><form name="form" action="" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this.name); return true;">
              <? if ($sucesso!="" or $erro!="") { ?>
		      <div>
			  <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td align="center" valign="middle"><? echo $erro; echo $sucesso;?></td>
              </tr>
            </table></div><br><? } ?>
		      <div>
			  <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" class="tdAdmin"> 
                          <td colspan="2" class="txtBold"> <? echo $txInstituicaoDoSistema; ?></td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" align="left" valign="middle" class="txtBold"><? echo $txNome; ?></td>
                        <td align="left" valign="middle"> <input name="inNome" type="text" class="req" id="inNome" value="<? echo $inNome;?>" size="60" maxlength="100"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" height="20" align="left" valign="middle" class="txtBold"><? echo $txSigla; ?></td>
                        <td align="left" valign="middle"> <input name="inSigla" type="text" class="req" id="inSigla" value="<? echo $inSigla;?>" size="32" maxlength="30"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                          <td width="50" align="left" valign="middle" class="txtBold"><? echo $txPais; ?></td>
                        <td align="left" valign="middle"> 
                          <select name="inPais" class="select" onChange="submit()">
                            <? $SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='$idioma_sistema' ORDER BY psNome";
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
							
							while ($SEL_ps_RES!="") {
							$psSigla=$SEL_ps_RES["psSigla"];
							$psNome=$SEL_ps_RES["psNome"];
							?>
                            <option value="<? echo $psSigla; ?>" <? if ($psSigla==$inPais) { echo "selected"; } ?>><? echo $psNome; ?></option>
                            <? $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                          </select>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" align="left" valign="middle" class="txtBold"><? echo $txUF; ?></td>
                        <td align="left" valign="middle"> 
						<?
						$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'";
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
						?>
                          <select name="inUF" class="select">
						   <option>Selecionar</option>
                            <? $SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='$psCod' ORDER BY ufNome";
                            $SEL_uf_query=mysql_db_query($base,$SEL_uf,$conexao);
                            $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);						
														
							while ($SEL_uf_RES!="") {
							$ufSigla=$SEL_uf_RES["ufSigla"];
							$ufNome=$SEL_uf_RES["ufNome"];
							?>
                            <option value="<? echo $ufSigla; ?>"><? echo $ufNome; ?></option>
                            <? $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
						   <option value="-">Nenhum acima</option>
                          </select>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" align="left" valign="middle" class="txtBold"><? echo $txCNPJ; ?></td>
                          <td align="left" valign="middle"> <? $qtdCNPJcampo=$qtdCNPJ+1;
						  if ($idioma_sistema=="pt-BR") {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="inCNPJ" type="text" class="cnpj" value="'.$inCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="inCNPJ" type="text" class="CNPJ" value="'.$inCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  } }else {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="inCNPJ" type="text" class="req" value="'.$inCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="inCNPJ" type="text" class="req" value="'.$inCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  }
						  }
						  echo $imputCNPJ;
						  ?> 
                          </td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" align="left" valign="middle" class="txtBold"><? echo $txURL; ?></td>
                        <td align="left" valign="middle"> <input name="inURL" type="text" class="req" id="inURL" value="<? echo $inURL;?>" size="32" maxlength="150"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td width="50" align="left" valign="middle"><input name="cod" type="hidden" value="Inserir"></td>
                        <td align="right" valign="middle"><input name="Inserir" type="submit" class="botao" value="<? echo $txInserir; ?> &raquo;"></td>
                      </tr>
                    </table> </td>
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