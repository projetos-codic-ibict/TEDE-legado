<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado
require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

//Pegar a Data de Atualização(DateStamp)
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);

// inclusão dos Dados Iniciais da tese na tabela Teses
$tsDataDefesa=$ano."-".$mes."-".$dia;
$campos_ts="tsNumeroChamada,tsIdioma,tsGrau,tsTitulacao,tsDataAtualizacao,tsCidadeLocalDefesa,tsUFLocalDefesa,tsPaisLocalDefesa,tsDataDefesa,tsCampo1,tsCampo2";
$inclusao_ts="'$tsNumeroChamada','$tsIdioma','$tsGrau','$tsTitulacao','$tsDataAtualizacao','$tsCidadeLocalDefesa','$tsUFLocalDefesa','$tsPaisLocalDefesa','$tsDataDefesa','$tsCampo1','$tsCampo2'";
$total_ts="insert into Teses ($campos_ts) values ($inclusao_ts)";
$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);
$tsIdentificador=mysql_insert_id();
//Tratamento da tsDataAtualizacao para mysql com versao acima do 4.0
$tsDataAtualizacaoSPLIT=split('Z',$tsDataAtualizacao);
/*
//Selecionar o tsIdentificador da tese
$SEL_Identificador="SELECT tsIdentificador FROM Teses WHERE tsDataAtualizacao='$tsDataAtualizacaoSPLIT[0]' and tsDataDefesa='$tsDataDefesa' and tsGrau='$tsGrau'";
$SEL_Identificador_query=mysql_db_query($base,$SEL_Identificador,$conexao);
$SEL_Identificador_RES=mysql_fetch_array($SEL_Identificador_query);

//Armazena o tsIdentificador da tese gerado na variável $tsIdentificador
$tsIdentificador=$SEL_Identificador_RES["tsIdentificador"];
*/
if ($SprCod=="") {
$SprCod=$prCod;
}
//Cria diretorio dos arquivos da tese
$tede="Sim";
include "../tde_arquivos/biblioteca/cria_diretorio.inc";
//Verifica se foi criado o diretório
clearstatcache();
if (is_dir("../tde_arquivos/".$SprCod."/TDE-".$tsDataAtualizacao."-".$tsIdentificador)) {
$verifica_diretorio=1;
} else{
$verifica_diretorio=0;
}
clearstatcache();
if (is_dir("../tde_arquivos/".$SprCod."/TDE-".$tsDataAtualizacao."-".$tsIdentificador."/Retido")) {
$verifica_diretorio=1;
} else{
$verifica_diretorio=0;
}
clearstatcache();
if (is_dir("../tde_arquivos/".$SprCod."/TDE-".$tsDataAtualizacao."-".$tsIdentificador."/Restrito")) {
$verifica_diretorio=1;
} else{
$verifica_diretorio=0;
}
clearstatcache();
if (is_dir("../tde_arquivos/".$SprCod."/TDE-".$tsDataAtualizacao."-".$tsIdentificador."/Publico")) {
$verifica_diretorio=1;
} else{
$verifica_diretorio=0;
}
if ($verifica_diretorio==0){
$total="DELETE FROM Teses WHERE tsIdentificador='$tsIdentificador'";
$exclusao=mysql_db_query($base, $total, $conexao);
$erro=$e020;
header("Location: visualizar_tde_iniciadas.php?erro=$erro");
exit;
} 
// inclusão do relacionamento da tabela TSPF

$inclusao_tspf="tsIdentificador='$tsIdentificador',tspfDispEmail='$tspfDispEmail'";
$total_tspf="UPDATE TSPF SET $inclusao_tspf WHERE pfCod=$pfCod and tspfTipo='Autor' and tsIdentificador='0'";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);

// inclusão de Titulo da tese na tabela Titulo
$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$tsIdentificador','$ttTitulo','$tsIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);

// inclusão do relacionamento na Tabela TSPR

$total_tspr="UPDATE TSPR SET tsIdentificador=$tsIdentificador WHERE prCod=$SprCod";
$inconteudo_tspr=mysql_db_query($base, $total_tspr, $conexao);
$sucesso=$sg001;

/*###############################Colocar no autor#####################
// inclusão do staus de disponibilização do email na página de rosto na tabela TSPF

$inclusao_tspf="tspfDispEmail='$tspfDispEmail'";
$total_tspf="UPDATE TSPF SET $inclusao_tspf WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);
############################################### */

if ($ttTitulo2!="") {

$campos_tt2="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt2="'$tsIdentificador','$ttTitulo2','$tsIdiomaALT'";
$total_tt2="insert into Titulo ($campos_tt2) values ($inclusao_tt2)";
$inconteudo_tt2=mysql_db_query($base, $total_tt2, $conexao);

}

// inclusão de Resumo da tese no idioma Original

$campos_rs="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs="'$tsIdentificador','$rsResumo','$tsIdioma'";
$total_rs="insert into Resumo ($campos_rs) values ($inclusao_rs)";
$inconteudo_rs=mysql_db_query($base, $total_rs, $conexao);

// inclusão de Resumo da tese no idioma Alternativo

if ($rsResumo2!="") {

$campos_rs2="tsIdentificador,rsResumo,rsIdioma";
$inclusao_rs2="'$tsIdentificador','$rsResumo2','$tsIdiomaALT'";
$total_rs2="insert into Resumo ($campos_rs2) values ($inclusao_rs2)";
$inconteudo_rs2=mysql_db_query($base, $total_rs2, $conexao);

}

// inclusão de Assunto(palavras-chave) da tese no idioma Alternativo na tabela Assunto
if ($asAssunto2!="") {

$asAssunto2Split=split(";",$asAssunto2);
$asQTD2=count($asAssunto2Split);

for ($i=0; $i<=$asQTD2; $i++) {

$campos_as2="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as2="'$tsIdentificador','$asAssunto2Split[$i]','$tsIdioma','Palavra-chave'";
$total_as2="insert into Assunto ($campos_as2) values ($inclusao_as2)";
$inconteudo_as2=mysql_db_query($base, $total_as2, $conexao);
}
}

// inclusão de Assunto da tese no idioma Alternativo na tabela Assunto
if ($asAssunto3!="") {

$asAssunto3Split=split(";",$asAssunto3);
$asQTD3=count($asAssunto3Split);

for ($i=0; $i<=$asQTD3; $i++) {

$campos_as3="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as3="'$tsIdentificador','$asAssunto3Split[$i]','$tsIdiomaALT','Palavra-chave'";
$total_as3="insert into Assunto ($campos_as3) values ($inclusao_as3)";
$inconteudo_as3=mysql_db_query($base, $total_as3, $conexao);
}
}

// Excluir o Assunto em branco do banco
$total_exclusao_as="DELETE FROM Assunto WHERE asAssunto=' ' or asAssunto='  '";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);

// inclusão do Tipo padrão
$campos_tp="tsIdentificador,tpTipo";
$inclusao_tp="'$tsIdentificador','Electronic Thesis and Dissertation'";
$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
$inconteudo_tp=mysql_db_query($base, $total_tp, $conexao);

//################################################################
header("Location:visualizar_tde.php?sucesso=$sucesso&tsIdentificador=$tsIdentificador&pfCod=$pfCod");
exit;
} ?>