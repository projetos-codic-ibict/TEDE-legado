<?

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar biblioteca para evitar duplicação
$SEL_bdCod="SELECT bdCod FROM BibliotecaDepositaria WHERE bdNome='$bdNome' and bdSigla='$bdSigla'";
$SEL_bdCod_query=mysql_db_query($base,$SEL_bdCod,$conexao);
$SEL_bdCod_RES=mysql_fetch_array($SEL_bdCod_query);

if ($SEL_bdCod_RES!="") {
$erro=$e007;
header("Location=inserir_bib.php?erro=$erro");
} else {
//Insere a Biblioteca Depositária
$campos_bd="bdNome,bdSigla,bdURL,bdStatus";
$inclusao_bd="'$bdNome','$bdSigla','$bdURL','ATIVA'";
$total_bd="insert into BibliotecaDepositaria ($campos_bd) values ($inclusao_bd)";
$inconteudo_bd=mysql_db_query($base, $total_bd, $conexao);

//Insere a Biblioteca Depositária
$campos_bd_fim="bdNome,bdSigla,bdURL";
$inclusao_bd_fim="'$bdNome','$bdSigla','$bdURL'";
$total_bd_fim="insert into BibliotecaDepositaria ($campos_bd_fim) values ($inclusao_bd_fim)";
$inconteudo_bd2_fim=mysql_db_query($base_fim, $total_bd_fim, $conexao_fim);
}
$SEL_bdCod="SELECT bdCod FROM BibliotecaDepositaria WHERE bdNome='$bdNome' and bdSigla='$bdSigla'";
$SEL_bdCod_query=mysql_db_query($base,$SEL_bdCod,$conexao);
$SEL_bdCod_RES=mysql_fetch_array($SEL_bdCod_query);
$VbdCod=$SEL_bdCod_RES[bdCod];
$sucesso=$s001;
header("Location: visualizar_bib.php?v=Editar&VbdCod=$VbdCod&sucesso=$sucesso");
//break;

}

if ($cod=="Editar") {

// Verifica Status e seus relacionamentos
if ($bdStatus=='INATIVA') {
$SEL_rel="SELECT prCod FROM Programa WHERE bdCod='$bdCod'";
$SEL_rel_query=mysql_db_query($base,$SEL_rel,$conexao);
$SEL_rel_RES=mysql_fetch_array($SEL_rel_query);
while ($SEL_rel_RES!="") {

$prCod[]=$SEL_rel_RES['prCod'];

$SEL_rel_RES=mysql_fetch_array($SEL_rel_query);
}}
if ($prCod!=""){
$relacionamentos=$e008;
header("Location: editar_bib.php?relacionamentos=$relacionamentos&bdCod=$bdCod");
} else {

//Edita a Biblioteca Depositária
$inclusao_bd="bdNome='$bdNome',bdSigla='$bdSigla',bdURL='$bdURL',bdStatus='$bdStatus'";
$total_bd="UPDATE BibliotecaDepositaria SET $inclusao_bd WHERE bdCod=$bdCod";
$inconteudo_bd=mysql_db_query($base, $total_bd, $conexao);

$inclusao_bd_fim="bdNome='$bdNome',bdSigla='$bdSigla',bdURL='$bdURL'";
$total_bd_fim="UPDATE BibliotecaDepositaria SET $inclusao_bd_fim WHERE bdCod=$bdCod";
$inconteudo_bd2_fim=mysql_db_query($base_fim, $total_bd_fim, $conexao_fim);

$sucesso=$s001;

header("Location: visualizar_bib.php?v=Editar&VbdCod=$bdCod&sucesso=$sucesso");
exit;
}
}

/*
if ($cod=="Excluir") {

//Excluir Biblioteca Depositária
$exclusao_bd="DELETE FROM BibliotecaDepositaria WHERE bdCod=$bdCod";
$exconteudo_bd=mysql_db_query($base, $total_bd, $conexao);
$exconteudo_bd2=mysql_db_query($base_fim, $exclusao_bd_bd, $conexao_fim);

$sucesso=$s001;
header("Location: visualizar_bib.php?v=Editar&sucesso=$sucesso");

}
*/

?>