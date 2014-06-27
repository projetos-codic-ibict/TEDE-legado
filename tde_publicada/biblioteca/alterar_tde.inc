<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

if ($Alterar=="") {
header("Location: alterar_tde.php?AreaCNPQ=$AreaCNPQ#AreaCNPQ");
}

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

//Pegar a Data de Atualização(DateStamp)

$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$tsDataFinalizacao = date("Y-m-d");
session_register(tsDataFinalizacao);

// Alteração da Citação do Autor da tese na tabela PessoaFisica
/*
$inclusao_pf="pfCitacao='$pfCitacao',pfLattes='$pfLattes',pfCPF='$pfCPF'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod=$TpfCod";

$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf, $conexao_fim);
*/
// inclusão dos Dados Iniciais da tese na tabela Teses

$tsDataDefesa=$ano."-".$mes."-".$dia;
$inclusao_ts="tsDataAtualizacao='$tsDataAtualizacao',tsNumeroChamada='$tsNumeroChamada',tsIdioma='$tsIdioma',tsGrau='$tsGrau',tsTitulacao='$tsTitulacao',tsUFLocalDefesa='$tsUFLocalDefesa', tsCidadeLocalDefesa='$tsCidadeLocalDefesa',tsDataDefesa='$tsDataDefesa', tsCampo1='$tsCampo1', tsCampo2='$tsCampo2'";
$total_ts="UPDATE Teses SET $inclusao_ts WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);
$inconteudo_ts_fim=mysql_db_query($base_fim, $total_ts, $conexao_fim);

// inclusão do status de disponibilização do email na página de rosto na tabela TSPF

$inclusao_tspf="tspfDispEmail='$tspfDispEmail'";
$total_tspf="UPDATE TSPF SET $inclusao_tspf WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);
$inconteudo_tspf_fim=mysql_db_query($base_fim, $total_tspf, $conexao_fim);

// Excluir o Titulo original da tese da tabela Titulo

$total_exclusao_tt="DELETE FROM Titulo WHERE tsIdentificador=$VtsIdentificador";
$exclusao_tt=mysql_db_query($base, $total_exclusao_tt, $conexao);
$exclusao_tt=mysql_db_query($base_fim, $total_exclusao_tt, $conexao_fim);

// inclusão de Titulo no idioma Original da  tese

$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$VtsIdentificador','$ttTitulo','$tsIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);
$inconteudo_tt_fim=mysql_db_query($base_fim, $total_tt, $conexao_fim);

// inclusão de Titulo no idioma Alternativo da  tese

if ($ttTitulo2!="") {

$campos_tt2="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt2="'$VtsIdentificador','$ttTitulo2','$tsIdiomaALT'";
$total_tt2="insert into Titulo ($campos_tt2) values ($inclusao_tt2)";
$inconteudo_tt2=mysql_db_query($base, $total_tt2, $conexao);
$inconteudo_tt2_fim=mysql_db_query($base_fim, $total_tt2, $conexao_fim);
}

// Excluir o Resumo da tese da tabela Resumo

$total_exclusao_rs="DELETE FROM Resumo WHERE tsIdentificador=$VtsIdentificador";
$exclusao_rs=mysql_db_query($base, $total_exclusao_rs, $conexao);
$exclusao_rs_fim=mysql_db_query($base_fim, $total_exclusao_rs, $conexao_fim);

// inclusão de Resumo da tese no idioma Original

$campos_rs="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs="'$VtsIdentificador','$rsResumo','$tsIdioma'";
$total_rs="insert into Resumo ($campos_rs) values ($inclusao_rs)";
$inconteudo_rs=mysql_db_query($base, $total_rs, $conexao);
$inconteudo_rs_fim=mysql_db_query($base_fim, $total_rs, $conexao_fim);

// inclusão de Resumo da tese no idioma Alternativo

