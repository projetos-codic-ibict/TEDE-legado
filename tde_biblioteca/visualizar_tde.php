<?
session_start();
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
				 
	  require "biblioteca/dados_alteracao_tde.inc";
						
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
            <div> 
              <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="txt">
                      <? if ($tsOBS!="") { ?>
                      <tr class="tdAlternado"> 
                        <td width="19%"><span class="txtBold"><? echo $txObservacao; ?></span></td>
                        <td width="81%" height="18"><? echo $tsOBS; ?></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <? } ?>
                      <tr align="center" class="tdBiblioteca"> 
                        <td colspan="2"><span class="txtBold"><? echo $txAutor; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txNome; ?></td>
                        <td height="18"><? echo $pfNome; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCitacao; ?></td>
                        <td height="18"><? echo $pfCitacao; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txLattes; ?></td>
                        <td height="18"> <? echo $pfLattes; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCPF; ?></td>
                        <td height="18"><? echo $pfCPF; ?> </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txEMail; ?></td>
                        <td height="18"><? echo $pfEmail; ?></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
                            <tr> 
                              <td width="276"><? echo $txSeuEMailPodeSDPR; ?>? 
                              </td>
                              <td width="65"> 
                                <? if ($tspfDispEmail=="Sim") { echo "Sim"; } else { echo "Não"; } ?>
                              </td>
                              <td width="2">&nbsp;</td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <? if ($pjNome!="") { ?>
                      <tr align="center"> 
                        <td colspan="2" class="tdBiblioteca"><span class="txtBold"><? echo $txAfiliacao; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txNome; ?></td>
                        <td height="18"><? echo $pjNome; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txSigla; ?></td>
                        <td height="18"><? echo $pjSigla; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txPais; ?></td>
                        <td height="18"> 
                          <? 
//pega o nome do Pais
			$SEL_ps="SELECT * FROM Pais WHERE psSigla='$pjPais' or psSigla='$pjNomePais'";
	        $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
			
			$pjNomePais=$SEL_ps_RES['psNome'];
echo $pjNomePais; ?>
                        </td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txUF; ?></td>
                        <td height="18"><? echo $pjUF; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txCNPJ; ?></td>
                        <td height="25"><? echo $pjCNPJ; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txURL; ?></td>
                        <td height="18"><? echo $pjURL; ?></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <? } ?>
                      <tr align="center"> 
                        <td colspan="2" class="tdBiblioteca"><span class="txtBold"><? echo $txDadosDaTDE; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txGrau; ?></td>
                        <td height="18"><? echo $tsGrau; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txTitulacao; ?></td>
                        <td height="18"><? echo $tsTitulacao; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txPrograma; ?></td>
                        <td height="18"><? echo $prNome; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"><? echo $txArea; ?></td>
                        <td height="18"><? echo $prArea; ?></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr align="left"> 
                        <td colspan="2"><span class="txtBold"><? echo $txContribuidor; ?></span></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="txt">
                            <?
