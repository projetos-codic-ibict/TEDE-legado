<?php

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM Tipo WHERE tpCod='$tpCod'";

$exclusao=mysql_db_query($base, $total, $conexao);
$sucesso=$sg001;
//echo $total;
//exit;
header("Location: inserir-tipos.php?VtsIdentificador=$VtsIdentificador&VpfCod=$VpfCod&VprCod=$SprCod");
exit;
}

if ($cod=="Inserir") {

$sel="select tpCod from Tipo where tsIdentificador=$VtsIdentificador and tpTipo='$tpTipo'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);

if ($selRESP!="") {

//Fecha conexao com o Banco
mysql_close($conexao);

//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e006;
header("Location: inserir_tipos.php?erro=$erro&VtsIdentificador=$VtsIdentificador&VpfCod=$VpfCod&VprCod=$SprCod");
exit;

} else {

// inclusуo do relacionamento da tabela TSPF
$campos_tp="tsIdentificador,tpTipo";
$inclusao_tp="'$VtsIdentificador','$tpTipo'";
$total_tp="insert into Tipo ($campos_tp) values ($inclusao_tp)";
$inconteudo_tp=mysql_db_query($base, $total_tp, $conexao);

//Fecha conexao com o Banco
mysql_close($conexao);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: inserir_tipos.php?VtsIdentificador=$VtsIdentificador&VpfCod=$VpfCod&VprCod=$SprCod");
exit;

} }
?>