<table width="139" border="0" align="left" cellpadding="3" cellspacing="0" class="txt">
  <tr> 
    <td width="142"><br> <span class="obs">*</span> <? echo $txPreenchimentoObrig; ?></td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAutor; ?></span></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='editar_aluno.php?pfCod=<? echo $VpfCod; ?>'"><a href="editar_aluno.php?pfCod=<? echo $VpfCod; ?>&tsIdentificador=<? echo $VtsIdentificador; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txTDE; ?></span></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_tde.php'"><a href="visualizar_tde.php" class="linkpreto">&raquo; 
      <? echo $txVisualizar; ?></a></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='alterar_tde.php'"><a href="alterar_tde.php" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txDireitos; ?><span class="obs">*</span></span></td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='disponibilidade_tde.php'"><a href="disponibilidade_tde.php" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?></a></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAfiliacao; ?></span></td>
  </tr>
  <?
    if ($tsIdentificador=="") {
  $tsIdentificador=$VtsIdentificador;
  }
   if ($pfCod=="") {
  $pfCod=$VpfCod;
  }
  require "../conexao/conexao_fim.inc";
$SEL_pfpj="SELECT pjCod FROM PFPJ WHERE pfCod=$VpfCod and pfpjTipo='Afiliacao'";
$SEL_pfpj_query=mysql_db_query($base_fim,$SEL_pfpj,$conexao_fim);
$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);

if ($SEL_pfpj_RES=="") {

?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_afiliacao.php'"><a href="inserir_afiliacao.php" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_afiliacao.php'"><a href="inserir_afiliacao.php" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <?
$SEL_in="SELECT inCod FROM Teses WHERE tsIdentificador='$VtsIdentificador'";
$SEL_in_query=mysql_db_query($base_fim,$SEL_in,$conexao_fim);
$SEL_in_RES=mysql_fetch_array($SEL_in_query);

if ($SEL_in_RES['inCod']=="0") {
?>
  <? } else { ?>
  <? } ?>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAgenciaDeFomento; ?></span></td>
  </tr>
  <?
$SEL_pfpj="SELECT pjCod FROM PFPJ WHERE pfCod=$VpfCod and pfpjTipo='AgenciaFomento'";
$SEL_pfpj_query=mysql_db_query($base_fim,$SEL_pfpj,$conexao_fim);
$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);

if ($SEL_pfpj_RES=="") {

?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_agfomento.php'"><a href="inserir_agfomento.php" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_agfomento.php'"><a href="inserir_agfomento.php" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txContribuidor; ?><span class="obs">*</span></span></td>
  </tr>
  <? require "../conexao/conexao.inc";
			$SEL_pp="SELECT * FROM Papel WHERE ppIdiomaPais='$idioma_sistema' and ppCod='3'";
            $SEL_pp_query=mysql_db_query($base,$SEL_pp,$conexao);
            $SEL_pp_RES=mysql_fetch_array($SEL_pp_query);
			
			$ppNome=$SEL_pp_RES['ppNome'];
						
			$SEL_pfCod="SELECT pfCod FROM TSPF WHERE tsIdentificador=$VtsIdentificador and tspfTipo='$ppNome'";	
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
    <td height="26" class="td"> 
      <?
$SEL_tp="SELECT tpCod FROM Tipo WHERE tsIdentificador=$VtsIdentificador and tpTipo!='Electronic Thesis and Dissertation'";
$SEL_tp_query=mysql_db_query($base_fim,$SEL_tp,$conexao_fim);
$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
?>
      <span class="txtBold"><? echo $txTipo; ?><span class="obs">*</span></span></td>
  </tr>
  <? if ($SEL_tp_RES=="") { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_tipos.php'"><a href="inserir_tipos.php" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_tipos.php'"><a href="inserir_tipos.php" class="linkpreto">&raquo; 
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
$SEL_ar_query=mysql_db_query($base_fim,$SEL_ar,$conexao_fim);
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
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php'"><a href="inserir_arquivo.php" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <? } else { 
if ($arURL_ext1=="pdf") {
?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php'"><a href="inserir_arquivo.php" class="linkpreto">&raquo; 
      <? echo $txInserir; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } else { ?>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_arquivo.php'"><a href="inserir_arquivo.php" class="linkvermelho">&raquo; 
      <? echo $txInserir; ?></a><a href="inserir_arquivo.php" class="linkpreto">/<? echo $txExcluir; ?></a></td>
  </tr>
  <? } } ?>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txAssunto; ?></span></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_assunto_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="inserir_assunto_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_assunto_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="visualizar_assunto_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <tr> 
    <td height="14">&nbsp;</td>
  </tr>
  <tr> 
    <td class="td"><span class="txtBold"><? echo $txCobertura; ?></span></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='inserir_cobertura_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="inserir_cobertura_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txInserir; ?></a></td>
  </tr>
  <tr> 
    <td height="14" class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='visualizar_cobertura_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>'"><a href="visualizar_cobertura_tde.php?VtsIdentificador=<?echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VbdCod=<? echo $SbdCod; ?>" class="linkpreto">&raquo; 
      <? echo $txAlterar; ?>/<? echo $txExcluir; ?></a></td>
  </tr>
  <tr>
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/tde_pos.php?pag=VisCad'"><a href="../tde_biblioteca/tde_pos.php?pag=VisCad" class="linkpreto">&laquo; 
      <? echo $txMenuPrincipal; ?></a></td>
  </tr>
  <tr> 
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'" onClick="location='../tde_biblioteca/logout.php'"><a href="../tde_biblioteca/logout.php" class="linkpreto">&raquo; 
      <? echo $txSair; ?></a></td>
  </tr>
  <tr> 
    <td class="td">&nbsp;</td>
  </tr>
  <tr> 
    <td class="subMenuOut" onMouseOver="this.className='subMenuOver'" onMouseOut="this.className='subMenuOut'"><a href="../tde_ajuda/ajuda.php"  class="linkpreto" target="_blank">&raquo; 
      <? echo $txAjuda2; ?></a></td>
  </tr>
</table>
