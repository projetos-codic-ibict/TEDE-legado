<? session_start();
if(!session_is_registered("SprCod") and !session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_biblioteca_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>TEDE | Layout P&aacute;gina 1 - Inicio da Se&ccedil;&atilde;o</title>
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
      <?
if ($Alterar!=""){
require "biblioteca/alterar_tde.inc";
} else { 
require "biblioteca/dados_alteracao_tde.inc";
}
?>

      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">

        <tr> 

          <td width="139" align="left" valign="top" class="subMenuBib">
            <? require "menu.php"; ?>
          </td>

          <td align="center" valign="top" class="tdConteudo"> 

		  <form action="" method="post" name="webform" onSubmit="return checkForm(this.name); return true;">

             <br>

              <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">

                <tr> 

                  <td><table width="100%" border="0" align="center" cellpadding="5" cellspacing="3" class="txt">
                      <tr> 
                        <td class="txtBold"><? echo $txNumeroDeChamada; ?></td>
                        <td class="txtBold"><input name="tsNumeroChamada" type="text" class="input" id="tsNumeroChamada2" value="<? echo $tsNumeroChamada; ?>" size="36" maxlength="35"></td>
                      </tr>
                      <tr> 
                        <td colspan="2" align="center" class="txtBold">&nbsp;</td>
                      </tr>
                      <tr class="tdBiblioteca"> 
                        <td colspan="2" align="center" class="txtBold"> 
                          <? 
			require "../conexao/conexao.inc"; 		  
		  
			 echo $txAutor; ?>
                        </td>
                      </tr>
                      <tr> 
                        <td width="16%" class="txtBold"><? echo $txNome; ?></td>
                        <td height="18"> <? echo $pfNome; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCitacao; ?></td>
                        <td height="18"><? echo $pfCitacao; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCitacaoABNT; ?></td>
                        <td height="18"><? echo $pfCitacaoABNT; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><a href="http://genos.cnpq.br:12010/dwlattes/owa/consultapesq.inicio" target="_blank"><? echo $txLattes; ?></a> 
                        </td>
                        <td height="18"> <input name="TpfCod" type="hidden" class="input" id="TpfCod" value="<? echo $pfCod; ?>"> 
                          <? echo $pfLattes; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCPF; ?></td>
                        <td height="18"> <? echo $pfCPF; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txEMail; ?></td>
                        <td height="18"><? echo $pfEmail; ?> </td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
                            <tr> 
                              <td width="61%"><? echo $txSeuEMailPodeSDPR; ?>?</td>
                              <td width="20" align="center" valign="middle"> <input name="tspfDispEmail" type="radio" value="Sim" <? if ($tspfDispEmail=="Sim") { echo "checked";}?>> 
                              </td>
                              <td width="10%"><? echo $txSim; ?></td>
                              <td width="20" align="center" valign="middle"> <input name="tspfDispEmail" type="radio" value="Nao" <? if ($tspfDispEmail=="Nao") { echo "checked"; }?>> 
                              </td>
                              <td width="20%"><? echo $txNao; ?></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      
                      <tr> 
                        <td colspan="2" align="center" class="tdBiblioteca"><span class="txtBold"><? echo $txDadosDaTDE; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txGrau; ?></td>
                        <td height="18"><select name="tsGrau" class="select">
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
                          </select> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txTitulacao; ?></td>
                        <td height="18"> <input name="tsTitulacao" type="text" class="input" id="pfCitacao5" value="<? echo $tsTitulacao; ?>" size="50" maxlength="100"></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txPrograma; ?></td>
                        <td height="18"><? echo $prNome; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txArea; ?></td>
                        <td height="18"><? echo $prArea; ?> </td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2" align="left"><span class="txtBold"><? echo $txContribuidor; ?></span></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="txt">
                            <?

require "../conexao/conexao.inc";    
require "../conexao/conexao_fim.inc";    
$estiloTR="tr";
include "../bibliotecas/funcoes.bib"; 

$sel2="select * from TSPF where tsIdentificador=$VtsIdentificador and tspfTipo<>'Autor'";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

if ($sel2RESP=="") {
echo "Nenhum arquivo anexado.";
}

while ($sel2RESP!="") {

$pfCod=$sel2RESP[pfCod];
$tspfTipo=$sel2RESP[tspfTipo];

$selpf="select * from PessoaFisica where pfCod=$pfCod";
$selpf_query=mysql_db_query($base,$selpf,$conexao);
$selpfRESP=mysql_fetch_array($selpf_query);

$pfNome=$selpfRESP["pfNome"];

mudaEstiloTR(&$estiloTR);

?>
                            <tr class=<? echo $estiloTR; ?>> 
                              <td width="7%"> <strong><? echo $txNome; ?></strong></td>
                              <td width="46%"><? echo $pfNome; ?></td>
                              <td width="2%">&nbsp;</td>
                              <td width="45%"><? echo $tspfTipo; ?> <input name="pfCod" type="hidden" class="input" id="pfCod2" value="<? echo $pfCod; ?>"> 
                              </td>
                            </tr>
                            <?

		$sel2RESP=mysql_fetch_array($sel2_query);

	}

		?>
                          </table></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2" align="left"><span class="txtBold"><? echo $txLocalDeDefesa; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                        <td height="18"> 
                          <? 
						echo $tsPaisLocalDefesa; ?>
                        </td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txUF; ?></td>
                        <td height="18"> 
                          <select name="tsUFLocalDefesa" class="input" id="tsUFLocalDefesa">
                            <option value="" selected><? echo $txSelecionar; ?></option>
                            <?						
							$SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='22' ORDER BY ufNome";
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
                          </select></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"> &nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                        <td height="18"> <input type="hidden" name="tsPaisLocalDefesa" value="<? echo $tsPaisLocalDefesa; ?>"> 
                          <input name="tsCidadeLocalDefesa" type="text" class="input" id="tsCidadeLocalDefesa" value="<? echo $tsCidadeLocalDefesa; ?>" size="50" maxlength="100"> 
                        </td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txDataDaDefesa; ?></td>
                        <td height="18"> 
                          <?

				  $tsDataDefesa_split=split("-",$tsDataDefesa);

				  $tsDia=$tsDataDefesa_split[2];

				  $tsMes=$tsDataDefesa_split[1];

				  $tsAno=$tsDataDefesa_split[0];

				  ?>
                          <select name="dia" class="select" id="select3">
                            <option value="00" <? if ($tsDia=="00" or $dia=="00") { echo " Selected";}; ?>>-</option>
							<? if ($tsDia!="" and $tsDia!="00") { ?>
                            <option value="<? echo $tsDia; ?>" selected><? echo $tsDia; ?></option>
                            <? } ?>
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
                          <select name="mes" class="select" id="select5">
                            <option value="00" <? if ($mes=="00" or $tsMes=="00") { echo "Selected"; }?>>-</option>
							<? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=mysql_db_query($base,$SEL_ms,$conexao);
                            $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							while ($SEL_ms_RES!=""){ 
							$msNumero=$SEL_ms_RES["msNumero"];
							$msNome=$SEL_ms_RES["msNome"];
							?>
                            <option value="<? echo $msNumero;?>" <? if ($msNumero==$tsMes or $msNumero==$mes) { echo "Selected"; } ?>><? echo $msNome;?></option>
                            <? $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							  } ?>
                          </select>
                          - 
                          <input name="ano" type="text" class="numero" size="5" maxlength="4" value="<? echo $tsAno; ?>">
                          (<? echo $txAAAA; ?>)</td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txIdioma; ?>&nbsp; </td>
                        <td><select name="tsIdioma" class="select">
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
                        <td align="left" valign="top" class="txtBold">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top" class="txtBold"><? echo $txTitulo; ?></td>
                        <td height="18"><textarea name="ttTitulo" cols="60" rows="5" class="req"><? if ($ttTitulo=="") { echo $AttTitulo[0]; } else { echo $ttTitulo; } ?></textarea> 
                        </td>
                      </tr>
                      <tr> 
                        <td><strong><a name="AreaCNPQ"></a></strong></td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <? 
						require "../bibliotecas/campoExtra.bib";
						if ($c1_aut=='1' or $c2_aut=='1') { ?>
                      <tr class="tdBiblioteca"> 
                        <td colspan="2" align="left" valign="bottom" class="txtBold">&nbsp;</td>
                      </tr>
                      <? if ($c1_aut=='1') { ?>
                      <tr> 
                        <td align="left" class="txtBold"><? echo $VtsCampo1; ?></td>
                        <td width="88%" align="left"> 
                          <? if ($c1_aut_tipo=="a") { if ($c1_qtdLinhas=="1") { echo '<input name="tsCampo1" type="text" value="'.$tsCampo1.'" size="50">'; } else { echo '<textarea name="tsCampo1" cols="50" rows="'.$c1_qtdLinhas.'">'.$tsCampo1.'</textarea>'; } }else{ echo $tsCampo1;}?>
                        </td>
                      </tr>
                      <? } if ($c2_aut=='1') { ?>
                      <tr> 
                        <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                        <td align="left"> 
                          <? if ($c2_aut_tipo=="a") { if ($c2_qtdLinhas=="1") { echo '<input name="tsCampo2" type="text" value="'.$tsCampo2.'" size="50">'; } else { echo '<textarea name="tsCampo2" cols="50" rows="'.$c2_qtdLinhas.'">'.$tsCampo2.'</textarea>'; } }else{ echo $tsCampo2; }?>
                        </td>
                      </tr>
                      <? } ?>
                      <tr> 
                        <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                      </tr>
                      <? } ?>
                      <tr> 
                        <td colspan="2" align="left"><span class="txtBold"><? echo $txAssunto; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txAreaDoCNPQ; ?></td>
                        <td height="18"> 
                          <?				

			//Seleciona Palavras-chave
require "../conexao/conexao_fim.inc";

			$SEL_as_cnpq="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Tabela CNPQ'";
            $SEL_as_cnpq_query=mysql_db_query($base_fim,$SEL_as_cnpq,$conexao_fim);
            $SEL_as_cnpq_RES=mysql_fetch_array($SEL_as_cnpq_query);
			$SubAreaCNPQ=$SEL_as_cnpq_RES["asAssunto"];

			$SEL_as_cnpq2="SELECT * FROM AreaConhecimento WHERE acNome='$SubAreaCNPQ'";
            $SEL_as_cnpq2_query=mysql_db_query($base,$SEL_as_cnpq2,$conexao);
            $SEL_as_cnpq2_RES=mysql_fetch_array($SEL_as_cnpq2_query);
			$acCod=$SEL_as_cnpq2_RES["acCod"];
			$acNome=$SEL_as_cnpq2_RES["acNome"];
			$AreaCNPQ=substr($acCod,0,1);
			
					if ($AreaCNPQ==1) { echo '1 - Ci&ecirc;ncias Exatas e da Terra'; }
                    if ($AreaCNPQ==2) { echo '2 - Ci&ecirc;ncias Biol&oacute;gicas'; }
                    if ($AreaCNPQ==3) { echo '3 - Engenharias'; }
                    if ($AreaCNPQ==4) { echo '4  - Ci&ecirc;ncias da Sa&uacute;de'; }
                    if ($AreaCNPQ==5) { echo '5 - Ci&ecirc;ncias Agr&aacute;rias'; }
                    if ($AreaCNPQ==6) { echo '6 - Ci&ecirc;ncias Sociais Aplicadas'; }
                    if ($AreaCNPQ==7) { echo '7 - Ci&ecirc;ncias Humanas'; }
                   if ($AreaCNPQ==8) { echo '8 - Ling&uuml;&iacute;stica, Letras e Artes'; }
                    if ($AreaCNPQ==9) { echo '9 - Outros';} ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txSubAreaDoCNPQ; ?></td>
                        <td height="18"><? echo $SubAreaCNPQ; ?></td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top" class="txtBold">&nbsp;</td>
                        <td height="18" align="left" valign="top">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top" class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txPalavrasChave; ?></td>
                        <td height="18" align="left" valign="top"><textarea name="asAssunto2" cols="60" rows="5" class="req" id="asAssunto2"><? if ($asAssunto2=="") { 

$asAssunto2QTD=count($AasAssunto2);

for ($i=0; $i<=$asAssunto2QTD; $i++) {

if ($AasAssunto2[$i]!="") {
echo $AasAssunto2[$i].";";
}
} } else { echo $asAssunto2; }
?></textarea> 
                        <div> <? echo $txDigitePalSep; ?>. <br>
                          </div></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top" class="txtBold"><? echo $txResumo; ?></td>
                        <td height="18" align="left" valign="top"><textarea name="rsResumo" cols="60" rows="20" class="req"><? if ($rsResumo=="") { echo $ArsResumo[0]; } else { echo $rsResumo; } ?></textarea> 
                        </td>
                      </tr>
                    </table></td>

                </tr>

                <tr>

                  <td height="30">&nbsp;</td>

                </tr>

                <tr>

                  <td class="tdAlternado"><table width="100%" border="0" cellpadding="5" cellspacing="4"  class="txt">

                    <tr align="center" class="txt">

                        <td colspan="2" class="tdBiblioteca"><span class="txtBold"><? echo $txOutroIdioma; ?></span></td>

                    </tr>

                    <tr class="txt">

                        <td width="20%" height="18" class="txtBold"><? echo $txIdioma; ?></td>

                      <td width="80%" height="18">

                        <select name="tsIdiomaALT">
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
                        </select>
                      </td>

                    </tr>

                    <tr align="left" valign="top" class="txt">

                        <td height="18" class="txtBold"><? echo $txTitulo; ?></td>

                      <td height="18"><textarea name="ttTitulo2" cols="60" rows="5"><? if ($ttTitulo2=="") { echo $AttTitulo[1]; }else{ echo $ttTitulo2; } ?></textarea>

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
                            <textarea name="asAssunto3" cols="60" rows="5" class="req" id="asAssunto3"><? if ($asAssunto3=="") { 

$asAssunto3QTD=count($AasAssunto3);

for ($i=0; $i<=$asAssunto3QTD; $i++) {

if ($AasAssunto3[$i]!="") {
echo $AasAssunto3[$i].";";
}
} } else { echo $asAssunto3; }
?>
                            </textarea>
                            <br>
                        </div></td>

                    </tr>

                      <tr class="txt"> 
                        <td height="18" align="left" valign="top" class="txtBold"><? echo $txResumo; ?><strong> 
                          <input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador" value="<? echo $tsIdentificador; ?>">
                          </strong></td>

                      <td height="18"><textarea name="rsResumo2" cols="60" rows="20"><? if ($rsResumo2=="") { echo $ArsResumo[1]; }else{ echo $rsResumo2; } ?></textarea>

                      </td>

                    </tr>

                    <tr class="txt">

                      <td height="40" colspan="2" align="right"><input name="Alterar" type="submit" class="botao" value="<? echo $txAlterar; ?> &raquo;"></td>

                    </tr>

                  </table></td>

                </tr>

              </table>

              <br>

          </form></td>

        </tr>

      </table><!-- InstanceEndEditable --></td>
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