require "../conexao/conexao.inc"; 
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
                              <td width="10%" class="txtBold"> &nbsp;&nbsp;<? echo $txNome; ?></td>
                              <td width="46%"><? echo $pfNome; ?></td>
                              <td width="2%">&nbsp;</td>
                              <td width="42%"><? echo $tspfTipo; ?> <input name="pfCod" type="hidden" class="input" value="<? echo $pfCod; ?>"> 
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
                      <tr align="left"> 
                        <td colspan="2" align="left"><span class="txtBold"><? echo $txLocalDeDefesa; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"> &nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                        <td height="18"><? echo $tsCidadeLocalDefesa; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txUF; ?></td>
                        <td height="18"><? echo $tsUFLocalDefesa; ?></td>
                      </tr>
                      <tr> 
                        <td class="txtBold"> &nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                        <td height="18"> 
                           <? 
						$SEL_pa="SELECT psNome FROM Pais WHERE psSigla='$tsPaisLocalDefesa' and psIdiomaPais='$idioma_sistema'";
            $SEL_pa_query=mysql_db_query($base,$SEL_pa,$conexao);
            $SEL_pa_RES=mysql_fetch_array($SEL_pa_query);
						echo $SEL_pa_RES['psNome']; ?>
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
                        <td class="txtBold">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="25" class="txtBold"><? echo $txIdioma; ?></td>
                        <td> 
                          <?
						  
						    echo $tsNomeIdioma; ?>
                        </td>
                      </tr>
                      <? 
						require "../bibliotecas/campoExtra.bib";
						if ($c1_aut=='1' or $c2_aut=='1') { ?>
                      <tr align="left" class="tdBiblioteca"> 
                        <td colspan="2" class="txtBold">&nbsp;</td>
                      </tr>
                      <? if ($c1_aut=='1') { ?>
                      <tr> 
                        <td align="left" class="txtBold"><? echo $VtsCampo1; ?></td>
                        <td width="81%" align="left"><? echo $tsCampo1;?></td>
                      </tr>
                      <? } if ($c2_aut=='1') { ?>
                      <tr> 
                        <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                        <td align="left"> <? echo $tsCampo2; ?> </td>
                      </tr>
                      <? } ?>
                      <tr> 
                        <td colspan="3" align="right">&nbsp;</td>
                      </tr>
                      <? } ?>
                      <tr> 
                        <td align="left" valign="top">&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td align="left" valign="top"><span class="txtBold"><? echo $txTitulo; ?></span></td>
                        <td height="18"><? echo $ttTitulo[0]; ?> </td>
                      </tr>
                      <tr> 
                        <td><span class="txtBold"><a name="AreaCNPQ"></a></span></td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr align="left"> 
                        <td colspan="2"><span class="txtBold"><? echo $txAssunto; ?></span></td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txAreaDoCNPQ; ?></td>
                        <td height="18"> 
                          <?

			//Seleciona Palavras-chave

			$SEL_as_cnpq="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Tabela CNPQ'";
            $SEL_as_cnpq_query=mysql_db_query($base,$SEL_as_cnpq,$conexao);
            $SEL_as_cnpq_RES=mysql_fetch_array($SEL_as_cnpq_query);
			$SubAreaCNPQ=$SEL_as_cnpq_RES["asAssunto"];

			$SEL_as_cnpq2="SELECT * FROM AreaConhecimento WHERE acNome='$SubAreaCNPQ'";
            $SEL_as_cnpq2_query=mysql_db_query($base,$SEL_as_cnpq2,$conexao);
            $SEL_as_cnpq2_RES=mysql_fetch_array($SEL_as_cnpq2_query);

			$acCod=$SEL_as_cnpq2_RES["acCod"];
			$acNome=$SEL_as_cnpq2_RES["acNome"];
		    $AreaCNPQ=substr($acCod,0,1);

			if ($AreaCNPQ!="") {
			$SEL_ac="SELECT * FROM AreaConhecimento WHERE acCod like '$AreaCNPQ%' ORDER BY acCod";
            $SEL_ac_query=mysql_db_query($base,$SEL_ac,$conexao);

                            $SEL_ac_RES=mysql_fetch_array($SEL_ac_query);

							}

							

							$acCod=$SEL_ac_RES["acCod"];

							$acNomeTotal=$SEL_ac_RES["acNome"];

							$acNome=substr("$acNomeTotal",0,50);

							 echo $acNomeTotal;

						   ?>
                        </td>
                      </tr>
                      <tr> 
                        <td class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txSubAreaDoCNPQ; ?></td>
                        <td height="18"> 
                          <?

			echo $SubAreaCNPQ;

				?>
                        </td>
                      </tr>
                      <tr align="left" valign="top"> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr align="left" valign="top"> 
                        <td><span class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txPalavrasChave; ?></span></td>
                        <td height="18"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="txt">
                            <tr> 
                              <td> 
                                <? $asAssunto2QTD=count($asAssunto2);

					  for ($i=0; $i<=$asAssunto2QTD; $i++) {

					  if ($asAssunto2[$i]!="") {

					  echo $asAssunto2[$i].";"; 

					  }

					  }?>
                                <br> </td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr align="left" valign="top"> 
                        <td><span class="txtBold"><? echo $txResumo; ?></span></td>
                        <td height="18"><? echo $rsResumo[0]; ?> </td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                </tr>
                <tr> 
                  <td class="tdAlternado"><table width="100%" border="0" cellpadding="3" cellspacing="3"  class="txt">
                      <tr align="center" class="txt"> 
                        <td height="18" colspan="2" bgcolor="#FFFFF0" class="tdBiblioteca"><span class="txtBold"><? echo $txDadosTDEOutroIdioma; ?></span></td>
                      </tr>
                      <tr class="txt"> 
                        <td><span class="txtBold"><? echo $txIdioma; ?></span></td>
                        <td width="82%" height="18"> 
                          <?

							$SEL_id="SELECT * FROM Idiomas WHERE idSigla='$tsIdiomaALT'";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
                            if ($tsIdiomaALT!=$tsIdioma) {
							echo $SEL_id_RES["idIdioma"]; } ?>
                        </td>
                      </tr>
                      <tr class="txt"> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr align="left" valign="top" class="txt"> 
                        <td><span class="txtBold"><? echo $txTitulo; ?></span></td>
                        <td height="18"><? echo $ttTitulo[1]; ?> </td>
                      </tr>
                      <tr class="txt"> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                    
                      <tr align="left" valign="top" class="txt"> 
                        <td><span class="txtBold"><? echo $txPalavrasChave; ?></span></td>
                        <td height="18"><table width="100%"  border="0" cellpadding="0" cellspacing="0" class="txt">
                            <tr> 
                              <td> 
                                <? $asAssunto3QTD=count($asAssunto3);

					  for ($i=0; $i<=$asAssunto3QTD; $i++) {

					  if ($asAssunto3[$i]!="") {

					  echo $asAssunto3[$i].";"; 

					  }

					  }?>
                                <br> </td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr class="txt"> 
                        <td>&nbsp;</td>
                        <td height="18">&nbsp;</td>
                      </tr>
                      <tr class="txt"> 
                        <td align="left" valign="top"><span class="txtBold"><? echo $txResumo; ?> 
                          <input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador" value="<? echo $tsIdentificador; ?>">
                          </span></td>
                        <td height="18"><? echo $rsResumo[1]; ?> </td>
                      </tr>
                    </table></td>
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
