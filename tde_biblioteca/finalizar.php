<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
if ($VtsIdentificador=="") {
$VtsIdentificador=$tsIdentificador;
}
if ($VpfCod=="") {
$VpfCod=$pfCod;
}
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
<title>| Sistema de Publica&ccedil;&atilde;o Eletr&ocirc;nica de Teses e Disserta&ccedil;&otilde;es | BIBLIOTECA |</title>
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
      <? if ($Alterar!="") {
require "biblioteca/disponibilizar_cod_tde.inc";
} 
				?>
      <table width="100%" height="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="100%" align="left" valign="top" class="subMenuBib">
            <? require "menu_tde.php"; ?>
          </td>
          <td height="100%" align="center" valign="top" class="tdConteudo">
		   <? 
	  if ($disponibilizar=="Nao" and $voltar=="1") {
	  require "../conexao/conexao.inc"; 
      require "../conexao/conexao_fim.inc"; 
	  
	  require "../bibliotecas/idioma_sistema.bib";
	  require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
	  
	  $inclusao_ts="tspfDisponivel='2'" ;
      $total_ts="UPDATE TSPF SET $inclusao_ts WHERE tsIdentificador=$VtsIdentificador and tspfTipo='Autor' and pfCod='$VpfCod'";
	  $inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);
	  
// Enviar email para os Secretários de pós Graduação
$SEL_cn="SELECT cnEmail, cnNome, prCod FROM Contas WHERE pfCod=$VpfCod and tsIdentificador=$VtsIdentificador and cnTipo='Autor'";
$SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
$SEL_cn_RES=mysql_fetch_array($SEL_cn_query);

$cnprCod=$SEL_cn_RES[prCod];
$cnNome=$SEL_cn_RES["cnNome"];

$SEL="SELECT cnEmail FROM Contas WHERE prCod='$cnprCod' and cnTipo='Pos'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

while ($SEL_RES!="") {

$emails[]=$SEL_RES["cnEmail"];
$SEL_RES=mysql_fetch_array($SEL_query);
}

$qtd_email=count($emails);

for ($i=0; $i<=$qtd_email; $i++) {

if ($to=="") {

$to=$emails[$i];

} else {

$to=$to.",".$emails[$i];
}
}
// Seleciona o Nome e o e-mail do catalogaror
$SEL_cnC="SELECT cnEmail, cnNome FROM Contas WHERE cnCod=$ScnCod";
$SEL_cnC_query=mysql_db_query($base,$SEL_cnC,$conexao);
$SEL_cnC_RES=mysql_fetch_array($SEL_cnC_query);

$cnEmailC=$SEL_cnC_RES["cnEmail"];
$cnNomeC=$SEL_cnC_RES["cnNome"];

//Enviar e-mail para as pessoas do PRograma referente a TDE do Autor
require "../bibliotecas/servidor.bib";

$de=$cnEmailC;
//$to=$cnEmail;

