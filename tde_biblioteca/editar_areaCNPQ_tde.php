<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../tde_biblioteca/login.php");
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/Templates/tde_biblio_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?> 
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | BIBLIOTECA | </title>
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
                        <span class="tituloPos"> | 
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
                        <? echo $txInicio_T; ?>
                        </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txBusca_T; ?>
                        </a> | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txAutor_T; ?>
                        </a> | <a href="javascript:changeMenu(3,'../');" class="menu" onMouseOver="javascript:overMenu(3,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txPosG_T; ?>
                        </a> | <a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txBiblioteca_T; ?>
                        </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txAdministracao_T; ?>
                        </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(4,'../');">
                        <? echo $txContato_T; ?>
                        </a> |</td>
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

if ($Editar!="" or $cod=="Excluir" or $cod=="Editar") {
require "biblioteca/manutencao_ass.inc";
require "../conexao/conexao.inc";
}
?>
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" align="left" valign="top" class="subMenuBib">
            <? require "menu_tde.php"; ?>
          </td>
          <td align="center" valign="top" class="tdConteudo"> <br>
            <?		  		         
$selas="select * from Assunto where tsIdentificador=$tsIdentificador and asEsquema='Tabela CNPQ'";
$selas_query=mysql_db_query($base,$selas,$conexao);
$selasRESP=mysql_fetch_array($selas_query);
$asCod=$selasRESP[asCod];
$asAssunto=$selasRESP["asAssunto"];
$asIdioma=$selasRESP["asIdioma"];
$asEsquema=$selasRESP["asEsquema"];

		  if ($sucesso!="" or $erro!="") { ?>
            <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td align="center" valign="middle">  <? echo $sucesso; echo $erro;?> 
                </td>
              </tr>
            </table>
            <br>
            <table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                <td align="left" valign="middle"> <?
				if ($areaCNPQV==1) {
$areaCNPQV="Exatas e da Terra";
}
if ($areaCNPQV==2) {
$areaCNPQV="Ciências Biológicas";
}
if ($areaCNPQV==3) {
$areaCNPQV="Engenharias";
}
if ($areaCNPQV==4) {
$areaCNPQV="Ciências da Saúde";
}
if ($areaCNPQV==5) {
$areaCNPQV="Ciências Agrárias";
}
if ($areaCNPQV==6) {
$areaCNPQV="Ciências Sociais Aplicadas";
}
if ($areaCNPQV==7) {
$areaCNPQV="Ciências Humanas";
}
if ($areaCNPQV==8) {
$areaCNPQV="Lingüística, Letras e Artes";
}
if ($areaCNPQV==9) {
$areaCNPQV="Outros";
}          
				 echo "<b>".$txArea.": </b>".$areaCNPQV; echo "<br><br><b>".$txSubArea.": </b>".$subArea;?> 
                </td>
              </tr>
            </table>
            <? exit; } ?>
            <form action="" method="post" name="form1" onSubmit="return checkForm(this.name); return true;" >
              <table width="90%" border="0" class="loginTable">
                <tr class="tdBiblioteca"> 
                  <td colspan="2" align="center" class="txtBold"><? echo $txAreaDoCNPQ; ?></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td class="txtBold"><? echo $txArea; ?></td>
                </tr>
                <tr> 
                  <td width="14" height="19">&nbsp;</td>
                  <td> 
                    <?
					if ($AreaCNPQ=="") {				
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
			}
