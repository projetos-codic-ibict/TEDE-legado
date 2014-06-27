<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/TemplatesTESTE/tde_pos_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/idioma_sistema.bib";
?>
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Visualiza&ccedil;&atilde;o de Alunos Cadastrados</title>
<!-- InstanceEndEditable --> 
<link href="../tde_layout1/estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_pos.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="../tde_layout1/scripts/menu.js"></script> 
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
    <td height="78" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="80" align="center" valign="top" class="subMenuBib"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><img src="../tde_layout1/imagens/logo_inst.jpg" alt="Logo da Institui&ccedil;&atilde;o" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></td>
              </tr>
              <tr> 
                <td width="138" height="20" align="left" valign="top"><img src="../tde_layout1/imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
          </table></td>
          <td width="31" height="80" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuPos"><img src="../tde_layout1/imagens/menuSep_pos.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td class="tdConteudo">&nbsp;</td>
            </tr>
          </table>
          </td>
          <td width="100%" height="80" align="left" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle">SISTEMA DE PUBLICA&Ccedil;&Atilde;O 
                        ELETR&Ocirc;NICA DE TESES E DISSERTA&Ccedil;&Otilde;ES<span class="tituloPos"> 
                        | P&Oacute;S-GRADUA&Ccedil;&Atilde;O |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuPos"><img src="../tde_layout1/imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="34" align="center" valign="top"><table width="100%" height="34" border="0" align="left" cellpadding="0" cellspacing="0" class="menuPos">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(3,'../');">IN&Iacute;CIO</a> 
                        | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(3,'../');">BUSCA</a> 
                        | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(3,'../');">AUTOR</a> 
                        | <a href="javascript:changeMenu(3,'../');" class="menu" onMouseOver="javascript:overMenu(3,'../');" onMouseOut="javascript:overMenu(3,'../');">P&Oacute;S-GRADUA&Ccedil;&Atilde;O</a> 
                        | <a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(3,'../');">BIBLIOTECA</a> 
                        | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(3,'../');">ADMINISTRA&Ccedil;&Atilde;O</a> 
                        | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(3,'../');">CONTATO</a> 
                        |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="../tde_layout1/imagens/menuTile_pos.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                    <tr> 
                      <td height="10" align="left" valign="top" bgcolor="#ebebeb">&nbsp;</td>
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
	 <td class="td"> 
		<span class="txtBold">
		<?
		  //Visualizar a Biblioteca dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_bd="SELECT * FROM BibliotecaDepositaria WHERE bdCod=$SbdCod";
          $SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
          $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
		  
		  $bdNome=$SEL_bd_RES["bdNome"];
		  echo $bdNome;
		  ?>
	  </span>
	 </td>
	 </tr>
	 <tr> 
		        <td class="td"><span class="txtBold">&raquo;Autor</span></td>
	 </tr>
	  <tr> 
	   <td height="12" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_aluno.php'"><a href="../Copy%20of%20tde_pos/inserir_aluno.php" class="linkpreto">&raquo;Inserir</a></td>
	  </tr>
	  <tr> 
		        <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_alunos.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_alunos.php?v=Editar" class="linkpreto">&raquo;Alterar/Excluir</a></td>
	  </tr>
	  <tr> 
		<td class="td">&nbsp;</td>
	  </tr>
	  <tr> 
		<td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="../Copy%20of%20tde_pos/tde_pos.php" class="linkpreto">&laquo; Menu Principal</a></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    </tr>

  </table></td>
          <td height="100%" align="center" valign="top" class="tdConteudo">
            <? if ($sucesso!="" or $erro!="") { ?>
            <div><table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td align="center" valign="middle"><? echo $erro; echo $sucesso; ?></td>
              </tr>
            </table></div><br />
          
			<? } ?>            
	<div><table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
	  <tr> 
		<td><table width="100%" border="0" cellpadding="3" cellspacing="0" class="txt">
                      <tr align="center" valign="middle" class="tdBiblioteca"> 
                        <td height="20" colspan="5"><span class="txtBold">Autor</span></td>
                      </tr>
                      <?
			require "../conexao/conexao.inc";
//Selecionar biblioteca
$SEL_pf="SELECT * FROM TSPF INNER JOIN PessoaFisica ON (TSPF.pfCod = PessoaFisica.pfCod) WHERE tspfTipo = 'Autor' and prCod='$SprCod' and tspfDisponivel!='9' ORDER BY pfNome";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

