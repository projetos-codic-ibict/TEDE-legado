<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../tde_biblioteca/login.php");
}else{
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | ALUNO | Inser&ccedil;&atilde;o de Ag&ecirc;ncia de Fomento</title>
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
          <td width="139" valign="top" class="subMenuBib"> 
            <? require "menu.php"; ?>
          </td>
          <td valign="top" class="tdConteudo"> 
            <? if ($sucesso!="" or $erro!="") { ?>
            <div> 
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"> <? echo $sucesso; echo $erro; ?> 
                  </td>
                </tr>
              </table>
              <br>
            </div>
            <? } ?>
            <?
	  if ($Inserir!="" or $cod=="Excluir") {
	  require "../conexao/conexao.inc";
	  require "biblioteca/inserir_agfomento.inc";
	  }
require "../conexao/conexao.inc";
?>
            <div> 
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="txt">
                      <tr align="center" bgcolor="<? echo $cor; ?>"> 
                        <td colspan="2" class="tdBiblioteca"><span class="txtBold"><? echo $txAgenciaDeFomento; ?></span></td>
                      </tr>
					  <?
					  
$estiloTR="tr";
include "../bibliotecas/funcoes.bib";
		         
$sel2="select pjCod from PFPJ where pfCod=$VpfCod and pfpjTipo='AgenciaFomento'";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

if ($sel2RESP!="")  {
					  ?>
                      <tr bgcolor="<? echo $cor; ?>"> 
                        <td width="427" class="txtBold"><? echo $txNome; ?></td>
                        <td class="txtBold"><? echo $txExcluir; ?></td>
                      </tr>
                      <?

while ($sel2RESP!="") {
$pjCod_sel=$sel2RESP[pjCod];

$selpj="select * from PessoaJuridica where pjCod=$pjCod_sel";
$selpj_query=mysql_db_query($base,$selpj,$conexao);
$selpjRESP=mysql_fetch_array($selpj_query);

$pjCod=$selpjRESP["pjCod"];
$VpjNome=$selpjRESP["pjNome"];

mudaEstiloTR(&$estiloTR);

if ($pjCod=="$EVpjCod") {
$estiloTR="trResposta";
}
?>
                      <tr class="<? echo $estiloTR; ?>"> 
                        <td class="txtBold"><? echo $VpjNome; ?></td>
                        <td width="38" align="center"><a href="inserir_agfomento.php?cod=Excluir&pjCod=<? echo $pjCod; ?>&VtsIdentificador=<? echo $VtsIdentificador; ?>" class="linkpreto"><img src="../tde_layout1/imagens/excluir.gif" / alt="excluir" hspace="0" vspace="0" border="0" align="absmiddle"></a></td>
                      </tr>
                      <?
		$sel2RESP=mysql_fetch_array($sel2_query);
	} }
		?>
                    </table> </td>
                </tr>
              </table>
              <br>
            </div>
			<div>
			<form action="" method="post" enctype="multipart/form-data" name="form" onSubmit="return checkForm(this.name); return true;" >
             
              <table width="90%" height="0%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td height="80%"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0" class="txt">
                      <tr class="tdAlternado"> 
                        <td colspan="2"><select name="SpjCod" onChange="submit()">
                            <option value="">Seleciona</option>
                            <? $SEL_pj="SELECT * FROM PessoaJuridica WHERE pjAgFomento='1' ORDER BY pjNome";
$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
				while ($SEL_pj_RES!="") {
				$pjCod=$SEL_pj_RES["pjCod"];
				$ApjNome=$SEL_pj_RES["pjNome"];
											?>
                            <option value="<?echo $pjCod;?>"><?echo $ApjNome;?></option>
                            <?
				 $SEL_pj_RES=mysql_fetch_array($SEL_pj_query); }
				 ?>
                            <option value="Nenhum" <? if ($SpjCod=="Nenhum") { echo "Selected";} ?>>Nenhum acima</option>
                          </select></td>
                      </tr>
                      <? if ($SpjCod!="") { 
				if ($SpjCod!="Nenhum") {
				$SEL_pj1="SELECT * FROM PessoaJuridica WHERE pjCod=$SpjCod";
$SEL_pj1_query=mysql_db_query($base,$SEL_pj1,$conexao);
$SEL_pj1_RES=mysql_fetch_array($SEL_pj1_query);
				
				$pjCod=$SEL_pj1_RES["pjCod"];
				$pjNome=$SEL_pj1_RES["pjNome"];
				$pjSigla=$SEL_pj1_RES["pjSigla"];
				$pjPais=$SEL_pj1_RES["pjPais"];
				$pjUF=$SEL_pj1_RES["pjUF"];
				$pjCNPJ=$SEL_pj1_RES["pjCNPJ"];
				$pjURL=$SEL_pj1_RES["pjURL"];
				}?>
                      <tr class="tdAlternado"> 
                        <td width="10%" class="txtBold"><? echo $txNome; ?></td>
                        <td width="90%"> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjNome; ?>
                          <input name="pjCod" type="hidden" class="input" value="<?echo $pjCod;?>"> 
                          <? } else { ?>
                          <input name="pjNome" type="text" class="req" id="pjNome2" value="<? echo $pjNome; ?>" size="32" maxlength="100"> 
                          <? } ?>
                        </td>
                      </tr>
                      <tr class="tdAlternado"> 
                        <td height="20" class="txtBold"><? echo $txSigla; ?></td>
                        <td> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjSigla; } else { ?>
                          <input name="pjSigla" type="text" class="input" id="pjSigla2" value="<? echo $pjSigla; ?>" size="32" maxlength="30"> 
                          <? } ?>
                        </td>
                      </tr>
                      <tr class="tdAlternado"> 
                        <td class="txtBold"><? echo $txPais; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { 
						  
							$SEL_ps="SELECT psNome FROM Pais WHERE psSigla='$pjPais'";
                            $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
							
						    echo  $SEL_ps_RES["psNome"]; } else { ?>
                            <select name="pjPais" class="req" onChange="submit()">
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
                            </select> 
                            <? } ?>
                          </td>
                      </tr>
                      <tr class="tdAlternado"> 
                          <td class="txtBold"><? echo $txUF; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjUF; } else { 
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
                            </select> 
                            <? } ?>
                          </td>
                      </tr>
                      <tr class="tdAlternado"> 
                          <td class="txtBold"><? echo $txCNPJ; ?></td>
                        <td> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjCNPJ; } else {  
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
						    } ?>
                        </td>
                      </tr>
                      <tr class="tdAlternado"> 
                        <td class="txtBold"><? echo $txURL; ?></td>
                        <td> 
                          <? if ($SpjCod!="Nenhum") { echo  $pjURL; } else { ?>
                          <input name="pjURL" type="text" class="input" id="pjURL2" value="<? echo $pjURL; ?>" size="32" maxlength="150"> 
                          <? } ?>
                        </td>
                      </tr>
                      <? } ?>
                      <tr class="tdAlternado"> 
                        <td><input name="cod" type="hidden" class="input" id="cod" value="Inserir">
                            <input name="VtsIdentificador" type="hidden" id="VtsIdentificador" value="<? echo $VtsIdentificador; ?>"></td>
                        <td height="30" align="right" valign="bottom"><input name="Inserir" type="submit" class="botao" value="<? echo $txInserir; ?> &raquo;"></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <br>
            </form>
			</div>
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