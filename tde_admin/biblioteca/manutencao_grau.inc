<?
require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar Grau para evitar duplicaчуo
$SEL="SELECT bdCod FROM Grau WHERE grNome='$grNome' and grIdiomaPais='$idioma_sistema'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

if ($SEL_RES!="") {
$erro=$e007;
header("Location=inserir_grau.php?erro=$erro");
} else {
//Insere o novo Grau
$campos="grNome,grIdiomaPais";
$inclusao="'$grNome','$idioma_sistema'";
$total="insert into Grupo ($campos) values ($inclusao)";
$inconteudo=mysql_db_query($base, $total, $conexao);
}
$sucesso=$s001;
header("Location: inserir_grau.php?sucesso=$sucesso");
//break;
}


if ($cod=="Excluir") {

//Excluir Grau
$exclusao="DELETE FROM Grau WHERE grCod=$grCod";
$exconteudo=mysql_db_query($base, $total, $conexao);

$sucesso=$s001;
header("Location: inserir_grau.php?sucesso=$sucesso");
}
?>