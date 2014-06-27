<?

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar contato para evitar duplicaчуo
$SEL_ctCod="SELECT ctCod FROM Contatos WHERE ctNome='$ctNome' and ctEmail='$ctEmail'";
$SEL_ctCod_query=mysql_db_query($base,$SEL_ctCod,$conexao);
$SEL_ctCod_RES=mysql_fetch_array($SEL_ctCod_query);

if ($SEL_ctCod_RES!="") {
$erro=$e012;
header("Location=inserir_contato.php?erro=$erro");
} else {
//Insere a Contato
$campos_ct="ctNome,ctEmail,ctDescricao,ctDispEmail";
$inclusao_ct="'$ctNome','$ctEmail','$ctDescricao','$ctDispEmail'";
$total_ct="insert into Contatos ($campos_ct) values ($inclusao_ct)";
$inconteudo_ct=mysql_db_query($base, $total_ct, $conexao);

}
//Selecionar contato para evitar duplicaчуo
$SEL_ctCod="SELECT ctCod FROM Contatos WHERE ctNome='$ctNome' and ctEmail='$ctEmail'";
$SEL_ctCod_query=mysql_db_query($base,$SEL_ctCod,$conexao);
$SEL_ctCod_RES=mysql_fetch_array($SEL_ctCod_query);
$DctCod=$SEL_ctCod_RES[ctCod];
$sucesso=$s001;
header("Location: visualizar_contato.php?v=Editar&EVctCod=$DctCod&sucesso=$sucesso");
exit;
}

if ($cod=="Alterar") {

//Edita o Contato
$inclusao_ct="ctNome='$ctNome',ctEmail='$ctEmail',ctDescricao='$ctDescricao',ctDispEmail='$ctDispEmail'";
$total_ct="UPDATE Contatos SET $inclusao_ct WHERE ctCod=$ctCod";
$inconteudo_ct=mysql_db_query($base, $total_ct, $conexao);

$sucesso=$s001;
header("Location: visualizar_contato.php?v=Editar&EVctCod=$ctCod&sucesso=$sucesso");
exit;

}

if ($cod=="Excluir") {

$total="DELETE FROM Contatos WHERE ctCod='$ctCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$s001;
header("Location: visualizar_contato.php?v=Editar&sucesso=$sucesso");
exit;
}


?>