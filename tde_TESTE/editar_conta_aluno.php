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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Edi&ccedil;&atilde;o da Conta do Aluno</title>
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
          <td width="139" height="80" align="center" valign="top" class="subMenuPos"><table width="100%" height="80"  border="0" align="left" cellpadding="0" cellspacing="0">
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
	
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}
//-->
</script>

      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" valign="top" class="subMenuPos"> 
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> <span class="txtBold"> 
                  <?
				  
		  if ($Alterar!="") {

          require "biblioteca/manutencao_contas.inc";
          }

		  //Visualizar o PRograma dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_pr="SELECT * FROM Programa WHERE prCod=$SprCod";
          $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
          $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  $prNome=$SEL_pr_RES["prNome"];
		  echo "Programa: ".$SprCod;
		  echo "<br>".$prNome."<br>"; 
		  
		  ?>
                  <br>
                  </span> </td>
              </tr>
              <tr> 
                <td class="td"><span class="txtBold">&raquo; Conta Autor</span></td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='conta_aluno.php'"><a href="../Copy%20of%20tde_pos/conta_aluno.php" class="linkpreto">&raquo; 
                  Inserir</a></td>
              </tr>
              <tr> 
                <td class="subMenuOver" onClick="location='visualizar_contas.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_contas.php?v=Editar" class="linkpreto">&raquo; 
                  Alterar</a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td height="13" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="../Copy%20of%20tde_pos/tde_pos.php" class="linkpreto">&laquo; 
                  Menu Principal</a></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
              </tr>
            </table></td>
          <td height="100%" align="center" valign="top" class="tdConteudo">
            <? if ($sucesso!="" or $erro!="") { ?>
			<div>
			<table width="90%" height="68" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr>                       
			  <td height="66" align="center" valign="middle" class="txt">					  
			  <? echo $sucesso; echo "<p class='sucesso'>".$com."</p>";?>
			 </td>
              </tr>
            </table><br />
</div>            
			<?
			exit;
			}


$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod='$pfCod'";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

