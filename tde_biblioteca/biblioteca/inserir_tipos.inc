<?php

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
if ($VpfCod=="") {
$VpfCod=$pfCod;
}
if ($VtsIdentificador=="") {
$VtsIdentificador=$tsIdentificador;
}
if ($cod=="Excluir") {

$total="DELETE FROM Tipo WHERE tpCod='$tpCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$sg001;

header("Location: inserir_tipos.php?tsIdentificador=$VtsIdentificador&pfCod=$VpfCod&sucesso=$sucesso");

exit;

}

if ($cod=="Inserir") {

$sel="select tpCod from Tipo where tsIdentificador=$VtsIdentificador and tpTipo='$tpTipo'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);

if ($selRESP!="") {

//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e001;
header("Location: inserir_tipos.php?tsIdentificador=$VtsIdentificador&pfCod=$VpfCod&erro=$erro");
exit;

} else {

// inclusуo do relacionamento da tabela TSPF

$campos_tp="tsIdentificador,tpTipo";
$inclusao_tp="'$VtsIdentificador','$tpTipo'";
$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
$inconteudo_tp=mysql_db_query($base, $total_tp, $conexao);

$sel="select tpCod from Tipo where tsIdentificador=$VtsIdentificador and tpTipo='$tpTipo'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$EVtpCod=$selRESP[tpCod];
$sucesso=$sg001;
header("Location: inserir_tipos.php?tsIdentificador=$VtsIdentificador&pfCod=$VpfCod&sucesso=$sucesso&EVtpCod=$EVtpCod");
exit;

} }

?>