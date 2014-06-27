<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
session_unregister('VtsIdentificador');
session_unregister('VpfCod');
session_unregister('tsIdentificador');
session_unregister('pfCod');
session_unregister('protecao');

if($_REQUEST['diaBegin'] and $_REQUEST['mesBegin'] and $_REQUEST['anoBegin']) $begin =$_REQUEST['anoBegin'].'-'.$_REQUEST['mesBegin'].'-'.$_REQUEST['diaBegin'];
else if($diaBegin and $mesBegin and $anoBegin) $begin =$anoBegin.$mesBegin.$diaBegin;
if($_REQUEST['diaEnd'] and $_REQUEST['mesEnd'] and $_REQUEST['anoEnd']) $end =$_REQUEST['anoEnd'].'-'.$_REQUEST['mesEnd'].'-'.$_REQUEST['diaEnd'];
else if($diaEnd and $mesEnd and $anoEnd) $end =$anoEnd.$mesEnd.$diaEnd;

if($_REQUEST['Exportar']=="Exportar"){
  if($begin!=null || $end!=null){
    
	include_once('../conexao/conexao_fim.php');
	mysql_select_db($base_fim);
	include_once('./biblioteca/marc21.php');	
	$marc = new TEDE_MARC($conexao_fim);
	$marc->setBegin($begin);
	$marc->setEnd($end);
	// o metodo dump inicia o download do DUMP em MARC21 dos registros do TEDE dentro do 
	// intervalo solicitado
	header('Content-type: x-application/x-max-extra-dunper-force-download');
	header('Content-Disposition: attachment; filename="marc.mrc"');
	echo $marc->dump();
	exit(0);
  }
}

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
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuBib"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
		  //Visualizar a Biblioteca dessa Conta
		  require "../conexao/conexao.inc";
require "../conexao/funcao_erro.inc";
		  $SEL_bd="SELECT * FROM BibliotecaDepositaria WHERE bdCod=$SbdCod";
          $SEL_bd_query=check_mysql_db_query($base,$SEL_bd,$conexao);
          $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
		  
		  $bdNome=$SEL_bd_RES["bdNome"];
		  echo $bdNome;
		  ?>
                  <br>
                  </span> </td>
              <tr> 
                <td height="14" class="td"><span class="txtBold"><? echo $txCadastro; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_alunos.php?v=Editar'"><a href="../tde_biblioteca/visualizar_alunos.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAutor; ?></a></td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_contribuidores.php?v=Editar'"><a href="../tde_biblioteca/visualizar_contribuidores.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txContribuidor; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='../tde_biblioteca/visualizar_afiliacao.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_biblioteca/visualizar_afiliacao.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txAfiliacao; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='../tde_biblioteca/visualizar_agfomento.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_biblioteca/visualizar_agfomento.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txAgenciaFomento; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onClick="location='../tde_biblioteca/visualizar_instituicaodefesa.php?pag=VisCad'" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_biblioteca/visualizar_instituicaodefesa.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txInstituicaoDefesa; ?></a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="14" class="td"><span class="txtBold"><? echo $txSubmissao; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/visualizar_tde_iniciadas.php?pag=VisCad'"><a href="../tde_biblioteca/visualizar_tde_iniciadas.php?pag=VisCad" class="linkpreto">&raquo; 
                  <? echo $txTDE; ?></a></td>
              </tr>
              <tr> 
                <td height="14" class="td">&nbsp;</td>
              </tr>
              <br>
              <br>
              <? session_start();
if(session_is_registered("ScnTipo")) {
if ($ScnTipo=="MasterCataloga") {
?>
              <tr> 
                <td class="td"> <span class="txtBold"> <? echo $txTDEPublicadas; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/tde_bib.php?v=Publicadas'"><a href="../tde_biblioteca/tde_bib.php?v=Publicadas" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a> </td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/tde_bib.php?v=Publicadas'"><a href="../tde_biblioteca/tde_bib.php?v=Publicadas" class="linkpreto">&raquo; 
                  <? echo $txVisualizar; ?></a> </td>
              </tr>
			   <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_marc/exportador.php'"><a href="../tde_marc/exportador.php" class="linkpreto">&raquo; 
                  <? echo $txExportador; ?></a> </td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <? } }?>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/logout.php'"><a href="../tde_biblioteca/logout.php" class="linkpreto">&laquo; 
                  <? echo $txSair; ?></a></td>
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
          <td height="100%" valign="top" class="tdConteudo"><br>
            <div> <form action="exportador.php" method="post">
                <table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="loginTable">
                  <tr>
                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                        <tr align="center"> 
                          <td colspan="2" class="tdBiblioteca"><span class="txtBold"><? echo $txExportador; ?></span></td>
                        </tr>
                        <tr> 
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr> 
                          <td colspan="2" class="txtBold">Exportar todos os registros publicados:</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr> 
                          <td>a partir da data</td>
                          <td> 
                            <select name="diaBegin" class="select" id="select2">
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
                            <select name="mesBegin" class="select" id="select5">
                              <option value="00">-</option>
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=check_mysql_db_query($base,$SEL_ms,$conexao);
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
                            <input name="anoBegin" type="text" class="numero" id="ano2" value="<? if ($ano!="") { echo $ano; } else { $data_atual=date('Y'); echo $data_atual; }?>" size="5" maxlength="4" onKeyPress="Numero(this);">
                            (<? echo $txAAAA; ?>)</td>
                        </tr>
                        <tr> 
                          <td>até a data</td>
                          <td> 
                            <select name="diaEnd" class="select" id="select">
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
                            <select name="mesEnd" class="select" id="select3">
                              <option value="00">-</option>
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=check_mysql_db_query($base,$SEL_ms,$conexao);
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
                            <input name="anoEnd" type="text" class="numero" id="anoBegin" value="<? if ($ano!="") { echo $ano; } else { $data_atual=date('Y'); echo $data_atual; }?>" size="5" maxlength="4" onKeyPress="Numero(this);">
                            (<? echo $txAAAA; ?>) </td>
                        </tr>
                        <tr> 
                          <td>Tamanho máximo do resumo:</td>
                          <td><select name="tam_resumo" class="input">
                              <option value="1900" selected>2 Kb</option>
                              <option value="3072">3 Kb</option>
                              <option value="4096">4 Kb</option>
                              <option value="null">Completo</option>
                            </select> </td>
                        </tr>
                        <tr align="right"> 
                          <td>&nbsp;</td>
                          <td align="left">&nbsp;</td>
                        </tr>
                        <tr align="right"> 
                          <td>&nbsp;</td>
                          <td align="left"><input type="submit" class="botao" name="Exportar" value="Exportar"/></td>
                        </tr>
                        <tr align="right"> 
                          <td>&nbsp;</td>
                          <td align="left">&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
              </form></div>
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
