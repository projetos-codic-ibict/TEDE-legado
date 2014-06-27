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
  <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
	<tr> 
	  <td width="139" height="100%" align="left" valign="top" class="subMenuBib">	    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
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
                <td class="td"><span class="txtBold">&raquo; <? echo $txContaAutor; ?></span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='conta_aluno.php'"><a href="conta_aluno.php" class="linkpreto">&raquo; 
                  <? echo $txInserir; ?></a></td>
              </tr>
              <tr> 
                <td class="subMenuOver" onClick="location='visualizar_contas.php?v=Editar'"><a href="visualizar_contas.php?v=Editar" class="linkpreto">&raquo; 
                  <? echo $txAlterar; ?></a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="tde_pos.php" class="linkpreto">&laquo; 
                  <? echo $txMenuPrincipal; ?></a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                 <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
                  <? echo $txAjuda2; ?></a></td>
              </tr>
            </table>
  </td>
  <td height="100%" valign="top" class="tdConteudo">            
  <? if ($sucesso!="" or $erro!="") { ?>
    <div>
	<table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
   <tr> 
		<td align="center" valign="middle"><?echo $sucesso; ?></td>
	  </tr>
	</table><br /></div>
	<? } ?>
	<div>
	<table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
	  <tr> 
		<td>
		<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" valign="middle" class="tdBiblioteca"> 
                        <td colspan="6" class="txtBold"><? echo $txContaAutor; ?></td>
                      </tr>
                      <?
			  //Abre conexao com o banco
				require "../conexao/conexao.inc";
				$estiloTR="tr";
				include "../bibliotecas/funcoes.bib";
				   
								
				$SEL_cn="SELECT * FROM Contas WHERE prCod='$SprCod' and cnTipo='Autor'";
            	$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
           		$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
				
                if ($SEL_cn_RES=="") {  
			
				   
			 ?>
                      <tr class="tdOperacoes"> 
                        <td colspan="6"><? echo $txNenhumRegistroC; ?>.</td>
                      </tr>
                      <? } else { 
					  
			    $SEL_cn_b="SELECT * FROM Contas WHERE cnBloqueado='1' and cnTipo='Autor'";
            	$SEL_cn_b_query=mysql_db_query($base,$SEL_cn_b,$conexao);
           		$SEL_cn_b_RES=mysql_fetch_array($SEL_cn_b_query);
					  ?>
                      <tr class="tdOperacoes"> 
                        <td><? echo $txAutor; ?></td>
                        <td width="30"><? echo $txInicio; ?></td>
                        <td width="30"><? echo $txTermino; ?></td>
                        <? if ($SEL_cn_b_RES!="") { ?>
						<td width="80" align="center" valign="middle"><? echo $txBloqueado; ?></td>
						<? } ?>
                        <td width="50" align="left" valign="middle"><? echo $txStatus; ?></td>
                        <td width="50" align="center" valign="middle"><? echo $txAlterar; ?></td>
                      </tr>
                      <?
				    $SEL_tspf="SELECT * FROM TSPF WHERE prCod='$SprCod' and tspfTipo='Autor' and tsIdentificador<>'0' and tspfDisponivel<>'9' and tspfDisponivel<>'0'";
           		$SEL_tspf_query=mysql_db_query($base,$SEL_tspf,$conexao);
          		$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
					
					while ($SEL_tspf_RES!="") {
					
					mudaEstiloTR(&$estiloTR);
					
					$tsIdentificador=$SEL_tspf_RES["tsIdentificador"];
					$pfCod=$SEL_tspf_RES["pfCod"];
			        $tspfDisponivel=$SEL_tspf_RES["tspfDisponivel"];
					$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod='$pfCod'";
            		$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
           			$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
					$pfNome=$SEL_pf_RES["pfNome"];
					$SEL_cn="SELECT * FROM Contas WHERE pfCod='$pfCod' and cnTipo='Autor'";
            		$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
           			$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
					$cnCod=$SEL_cn_RES["cnCod"];
					$cnDataInicio=$SEL_cn_RES["cnDataInicio"];
					$cnDataInicio_split=split("-",$cnDataInicio);
					$cnDataInicio=$cnDataInicio_split[2]."/".$cnDataInicio_split[1]."/".$cnDataInicio_split[0];
					$cnDataTermino=$SEL_cn_RES["cnDataTermino"];
					$cnDataTermino_split=split("-",$cnDataTermino);
					$cnDataTermino=$cnDataTermino_split[2]."/".$cnDataTermino_split[1]."/".$cnDataTermino_split[0];
					$cnBloqueado=$SEL_cn_RES["cnBloqueado"];
					
					if ($cnCod!="") {
					
					if ($cnCod=="$EVcnCod") {
				    $estiloTR="trResposta";
				    }
					?>
                      <tr> 
                        <td class=<? echo $estiloTR; ?>> 
                          <?
						  echo $pfNome; 
						  ?>
                        </td>
                        <td class=<? echo $estiloTR; ?>><? echo $cnDataInicio; ?></td>
                        <td class=<? echo $estiloTR; ?>><? echo $cnDataTermino; ?></td>
                         <? if ($SEL_cn_b_RES!="") { ?>
						<td align="center" valign="middle" class=<? echo $estiloTR; ?>><? if ($cnBloqueado=="1") { echo "<img src=\"../tde_layout1/imagens/cadeado.gif\" / alt=\"bloqueado\">"; } ?></td>
						<? } ?>
                        <td width="50" align="left" valign="middle" class=<? echo $estiloTR; ?>> 
                          <?					 
					  if ($tspfDisponivel=="1") { 
					  if ($SEL_cn_RES!="") {
					  echo "c/ autor";
					  } else {
					  echo "<A href='conta_aluno.php'  class='linkvermelho'>Criar Conta</A>";
					  } 
					  } 
					  if ($tspfDisponivel=="2") { 
					  echo "<A href='alterar_tde.php?VtsIdentificador=$tsIdentificador&VpfCod=$pfCod&VprCod=$SprCod'  class='linkvermelho'>Revisar</A>"; 
					  }
					  if ($tspfDisponivel=="3") { 
					  echo "c/ catalogador"; 
					  }
					  ?>
                        </td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>><a href="editar_conta_aluno.php?cnCod=<? echo $cnCod; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto"><img src="../tde_layout1/imagens/alterar.gif" / alt="alterar" border="0" align="absmiddle"></a></td>
                      </tr>
                      <? }
					$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
					} }
					
					?>
                    </table></td>
              </tr>
            </table><br></div>
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

