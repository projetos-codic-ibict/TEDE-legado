<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
require "../bibliotecas/cpf_cnpj.bib";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html><!-- InstanceBegin template="/TemplatesTESTE/tde_pos_menu.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/idioma_sistema.bib";
?>
<head>
<!-- InstanceBeginEditable name="doctitle" --> 
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Edi&ccedil;&atilde;o de Cadastro de Alunos</title>
<!-- InstanceEndEditable --> 
<link href="../tde_layout1/estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="../tde_layout1/estilos/estilo_pos.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="../tde_layout1/scripts/menu.js"></script> 
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
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuPos"> 
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="txt">
              <tr> 
                <td class="td"> 
                 <span class="txtBold">
				  <?
		require "../bibliotecas/linkLattes.bib";
		  //Visualizar o PRograma dessa Conta
		  require "../conexao/conexao.inc";
		  $SEL_pr="SELECT * FROM Programa WHERE prCod=$SprCod";
          $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
          $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		  $prNome=$SEL_pr_RES["prNome"];
		  echo "Programa: ".$SprCod;
		  echo "<br>".$prNome."<br><br>"; 
		  mysql_close($conexao);
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
                <td class="subMenuOver" onClick="location='visualizar_alunos.php?v=Editar'"><a href="../Copy%20of%20tde_pos/visualizar_alunos.php?v=Editar" class="linkpreto">&raquo;Alterar/Excluir</a></td>
              </tr>
              <tr> 
                <td class="td">&nbsp;</td>
              </tr>
              <tr> 
                <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='tde_pos.php'"><a href="../Copy%20of%20tde_pos/tde_pos.php" class="linkpreto">&laquo; 
                  Menu Principal</a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
          </table></td>
          <td height="100%" align="center" valign="top" class="tdConteudo"> 
            <?
	  if ($Editar!="") {
	  require "../conexao/conexao.inc";
	  require "biblioteca/manutencao_aluno.php";
	  }
require "../conexao/conexao.inc";
if ($SpjCod=="") {
$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

$SEL_pj="SELECT pjCod FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo<>'AgenciaFomento'";
$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);

$pfCod=$SEL_pf_RES["pfCod"];
$EpjCod=$SEL_pj_RES["pjCod"];
//echo $SEL_pj;
//echo $pfCod;
//echo $EpjCod;
//exit;
$pfNome=$SEL_pf_RES["pfNome"];
$pfLattes=$SEL_pf_RES["pfLattes"];
$pfCPF=$SEL_pf_RES["pfCPF"];
$pfEmail=$SEL_pf_RES["pfEmail"];
}
 if ($sucesso!="" or $erro!="") { ?>
           <div>
<table width="90%" height="60" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
              <tr> 
                  <td align="center" valign="middle"> <? echo $erro; echo $sucesso; ?></td>
              </tr>
            </table>		   
			<br />
			</div> <? } ?>
<form action="" method="post" enctype="multipart/form-data" name="form" onSubmit="return checkForm(this.name); return true;" >
              <div>
			  <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
                <tr> 
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="3">
                        <tr align="center" valign="middle" class="tdBiblioteca"> 
                          <td colspan="2" class="txtBold">Autor</td>
                        </tr>
                        <tr class="txt"> 
                          <td width="10%" class="txtBold">Nome </td>
                          <td width="90%"> <input name="pfNome" type="text" class="req" value="<?echo $pfNome;?>" size="50" maxlength="100"> 
                            <input name="pfCod" type="hidden" class="input" value="<?echo $pfCod;?>"> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><a href="<? echo $linkLattes; ?>" target="_blank">Lattes</a> 
                          </td>
                          <td> <input name="pfLattes" type="text" class="input" value="<?echo $pfLattes;?>" size="50" maxlength="150"> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txCPF; ?></td>
                          <td> <input name="pfCPF" type="text" class="cpf" value="<?echo $pfCPF;?>" size="15" maxlength="14" onKeyPress="CPF(this);"> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td bgcolor="#FFFFFF" class="txtBold">E-mail </td>
                          <td bgcolor="#FFFFFF">Exemplo: a@a.br, b@seuprovedor.com.br<br> 
                            <input name="pfEmail" type="text" class="email" value="<?echo $pfEmail;?>" size="40" maxlength="100"> 
                            <input name="prCod" type="hidden" class="input" value="<?echo $SprCod;?>"></td>
                        </tr>
                        <tr class="txt"> 
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr class="tdBiblioteca"> 
                          <td colspan="2" align="center" valign="middle" class="txtBold">Afilia&ccedil;&atilde;o 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td colspan="2"><select name="SpjCod" class="input" onChange="submit()">
                              <option value="">Selecionar</option>
                              <? $SEL_pj="SELECT * FROM PessoaJuridica where pjAfiliacao='1' ORDER BY pjNome";
