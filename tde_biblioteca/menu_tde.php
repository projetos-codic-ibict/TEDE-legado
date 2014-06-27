<?
require "../conexao/conexao.inc";
if ($VtsIdentificador=="") {
$VtsIdentificador=$tsIdentificador;
}
?>
<table width="139" border="0" align="left" cellpadding="3" cellspacing="0" class="txt">
  <tr> 
    <td width="142"><br> <span class="obs">*</span> <? echo $txPreenchimentoObrig; ?></td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txTDE; ?></span></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="visualizar_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txVisualizar; ?></a></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="alterar_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAreaDoCNPQ; ?><span class="obs">*</span></span></td>
  </tr>
  <?
$sel_cnpq="select asCod from Assunto where tsIdentificador='$tsIdentificador' and asEsquema='Tabela CNPQ'";

$selcnpq_query=mysql_db_query($base,$sel_cnpq,$conexao);
$selcnpqRESP=mysql_fetch_array($selcnpq_query);
$MasCod=$selcnpqRESP['asCod'];
if ($MasCod=="") {
  ?>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='editar_areaCNPQ_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&Mcod=Inserir'"><a href="editar_areaCNPQ_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&Mcod=Inserir" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? }else{ ?>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='editar_areaCNPQ_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&Mcod=Editar&asCod=<? echo $MasCod;?>'"><a href="editar_areaCNPQ_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&Mcod=Editar&asCod=<? echo $MasCod;?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAssunto; ?></span></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_assunto_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="inserir_assunto_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_assunto_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="visualizar_assunto_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <tr> 
    <td height="14">&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txCobertura; ?></span></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_cobertura_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="inserir_cobertura_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_cobertura_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="visualizar_cobertura_tde.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txContribuidor; ?><span class="obs">*</span></span></td>
  </tr>
  <?
			$SEL_pp="SELECT * FROM Papel WHERE ppIdiomaPais='$idioma_sistema' and ppCod='3'";
            $SEL_pp_query=mysql_db_query($base,$SEL_pp,$conexao);
            $SEL_pp_RES=mysql_fetch_array($SEL_pp_query);
			
			$ppNome=$SEL_pp_RES['ppNome'];
						
			$SEL_pfCod="SELECT pfCod FROM TSPF WHERE tsIdentificador=$tsIdentificador and tspfTipo='$ppNome'";	
			$SEL_pfCod_query=mysql_db_query($base,$SEL_pfCod,$conexao);
            $SEL_pfCod_RES=mysql_fetch_array($SEL_pfCod_query);
			  if ($SEL_pfCod_RES=="") {
			  ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_contribuidores_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_contribuidores_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_contribuidores_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_contribuidores_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txDireitos; ?><span class="obs">*</span></span></td>
  </tr>
  <?
require "../conexao/conexao.inc";

$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador='$VtsIdentificador'";
$SEL_dr_query=mysql_db_query($base,$SEL_dr,$conexao);
$SEL_dr_RES=mysql_fetch_array($SEL_dr_query);

if ($SEL_dr_RES=="") {
  ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='disponibilidade_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="disponibilidade_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a> </td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='disponibilidade_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="disponibilidade_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <?
$SEL_in="SELECT inCod FROM Teses WHERE tsIdentificador='$tsIdentificador'";
$SEL_in_query=mysql_db_query($base,$SEL_in,$conexao);
$SEL_in_RES=mysql_fetch_array($SEL_in_query);

if ($SEL_in_RES['inCod']=="0") {
?>
  <? } else { ?>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAgenciaDeFomento; ?></span></td>
  </tr>
  <?
$SEL_pfpj="SELECT pjCod FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo='AgenciaFomento'";
$SEL_pfpj_query=mysql_db_query($base,$SEL_pfpj,$conexao);
$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);

if ($SEL_pfpj_RES=="") {

?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_agfomento_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_agfomento_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_agfomento_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_agfomento_tde.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="26" class="td"> 
      <?
$SEL_tp="SELECT tpCod FROM Tipo WHERE tsIdentificador=$VtsIdentificador and tpTipo!='Electronic Thesis and Dissertation'";
$SEL_tp_query=mysql_db_query($base,$SEL_tp,$conexao);
$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
?>
      <span class="txtBold"><? echo $txTipo; ?><span class="obs">*</span></span></td>
  </tr>
  <? if ($SEL_tp_RES=="") { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_tipos.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_tipos.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_tipos.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_tipos.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txArquivo; ?><span class="obs">*</span></span></td>
  </tr>
  <? 
$SEL_ar="SELECT * FROM Arquivos WHERE tsIdentificador=$VtsIdentificador";
$SEL_ar_query=mysql_db_query($base,$SEL_ar,$conexao);
$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);

while ($SEL_ar_RES!="") {

$arURL=$SEL_ar_RES["arURL"];
$arURL_split=split("\.",$arURL);
$arURL_ext=$arURL_split[3];

if ($arURL_ext=="pdf" or $arURL_ext=="PDF") {

$arURL_ext1="pdf";
}
$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
}

if ($arURL_ext=="") { 
?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { 
if ($arURL_ext1=="pdf") {
?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>'"><a href="inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a><a href="inserir_arquivo.php?tsIdentificador=<? echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>" class="linkpreto">/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } } if ($MasCod!="" and $SEL_pfCod_RES!="" and $SEL_dr_RES!="" and $SEL_tp_RES!="" and ($arURL_ext!="" and $arURL_ext1=="pdf")) {?>
  <tr> 
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txFinalizar; ?></span></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='finalizar.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="finalizar.php?tsIdentificador=<?echo $tsIdentificador; ?>&pfCod=<? echo $pfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkvermelho">&raquo; 
      <? echo $txDisponibilizarParaAcesso; ?></a></td>
  </tr>
  <? }  } ?>
  <tr> 
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='sessao_fim.php?tsIdentificador=<?echo $tsIdentificador; ?>'"><a href="sessao_fim.php?tsIdentificador=<?echo $tsIdentificador; ?>" class="linkpreto">&laquo; 
      <? echo $txMenuPrincipal; ?></a></td>
  </tr>
  <tr> 
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
      <? echo $txAjuda2; ?></a></td>
  </tr>
</table>