$LinkSubmissao="http://".$servidor_diretorio."tde_pos/login.php";
$data_atual=date("d/m/Y");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloFinalizar;
$mensagem=$emMensagemFinalizar;
mail($to,"$titulo",$mensagem,"From: $de");
	  
	  $sucesso=$sg001;	  
	  
	  header("Location:tde_pos.php?sucesso=$sucesso");
	  exit;
	  }
      // Evitar duplicação na publicação da Tese caso o usuário aperte o botão de disponibilizar mais de uma vez	  
      session_start();
      if(session_is_registered("protecao")) {
      $sucesso=$s001; 
      header("Location:tde_pos.php?sucesso=$sucesso");
      exit;
      }else{
	  if ($disponibilizar=="Sim") {
	  $protecao="Sim";
	  session_start();
	  session_register("protecao");
	 
	  require "../conexao/conexao.inc"; 
      require "../conexao/conexao_fim.inc"; 
	  
	  require "../bibliotecas/idioma_sistema.bib";
	  require "../tde_i18n/tde_biblioteca/mensagens_".$idioma_sistema.".txt";
	        
					
			$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
			$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
            $SEL_ts_RES=mysql_fetch_array($SEL_ts_query);
				
			$tsIdentificador=$SEL_ts_RES["tsIdentificador"];
			$tsNumeroChamada=$SEL_ts_RES["tsNumeroChamada"];
			$tsIdioma=$SEL_ts_RES["tsIdioma"];
			$tsGrau=$SEL_ts_RES["tsGrau"];
			$tsTitulacao=$SEL_ts_RES["tsTitulacao"];
			//$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
			//Pegar a Data de Atualização(DateStamp)
			$unix = gmmktime();
			$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
			$tsCidadeLocalDefesa=$SEL_ts_RES["tsCidadeLocalDefesa"];
			$tsUFLocalDefesa=$SEL_ts_RES["tsUFLocalDefesa"];
			$tsPaisLocalDefesa=$SEL_ts_RES["tsPaisLocalDefesa"];
            $tsDataDefesa=$SEL_ts_RES["tsDataDefesa"];
			$tsDataFinalizacao=date("Y-m-d");
			$tsDataLiberacaoPos=$SEL_ts_RES["tsDataLiberacaoPos"];
			$cnCodPos=$SEL_ts_RES["cnCodPos"];
			$tsDataRevisao=$SEL_ts_RES["tsDataRevisao"];
			$cnCodRevisor=$SEL_ts_RES["cnCodRevisor"];
			$tsDataCatalogacao=$SEL_ts_RES["tsDataCatalogacao"];
			$cnCodCatalogador=$SEL_ts_RES["cnCodCatalogador"];
			$inCod=$SEL_ts_RES["inCod"];
			$tsDataDiretorio=$SEL_ts_RES["tsDataAtualizacao"];

$alt_ts="tsDataFinalizacao='$tsDataFinalizacao'" ;
$totalalt_ts="UPDATE Teses SET $alt_ts WHERE tsIdentificador=$VtsIdentificador";
$inconteudoalt_ts=mysql_db_query($base, $totalalt_ts, $conexao);
		
// inclusão dos Dados Iniciais da tese na tabela Teses
$campos_ts="tsIdentificador,tsNumeroChamada,tsIdioma,tsGrau,tsTitulacao,tsDataAtualizacao,tsCidadeLocalDefesa,tsUFLocalDefesa,tsPaisLocalDefesa,tsDataDefesa,tsDataFinalizacao,tsDataLiberacaoPos,cnCodPos,tsDataRevisao,cnCodRevisor,tsDataCatalogacao,cnCodCatalogador,inCod,tsDataDiretorio";
$inclusao_ts="'$VtsIdentificador','$tsNumeroChamada','$tsIdioma','$tsGrau','$tsTitulacao','$tsDataAtualizacao','$tsCidadeLocalDefesa','$tsUFLocalDefesa','$tsPaisLocalDefesa','$tsDataDefesa','$tsDataFinalizacao','$tsDataLiberacaoPos','$cnCodPos','$tsDataRevisao','$cnCodRevisor','$tsDataCatalogacao','$cnCodCatalogador','$inCod','$tsDataDiretorio'";
$total_ts="insert into Teses ($campos_ts) values ($inclusao_ts)";
$inconteudo_ts=mysql_db_query($base_fim, $total_ts, $conexao_fim);

	    	// Seleciona todos os registros da Tabela TSPF relacionado a esta Tese e armazena no banco TEDE
			$SEL_tspf="SELECT * FROM TSPF WHERE tsIdentificador=$VtsIdentificador ORDER by tspfTipo";
			$SEL_tspf_query=mysql_db_query($base,$SEL_tspf,$conexao);
			$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
			
			$prCod=$SEL_tspf_RES["prCod"];
			
			while ($SEL_tspf_RES!="") {
				
			$pfCod=$SEL_tspf_RES["pfCod"];
			$tspfTipo=$SEL_tspf_RES["tspfTipo"];
			$tspfDispEmail=$SEL_tspf_RES["tspfDispEmail"];
	
// Inserir os registros da tabela TSPF do banco TEDE-SUBMISSAO para o banco TEDE
$campos_tspf="tsIdentificador,pfCod,tspfTipo,tspfDispEmail";
$inclusao_tspf="'$VtsIdentificador','$pfCod','$tspfTipo','$tspfDispEmail'";
$total_tspf="INSERT INTO TSPF ($campos_tspf) values ($inclusao_tspf)";
$inconteudo_tspf=mysql_db_query($base_fim, $total_tspf, $conexao_fim);
$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
			}
			
// Inserir o prCod do Autor na tabela TSPF do banco TEDE
$inclusao_tspf_pr="prCod='$prCod'";
$total_tspf_pr="UPDATE TSPF SET $inclusao_tspf_pr WHERE tsIdentificador=$tsIdentificador and tspfTipo='Autor'";
$inconteudo_tspf_pr=mysql_db_query($base_fim, $total_tspf_pr, $conexao_fim);
			            	
			//Selecionar os Títulos dessa Tese
			$SEL_tt="SELECT * FROM Titulo WHERE tsIdentificador=$VtsIdentificador ORDER BY ttCod";
            $SEL_tt_query=mysql_db_query($base,$SEL_tt,$conexao);
            $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);

			while ($SEL_tt_RES!="") {
			$ttTitulo=$SEL_tt_RES["ttTitulo"];
			$ttIdioma=$SEL_tt_RES["ttIdioma"];
            
// inclusão de Titulo no idioma Original da  tese
$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$VtsIdentificador','$ttTitulo','$ttIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base_fim, $total_tt, $conexao_fim);
           
		    $SEL_tt_RES=mysql_fetch_array($SEL_tt_query);
			}
					
			//Selecionar as Coberturas dessa Tese
			$SEL_cb="SELECT * FROM Cobertura WHERE tsIdentificador=$VtsIdentificador ORDER BY cbCod";
            $SEL_cb_query=mysql_db_query($base,$SEL_cb,$conexao);
            $SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
			
			while ($SEL_cb_RES!="") {
			$cbCod=$SEL_cb_RES["cbCod"];
			$cbCobertura=$SEL_cb_RES["cbCobertura"];
			$cbIdioma=$SEL_cb_RES["cbIdioma"];

// inclusão da Cobertura da tese na tabela Cobertura no banco TEDE
$campos_cb="cbCod,tsIdentificador,cbCobertura,cbIdioma";
$inclusao_cb="'$cbCod','$VtsIdentificador','$cbCobertura','$cbIdioma'";
$total_cb="insert into Cobertura ($campos_cb) values ($inclusao_cb)";
$inconteudo_cb=mysql_db_query($base_fim, $total_cb, $conexao_fim);
		
			$SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
			}
			
			//Selecionar os Assuntos dessa Tese
			$SEL_as="SELECT * FROM Assunto WHERE tsIdentificador=$VtsIdentificador ORDER BY asCod";
            $SEL_as_query=mysql_db_query($base,$SEL_as,$conexao);
            $SEL_as_RES=mysql_fetch_array($SEL_as_query);
			
			while ($SEL_as_RES!="") {
			$asCod=$SEL_as_RES["asCod"];
			$asAssunto=$SEL_as_RES["asAssunto"];
			$asEsquema=$SEL_as_RES["asEsquema"];
			$asIdioma=$SEL_as_RES["asIdioma"];

// inclusão dos Assuntos da tese na tabela Assunto no banco TEDE
$campos_as="asCod,tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as="'$asCod','$VtsIdentificador','$asAssunto','$asIdioma','$asEsquema'";
$total_as="insert into Assunto ($campos_as) values ($inclusao_as)";
$inconteudo_as=mysql_db_query($base_fim, $total_as, $conexao_fim);
			
			$SEL_as_RES=mysql_fetch_array($SEL_as_query);
			}
			
			//Selecionar os resumos dessa Tese
			$SEL_rs="SELECT * FROM Resumo WHERE tsIdentificador=$VtsIdentificador ORDER BY rsCod";
            $SEL_rs_query=mysql_db_query($base,$SEL_rs,$conexao);
            $SEL_rs_RES=mysql_fetch_array($SEL_rs_query);
			
			while ($SEL_rs_RES!="") {
			$rsResumo=$SEL_rs_RES["rsResumo"];
			$rsIdioma=$SEL_rs_RES["rsIdioma"];
			
// inclusão de Resumo da tese no Banco TEDE
$campos_rs="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs="'$VtsIdentificador','$rsResumo','$rsIdioma'";
$total_rs="insert into Resumo ($campos_rs) values ($inclusao_rs)";
$inconteudo_rs=mysql_db_query($base_fim, $total_rs, $conexao_fim);
			
			$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);
			}
			
			//Selecionar os resumos dessa Tese
			$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador=$VtsIdentificador";
            $SEL_dr_query=mysql_db_query($base,$SEL_dr,$conexao);
            $SEL_dr_RES=mysql_fetch_array($SEL_dr_query);
			
			$drDireito=$SEL_dr_RES["drDireito"];
			$drIdioma=$SEL_dr_RES["drIdioma"];
			
