<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "biblioteca/sessao.inc";
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Visualiza&ccedil;&atilde;o de Contas</title>
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
				 if ($Alterar!="") {
	  require "biblioteca/alterar_cod_tde.inc";
	  exit;
	  } 
	  if ($tsPaisLocalDefesa=="") {
	  require "biblioteca/dados_alteracao_tde.inc";
			} else {
			require "../conexao/conexao.inc";
			}
				
				
				
				?>
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib"> 
            <? require "menu_tde.php"; ?>
          </td>
          
          <td height="100%" align="center" valign="top" class="tdConteudo">
		  
		   <form action="" method="post" name="webform" onSubmit="return checkForm(this.name); return true;">
             
              <br>
              <div>
			  <table width="90%"  border="0" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                        <tr align="center" class="tdBiblioteca"> 
                          <td colspan="2" class="txtbold"><? echo $txTDE; ?></td>
                        </tr>
                        <tr align="center"> 
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr align="left" valign="middle" class="tdBiblioteca"> 
                          <td colspan="2" class="txtBold"><? echo $txAutor; ?></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txNome; ?></td>
                          <td><? echo $pfNome; ?> <span class="txtBold"> 
                            <input name="pfNome" type="hidden" class="input" id="pfNome" value="<? echo $pfNome; ?>">
                            </span> <input name="VpfCod" type="hidden" class="input" id="VpfCod" value="<? echo $VpfCod; ?>"> 
                            <span class="txtBold"> 
                            <input name="VtsIdentificador" type="hidden" class="input" id="tsIdentificador3" value="<? echo $VtsIdentificador; ?>">
                            </span></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txCitacao; ?></td>
                          <td><? echo $pfCitacao; ?><span class="txtBold"> 
                            <input name="pfCitacao" type="hidden" class="input" value="<? echo $pfCitacao; ?>">
                            </span></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txLattes; ?></td>
                          <td><? echo $pfLattes; ?><span class="txtBold"> 
                            <input name="pfLattes" type="hidden" class="input" value="<? echo $pfLattes; ?>">
                            </span></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txCPF; ?></td>
                          <td><span class="txtBold"> <? echo $pfCPF; ?> 
                            <input name="pfCPF" type="hidden" class="input" value="<? echo $pfCPF; ?>">
                            </span></td>
                        </tr>
                        <tr> 
                          <td bgcolor="#FFFFFF" class="txtBold"><? echo $txEMail; ?></td>
                          <td bgcolor="#FFFFFF"><? echo $pfEmail; ?> <input name="pfEmail" type="hidden" class="input" id="pfEmail" value="<? echo $pfEmail; ?>"></td>
                        </tr>
                        <tr> 
                          <td bgcolor="#FFFFFF">&nbsp;</td>
                          <td bgcolor="#FFFFF0"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
                              <tr> 
                                <td width="61%"><? echo $txSeuEMailPodeSDPR; ?>?</td>
                                <td width="20" align="center" valign="middle"> 
                                  <input name="tspfDispEmail" type="radio" value="Sim" <? if ($tspfDispEmail=="Sim") { echo "checked";}?>> 
                                </td>
                                <td width="10%"><? echo $txSim; ?></td>
                                <td width="20" align="center" valign="middle"> 
                                  <input name="tspfDispEmail" type="radio" value="Nao" <? if ($tspfDispEmail=="Nao") { echo "checked"; }?>> 
                                </td>
                                <td width="20%"><? echo $txNao; ?></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr> 
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txNumeroDeChamada; ?></td>
                          <td class="txtBold"><input name="tsNumeroChamada" type="text" class="input" value="<? echo $tsNumeroChamada; ?>" size="36" maxlength="35"></td>
                        </tr>
                        <tr> 
                          <td colspan="2" class="txtBold">&nbsp;</td>
                        </tr>
                        <tr align="left" class="tdBiblioteca"> 
                          <td colspan="2" valign="middle" class="txtBold"><? echo $txTitulacao; ?></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txGrau; ?></td>
                          <td> <select name="tsGrau" class="select">
                              <option value=""><? echo $txSelecionar; ?></option>
                              <?
							$SEL_gr="SELECT * FROM Grau WHERE grIdiomaPais='$idioma_sistema' ORDER BY grNome";
                            $SEL_gr_query=mysql_db_query($base,$SEL_gr,$conexao);
                            $SEL_gr_RES=mysql_fetch_array($SEL_gr_query);
							
							while ($SEL_gr_RES!="") {
							$grNome=$SEL_gr_RES["grNome"];
							?>
                              <option value="<? echo $grNome; ?>" <? if ($grNome==$tsGrau) { echo "Selected"; }?>><? echo $grNome; ?></option>
                              <?
						   $SEL_gr_RES=mysql_fetch_array($SEL_gr_query);
						   }
						   ?>
                            </select></td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txTitulacao; ?></td>
                          <td> <input name="tsTitulacao" type="text" class="req" id="tsTitulacao" value="<? echo $tsTitulacao; ?>" size="32" maxlength="255"> 
                            <input name="prCod" type="hidden" class="input" id="prCod2" value="<? echo $prCod; ?>"> 
                            <input name="bdCod" type="hidden" class="input" id="bdCod" value="<? echo $bdCod; ?>"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" class="tdBiblioteca"> 
                          <td colspan="2" valign="middle" class="txtBold"><? echo $txContribuidor; ?></td>
                        </tr>
                        <tr> 
                          <td colspan="2" class="txtBold"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                              <tr> 
                                <td> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
                                    <?
		  require "../conexao/conexao.inc";       
	$sel2="select * from TSPF where tsIdentificador=$VtsIdentificador and tspfTipo<>'Autor'";
	$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);
