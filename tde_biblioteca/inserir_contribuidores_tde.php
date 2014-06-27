<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Inclus&atilde;o de Contribuidor</title>
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
require "../conexao/conexao.inc";

if (($Inserir!="" and $tspfTipo!="") or $cod=="Excluir") {
require "biblioteca/inserir_contribuidores_tde.inc";
require "../conexao/conexao.inc";
} else {
if ($Inserir!="" and $tspfTipo=="") {
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";
$erro=$e019;
}
}
?>
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" align="left" valign="top" class="subMenuBib">
            <? require "menu_tde.php"; ?>
          </td>
          <td align="center" valign="top" class="tdConteudo">
            <? if ($sucesso!="" or $erro!="") { ?>
            <div>
              <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td align="center" valign="middle"><? echo $erro; echo $sucesso; ?></td>
                </tr>
              </table>
            </div>
            <br /> 
            <? } ?>
            <br>
            <div>
				<table width="90%" cellpadding="5" class="loginTable">
				<tr>
				<td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                      <?
		         
	$sel2="select * from TSPF where tsIdentificador=$tsIdentificador and tspfTipo<>'Autor'";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

if ($sel2RESP=="") {
?>
                      <tr align="center" class="tdBiblioteca"> 
                        <td colspan="4" class="txtBold"><? echo $txContribuidorTDE; ?></td>
                      </tr>
                      
                      <? } else {

		?>
		<tr align="center" class="tdBiblioteca"> 
                        <td colspan="4" class="txtBold"><? echo $txContribuidorTDE; ?></td>
                      </tr>
                      <tr bgcolor="<? echo $cor; ?>" class="tdOperacoes"> 
                        <td><? echo $txNome; ?></td>
                        <td><? echo $txPapel; ?></td>
                        <td>&nbsp;</td>
                        <td align="center" valign="middle"><? echo $txExcluir; ?></td>
                      </tr>
                      <?
	$estiloTR="tr";
				include "../bibliotecas/funcoes.bib";
					
					  while ($sel2RESP!="") {
					  
					  mudaEstiloTR(&$estiloTR);
					  
$MpfCod=$sel2RESP[pfCod];
$tspfTipo=$sel2RESP[tspfTipo];

$selpf="select * from PessoaFisica where pfCod=$MpfCod";
$selpf_query=mysql_db_query($base,$selpf,$conexao);
$selpfRESP=mysql_fetch_array($selpf_query);
$pfNome=$selpfRESP["pfNome"];


?>
                      <tr class=<? echo $estiloTR; ?>> 
                        <td><? echo $pfNome; ?></td>
                        <td><? echo $tspfTipo; ?></td>
                        <td width="10">&nbsp;</td>
                        <td width="100" align="center" valign="middle"><a href="inserir_contribuidores_tde.php?cod=Excluir&MpfCod=<? echo $MpfCod; ?>&pfCod=<? echo $pfCod; ?>&tsIdentificador=<? echo $tsIdentificador; ?>" class="linkpreto">&nbsp;<img src="../tde_layout1/imagens/excluir.gif" / alt="excluir" hspace="0" vspace="0" border="0" align="absmiddle"></a></td>
                      </tr>
                      <?
		$sel2RESP=mysql_fetch_array($sel2_query);
	}}
		?>
                    </table>
				</td>
				</tr>
			  </table><br />
