<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../tde_biblioteca/login.php");
}else{
require "../bibliotecas/cpf_cnpj.bib";
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | P&oacute;s-Gradua&ccedil;&atilde;o | Edi&ccedil;&atilde;o de Cadastro de Alunos</title>
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
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib"> 
            <? require "menu.php"; ?>
          </td>
          <td height="100%" align="center" valign="top" class="tdConteudo"> 
            <?
	  if ($Editar!="") {
	  require "../conexao/conexao.inc";
	  require "biblioteca/manutencao_aluno.php";
	  } 
require "../conexao/conexao.inc";
if ($SpjCod=="") {
$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
$SEL_pf_query=mysql_db_query($base_fim,$SEL_pf,$conexao_fim);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);

$SEL_pj="SELECT pjCod FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo<>'AgenciaFomento'";
$SEL_pj_query=mysql_db_query($base_fim,$SEL_pj,$conexao_fim);
$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);

$SEL_pr="SELECT * FROM TSPF, Programa WHERE (Programa.prCod=TSPF.prCod) and TSPF.tsIdentificador='$tsIdentificador' and TSPF.tspfTipo='Autor'";
$SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);

$VprCod=$SEL_pr_RES["prCod"];
$prNome=$SEL_pr_RES["prNome"];

$pfCod=$SEL_pf_RES["pfCod"];
$EpjCod=$SEL_pj_RES["pjCod"];

$pfNome=$SEL_pf_RES["pfNome"];
$pfCitacao=$SEL_pf_RES["pfCitacao"];
$pfCitacaoABNT=$SEL_pf_RES["pfCitacaoABNT"];
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
                          <td colspan="2" class="txtBold"><? echo $txAutor; ?></td>
                        </tr>
                        <tr class="txt"> 
                          <td width="10%" class="txtBold"><? echo $txNome; ?></td>
                          <td width="90%"> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfNome;} else {?>
                            <input name="pfNome" type="text" class="req" value="<?echo $pfNome;?>" size="50" maxlength="100"> 
                            <input name="pfCod" type="hidden" class="input" value="<?echo $pfCod;?>"> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txCitacao; ?></td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfCitacao;} else {?>
                            <input name="pfCitacao" type="text" class="req" id="pfCitacao" value="<?echo $pfCitacao;?>" size="50" maxlength="100"> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt">
                          <td class="txtBold"><? echo $txCitacaoABNT; ?></td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfCitacaoABNT;} else {?>
                            <input name="pfCitacaoABNT" type="text" class="req" id="pfCitacaoABNT" value="<?echo $pfCitacaoABNT;?>" size="50" maxlength="100">
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><a href="<? echo $linkLattes; ?>" target="_blank"><? echo $txLattes; ?></a> 
                          </td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfLattes;} else {?>
                            <input name="pfLattes" type="text" class="input" value="<?echo $pfLattes;?>" size="50" maxlength="150"> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txCPF; ?></td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfCPF;} else {
							 $qtdcpfcampo=$qtdCPF+1;
						  if ($idioma_sistema=="pt-br") {
						   if ($CPFMascara=="Sim") {
						  $imputCPF='<input name="pfCPF" type="text" class="cpf" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'" onkeypress="CPF(this);">';
						  } else {
						  $imputCPF='<input name="pfCPF" type="text" class="cpf" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'">';
						  
						  } }else {
						   if ($CPFMascara=="Sim") {
						  $imputCPF='<input name="pfCPF" type="text" class="req" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'" onkeypress="CPF(this);">';
						  } else {
						  $imputCPF='<input name="pfCPF" type="text" class="req" value="'.$pfCPF.'" size="'.$qtdcpfcampo.'" maxlength="'.$qtdCPF.'">';
						  
						  }
						  }
						  echo $imputCPF;
						   } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td bgcolor="#FFFFFF" class="txtBold"><? echo $txEMail; ?></td>
                          <td bgcolor="#FFFFFF"> 
                            <? if ($sucesso!="" or $erro!="") { echo $pfEmail;} else {?>
                            <? echo $txExemplo; ?>: a@a.br, b@seuprovedor.com.br<br> 
                            <input name="pfEmail" type="text" class="email" value="<?echo $pfEmail;?>" size="40" maxlength="100"> 
                            <? } ?>
                            <input name="tsIdentificador" type="hidden" class="input" value="<? echo $tsIdentificador;?>">
