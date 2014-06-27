<?
session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../index.php");
}else{

require "../bibliotecas/idioma_sistema.bib";


require "../conexao/conexao.inc";

$SEL_ss="SELECT * FROM Sessao WHERE tsIdentificador=$VtsIdentificador and ssDataSaida='0000-00-00 00:00:00'";
$SEL_ss_query=mysql_db_query($base,$SEL_ss,$conexao);
$SEL_ss_RES=mysql_fetch_array($SEL_ss_query);

$cnCod=$SEL_ss_RES[cnCod];
$ssDataEntrada=$SEL_ss_RES["ssDataEntrada"];
$ssDataAtual=$SEL_ss_RES["ssDataAtual"];

if ($cnCod!="") {

$SEL_CN2="SELECT * FROM Contas WHERE cnCod=$cnCod";
$SEL_CN2_query=mysql_db_query($base,$SEL_CN2,$conexao);
$SEL_CN2_RES=mysql_fetch_array($SEL_CN2_query);

$cnNome=$SEL_CN2_RES["cnNome"];
$cnEmail=$SEL_CN2_RES["cnEmail"];

if ($cnCod!=$ScnCod) {
if ($ssDataAtual!="") {
$ssDataAtualHORA_split=split(" ",$ssDataAtual);
$ssDataAtual_split=split("-",$ssDataAtualHORA_split[0]);
$ssDataAtual=$ssDataAtual_split[2]."/".$ssDataAtual_split[1]."/".$ssDataAtual_split[0]." as  ".$ssDataAtualHORA_split[1];
$ssDataAtual="Com última alteração em: ".$ssDataAtual."<br>";
}
if ($cnEmail=="") {
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";
$cnEmail=$e001;
} else {
$cnEmail="<a href=mailto:".$cnEmail." target=_blank>".$cnEmail."</a>";
}

$ssDataEntradaHORA_split=split(" ",$ssDataEntrada);
$ssDataEntrada_split=split("-",$ssDataEntradaHORA_split[0]);
$ssDataEntrada=$ssDataEntrada_split[2]."/".$ssDataEntrada_split[1]."/".$ssDataEntrada_split[0]." às  ".$ssDataEntradaHORA_split[1];


$SEL_nome="SELECT pfNome FROM PessoalFisica WHERE pfCod=$VpfCod";
$SEL_nome_query=mysql_db_query($base,$SEL_nome,$conexao);
$SEL_nome_RES=mysql_fetch_array($SEL_nome_query);

$sspfNome=$SEL_nome_RES["pfNome"];
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";
$erro=$e002;
header("Location: tde_pos.php?erro=$erro&sspfNome=$sspfNome");

exit;
} else {
$data=date("Y-m-d H:i:s");
$inclusao_ss="ssDataAtual='$data'";
$total_ss="UPDATE Sessao SET $inclusao_ss WHERE tsIdentificador=$VtsIdentificador and cnCod='$cnCod' and ssDataSaida='0000-00-00 00:00:00'";
$inconteudo_ss=mysql_db_query($base, $total_ss, $conexao);
}
} else {
$data=date("Y-m-d H:i:s");
$campos_ss="tsIdentificador,cnCod,ssDataEntrada";
$inclusao_ss="'$VtsIdentificador','$ScnCod','$data'";
$total_ss="insert into Sessao ($campos_ss) values ($inclusao_ss)";
$inconteudo_ss=mysql_db_query($base, $total_ss, $conexao);
}
}
?>