if ($SEL_pf_RES=="") {
			?>
                      <tr class="tdOperacoes"> 
                        <td height="20" colspan="5">Nenhum registro cadastrado.</td>
                      </tr>
                      <? } else { ?>
                      <tr class="tdOperacoes"> 
                        <td height="20" colspan="2">Nome</td>
                        <td width="100" height="20" align="left" valign="middle">Status 
                          da TDE</td>
                        <td width="50" align="center" valign="middle">Alterar</td>
                        <td width="50" align="center" valign="middle">Excluir</td>
                      </tr>
                      <?
				$estiloTR="tr";
				include "../bibliotecas/funcoes.bib";
				 
				while ($SEL_pf_RES!="") {
				
				mudaEstiloTR(&$estiloTR);
				
				$tsIdentificador=$SEL_pf_RES["tsIdentificador"];
				$pfCod=$SEL_pf_RES["pfCod"];
				$pfNome=$SEL_pf_RES["pfNome"];
				$pfLattes=$SEL_pf_RES["pfLattes"];
				$pfCPF=$SEL_pf_RES["pfCPF"];
				$pfEmail=$SEL_pf_RES["pfEmail"];
				
				$tspfDisponivel=$SEL_pf_RES["tspfDisponivel"];
				$SEL_cn="SELECT * FROM Contas WHERE pfCod='$pfCod' and cnTipo='Autor'";
            	$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
           		$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
				
				$SEL_pfpj="SELECT pjCod FROM PFPJ WHERE pfCod='$pfCod'";
            	$SEL_pfpj_query=mysql_db_query($base,$SEL_pfpj,$conexao);
           		$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);
				
				$pjCod=$SEL_pfpj_RES["pjCod"];
				
				$SEL_pj="SELECT pjNome FROM PessoaJuridica WHERE pjCod='$pjCod'";
            	$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
           		$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
				
				$pjNome=$SEL_pj_RES["pjNome"];
				
				if ($pfCod=="$EVpfCod") {
				$estiloTR="trResposta";
				}
				?>
                      <tr> 
                        <td colspan="2" class=<? echo $estiloTR; ?>><?echo $pfNome;?></td>
                        <td class=<? echo $estiloTR; ?>> 
                          <? 
					if ($tspfDisponivel=="9") { 
					  echo  "publicada"; 
					  } 
					  if ($tspfDisponivel=="0") { 
					  if ($tsIdentificador=="0") {
					  echo "não iniciado";
					  } else {
					  echo  "liberar"; 
					  } }
					  if ($tspfDisponivel=="1") { 
					  if ($SEL_cn_RES!="") {
					  echo "c/ autor";
					  } else {
					  echo "criar conta";
					  } 
					  } 
					  if ($tspfDisponivel=="2") { 
					  echo "revisar"; 
					  }
					  if ($tspfDisponivel=="3") { 
					  echo "c/ catalogador"; 
					  }
					  ?>
                        </td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>><a href="../Copy%20of%20tde_pos/editar_aluno.php?pfCod=<? echo $pfCod; ?>" class="linkpreto"><img src="../tde_layout1/imagens/alterar.gif" / alt="alterar" hspace="0" vspace="0" border="0" align="absmiddle"></a></td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>><a href="../Copy%20of%20tde_pos/excluir_alunos.php?pfCod=<? echo $pfCod; ?>" class="linkvermelho"><img src="../tde_layout1/imagens/excluir.gif" / alt="excluir" hspace="0" vspace="0" border="0" align="absmiddle"></a></td>
                      </tr>
                      <? if ($EVpfCod=="$pfCod") {
					   if ($pfLattes!="") { ?>
                      <tr> 
                        <td width="1%" class=<? echo $estiloTR; ?>><span class="txtBold">Lattes</span></td>
                        <td class=<? echo $estiloTR; ?>><?echo $pfLattes;?></td>
                        <td class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                      </tr>
					  <?  } if ($pfCPF!="") {?>
                      <tr> 
                        <td class=<? echo $estiloTR; ?>><? echo $txCPF; ?></td>
                        <td class=<? echo $estiloTR; ?>><? echo $pfCPF;?></td>
                        <td class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                      </tr>
					  <?  } if ($pfEmail!="") {?>
                      <tr> 
                        <td class=<? echo $estiloTR; ?>><span class="txtBold">E-mail</span></td>
                        <td class=<? echo $estiloTR; ?>><? echo $pfEmail;?></td>
                        <td class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                      </tr>
                      <? } if ($pjNome!="") {?>
                      <tr> 
                        <td class=<? echo $estiloTR; ?>> <span class="txtBold">Afilia&ccedil;&atilde;o</span></td>
                        <td class=<? echo $estiloTR; ?>><? echo $pjNome; ?> </td>
                        <td class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                        <td width="50" align="center" valign="middle" class=<? echo $estiloTR; ?>>&nbsp;</td>
                      </tr>
                      <? } ?>
                      <? } $SEL_pf_RES=mysql_fetch_array($SEL_pf_query); } }?>
                    </table></td>
  </tr>
	</table>  
	  <br />
	</div></td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap class="subMenuBib"><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  vers&atilde;o 1.0 | COPYRIGHT &copy;<br>
                desenvolvido para IE 5.0+</td>
              </tr>
          </table></td>
          <td width="100%" valign="top"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
              <tr align="center" valign="middle"> 
                <td width="30%" align="center"><a href="http://www.ibict.br" target="_blank" class="menu"><img src="../tde_layout1/imagens/ibict_logo_tede.jpg" alt="www.ibict.br" name="ibictLogo" width="90" height="33" hspace="20" vspace="0" border="0" id="ibictLogo"></a></td>
                <td width="32%" align="center"><a href="http://www.bdb.br" target="_blank" class="menu"><img src="../tde_layout1/imagens/bdb_logo_tede.jpg" alt="http://www.bdb.br" name="bdbLogo" width="77" height="33" hspace="20" vspace="0" border="0" id="bdbLogo"></a></td>
                <td width="38%" align="center" valign="middle"><a href="http://bdtd.bdb.br/" target="_blank" class="menu"><img src="../tde_layout1/imagens/teses_logo_tede.jpg" alt="http://bdtd.bdb.br" name="bdtdLogo" width="110" height="33" hspace="20" vspace="0" border="0" id="bdtdLogo"></a></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
<? } ?>