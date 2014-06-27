<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
if ($Inserir!="") {
require "biblioteca/inserir_tde.inc"; 
exit;
}
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Cria&ccedil;&atilde;o de TDE</title>
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
  
	  <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuBib"> 
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="txtBold"> <span class="txtBold">
                  <?
		  //Visualizar a Biblioteca dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_bd="SELECT * FROM BibliotecaDepositaria WHERE bdCod=$SbdCod";
          $SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
          $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
		  
		  $bdNome=$SEL_bd_RES["bdNome"];
		  echo $bdNome;
		  ?>
                  </span><br> 
              <tr> 
                <td class="td"><span class="txtBold">&raquo; <? echo $txTDE; ?></span></td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='iniciar_tde.php'"><a href="iniciar_tde.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_tde_iniciadas.php?pag=VisCad'"><a href="visualizar_tde_iniciadas.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_tde_excluir.php?pag=VisExc'"><a href="visualizar_tde_excluir.php?pag=VisExc" class="linkpreto">&raquo; 
                  <? echo $txExcluir; ?></a></td>
              </tr>
              
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="tde_pos.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
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
            </table></td>
          <td height="100%" align="center" valign="top" class="tdConteudo"><br>
            <div> 
              <table width="90%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td>
				<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                      <tr class="tdBiblioteca" > 
                        <td colspan="2" align="center" valign="middle" class="txtBold"><? echo $txIniciarTDE; ?></td>
                      </tr>
                      <tr> 
                        <td colspan="2"> <form action="" method="post" name="form1" onSubmit="return checkForm(this.name); return true;">
                            <table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                              <tr> 
                                <td> <? echo $txEntre3PrimLetAutor; ?><br> <input name="busca" type="text" class="input"  size="4" maxlength="3" value="<? echo $busca; ?>">
                                  <input name="Submit" type="submit" class="botao" value="<? echo $txLocalizar; ?> &raquo;"> 
                                  <br> <br>
                                  <? if ($busca!="" or $SpfCod!="") { ?>
                                  <span class="txtBold"><? echo $txNome; ?></span> 
                                  <select name="SpfCod" class="input" onChange="submit()">
                                    <? if ($SpfCod!="") { 
				  $pfCod_split=split(",",$SpfCod);
				  $VpfNome=$pfCod_split[2];
				  $VprCod=$pfCod_split[0];
				  ?>
                                    <option value="<? echo $VpfCod; ?>" selected><? echo $VpfNome; ?></option>
                                    <? } ?>
                                    <option value="">Seleciona</option>
                                    <? 
$SEL_pr="SELECT prCod, prNome FROM Programa WHERE bdCod='$SbdCod' ORDER BY prNome";
$SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
$STprCod="";
while ($SEL_pr_RES!="") {
if ($STprCod=="") {
$STprCod=$SEL_pr_RES["prCod"];
}else{
$STprCod=$STprCod.",".$SEL_pr_RES["prCod"];
}
$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
}								
					$SEL_pf="SELECT * FROM PessoaFisica INNER JOIN TSPF ON (PessoaFisica.pfCod = TSPF.pfCod) WHERE PessoaFisica.pfNome like '$busca%' and TSPF.tsIdentificador='0' and prCod in ($STprCod)";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
				
				while ($SEL_pf_RES!="") {
				$pfCod=$SEL_pf_RES["pfCod"];
				$prCod=$SEL_pf_RES["prCod"];
				$pfNome=$SEL_pf_RES["pfNome"];
											?>
                                    <option value="<?echo $pfCod.','.$prCod.','.$pfNome;?>"><?echo $pfNome;  ?></option>
                                    <?
				 $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
				  }
				 ?>
                                  </select> 
                                  <?  } ?>
                                </td>
                              </tr>
                            </table>
                          </form></td>
                      </tr>
                      <tr> 
                        <td width="19%" height="18" class="txtBold">
                          <? if ($SpfCod!="") {
			
			$pfCod_split=split(",",$SpfCod);
			$pfCod=$pfCod_split[0];
			$prCod=$pfCod_split[1];
			
			$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
            $SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
            $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
			
			$pfCod=$SEL_pf_RES["pfCod"];
			$pfNome=$SEL_pf_RES["pfNome"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			$pfLattes=$SEL_pf_RES["pfLattes"];
			$pfCPF=$SEL_pf_RES["pfCPF"];
			
			$SEL_prCod="SELECT prCod FROM TSPF WHERE pfCod=$pfCod";
            $SEL_prCod_query=mysql_db_query($base,$SEL_prCod,$conexao);
            $SEL_prCod_RES=mysql_fetch_array($SEL_prCod_query);	
            $SprCod=$SEL_prCod_RES["prCod"];
			
			$SEL_pr="SELECT * FROM Programa WHERE prCod=$SprCod";
            $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
            $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);	
            $SprCod=$SEL_pr_RES["prCod"];
			$prNome=$SEL_pr_RES["prNome"];
			$prArea=$SEL_pr_RES["prArea"];
			 if ($pfLattes!="") {
			 ?>
                          <? echo $txLattes; ?></td>
                        <td width="81%" height="18"><? echo $pfLattes; ?></td>
                      </tr>
					  <? } ?>
                      <tr> 
                        <td height="18" class="txtBold"><? echo $txCPF; ?></td>
                        <td height="18"><? echo $pfCPF; ?></td>
                      </tr>
                      <? } ?>
                    </table>
                    <? if ($SpfCod!="") { ?>
                    <form name="form2" method="post" action="" onSubmit="return checkForm(this.name); return true;">
                      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                        <tr class="txt">
                          <td width="19%" class="txtBold">&nbsp;</td>
                          <td colspan="2"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="txt">
                              <tr> 
                                <td><? echo $txSeuEMailPodeSDPR; ?>?</td>
                                <td align="center" valign="middle"> 
                                  <input name="tspfDispEmail" type="radio" value="Sim" <? if ($tspfDispEmail=="Sim") { echo "checked";}?>> 
                                </td>
                                <td><? echo $txSim; ?></td>
                                <td align="center" valign="middle"> 
                                  <input name="tspfDispEmail" type="radio" value="Nao" <? if ($tspfDispEmail=="Nao") { echo "checked"; }?>> 
                                </td>
                                <td><? echo $txNao; ?></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txNumeroDeChamada; ?></td>
                          <td colspan="2"><input name="tsNumeroChamada" type="text" class="input" value="<? echo $tsNumeroChamada; ?>" size="36" maxlength="35"></td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txGrau; ?></td>
                          <td colspan="2"> 
                            <!-- <input type="radio" name="tsGrau" value="Mestre" <? if ($tsGrau=="Mestre"){ echo "checked"; }?>>
                          Mestre 
                          <input type="radio" name="tsGrau" value="Doutor" <? if ($tsGrau=="Doutor"){ echo "checked"; }?>>
                          Doutor  -->
                            <input name="pfCod" type="hidden" class="input" value="<?echo $pfCod;?>"> 
                            <input name="prCod" type="hidden" class="input" id="prCod" value="<?echo $prCod;?>"> 
                            <select name="tsGrau" class="select">
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
                            </select> <input name="SpfCod" type="hidden" id="SpfCod" value="<? echo $SpfCod;?>"></td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txTitulacao; ?></td>
                          <td colspan="2"><input name="tsTitulacao" type="text" class="req" id="tsTitulacao2" value="<? echo $tsTitulacao; ?>" size="32" maxlength="255"></td>
                        </tr>
                        <tr class="txt"> 
                          <td height="20">&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr align="left"> 
                          <td colspan="3" valign="middle" class="txtBold"><? echo $txLocalDaDefesa; ?></td>
                        </tr>
                        <tr class="txt"> 
                          <td height="31" class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txPais; ?></td>
                          <?
						  require "../conexao/conexao_fim.inc";
							$SEL_inst="SELECT inUF FROM Instituicao";
                            $SEL_inst_query=mysql_db_query($base_fim,$SEL_inst,$conexao_fim);
                            $SEL_inst_RES=mysql_fetch_array($SEL_inst_query);
							$inUF=$SEL_inst_RES["inUF"];
							
						?>
                          <td colspan="2"> <select name="tsPaisLocalDefesa" class="req" id="tsPaisLocalDefesa" onChange="submit()">
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
                              <option value="<? echo $psSigla; ?>" <? if (($psSigla==$inPais and   $tsPaisLocalDefesa=="") or $psSigla==$tsPaisLocalDefesa) { echo "selected"; } ?>><? echo $psNome; ?></option>
                              <?
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                            </select> </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;<strong><? echo $txUF; ?></strong></td>
                          <td colspan="2"> 
                            <?
							if ($tsPaisLocalDefesa=="") {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'"; } else {
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
                              <option value="<? echo $ufSigla; ?>"><? echo $ufNome; ?></option>
                              <?
						   $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
                              <option value="-"><? echo $txNenhumAcima; ?></option>
                            </select> </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">&nbsp;&nbsp;&nbsp;&nbsp;<? echo $txCidade; ?></td>
                          <td colspan="2"> <input name="tsCidadeLocalDefesa" type="text" class="req" value="<? echo $tsCidadeLocalDefesa; ?>" size="30" maxlength="100"> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td>&nbsp;</td>
                          <td colspan="2">&nbsp;</td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txDataDaDefesa; ?></td>
                          <td colspan="2"> <select name="dia" class="select" id="select2">
                              <? if ($dia!="") {?>
                              <option value="<? echo $dia;?>" selected><? echo $dia;?></option>
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
                            <select name="mes" class="select" id="select5">
							<option value="00">-</option>
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=mysql_db_query($base,$SEL_ms,$conexao);
                            $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							while ($SEL_ms_RES!=""){ 
							$msNumero=$SEL_ms_RES["msNumero"];
							$msNome=$SEL_ms_RES["msNome"];
							?>
                              <option value="<? echo $msNumero;?>" <? if ($msNumero==$mes) { echo "Selected";}?>><? echo $msNome;?></option>
                              <? $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							  } ?>
                            </select>
                            - 
                            <input name="ano" type="text" class="numero" id="ano2" value="<? if ($ano!="") { echo $ano; } else { $data_atual=date('Y'); echo $data_atual; }?>" size="5" maxlength="4" onKeyPress="Numero(this);">
                            (<? echo $txAAAA; ?>)</td>
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
                          <td width="81%" align="left"> 
                            <? if ($c1_pos_tipo=="a") { if ($c1_qtdLinhas=="1") { echo '<input name="tsCampo1" type="text" value="'.$tsCampo1.'" size="50">'; } else { echo '<textarea name="tsCampo1" cols="50" rows="'.$c1_qtdLinhas.'">'.$tsCampo1.'</textarea>'; } }else{ echo $tsCampo1;}?>
                          </td>
                        </tr>
                        <? } if ($c2_pos=='1') { ?>
                        <tr> 
                          <td align="left" class="txtBold"><? echo $VtsCampo2; ?></td>
                          <td align="left"> 
                            <? if ($c2_pos_tipo=="a") { if ($c2_qtdLinhas=="1") { echo '<input name="tsCampo2" type="text" value="'.$tsCampo2.'" size="50">'; } else { echo '<textarea name="tsCampo2" cols="50" rows="'.$c2_qtdLinhas.'">'.$tsCampo2.'</textarea>'; } }else{ echo $tsCampo2; }?>
                            <input name="SprCod" type="hidden" id="SprCod2" value="<? echo $SprCod; ?>"> 
                          </td>
                        </tr>
                        <? } ?>
                        <tr> 
                          <td colspan="3" align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <? } ?>
                      </table>
                      <br>
                     
                        <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                          <tr> 
                            <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                              <tr align="left"> 
                                <td><span class="txtBold"><? echo $txIdioma; ?></span></td>
                                <td><select name="tsIdioma" class="select">
                                    <?
							 
							$SEL_id="SELECT * FROM Idiomas WHERE idIdiomaPais='$idioma_sistema' ORDER BY idIdioma";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
							
							while ($SEL_id_RES!="") {
							$idSigla=$SEL_id_RES["idSigla"];
							$idIdioma=$SEL_id_RES["idIdioma"];
							?>
                                    <option value="<? echo $idSigla; ?>" <? if ($idSigla=='pt' or $tsIdioma==$idSigla) { echo "selected"; } ?>><? echo $idIdioma; ?></option>
                                    <? 
						    $SEL_id_RES=mysql_fetch_array($SEL_id_query);
						   } ?>
                                  </select></td>
                              </tr>
                              <tr align="left"> 
                                <td><span class="txtBold"><? echo $txTitulo; ?></span></td>
                                <td><textarea name="ttTitulo" cols="60" rows="5" class="req" id="textarea3"><? echo $ttTitulo; ?></textarea></td>
                              </tr>
                              <tr align="left"> 
                                <td colspan="2">&nbsp;</td>
                              </tr>
                              <tr> 
                                <td align="left" valign="top" class="txtBold">&nbsp;&nbsp;&nbsp;<? echo $txPalavrasChave; ?></td>
                                <td align="left" valign="top"><textarea name="asAssunto2" cols="60" rows="5" class="req"><? echo $asAssunto2; ?></textarea>	
                                  <div align="left"><? echo $txDigitePalSep; ?></div>
                                  <br /></td>
                              </tr>
                              <tr> 
                                <td align="left" valign="top" class="txtBold"><? echo $txResumo; ?></td>
                                <td><textarea name="rsResumo" cols="60" rows="20" class="req"><? echo $rsResumo; ?></textarea></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table>
                     
                      <br>
                      <div> 
                        <table width="100%" border="0" cellpadding="3" cellspacing="0" class="loginTable">
                          <tr align="center" class="txt"> 
                            <td colspan="2" class="tdBiblioteca"><strong><? echo $txOutroIdioma; ?></strong></td>
                          </tr>
                          <tr align="left" valign="middle" class="tdAlternado"> 
                            <td><strong><? echo $txIdioma; ?></strong></td>
                            <td> <select name="tsIdiomaALT" class="input">
                                <option value='' selected><? echo $txSelecionar; ?></option>
                                <?
							$SEL_id="SELECT * FROM Idiomas WHERE idIdiomaPais='$idioma_sistema' ORDER BY idIdioma";
                            $SEL_id_query=mysql_db_query($base,$SEL_id,$conexao);
                            $SEL_id_RES=mysql_fetch_array($SEL_id_query);
							
							while ($SEL_id_RES!="") {
							$idSigla=$SEL_id_RES["idSigla"];
							$idIdioma=$SEL_id_RES["idIdioma"];
							?>
                                <option value="<? echo $idSigla; ?>"><? echo $idIdioma; ?></option>
                                <? 
						    $SEL_id_RES=mysql_fetch_array($SEL_id_query);
						   } 
                      
                     ?>
                              </select></td>
                          </tr>
                          <tr class="tdAlternado"> 
                            <td align="left" valign="top">&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr class="tdAlternado"> 
                            <td align="left" valign="top"><strong><? echo $txTitulo; ?></strong></td>
                            <td><textarea name="ttTitulo2" cols="60" rows="5" id="textarea2" class="input"><?  echo $ttTitulo2; ?></textarea></td>
                          </tr>
                          <tr class="tdAlternado"> 
                            <td align="left" valign="top">&nbsp; </td>
                            <td>&nbsp; </td>
                          </tr>
                          <tr class="tdAlternado"> 
                            <td align="left" valign="top"><strong><? echo $txPalavrasChave; ?></strong></td>
                            <td align="left" valign="top" class="txt"> <textarea name="asAssunto3" cols="60" rows="5" class="input"><? echo $asAssunto3; ?></textarea> 
                              <div> <? echo $txDigitePalSep; ?></div>
                              <br /> </td>
                          </tr>
                          <tr class="tdAlternado"> 
                            <td align="left" valign="top"><strong><? echo $txResumo; ?></strong></td>
                            <td align="left"><textarea name="rsResumo2" cols="60" rows="20" class="input"><?  echo $rsResumo2; ?></textarea> 
                              <strong> 
                              <input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador2" value="<? echo $tsIdentificador; ?>">
                              </strong></td>
                          </tr>
                        </table>
                      </div>
                      <br>
                      <div> </div>
                      <div> 
                        <table width="100%" height="30" border="0" cellpadding="5" cellspacing="0" class="loginTable">
                          <tr> 
                            <td align="right" valign="middle"> <input name="Inserir" type="submit" class="botao" id="Inserir" value="<? echo $txIniciar; ?> &raquo;"> 
                            </td>
                          </tr>
                        </table>
                      </div>
                    </form> <? } ?></td>
              </tr>
            </table>
			  <br />
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