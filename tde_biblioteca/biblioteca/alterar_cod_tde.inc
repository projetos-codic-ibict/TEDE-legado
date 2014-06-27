<?

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado

require "../conexao/conexao.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

//Pegar a Data de Atualização(DateStamp)
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$tsDataRevisao = date("Y-m-d");
session_register(tsDataFinalizacao);

// inclusão dos Dados Iniciais da tese na tabela Teses
$tsDataDefesa=$ano."-".$mes."-".$dia;
$inclusao_ts="tsNumeroChamada='$tsNumeroChamada',tsGrau='$tsGrau', tsTitulacao='$tsTitulacao',tsIdioma='$tsIdioma',tsCidadeLocalDefesa='$tsCidadeLocalDefesa', tsUFLocalDefesa='$tsUFLocalDefesa', tsPaisLocalDefesa='$tsPaisLocalDefesa', tsDataDefesa='$tsDataDefesa' , tsDataRevisao='$tsDataRevisao', cnCodRevisor='$ScnCod', tsOBS='$tsOBS2', tsOBSDestino='$tsOBSDestino',tsCampo1='$tsCampo1', tsCampo2='$tsCampo2'";
$total_ts="UPDATE Teses SET $inclusao_ts WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);

// inclusão do relacionamento da tabela TSPF

$inclusao_tspf="tspfDispEmail='$tspfDispEmail'";
$total_tspf="UPDATE TSPF SET $inclusao_tspf WHERE tsIdentificador=$VtsIdentificador and tspfTipo='Autor'";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);

$SEL_tt="SELECT ttCod FROM Titulo WHERE tsIdentificador=$VtsIdentificador ORDER by ttCod";
$SEL_tt_query=mysql_db_query($base,$SEL_tt,$conexao);
$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);
$ttCod=$SEL_tt_RES["ttCod"];

// Excluir o Titulo original da tese da tabela Titulo

$total_exclusao_tt="DELETE FROM Titulo WHERE tsIdentificador=$VtsIdentificador";
$exclusao_tt=mysql_db_query($base, $total_exclusao_tt, $conexao);

// inclusão de Titulo no idioma Original da  tese

$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$VtsIdentificador','$AttTitulo','$tsIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);

// inclusão de Titulo no idioma Alternativo da  tese

if ($AttTitulo2!="") {

$campos_tt2="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt2="'$VtsIdentificador','$AttTitulo2','$tsIdiomaALT'";
$total_tt2="insert into Titulo ($campos_tt2) values ($inclusao_tt2)";
$inconteudo_tt2=mysql_db_query($base, $total_tt2, $conexao);

}

// Excluir o Resumo da tese da tabela Resumo

$total_exclusao_rs="DELETE FROM Resumo WHERE tsIdentificador=$VtsIdentificador";
$exclusao_rs=mysql_db_query($base, $total_exclusao_rs, $conexao);

// inclusão de Resumo da tese no idioma Original

$campos_rs="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs="'$VtsIdentificador','$ArsResumo','$tsIdioma'";
$total_rs="insert into Resumo ($campos_rs) values ($inclusao_rs)";
$inconteudo_rs=mysql_db_query($base, $total_rs, $conexao);

// inclusão de Resumo da tese no idioma Alternativo

if ($ArsResumo2!="") {

$campos_rs2="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs2="'$VtsIdentificador','$ArsResumo2','$tsIdiomaALT'";
$total_rs2="insert into Resumo ($campos_rs2) values ($inclusao_rs2)";
$inconteudo_rs2=mysql_db_query($base, $total_rs2, $conexao);

}

// Excluir o Assunto da tese da tabela Assunto

$total_exclusao_as="DELETE FROM Assunto WHERE tsIdentificador=$VtsIdentificador and asEsquema!='Tabela CNPQ'";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);

// inclusão de Assunto(palavras-chave) da tese no idioma Alternativo na tabela Assunto

if ($AasAssunto2!="") {

$asAssunto2Split=split(";",$AasAssunto2);
$asQTD2=count($asAssunto2Split);

for ($i=0; $i<=$asQTD2; $i++) {

$campos_as2="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as2="'$VtsIdentificador','$asAssunto2Split[$i]','$tsIdioma','Palavra-chave'";
$total_as2="insert into Assunto ($campos_as2) values ($inclusao_as2)";
$inconteudo_as2=mysql_db_query($base, $total_as2, $conexao);

}
}

// inclusão de Assunto da tese no idioma Alternativo na tabela Assunto

if ($AasAssunto3!="") {

$asAssunto3Split=split(";",$AasAssunto3);
$asQTD3=count($asAssunto3Split);

for ($i=0; $i<=$asQTD3; $i++) {

$campos_as3="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as3="'$VtsIdentificador','$asAssunto3Split[$i]','$tsIdiomaALT','Palavra-chave'";
$total_as3="insert into Assunto ($campos_as3) values ($inclusao_as3)";
$inconteudo_as3=mysql_db_query($base, $total_as3, $conexao);

}
}
// Excluir o Assunto em branco do banco

$total_exclusao_as="DELETE FROM Assunto WHERE asAssunto=' ' or asAssunto='  '";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);

//#######################################################

$sucesso=$sg001;

header("Location:visualizar_tde.php?sucesso=$sucesso&tsIdentificador=$VtsIdentificador&pfCod=$VpfCod");
exit;
?>