$cor="#E5E5E5";

while ($sel2RESP!="") {
$pfCod=$sel2RESP[pfCod];
$tspfTipo=$sel2RESP[tspfTipo];

$selpf="select * from PessoaFisica where pfCod=$pfCod";
$selpf_query=mysql_db_query($base,$selpf,$conexao);
$selpfRESP=mysql_fetch_array($selpf_query);

$pfNome=$selpfRESP["pfNome"];

if ($cor!="#E5E5E5") {
$cor="#E5E5E5";
} else {
$cor="#F0F0F0";
}
		?>
                                    <tr bgcolor="<? echo $cor; ?>"> 
                                      <td width="64%"> <? echo $pfNome; ?></td>
                                      <td width="36%"><? echo $tspfTipo; ?> <input name="pfCod" type="hidden" class="input" id="pfCod2" value="<? echo $pfCod; ?>"> 
                                      </td>
                                    </tr>
                                    <?
		$sel2RESP=mysql_fetch_array($sel2_query);
	}
		?>
                                  </table></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr> 
                          <td class="txtBold">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr align="left" class="tdBiblioteca"> 
                          <td colspan="2" valign="middle" class="txtBold"><? echo $txLocalDeDefesa; ?></td>
                        </tr>
                        <tr bgcolor="#FFF5F0"> 
                          <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                          <td><select name="tsPaisLocalDefesa" class="req" id="tsPaisLocalDefesa" onChange="submit()">
                              <?
												 
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='$idioma_sistema' ORDER BY psNome";
                            $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
							
							while ($SEL_ps_RES!="") {
							$psSigla=$SEL_ps_RES["psSigla"];
							$psNome=$SEL_ps_RES["psNome"];
							?>
                              <option value="<? echo $psSigla; ?>" <? if (($psSigla==$AtsPaisLocalDefesa and  $tsPaisLocalDefesa=="") or $psSigla==$tsPaisLocalDefesa) { echo "selected"; } ?>><? echo $psNome; ?></option>
                              <?
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                            </select> </td>
                        </tr>
                        <tr bgcolor="#FFF5F0"> 
                          <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txUF; ?></td>
                          <td> 
                            <?
							if ($tsPaisLocalDefesa=="") {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$AtsPaisLocalDefesa'"; } else {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$tsPaisLocalDefesa'";
							}
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
						?>
                            <select name="tsUFLocalDefesa" class="input" id="tsUFLocalDefesa">
                              <option value="" selected><? echo $txSelecionar; ?></option>
                              <?						
							$SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='$psCod' ORDER BY ufNome";
                            $SEL_uf_query=mysql_db_query($base,$SEL_uf,$conexao);
                            $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);						
														
							while ($SEL_uf_RES!="") {
							$ufSigla=$SEL_uf_RES["ufSigla"];
							$ufNome=$SEL_uf_RES["ufNome"];
							?>
                              <option value="<? echo $ufSigla; ?>" <? if ($ufSigla==$tsUFLocalDefesa) { echo "Selected"; } ?>><? echo $ufNome; ?></option>
                              <?
						   $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
                              <option value="-"><? echo $txNenhumAcima; ?></option>
                            </select> </td>
                        </tr>
                        <tr bgcolor="#FFF5F0"> 
                          <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                          <td> <input name="tsCidadeLocalDefesa" type="text" class="input" id="tsCidadeLocalDefesa" value="<? echo $tsCidadeLocalDefesa; ?>" size="30" maxlength="100"></td>
                        </tr>
                        <tr> 
                          <td class="txtBold">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr> 
                          <td class="txtBold"><? echo $txDataDaDefesa; ?></td>
                          <td> 
                            <?
				  $tsDataDefesa_split=split("-",$tsDataDefesa);
				  $tsDia=$tsDataDefesa_split[2];
				  $tsMes=$tsDataDefesa_split[1];
				  $tsAno=$tsDataDefesa_split[0];
				  
				  ?>
                            <select name="dia" class="select" id="select4">
                              <? if ($tsDia!="" or $dia!="") { ?>
                              <option value="<? echo $tsDia; echo $dia;?>" selected><? if ($tsDia=="00" or $dia=="00") { echo "-"; } else { echo $tsDia; echo $dia; } ?></option>
                              <? } ?>
							  <option value="00">-</option>
                              <option value="01">01</option>
                              <option value="02">02</option>
                              <option value="03">03</option>
                              <option value="04">04</option>
                              <option value="05">05</option>
                              <option value="06">06</option>
                              <option value="07">07</option>
                              <option value="08">08</option>
                              <option value="09">09</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                            - 
                            <select name="mes" class="select">
							<option value="00">-</option>
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=mysql_db_query($base,$SEL_ms,$conexao);
                            $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							while ($SEL_ms_RES!=""){ 
							$msNumero=$SEL_ms_RES["msNumero"];
							$msNome=$SEL_ms_RES["msNome"];
							?>
                              <option value="<? echo $msNumero;?>" <? if (($msNumero==$tsMes and $mes=="") or $msNumero==$mes) { echo "Selected"; } ?>><? echo $msNome;?></option>
                              <? $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							  } ?>
                            </select>
                            - 
                            <input name="ano" type="text" class="numero" size="5" maxlength="4" value="<? if ($ano!="") { echo $ano; } else{  echo $tsAno; } ?>">
                            (<? echo $txAAAA; ?>)</td>
                        </tr>
                        <tr> 
                          <td class="txtBold">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr> 
                          <td bgcolor="#FFFFFF" class="txtBold"><? echo $txIdioma; ?></td>
                          <td bgcolor="#FFFFFF"><select name="tsIdioma" class="select">
                              <?
							$SEL_id="SELECT * FROM Idiomas WHERE idIdiomaPais='$idioma_sistema' ORDER BY idIdioma";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
							
							while ($SEL_id_RES!="") {
							$idSigla=$SEL_id_RES["idSigla"];
							$idIdioma=$SEL_id_RES["idIdioma"];
							?>
                              <option value="<? echo $idSigla; ?>" <? if ($idSigla=='PR' or $tsIdioma==$idSigla) { echo "selected"; } ?>><? echo $idIdioma; ?></option>
                              <? 
						    $SEL_id_RES=mysql_fetch_array($SEL_id_query);
						   } ?>
                            </select> </td>
                        </tr>
                        <tr> 
                          <td bgcolor="#FFFFFF" class="txtBold">&nbsp;</td>
                          <td bgcolor="#FFFFFF">&nbsp;</td>
                        </tr>
                        <tr align="left" valign="top"> 
                          <td bgcolor="#FFFFFF" class="txtBold"><span class="txtBold"><? echo $txTitulo; ?></span></td>
                          <td bgcolor="#FFFFFF"><textarea name="AttTitulo" cols="60" rows="5" class="req"><? if ($AttTitulo=="") { echo $ttTitulo[0]; }else{ echo $AttTitulo;  }?></textarea> 
                          </td>
                        </tr>
                        <tr> 
                          <td bgcolor="#FFFFFF" class="txtBold">&nbsp;</td>
                          <td bgcolor="#FFFFFF">&nbsp;</td>
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
                          <td width="88%" align="left"> 
                            <? if ($c1_pos_tipo=="a") { if ($c1_qtdLinhas=="1") { echo '<input name="tsCampo1" type="text" value="'.$tsCampo1.'" size="50">'; } else { echo '<textarea name="tsCampo1" cols="50" rows="'.$c1_qtdLinhas.'">'.$tsCampo1.'</textarea>'; } }else{ echo $tsCampo1;}?>
                          </td>
                        </tr>
                        <? } if ($c2_pos=='1') { ?>
                        <tr> 
                          <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                          <td align="left"> 
                            <? if ($c2_pos_tipo=="a") { if ($c2_qtdLinhas=="1") { echo '<input name="tsCampo2" type="text" value="'.$tsCampo2.'" size="50">'; } else { echo '<textarea name="tsCampo2" cols="50" rows="'.$c2_qtdLinhas.'">'.$tsCampo2.'</textarea>'; } }else{ echo $tsCampo2; }?>
                          </td>
                        </tr>
                        <? } ?>
                        <tr> 
                          <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <? } ?>
                        <tr> 
                          <td colspan="2" align="left" valign="bottom"><span class="txtBold"><? echo $txAssunto; ?></span></td>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="left" valign="top"><? echo $txPalavrasChave; ?></td>
                          <td align="left" valign="top"><textarea name="AasAssunto2" cols="60" rows="5" class="req"><? if ($AasAssunto2=="") { 

$AasAssunto2QTD=count($asAssunto2);

for ($i=0; $i<=$AasAssunto2QTD; $i++) {

if ($asAssunto2[$i]!="") {
echo $asAssunto2[$i].";";
}
} } else { echo $AasAssunto2; }
?></textarea></td>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top"><? echo $txDigitePalSep; ?>. 
                          </td>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="left" valign="top" class="txtBold"><? echo $txResumo; ?></td>
                          <td align="left" valign="top"><textarea name="ArsResumo" cols="60" rows="20" class="req"><? if ($ArsResumo=="") { echo $rsResumo[0]; } else { echo $ArsResumo; } ?></textarea></td>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="left" valign="top">&nbsp;</td>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                        </tr>
                      </table></td>
                </tr>
              </table></div>
			  <br />
              <div>
                <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                  <tr> 
                    <td class="tdAlternado"> 
                      <table width="100%" border="0" cellpadding="5" cellspacing="4"  class="txt">
                        <tr align="center" class="txt"> 
                          <td colspan="2" class="tdAluno"><span class="txtBold"><? echo $txOutroIdioma; ?></span></td>
                        </tr>
                        <tr class="txt"> 
                          <td width="4%" height="18" class="txtBold"><? echo $txIdioma; ?></td>
                          <td width="96%" height="18"> <select name="tsIdiomaALT" id="tsIdiomaALT">
                              <option value='' selected><? echo $txSelecionar; ?></option>
                              <?
							$SEL_id="SELECT * FROM Idiomas WHERE idIdiomaPais='$idioma_sistema' ORDER BY idIdioma";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
							
							while ($SEL_id_RES!="") {
							$idSigla=$SEL_id_RES["idSigla"];
							$idIdioma=$SEL_id_RES["idIdioma"];
							?>
                              <option value="<? echo $idSigla; ?>" <? if ($tsIdiomaALT==$idSigla and $tsIdiomaALT!=$tsIdioma) { echo "selected"; }?>><? echo $idIdioma; ?></option>
                              <? 
						    $SEL_id_RES=mysql_fetch_array($SEL_id_query);
						   } 
                      
                     ?>
                            </select> </td>
                        </tr>
                        <tr align="left" valign="top" class="txt"> 
                          <td height="18" class="txtBold"><? echo $txTitulo; ?></td>
                          <td height="18"><textarea name="AttTitulo2" cols="60" rows="5" id="AttTitulo2"><? if ($AttTitulo2=="") { echo $ttTitulo[1]; }else{ echo $AttTitulo2; } ?></textarea> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td height="18">&nbsp;</td>
                          <td height="18">&nbsp;</td>
                        </tr>
                        <tr align="left" class="txt"> 
                          <td height="18" colspan="2"><span class="txtBold"><? echo $txAssunto; ?></span></td>
                        </tr>
                        <tr align="left" valign="top" class="txt"> 
                          <td height="18" class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txPalavrasChave; ?></td>
                          <td height="18"> 
                            <div> 
                              <textarea name="AasAssunto3" cols="60" rows="5"><? 
if  ($AasAssunto3=="") { 
$AasAssunto3QTD=count($asAssunto3);

for ($i=0; $i<=$AasAssunto3QTD; $i++) {

if ($asAssunto3[$i]!="") {
echo $asAssunto3[$i].";"; 
}
}}else { 
echo $AasAssunto3; 
}
?></textarea>
                              <? echo $txDigitePalSep; ?>.<br>
                            </div></td>
                        </tr>
                        <tr class="txt"> 
                          <td height="18" align="left" valign="top" class="txtBold"><? echo $txResumo; ?><strong> 
                            <input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador" value="<? echo $tsIdentificador; ?>">
                            </strong></td>
                          <td height="18"><textarea name="ArsResumo2" cols="60" rows="20"><? if ($ArsResumo2=="") { echo $rsResumo[1]; }else{ echo $ArsResumo2; } ?></textarea> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td height="40" colspan="2" align="right"><input name="Alterar" type="submit" class="botao" id="Alterar" value="<? echo $txAlterar; ?> &raquo;"></td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
              </div>
             
          </form>
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
