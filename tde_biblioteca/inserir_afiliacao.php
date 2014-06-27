<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
require "../bibliotecas/cpf_cnpj.bib";
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Edi&ccedil;&atilde;o de Cadastro de Alunos</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_cat.css" rel="stylesheet" type="text/css">
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
      <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib">
		  <table width="139" border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
				  if ($pjTipo=="Afiliacao") { 
			$VpjTipo="Afiliação"; 
			$VpjLink="visualizar_afiliacao.php?v=Editar&vTipo=$vTipo"; 
			} else { 
			$VpjTipo="Agência de Fomento"; 
			$VpjLink="visualizar_agfomento.php?v=Editar"; 
			} 
		  
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
                <td class="td"><span class="txtBold">&raquo; <? echo $txAfiliacao; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOver" onMouseOver="this.className='subMenuOver'" onClick="location='inserir_afiliacao.php'"><a href="inserir_afiliacao.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='visualizar_afiliacao.php?v=Editar'" onMouseOut="this.className='subMenuOut'"><a href="visualizar_afiliacao.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
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
            </table></td>
          <td height="100%" valign="top" class="tdConteudo"> 
            <?
	  if ($Inserir!="") {
	  require "../conexao/conexao.inc";
	  require "biblioteca/inserir_afiliacao.inc";
	  }
require "../conexao/conexao.inc";
?>
            <form action="" method="post" enctype="multipart/form-data" name="form" onSubmit="return checkForm(this.name); return true;" >
              <table width="90%" height="0%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td height="80%"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="txt">
                      <tr class="tdBiblioteca"> 
                        <td colspan="2" align="center" valign="middle" class="txtBold"><? echo $txAfiliacao; ?></td>
                      </tr>
                      <tr class="txt"> 
                        <td width="18%" class="txtBold"><? echo $txNome; ?></td>
                        <td width="82%"> <input name="pjNome" type="text" class="req" id="pjNome2" value="<? echo $pjNome; ?>" size="32" maxlength="100"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td height="20" class="txtBold"><? echo $txSigla; ?></td>
                        <td><input name="pjSigla" type="text" class="input" id="pjSigla" value="<? echo $pjSigla; ?>" size="32" maxlength="30"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txPais; ?></td>
                        <td><select name="pjPais" class="req" onChange="submit()">
                            <?
							require "../conexao/conexao_fim.inc";
							$SEL_psin="SELECT inPais FROM Instituicao";
                            $SEL_psin_query=mysql_db_query($base_fim,$SEL_psin,$conexao_fim);
                            $SEL_psin_RES=mysql_fetch_array($SEL_psin_query);
							 $inPais=$SEL_psin_RES['inPais'];
							 
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='$idioma_sistema' ORDER BY psNome";
                            $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
							
							while ($SEL_ps_RES!="") {
							$psSigla=$SEL_ps_RES["psSigla"];
							$psNome=$SEL_ps_RES["psNome"];
							?>
                            <option value="<? echo $psSigla; ?>" <? if (($psSigla==$inPais and   $pjPais=="") or $psSigla==$pjPais) { echo "selected"; } ?>><? echo $psNome; ?></option>
                            <?
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                          </select> </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txUF; ?></td>
                        <td>
                          <?
						if ($pjPais=="") {
						$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'"; } else {
						$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$pjPais'";
						}
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
						?>
                          <select name="pjUF" class="input">
                            <option value="" selected><? echo $txSelecionar; ?></option>
                            <?						
							$SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='$psCod' ORDER BY ufNome";
                            $SEL_uf_query=mysql_db_query($base,$SEL_uf,$conexao);
                            $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);						
														
							while ($SEL_uf_RES!="") {
							$ufSigla=$SEL_uf_RES["ufSigla"];
							$ufNome=$SEL_uf_RES["ufNome"];
							?>
                            <option value="<? echo $ufSigla; ?>" <? if ($ufSigla==$pjUF) { echo "selected"; } ?>><? echo $ufNome; ?></option>
                            <?
						   $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
                            <option value="-"><? echo $txNenhumAcima; ?></option>
                          </select> </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txCNPJ; ?></td>
                        <td><?  
						   $qtdCNPJcampo=$qtdCNPJ+1;
						  if ($idioma_sistema=="pt-BR") {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="cnpj" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="CNPJ" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  } }else {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="pjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  }
						  }
						  echo $imputCNPJ;
						   ?>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td class="txtBold"><? echo $txURL; ?></td>
                        <td><input name="pjURL" type="text" class="input" id="pjURL" value="<? echo $pjURL; ?>" size="32" maxlength="150"> 
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td><input name="cod" type="hidden" class="input" id="cod" value="Inserir"></td>
                        <td height="20" align="right" valign="bottom"><input name="Inserir" type="submit" class="botao" value="<? echo $txInserir; ?> &raquo;"></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <br>
          </form></td>
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