$pfNome=$SEL_pf_RES["pfNome"];
$pfCPF=$SEL_pf_RES["pfCPF"];
$pfEmail=$SEL_pf_RES["pfEmail"];
?>
            <div><table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr align="center" valign="middle" class="tdBiblioteca">
                  <td colspan="2" class="txtBold">Conta Autor</td>
                </tr>
              <tr>
                  <td class="txtBold">Nome</td>
                <td><? echo $pfNome; ?></td>
              </tr>
              <tr>
                <td class="txtBold">E-mail</td>
                <td><? echo $pfEmail; ?></td>
              </tr>
              <tr>
                <td width="13%" class="txtBold"><? echo $txCPF; ?></td>
                <td width="87%"><? echo $pfCPF; ?></td>
              </tr>
              <tr> 
                <td colspan="2"><form action="" method="post" name="form1" onSubmit="return checkForm(this.name); return true;">
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="txt">
                    <tr align="center">
                      <td colspan="4"><?echo $erro;?></td>
                    </tr>
                    <?
				$SEL_cn="SELECT * FROM Contas WHERE pfCod=$pfCod and cnTipo='Autor'";
            $SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
            $SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
			
			$cnCod=$SEL_cn_RES["cnCod"];
			$cnSenha=$SEL_cn_RES["cnSenha"];
			$cnAtualizacao=$SEL_cn_RES["cnAtualizacao"];
			$cnDataInicio=$SEL_cn_RES["cnDataInicio"];
			$cnDataInicio_split=split("-",$cnDataInicio);
			$cnDiaIni=$cnDataInicio_split[2];
			$mes_a=$cnDataInicio_split[1];
			$cnAnoIni=$cnDataInicio_split[0];
			$cnDataTermino=$SEL_cn_RES["cnDataTermino"];
			$cnDataTermino_split=split("-",$cnDataTermino);
			$cnDiaTer=$cnDataTermino_split[2];
			$mes_t=$cnDataTermino_split[1];
			$cnAnoTer=$cnDataTermino_split[0];
			
			$cnBloqueado=$SEL_cn_RES["cnBloqueado"];
			
			
				?>
                    <tr align="center" valign="middle" class="tdBiblioteca">
                      <td height="18" colspan="4" class="txtBold">Validade
                        da conta </td>
                    </tr>
                    <tr>
                      <td width="16%" height="30" bgcolor="#FFFFFF" class="txtBold">In&iacute;cio</td>
                      <td colspan="3" bgcolor="#FFFFFF">
                        <select name="cnDiaInicio" class="select" id="select">
                          <? if ($cnDiaIni!="") {?>
                          <option value="<? echo $cnDiaIni; ?>" selected><? echo $cnDiaIni; ?></option>
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
                            <select name="cnMesInicio" class="select" id="cnMesInicio">
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=mysql_db_query($base,$SEL_ms,$conexao);
                            $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							while ($SEL_ms_RES!=""){ 
							$msNumero=$SEL_ms_RES["msNumero"];
							$msNome=$SEL_ms_RES["msNome"];
							?>
                              <option value="<? echo $msNumero;?>" <? if ($msNumero==$mes_a) { echo "Selected";}?>><? echo $msNome;?></option>
                              <? $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							  } ?>
                            </select>
                            - 
                            <input name="cnAnoInicio" type="text" class="numero" id="cnAnoInicio" size="5" maxlength="4" value="<? echo $cnAnoIni; ?>">
        (AAAA)
        <input name="cnSenha" type="hidden" class="input" value="<? echo $cnSenha; ?>" size="32" maxlength="30">
                      </td>
                    </tr>
                    <tr>
                      <td height="30" bgcolor="#FFFFFF" class="txtBold"><font color="#990000">T&eacute;rmino</font></td>
                      <td colspan="3" bgcolor="#FFFFFF">
                        <select name="cnDiaTermino" class="select" id="select2">
                          <? if ($cnDiaTer!="") {?>
                          <option value="<? echo $cnDiaTer; ?>" selected><? echo $cnDiaTer; ?></option>
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
                            <select name="cnMesTermino" class="select">
                              <? 
							$SEL_ms="SELECT * FROM Mes WHERE msIdiomaPais='$idioma_sistema' ORDER BY msNumero";
                            $SEL_ms_query=mysql_db_query($base,$SEL_ms,$conexao);
                            $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							while ($SEL_ms_RES!=""){ 
							$msNumero=$SEL_ms_RES["msNumero"];
							$msNome=$SEL_ms_RES["msNome"];
							?>
                              <option value="<? echo $msNumero;?>" <? if ($msNumero==$mes_t) { echo "Selected";}?>><? echo $msNome;?></option>
                              <? $SEL_ms_RES=mysql_fetch_array($SEL_ms_query);
							  } ?>
                            </select>
                            - 
                            <input name="cnAnoTermino" type="text" class="numero" id="cnAnoTermino" size="5" maxlength="4" value="<? echo $cnAnoTer; ?>">
        (AAAA)</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>Bloquear conta?</td>
                      <td colspan="3"><input name="cnBloqueado" type="radio" value="1" <? if ($cnBloqueado=="1") { echo "checked"; }?>>
        Sim
          <input name="cnBloqueado" type="radio" value="0" <? if ($cnBloqueado=="0") { echo "checked"; }?>>
        N&atilde;o</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td colspan="3"><input name="cnTipo" type="hidden" class="input" id="cnTipo2" value="Revisor">
                          <input name="cod" type="hidden" class="input" value="Editar">
                          <input name="pfCod" type="hidden" class="input" id="pfCod" value="<? echo $pfCod; ?>">
                          <input name="cnNome" type="hidden" class="input" id="cnNome" value="<? echo $pfNome; ?>">
                          <input name="cnEmail" type="hidden" class="input" value="<? echo $pfEmail; ?>">
                          <input name="prCod" type="hidden" class="input" id="prCod" value="<? echo $SprCod; ?>">
                          <input name="tsIdentificador" type="hidden" class="input" id="tsIdentificador" value="<? echo $tsIdentificador; ?>">
                      </td>
                    </tr>
                    <tr valign="middle">
                      <td height="30" align="center">&nbsp;</td>
                      <td height="30" align="center"><a href="Javascript:MM_openBrWindow('enviar_conta_aluno.php?n=<? echo $pfNome;?>&e=<? echo $pfEmail; ?>&s=<? echo $cnSenha; ?>&cnAtualizacao=<? echo "$cnAtualizacao";?>','Maio23','scrollbars=yes,width=400,height=300')" class="linkpreto">Enviar&nbsp;<img src="../tde_layout1/imagens/enviar.gif" hspace="3" border="0" align="absmiddle"></a></td>
                      <td height="30" align="center"><a href="Javascript:MM_openBrWindow('imprimir_conta_aluno.php?n=<? echo $pfNome;?>&e=<? echo $pfEmail; ?>&s=<? echo $cnSenha; ?>','Maio23','scrollbars=yes,width=400,height=300')" class="linkpreto">imprimir&nbsp;<img src="../tde_layout1/imagens/print.gif" hspace="3" border="0" align="absmiddle"></a></td>
                      <td height="30" align="center"><input name="Alterar" type="submit" class="botao" id="Editar2" value="Alterar &raquo;">
                      </td>
                    </tr>
                  </table>
                </form>
</td>
              </tr>
            </table>
            </div><br>
          </td>
        </tr>
      </table>
      <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap class="subMenuPos"><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
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