$SEL_pj_query=mysql_db_query($base,$SEL_pj,$conexao);
$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
				while ($SEL_pj_RES!="") {
				$pjCod=$SEL_pj_RES["pjCod"];
				$pjNome=$SEL_pj_RES["pjNome"];
											?>
                              <option value="<?echo $pjCod;?>"><?echo $pjNome;?></option>
                              <?
				 $SEL_pj_RES=mysql_fetch_array($SEL_pj_query); }
				 ?>
                              <option value="Nenhum" <? if ($SpjCod!="") { echo "Selected"; }?>>Nenhum acima</option>
                            </select></td>
                        </tr>
                        <? if ($SpjCod!="" or $EpjCod!="") { 
				if ($SpjCod!="Nenhum") {
				if ($EpjCod!="" and $SpjCod=="") {
				$SpjCod=$EpjCod;
				}
				$SEL_pj1="SELECT * FROM PessoaJuridica WHERE pjCod=$SpjCod";
$SEL_pj1_query=mysql_db_query($base,$SEL_pj1,$conexao);
$SEL_pj1_RES=mysql_fetch_array($SEL_pj1_query);
				
				$pjCod=$SEL_pj1_RES["pjCod"];
				$pjNome=$SEL_pj1_RES["pjNome"];
				$pjSigla=$SEL_pj1_RES["pjSigla"];
				$pjPais=$SEL_pj1_RES["pjPais"];
				$pjUF=$SEL_pj1_RES["pjUF"];
				$pjCNPJ=$SEL_pj1_RES["pjCNPJ"];
				$pjURL=$SEL_pj1_RES["pjURL"];
				}
				
				?>
                        <tr class="txt"> 
                          <td class="txtBold">Nome</td>
                          <td> 
                            <? if ($SpjCod!="Nenhum" and $SpjCod!="") { echo  $pjNome; ?>
                            <input name="pjCod" type="hidden" class="input" value="<?echo $SpjCod;?>"> 
                            <? } else { ?>
                            <input name="ApjNome" type="text" class="req" id="ApjNome" value="<? echo $ApjNome; ?>" size="50" maxlength="100"> 
                            <? } ?>
                            <input name="EpjCod" type="hidden" class="input" value="<?echo $EpjCod;?>"> 
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td height="20" class="txtBold">Sigla</td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjSigla; } else { ?>
                            <input name="ApjSigla" type="text" class="input" id="ApjSigla" value="<? echo $ApjSigla; ?>" size="25" maxlength="30"> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">Pais</td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") {
						  
						   $SEL_ps="SELECT * FROM Pais WHERE psSigla='$pjPais'";
						   $SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
				
						   $pjPais=$SEL_ps_RES["psNome"];
						   echo  $pjPais; } else { ?>
                            <select name="ApjPais" class="select" onChange="submit()">
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
                              <option value="<? echo $psSigla; ?>" <? if (($psSigla==$inPais and   $ApjPais=="") or $psSigla==$ApjPais) { echo "selected"; } ?>><? echo $psNome; ?></option>
                              <?
						   $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						   }
						   ?>
                            </select> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txUF; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjUF; } else { 
							if ($ApjPais=="") {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'"; } else{
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$ApjPais'";
							}
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
							?>
                            <select name="ApjUF" class="input">
                              <option value="" selected>Selecionar</option>
                              <?						
							$SEL_uf="SELECT * FROM UnidadeFederativa WHERE psCod='$psCod' ORDER BY ufNome";
                            $SEL_uf_query=mysql_db_query($base,$SEL_uf,$conexao);
                            $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);						
														
							while ($SEL_uf_RES!="") {
							$ufSigla=$SEL_uf_RES["ufSigla"];
							$ufNome=$SEL_uf_RES["ufNome"];
							?>
                              <option value="<? echo $ufSigla; ?>" <? if ($ufSigla==$inUF) { echo "selected"; } ?>><? echo $ufNome; ?></option>
                              <?
						   $SEL_uf_RES=mysql_fetch_array($SEL_uf_query);
						   }
						   ?>
                              <option value="-">Nenhum acima</option>
                            </select> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txCNPJ; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjCNPJ; } else { ?>
                            <input name="pjCNPJ" type="text" <? if ($idioma_sistema=="pt-BR") {?>class="cnpj" <? }else{?> class="req"<? } echo 'value="'.$pjCNPJ.'"'; $qtdCNPJcampo=$qtdCNPJ+1; echo 'size="'.$qtdCNPJcampo.'"'; echo 'maxlength="'.$qtdCNPJ.'"';  if ($CNPJMascara=="Sim") {?>onKeyPress="CNPJ(this);" <? } ?>> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold">URL</td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjURL; } else { ?>
                            <input name="ApjURL" type="text" class="input" id="ApjURL" value="<? echo $ApjURL; ?>" size="40" maxlength="150"> 
                            <? } ?>
                          </td>
                        </tr>
                        <? } ?>
                      </table>
                    
                  </td>
                </tr>
                <tr> 
                  <td align="right" valign="bottom"><input name="cod" type="hidden" class="input" value="Editar"> 
                    <input name="Editar" type="submit" class="botao" value="Alterar &raquo;"> 
                  </td>
                </tr>
              </table></div><br>
          </form></td>
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