<?

require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar biblioteca para evitar duplicaчуo
$SEL_bbCod="SELECT bbCod FROM BibliotecaDigital";
$SEL_bbCod_query=mysql_db_query($base_fim,$SEL_bbCod,$conexao_fim);
$SEL_bbCod_RES=mysql_fetch_array($SEL_bbCod_query);

if ($SEL_bbCod_RES!="") {
$erro=$e006;
header("Location=inserir_bib_dig.php?erro=$erro");
} else {
//Insere a Biblioteca Digital
$campos_bb="bbNome,bbSigla,bbURL";
$inclusao_bb="'$bbNome','$bbSigla','$bbURL'";
$total_bb="insert into BibliotecaDigital ($campos_bb) values ($inclusao_bb)";
$inconteudo_bb=mysql_db_query($base_fim, $total_bb, $conexao_fim);

$sucesso=$s001;
header("Location: visualizar_bib_dig.php?sucesso=$sucesso");
exit;
}
}

if ($cod=="Editar") {

//Edita a Biblioteca Digital
$inclusao_bb="bbNome='$bbNome',bbSigla='$bbSigla',bbURL='$bbURL',inCod=1";
$total_bb="UPDATE BibliotecaDigital SET $inclusao_bb";
$inconteudo_bb=mysql_db_query($base_fim, $total_bb, $conexao_fim);

$sucesso=$s001;
header("Location: visualizar_bib_dig.php?sucesso=$sucesso");
//break;

}
?>