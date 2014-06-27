<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{


require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao_fim.inc";

if ($cod=="Excluir") {

$total="DELETE FROM Tipo WHERE tpCod='$tpCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;

header("Location: inserir_tipos.php?sucesso=$sucesso");

exit;

}

if ($cod=="Inserir") {

$sel="select tpCod from Tipo where tsIdentificador=$VtsIdentificador and tpTipo='$tpTipo'";
$sel_query=mysql_db_query($base_fim,$sel,$conexao_fim);
$selRESP=mysql_fetch_array($sel_query);

if ($selRESP!="") {

//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e001;
header("Location: inserir_tipos.php?erro=$erro");
exit;

} else {

// inclusуo do relacionamento da tabela TSPF

$campos_tp="tsIdentificador,tpTipo";
$inclusao_tp="'$VtsIdentificador','$tpTipo'";
$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
$inconteudo_tp=mysql_db_query($base, $total_tp, $conexao);
$inconteudo_tp_fim=mysql_db_query($base_fim, $total_tp, $conexao_fim);

$sel="select tpCod from Tipo where tsIdentificador=$VtsIdentificador and tpTipo='$tpTipo'";
$sel_query=mysql_db_query($base_fim,$sel,$conexao_fim);
$selRESP=mysql_fetch_array($sel_query);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$EVtpCod=$selRESP[tpCod];
$sucesso=$sg001;
header("Location: inserir_tipos.php?sucesso=$sucesso&tsIdentificador=$VtsIdentificador&EVtpCod=$EVtpCod");
exit;

} }
}
?>