if ($rsResumo2!="") {

$campos_rs2="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs2="'$VtsIdentificador','$rsResumo2','$tsIdiomaALT'";
$total_rs2="insert into Resumo ($campos_rs2) values ($inclusao_rs2)";
$inconteudo_rs2=mysql_db_query($base, $total_rs2, $conexao);
$inconteudo_rs2_fim=mysql_db_query($base_fim, $total_rs2, $conexao_fim);

}

// Excluir o Assunto da tese da tabela Assunto

$total_exclusao_as="DELETE FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema='Palavra-chave'";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);
$exclusao_as_fim=mysql_db_query($base_fim, $total_exclusao_as, $conexao_fim);

// inclusão de Assunto(palavras-chave) da tese no idioma Alternativo na tabela Assunto

if ($asAssunto2!="") {

$asAssunto2Split=split(";",$asAssunto2);
$asQTD2=count($asAssunto2Split);

for ($i=0; $i<=$asQTD2; $i++) {

$campos_as2="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as2="'$VtsIdentificador','$asAssunto2Split[$i]','$tsIdioma','Palavra-chave'";
$total_as2="insert into Assunto ($campos_as2) values ($inclusao_as2)";
$inconteudo_as2=mysql_db_query($base, $total_as2, $conexao);

$sel2="select * from Assunto where tsIdentificador=$VtsIdentificador and asAssunto='$asAssunto2Split[$i]' and asIdioma='$tsIdioma' and asEsquema='Palavra-chave'";
$sel_query2=mysql_db_query($base,$sel2,$conexao);
$selRESP2=mysql_fetch_array($sel_query2);
$IasCod2=$selRESP2['asCod'];
$campos_as_fim2="asCod,tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as_fim2="'$IasCod2','$VtsIdentificador','$asAssunto2Split[$i]','$tsIdioma','Palavra-chave'";
$total_as_fim2="insert into Assunto ($campos_as_fim2) values ($inclusao_as_fim2)";
$inconteudo_as_fim2=mysql_db_query($base_fim, $total_as_fim2, $conexao_fim);

}
}

// inclusão de Assunto da tese no idioma Alternativo na tabela Assunto

if ($asAssunto3!="") {

$asAssunto3Split=split(";",$asAssunto3);
$asQTD3=count($asAssunto3Split);

for ($i=0; $i<=$asQTD3; $i++) {

$campos_as3="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as3="'$VtsIdentificador','$asAssunto3Split[$i]','$tsIdiomaALT','Palavra-chave'";
$total_as3="insert into Assunto ($campos_as3) values ($inclusao_as3)";
$inconteudo_as3=mysql_db_query($base, $total_as3, $conexao);

$sel3="select * from Assunto where tsIdentificador=$VtsIdentificador and asAssunto='$asAssunto3Split[$i]' and asIdioma='$tsIdiomaALT' and asEsquema='Palavra-chave'";
$sel_query3=mysql_db_query($base,$sel3,$conexao);
$selRESP3=mysql_fetch_array($sel_query3);
$IasCod3=$selRESP3['asCod'];
$campos_as_fim3="asCod,tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as_fim3="'$IasCod3','$VtsIdentificador','$asAssunto3Split[$i]','$tsIdiomaALT','Palavra-chave'";
$total_as_fim3="insert into Assunto ($campos_as_fim3) values ($inclusao_as_fim3)";
$inconteudo_as_fim3=mysql_db_query($base_fim, $total_as_fim3, $conexao_fim);
}
}

// Excluir o Assunto em branco do banco

$total_exclusao_as="DELETE FROM Assunto WHERE asAssunto=' ' or asAssunto='  '";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);
$exclusao_as_fim=mysql_db_query($base_fim, $total_exclusao_as, $conexao_fim);

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

header("Location:visualizar_tde.php?VtsIdentificador=$VtsIdentificador&VpfCod=$TpfCod &VprCod=$SprCod&sucesso=$sg001");
exit;

} ?>