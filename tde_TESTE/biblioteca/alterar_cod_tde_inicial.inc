<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado
require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

// inclusão dos Dados Iniciais da tese na tabela Teses
$tsDataDefesa=$ano."-".$mes."-".$dia;
$inclusao_ts="tsIdioma='$tsIdioma',tsGrau='$tsGrau',tsTitulacao='$tsTitulacao',tsCidadeLocalDefesa='$tsCidadeLocalDefesa',tsUFLocalDefesa='$tsUFLocalDefesa',tsPaisLocalDefesa='$tsPaisLocalDefesa',tsDataDefesa='$tsDataDefesa',tsCampo1='$tsCampo1', tsCampo2='$tsCampo2'";
$total_ts="UPDATE Teses SET $inclusao_ts WHERE tsIdentificador=$tsIdentificador";
$inconteudo_ts=mysql_db_query($base, $total_ts, $conexao);

// Excluir o Titulo original da tese da tabela Titulo
$total_exclusao_tt="DELETE FROM Titulo WHERE tsIdentificador=$tsIdentificador";
$exclusao_tt=mysql_db_query($base, $total_exclusao_tt, $conexao);

// inclusão de Titulo no idioma Original da  tese
$campos_tt="tsIdentificador,ttTitulo,ttIdioma";
$inclusao_tt="'$tsIdentificador','$ttTitulo','$tsIdioma'";
$total_tt="insert into Titulo ($campos_tt) values ($inclusao_tt)";
$inconteudo_tt=mysql_db_query($base, $total_tt, $conexao);
$sucesso=$sg001;

header ("Location:visualizar_tde_inicial.php?sucesso=$sucesso&tsIdentificador=$tsIdentificador&pfCod=$pfCod");
exit;
 } ?>