<? session_start(SprCod ,ScnCod);
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado
require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

//Pegar a Data de Atualização(DateStamp)
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);

// inclusão dos Dados Iniciais da tese na tabela Teses
$tsDataDefesa=$ano."-".$mes."-".$dia;
$campos_ts="tsIdioma,tsGrau,tsTitulacao,tsDataAtualizacao,tsCidadeLocalDefesa,tsUFLocalDefesa,tsPaisLocalDefesa,tsDataDefesa,tsCampo1,tsCampo2";
$inclusao_ts="'$tsIdioma','$tsGrau','$tsTitulacao','$tsDataAtualizacao','$tsCidadeLocalDefesa','$tsUFLocalDefesa','$tsPaisLocalDefesa','$tsDataDefesa','$tsCampo1','$tsCampo2'";
$total_ts="insert into Teses ($campos_ts) values ($inclusao_ts)";

$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);

//Selecionar o tsIdentificador da tese
$SEL_Identificador="SELECT tsIdentificador FROM Teses WHERE tsDataAtualizacao='$tsDataAtualizacao' and tsDataDefesa='$tsDataDefesa' and tsGrau='$tsGrau'";
$SEL_Identificador_query=mysql_db_query($base,$SEL_Identificador,$conexao);
$SEL_Identificador_RES=mysql_fetch_array($SEL_Identificador_query);

//Armazena o tsIdentificador da tese gerado na variável $tsIdentificador
$tsIdentificador=$SEL_Identificador_RES["tsIdentificador"];

//Cria diretorio dos arquivos da tese
$tede="Sim";
require "../tde_arquivos/biblioteca/cria_diretorio.inc";

// inclusão do relacionamento da tabela TSPF

$inclusao_tspf="tsIdentificador='$tsIdentificador'";
$total_tspf="UPDATE TSPF SET $inclusao_tspf WHERE pfCod=$pfCod and tspfTipo='Autor'";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);

// inclusão de Titulo da tese na tabela Titulo
$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$tsIdentificador','$ttTitulo','$tsIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);

// inclusão do relacionamento na Tabela TSPR

$total_tspr="UPDATE TSPR SET tsIdentificador=$tsIdentificador WHERE prCod=$prCod";
$inconteudo_tspr=mysql_db_query($base, $total_tspr, $conexao);
$sucesso=$sg001;
header("Location:visualizar_tde_inicial.php?sucesso=$sucesso&tsIdentificador=$tsIdentificador&pfCod=$pfCod");
exit;
} ?>