</td>
                        </tr>
                        <tr class="txt">
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr class="txt">
                          <td class="txtBold"><? echo $txPrograma; ?></td>
                          <td>
                            <? if ($sucesso!="" or $erro!="") { echo $prNome;} else {?>
                            <select name="prCod" id="prCod" class="select">
                              <option value=""><? echo $txSelecionar; ?></option>
                              <? $SEL_pr="SELECT * FROM Programa where bdCod='$SbdCod' and prStatus='ATIVO'  ORDER BY prNome";
$SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
while ($SEL_pr_RES!="") {
$AprCod=$SEL_pr_RES["prCod"];
$prNome=$SEL_pr_RES["prNome"];
?>
                              <option value="<? echo $AprCod; ?>" <? if ($prCod=="") { if ($AprCod==$VprCod) { echo "Selected"; }} else { if ($AprCod==$prCod) { echo "Selected";}} ?>><? echo $prNome; ?></option>
                              <? $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
							  }
							  ?>
                            </select>
                            <? } ?>
                          <input name="prCodAntigo" type="hidden" class="input" value="<? if ($prCodAntigo=="") { echo $SprCod; } else { echo $prCodAntigo; } ?>"></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center" valign="middle">&nbsp;</td>
                        </tr>
                        <tr class="tdBiblioteca"> 
                          <td colspan="2" align="center" valign="middle" class="txtBold"><? echo $txAfiliacao; ?></td>
                        </tr>
                        <tr class="txt"> 
                          <td colspan="2"> 
                            <? if ($sucesso!="" or $erro!="") { echo "";} else {?>
                            <select name="SpjCod" class="input" onChange="submit()">
                              <option value=""><? echo $txSelecionar; ?></option>
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
                              <option value="Nenhum" <? if ($SpjCod!="") { echo "Selected"; }?>>Nenhum 
                              acima</option>
                            </select> 
                            <? } ?>
                          </td>
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
                          <td class="txtBold"><? echo $txNome; ?></td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pjNome;} else {?>
                            <? if ($SpjCod!="Nenhum" and $SpjCod!="") { echo  $pjNome; ?>
                            <input name="pjCod" type="hidden" class="input" value="<?echo $SpjCod;?>"> 
                            <? } else { ?>
                            <input name="ApjNome" type="text" class="req" id="ApjNome" value="<? echo $ApjNome; ?>" size="50" maxlength="100"> 
                            <? } ?>
                            <input name="EpjCod" type="hidden" class="input" value="<?echo $EpjCod;?>"> 
                            <? } ?>
                          </td>
                        </tr>
                        <tr class="txt"> 
                          <td height="20" class="txtBold"><? echo $txSigla; ?></td>
                          <td> 
                            <? if ($sucesso!="" or $erro!="") { echo $pjSigla;} else {?>
                            <? if ($SpjCod!="Nenhum") { echo  $pjSigla; } else { ?>
                            <input name="ApjSigla" type="text" class="input" id="ApjSigla" value="<? echo $ApjSigla; ?>" size="25" maxlength="30"> 
                            <? } ?>
                            <? } ?>
                          </td>
                        </tr>
                        <? if ($sucesso!="" or $erro!="") { echo "";} else {?>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txPais; ?></td>
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
                        <? }  if ($sucesso!="" or $erro!="") { echo "";} else {?>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txUF; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  ""; } else { 
							if ($ApjPais=="") {
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$inPais'"; } else{
							$SEL_ps="SELECT * FROM Pais WHERE psIdiomaPais='pt-BR' and psSigla='$ApjPais'";
							}
							$SEL_ps_query=mysql_db_query($base,$SEL_ps,$conexao);
                            $SEL_ps_RES=mysql_fetch_array($SEL_ps_query);
						$psCod=$SEL_ps_RES['psCod'];
							?>
                            <select name="ApjUF" class="input">
                              <option value="" selected><? echo $txSelecionar; ?></option>
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
                              <option value="-"><? echo $txNenhumAcima; ?></option>
                            </select> 
                            <? } ?>
                          </td>
                        </tr>
                        <? }  if ($SpjCod!="Nenhum") { echo  ""; } else { ?>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txCNPJ; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjCNPJ; } else { 
						   $qtdCNPJcampo=$qtdCNPJ+1;
						  if ($idioma_sistema=="pt-BR") {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="ApjCNPJ" type="text" class="cnpj" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="ApjCNPJ" type="text" class="CNPJ" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  } }else {
						   if ($CNPJMascara=="Sim") {
						  $imputCNPJ='<input name="ApjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'" onkeypress="CNPJ(this);">';
						  } else {
						  $imputCNPJ='<input name="ApjCNPJ" type="text" class="req" value="'.$pjCNPJ.'" size="'.$qtdCNPJcampo.'" maxlength="'.$qtdCNPJ.'">';
						  
						  }
						  }
						  echo $imputCNPJ;
						   } ?>
                          </td>
                        </tr>
                        <? } if ($sucesso!="" or $erro!="") { echo "";} else {?>
                        <tr class="txt"> 
                          <td class="txtBold"><? echo $txURL; ?></td>
                          <td> 
                            <? if ($SpjCod!="Nenhum") { echo  $pjURL; } else { ?>
                            <input name="ApjURL" type="text" class="input" id="ApjURL" value="<? echo $ApjURL; ?>" size="40" maxlength="150"> 
                            <? } ?>
                          </td>
                        </tr>
                        <? }  }?>
                      </table>
                    
                  </td>
                </tr>
                <tr> 
                    <td align="right" valign="bottom">
                      <? if ($sucesso!="" or $erro!="") { echo "";} else {?>
                      <input name="cod" type="hidden" class="input" value="Editar"> 
                    <input name="Editar" type="submit" class="botao" value="<? echo $txAlterar; ?> &raquo;"> <? } ?>
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