// inclusão dos Direitos dos arquivos da tese na tabela de Direitos
$campos_dr="tsIdentificador,drDireito,drIdioma";
$inclusao_dr="'$VtsIdentificador','$drDireito','$drIdioma'";
$total_dr="insert into Direitos ($campos_dr) values ($inclusao_dr)";
$inconteudo_dr=mysql_db_query($base_fim, $total_dr, $conexao_fim);

			//Selecionar os Arquivos dessa Tese
			$SEL_ar="SELECT * FROM Arquivos WHERE tsIdentificador=$VtsIdentificador ORDER BY arCod";
            $SEL_ar_query=mysql_db_query($base,$SEL_ar,$conexao);
            $SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
			
			while ($SEL_ar_RES!="") {
			$arCod=$SEL_ar_RES["arCod"];
			$arURL=$SEL_ar_RES["arURL"];
			$arFormato=$SEL_ar_RES["arFormato"];
			$arDireitos=$SEL_ar_RES["arDireitos"];
			
			$SEL_la="SELECT * FROM LegendaArquivo WHERE arCod=$arCod";
            $SEL_la_query=mysql_db_query($base,$SEL_la,$conexao);
            $SEL_la_RES=mysql_fetch_array($SEL_la_query);
			
			$arCod=$SEL_la_RES[arCod];
			$laLegenda=$SEL_la_RES["laLegenda"];
			$laIdioma=$SEL_la_RES["laIdioma"];
			
// inclusão dos Arquivos da tese no Banco TEDE
$campos_ar="arCod,tsIdentificador,arURL,arFormato,arDireitos";
$inclusao_ar="'$arCod','$VtsIdentificador','$arURL','$arFormato','$arDireitos'";
$total_ar="insert into Arquivos ($campos_ar) values ($inclusao_ar)";
$inconteudo_ar=mysql_db_query($base_fim, $total_ar, $conexao_fim);

// inclusão da Legenda do Arquivo da tese no Banco TEDE
$campos_la="arCod,laLegenda,laIdioma";
$inclusao_la="'$arCod','$laLegenda','$laIdioma'";
$total_la="insert into LegendaArquivo ($campos_la) values ($inclusao_la)";
$inconteudo_la=mysql_db_query($base_fim, $total_la, $conexao_fim);
			
			$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
			}
			
			//Selecionar os Tipos dessa Tese
			$SEL_tp="SELECT * FROM Tipo WHERE tsIdentificador=$VtsIdentificador ORDER BY tpCod";
            $SEL_tp_query=mysql_db_query($base,$SEL_tp,$conexao);
            $SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
			
			while ($SEL_tp_RES!="") {
			$tpCod=$SEL_tp_RES["tpCod"];
			$tpTipo=$SEL_tp_RES["tpTipo"];
			
// inclusão dos Tipos da tese no Banco TEDE
$campos_tp="tpCod,tsIdentificador,tpTipo";
$inclusao_tp="'$tpCod','$VtsIdentificador','$tpTipo'";
$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
$inconteudo_tp=mysql_db_query($base_fim, $total_tp, $conexao_fim);
			
			$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
			}