?>
                    <select name="AreaCNPQ" class="req" onChange="submit()">
                      <option value="Selecionar" <? if ($AreaCNPQ=='Selecionar') { echo 'selected'; } ?>><? echo $txSelecionar; ?></option>
                      <option value="1" <? if ($AreaCNPQ==1) { echo 'selected'; } ?>>1 
                      - Ci&ecirc;ncias Exatas e da Terra</option>
                      <option value="2" <? if ($AreaCNPQ==2) { echo 'selected'; } ?>>2 
                      - Ci&ecirc;ncias Biol&oacute;gicas</option>
                      <option value="3" <? if ($AreaCNPQ==3) { echo 'selected'; } ?>>3 
                      - Engenharias</option>
                      <option value="4" <? if ($AreaCNPQ==4) { echo 'selected'; } ?>>4 
                      - Ci&ecirc;ncias da Sa&uacute;de</option>
                      <option value="5" <? if ($AreaCNPQ==5) { echo 'selected'; } ?>>5 
                      - Ci&ecirc;ncias Agr&aacute;rias</option>
                      <option value="6" <? if ($AreaCNPQ==6) { echo 'selected'; } ?>>6 
                      - Ci&ecirc;ncias Sociais Aplicadas</option>
                      <option value="7" <? if ($AreaCNPQ==7) { echo 'selected'; } ?>>7 
                      - Ci&ecirc;ncias Humanas</option>
                      <option value="8" <? if ($AreaCNPQ==8) { echo 'selected'; } ?>>8 
                      - Ling&uuml;&iacute;stica, Letras e Artes</option>
                      <option value="9" <? if ($AreaCNPQ==9) { echo 'selected'; } ?>>9 
                      - Outros</option>
                    </select></td>
                </tr>
              </table> 
            </form>
            <form action="" method="post" name="form" onSubmit="return checkForm(this.name); return true;" >
              <table width="90%" border="0" align="center" cellpadding="5" cellspacing="2" class="loginTable">
                <tr>
                  <td height="19">&nbsp;</td>
                  <td class="txtBold"><? echo $txSubArea; ?></td>
                </tr>
                <tr> 
                  <td width="5" height="19">&nbsp;</td>
                  <td class="txt"><select name="asAssunto1" class="select">
                      <option value="NENHUMA ABAIXO"><? echo $txNENHUMAABAIXO; ?></option>
                      <?

							if ($AreaCNPQ!="") {

							$SEL_ac="SELECT * FROM AreaConhecimento WHERE acCod like '$AreaCNPQ%' ORDER BY acNome";

                            $SEL_ac_query=mysql_db_query($base,$SEL_ac,$conexao);

                            $SEL_ac_RES=mysql_fetch_array($SEL_ac_query);

							}

							while ($SEL_ac_RES!="") {

							$acCod=$SEL_ac_RES["acCod"];

							$acNomeTotal=$SEL_ac_RES["acNome"];

							$acNome=substr("$acNomeTotal",0,50);

							?>
                      <option value="<? echo $acNomeTotal;?>" <?  if ($asAssunto==$acNomeTotal) { echo 'selected';} ?> ><? echo $acNome." - ".$acCod;  ?></option>
                      <? 

						    $SEL_ac_RES=mysql_fetch_array($SEL_ac_query);

						   } ?>
                    </select> <input name="asEsquema" type="hidden" class="input" value="Tabela CNPQ"> 
                  </td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td> <input name="cod" type="hidden" class="input" value="<? echo $Mcod; ?>"> 
                    <input name="tsIdentificador" type="hidden" class="input" value="<? echo $tsIdentificador; ?>"> 
                    <input name="pfCod" type="hidden" class="input" value="<? echo $pfCod; ?>"> 
                    <input name="asCod" type="hidden" class="input" value="<? echo $asCod; ?>"> 
                    <input name="tabelaCNPQ" type="hidden" class="input" value="Sim"> 
                    <input type="hidden" name="AreaCNPQ" value="<? echo $AreaCNPQ; ?>"></td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr> 
                  <td height="20">&nbsp;</td>
                  <td align="right"><input name="Editar" type="submit" class="botao" id="Editar3" value="<? if ($Mcod=="Inserir") { echo $txInserir; } else {echo $txAlterar; }?> &raquo;"></td>
                </tr>
              </table>
              <br>
            </form>
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