</div>
            <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td> 
				    <form name="form1" method="post" action="">
                      
                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                      <tr> 
                        <td colspan="2" align="left"><? echo $txEntre3PrimLetCont; ?></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><input name="busca" type="text" class="input"  size="4" maxlength="3" value="<? echo $busca; ?>"> 
                          <input name="Submit" type="submit" class="botao" value="<? echo $txLocalizar; ?> &raquo;"> 
                        </td>
                      </tr>
                      <? if ($busca!="" or $SpfCod!="") { ?>
                      <tr>
                        <td width="10%">&nbsp;</td>
                        <td width="90%">&nbsp;</td>
                      </tr>
                      <tr> 
                        <td height="22"> <span class="txtBold"><? echo $txNome; ?></span> </td>
                        <td><select name="SpfCod" onChange="submit()">
                            <? if ($SpfCod!="") { 
				  $pfCod_split=split(",",$SpfCod);
				  $VpfNome=$pfCod_split[1];
				  $MpfCod=$pfCod_split[0];
				  ?>
                            <option value="<? echo $MpfCod; ?>" selected><? echo $VpfNome; ?></option>
                            <? } ?>
                            <option value="">Seleciona</option>
                            <? 
					
$SEL_pf="SELECT * FROM PessoaFisica WHERE pfNome like '$busca%' and pfContribuidor='1' ORDER BY pfNome";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

while ($SEL_pf_RES!="") {
$pfCods[]=$SEL_pf_RES['pfCod'];

$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
}

/* $SEL_pf2="SELECT * FROM TSPF INNER JOIN PessoaFisica ON (TSPF.pfCod = PessoaFisica.pfCod) WHERE tspfTipo = 'Autor'";

$SEL_pf2_query=mysql_db_query($base,$SEL_pf2,$conexao);
$SEL_pf2_RES=mysql_fetch_array($SEL_pf2_query);

while ($SEL_pf2_RES!="") {
$pfCod_autor[]=$SEL_pf2_RES['pfCod'];

$SEL_pf2_RES=mysql_fetch_array($SEL_pf2_query);
}*/

$qtd_pf=count($pfCods);

				
				for ($i=0; $i<$qtd_pf; $i++) {
								
				$verifica=in_array($pfCods[$i],$pfCod_autor);
				
				if ($verifica!="true") {
				
				$SEL_pf3="SELECT * FROM PessoaFisica WHERE pfCod='$pfCods[$i]'";
                $SEL_pf3_query=mysql_db_query($base,$SEL_pf3,$conexao);
                $SEL_pf3_RES=mysql_fetch_array($SEL_pf3_query);
				
				$ApfCod=$SEL_pf3_RES["pfCod"];
				$pfNome=$SEL_pf3_RES["pfNome"];
											?>
                            <option value="<?echo $ApfCod.','.$pfNome;?>"><?echo $pfNome;?></option>
                            <?
				} }
				 ?>
                          </select> <input name="pfCod2" type="hidden" class="input" value="<?echo $pfCod;?>"> 
                          <input name="tsIdentificador2" type="hidden" class="input" id="tsIdentificador25" value="<?echo $tsIdentificador;?>"></td>
                     
					  </tr>
                      <? }
							if ($SpfCod!="") {
			
			$pfCod_split=split(",",$SpfCod);
			$MpfCod=$pfCod_split[0];
			$prCod=$pfCod_split[1];
			
			$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$MpfCod";
            $SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
            $SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
			
			$MpfCod=$SEL_pf_RES["pfCod"];
			$pfNome=$SEL_pf_RES["pfNome"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			$pfLattes=$SEL_pf_RES["pfLattes"];
			$pfCPF=$SEL_pf_RES["pfCPF"];
            $pfEmail=$SEL_pf_RES["pfEmail"];
							
							 ?>
                      <tr> 
                        <td height="22" class="txtBold"><? echo $txCitacao; ?></td>
                        <td><? echo $pfCitacao; ?></td>
                      </tr>
                      <tr> 
                        <td height="22" class="txtBold"><? echo $txCPF; ?></td>
                        <td><? echo $pfCPF; ?></td>
                      </tr>
                      <tr> 
                        <td height="22" class="txtBold"><? echo $txEMail; ?></td>
                        <td><? echo $pfEmail; ?></td>
                      </tr>
                      <tr> 
                        <td colspan="2"> </td>
                      </tr>
                      <? } ?>
                    </table>
                  </form>
				   
					
                  <? if ($SpfCod!="") { ?>
                  <form name="form" action="" method="post" enctype="multipart/form-data" >
                      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                        <tr class="tdBiblioteca"> 
                          
                        <td align="center" valign="middle" class="txtBold"><? echo $txPapelDoContribuidor; ?></td>
                        </tr>
                        <tr> 
                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td class="txtBold">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr> 
                              <td width="9%" class="txtBold"><? echo $txPapel; ?></td>
                              <td width="91%">
							   
							  <select name="tspfTipo" class="select" id="tspfTipo">
                                  <option value=""><? echo $txSelecionar; ?></option>
                                  <?
								  require "../conexao/conexao.inc";
								  $SEL_pp="SELECT * FROM Papel WHERE ppIdiomaPais='$idioma_sistema' ORDER BY ppNome DESC";
           						  $SEL_pp_query=mysql_db_query($base,$SEL_pp,$conexao);
            					  $SEL_pp_RES=mysql_fetch_array($SEL_pp_query);
			                      
			                      while ($SEL_pp_RES!="") {
								  $ppNome=$SEL_pp_RES["ppNome"];
			                      ?>
								  <option value="<? echo $ppNome; ?>"><? echo $ppNome; ?></option>
                                 <?
								 $SEL_pp_RES=mysql_fetch_array($SEL_pp_query);
								 }
								 ?>
                                </select></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td align="right" valign="bottom">&nbsp;</td>
                        </tr>
                        <tr> 
                          <td align="right" valign="bottom"><input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador" value="<?echo $tsIdentificador;?>"> 
                            <input name="cod" type="hidden" class="input" value="Inserir"> 
                            <input name="MpfCod" type="hidden" class="input" id="pfCod" value="<?echo $MpfCod;?>"> 
                            <input name="pfCod" type="hidden" class="input" value="<?echo $pfCod;?>"> 
                            <input name="Inserir" type="submit" class="botao" value="<? echo $txInserir; ?> &raquo;"> 
                          </td>
                        </tr>
                    </table>
                  </form>
                   <? } ?>
                </td></tr>
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
<!-- InstanceEnd --></html>
<? } ?>