// seleciona o e-mail do aluno
$SEL_email="select cnEmail from Contas WHERE pfCod=$VpfCod";
$SEL_email_query=mysql_db_query($base,$SEL_email,$conexao);
$SEL_email_RES=mysql_fetch_array($SEL_email_query);

$pfEmail=$SEL_email_RES["cnEmail"];
		 
//Enviar e-mail com a senha e nome da conta para submissão da tese
require "../bibliotecas/servidor.bib";
$de=$servidor_email;
$to="$pfEmail";
$tsDataSubmissao=date("d/m/Y");

$LinkSubmissao="http://".$servidor_diretorio."tde_busca/tde.php?id=".$VtsIdentificador."&id2=".$VpfCod."&id3=".$prCod;

require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloFinalizar2;
$mensagem=$emMensagemFinalizar2;
mail($to,"$titulo",$mensagem,"From: $de");

//Excluir a Conta do Aluno
$excluir_cn="DELETE FROM Contas WHERE tsIdentificador='$VtsIdentificador'";
$exconteudo_tp=mysql_db_query($base, $excluir_cn, $conexao);

//Excluir o Aluno
$SEL_pf="SELECT pfContribuidor FROM PessiaFisica WHERE pfCod=$VpfCod";
$SEL_pf_query=mysql_db_query($base,$SEL_pf,$conexao);
$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
$pfContribuidor=$SEL_pf_RES["pfContribuidor"];

