<?

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar programa para evitar duplicaзгo
$SEL_prCod="SELECT prCod FROM Programa WHERE prNome='$prNome' and prArea='$prArea'";
$SEL_prCod_query=mysql_db_query($base,$SEL_prCod,$conexao);
$SEL_prCod_RES=mysql_fetch_array($SEL_prCod_query);

if ($SEL_prCod_RES!="") {
$erro=$e009;
header("Location=inserir_prog.php?erro=$erro");
} else {
//Insere o Programa
$campos_pr="prNome,prArea,prStatus,bdCod";
$inclusao_pr="'$prNome','$prArea','ATIVO','$bdCod'";
$total_pr="insert into Programa ($campos_pr) values ($inclusao_pr)";
$inconteudo_pr=mysql_db_query($base, $total_pr, $conexao);

//Insere a Programa
$campos_pr_fim="prNome,prArea,bdCod";
$inclusao_pr_fim="'$prNome','$prArea','$bdCod'";
$total_pr_fim="insert into Programa ($campos_pr_fim) values ($inclusao_pr_fim)";
$inconteudo_pr2_fim=mysql_db_query($base_fim, $total_pr_fim, $conexao_fim);

//Seleciona o prCod criado para a criaзгo do Diretуrio
$SEL_prCod="SELECT prCod FROM Programa WHERE prNome='$prNome' and prArea='$prArea'";
$SEL_prCod_query=mysql_db_query($base,$SEL_prCod,$conexao);
$SEL_prCod_RES=mysql_fetch_array($SEL_prCod_query);
$DprCod=$SEL_prCod_RES[prCod];
$programa="Sim";
//Cria diretуrio na pasta tde_arquivos com o nъmero do programa
include "../tde_arquivos/biblioteca/cria_diretorio.inc";

//Verifica se houve a craiзгo do diretуrio
clearstatcache();
if (is_dir("../tde_arquivos/".$DprCod)) {
$verifica_diretorio=1;
} else{
$verifica_diretorio=0;
}
//Se o diretуrio nгo foi criado ele escluirб do banco de dados o programa inserido
if ($verifica_diretorio==0){
$total="DELETE FROM Programa WHERE prCod='$DprCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao2=mysql_db_query($base_fim, $total, $conexao_fim);
$erro=$e016;
header("Location: inserir_prog.php?erro=$erro");
exit;
} 
}
$sucesso=$s001;
header("Location: visualizar_prog.php?v=Editar&EVprCod=$DprCod&sucesso=$sucesso");
exit;
}

if ($cod=="Editar") {
// Verifica Status e seus relacionamentos
if ($prStatus=='INATIVO') {
$SEL_rel="SELECT tsIdentificador FROM TSPF WHERE prCod='$prCod' and (tspfDisponivel!='0' and tspfDisponivel!='9')";
$SEL_rel_query=mysql_db_query($base,$SEL_rel,$conexao);
$SEL_rel_RES=mysql_fetch_array($SEL_rel_query);
while ($SEL_rel_RES!="") {

$tsIdentificadorRel[]=$SEL_rel_RES[tsIdentificador];

$SEL_rel_RES=mysql_fetch_array($SEL_rel_query);
}}
if ($tsIdentificadorRel!=""){
$relacionamentos=$e010;
header("Location: editar_prog.php?relacionamentos=$relacionamentos&tdes=$tsIdentificadorRel&prCod=$prCod");
} else {
//Edita o Programa
$inclusao_pr="prNome='$prNome',prArea='$prArea',prStatus='$prStatus',bdCod='$bdCod'";
$total_pr="UPDATE Programa SET $inclusao_pr WHERE prCod=$prCod";
$inconteudo_pr=mysql_db_query($base, $total_pr, $conexao);

$inclusao_pr_fim="prNome='$prNome',prArea='$prArea',bdCod='$bdCod'";
$total_pr_fim="UPDATE Programa SET $inclusao_pr_fim WHERE prCod=$prCod";
$inconteudo_pr2_fim=mysql_db_query($base_fim, $total_pr_fim, $conexao_fim);

$sucesso=$s001;
header("Location: visualizar_prog.php?v=Editar&EVprCod=$prCod&sucesso=$sucesso");
exit;
}
}

if ($cod=="Excluir") {

$total="DELETE FROM Programa WHERE prCod='$prCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao2=mysql_db_query($base_fim, $total, $conexao_fim);

$sucesso=$s001;
header("Location: visualizar_prog.php?v=Editar&sucesso=$sucesso");

}


?>