if ($pfContribuidor=="0") {
$excluir_pf="DELETE FROM PessoaFisica WHERE pfCod='$VpfCod'";
$exconteudo_pf=mysql_db_query($base, $excluir_pf, $conexao);
} else {
$inclusao_pf="pfAutor='0'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$VpfCod'";
$inconteudo_tspfDisp=mysql_db_query($base, $total_pf, $conexao);
}
// Alterar a Disponibilidade na Tabela TSPF

$inclusao_tspfDisp="tspfDisponivel='9'";
$total_tspfDisp="UPDATE TSPF SET $inclusao_tspfDisp WHERE tsIdentificador='$VtsIdentificador'";
$inconteudo_tspfDisp=mysql_db_query($base, $total_tspfDisp, $conexao);


$sucesso=$s001; 
header("Location:tde_pos.php?sucesso=$sucesso");
exit;
} }
?>
      <br>
      <table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="loginTable">
        <tr> 
                <td align="right" valign="middle"> <p align="center" class="txtBold"><br>
                    <? require "../bibliotecas/idioma_sistema.bib";
	require "../tde_i18n/tde_biblioteca/mensagens_".$idioma_sistema.".txt";
			
			if ($voltar=="1") { echo $m001; ?>
                  </p>           
            
                  <div>
					<table width="90" height="26" cellpadding="0" cellspacing="0" class="txt" align="right">
                    <tr>
                        <td width="97" align="center" valign="middle" class="botao" onClick="location='finalizar.php?disponibilizar=Nao&VtsIdentificador=<? echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VprCod=<? echo $SprCod; ?>&voltar=1'" ><a href="finalizar.php?disponibilizar=Nao&VtsIdentificador=<? echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VprCod=<? echo $SprCod; ?>&voltar=1" class="menu"><? echo $txConfirmar; ?> </a>&raquo;</td>
                    </tr>
                  </table>
					</div>
                  <p align="center" class="txtBold"> 
                    <? }  
             if ($disponibilizar=="" and $voltar!="1") { echo $m002;?>
                  </p>
            <div>
			<table width="90" height="26" cellpadding="0" cellspacing="0" class="txt" align="right">
                    <tr>
                        <td width="76" align="center" valign="middle" class="botao" onClick="location='finalizar.php?disponibilizar=Sim&VtsIdentificador=<? echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VprCod=<? echo $SprCod; ?>'" ><a href="finalizar.php?disponibilizar=Sim&VtsIdentificador=<? echo $VtsIdentificador; ?>&VpfCod=<? echo $VpfCod; ?>&VprCod=<? echo $SprCod; ?>" class="menu"><? echo $txConfirmar; ?> </a>&raquo;</td>
                    </tr>
                  </table>
			</div>
                  <p align="center"> 
                    <? } if ($disponibilizar!="" and $voltar!="1") {  echo $s001;  } ?>
                  </p>
            </td>
        </tr>
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
<!-- InstanceEnd --></html><? } ?>
