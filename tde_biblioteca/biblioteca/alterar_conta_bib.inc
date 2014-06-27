<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
require "../tde_i18n/tde_biblioteca/mensagens_".$idioma_sistema.".txt";
require "../bibliotecas/servidor.bib";

if ($cnSenha!=$cnSenha2) {
$erro=$eg012;
}

if ($cod=="Editar") {

$cnAtualizacao=date("Y-m-d");

$cnDataInicio=$cnAnoInicio."-".$cnMesInicio."-".$cnDiaInicio;
$cnDataTermino=$cnAnoTermino."-".$cnMesTermino."-".$cnDiaTermino;

if ($cnNome!=$cnNomeAtual or $cnLogin!=$cnLoginAtual or $cnEmail!=$cnEmailAtual) {

if ($cnNome!=$cnNomeAtual) {
//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnNome='$cnNome' and (cnTipo='Catalogador' or cnTipo='MasterCataloga'))";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES=mysql_fetch_array($SEL_cnCod_query);
if ($SEL_cnCod_RES!="") {
$erro=$e021;
}
}
if ($cnLogin!=$cnLoginAtual) {
//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnLogin='$cnLogin' and (cnTipo='Catalogador' or cnTipo='MasterCataloga'))";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES2=mysql_fetch_array($SEL_cnCod_query);
if ($SEL_cnCod_RES2!="") {
$erro2=$e022;
}
}
if ($cnEmail!=$cnEmailAtual) {
//Selecionar conta para evitar duplicação
$SEL_cnCod="SELECT cnCod FROM Contas WHERE (cnEmail=cnEmail and (cnTipo='Catalogador' or cnTipo='MasterCataloga'))";
$SEL_cnCod_query=mysql_db_query($base,$SEL_cnCod,$conexao);
$SEL_cnCod_RES3=mysql_fetch_array($SEL_cnCod_query);
if ($SEL_cnCod_RES3!="") {
$erro3=$e023;
}
}
}
if ($erro!="" or $erro2!="" or $erro3!="") {
mysql_close($conexao);
header("Location=alterar_login.php?erro=$erro&erro2=$erro2&erro3=$erro3");
} else {

// Editar a conta na tabela Contas

$inclusao_cn="cnNome='$cnNome',cnLogin='$cnLogin',cnSenha='$cnSenha',cnEmail='$cnEmail',cnBloqueado='$cnBloqueado',cnAtualizacao='$cnAtualizacao'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE cnCod=$ScnCod";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

//Enviar e-mail do modulo Contato
$de=$servidor_email;
$to=$cnEmail;
$cnTipo=$txCatalogador;
$Data=date("d/m/Y, H:i:s");
require "../tde_i18n/email_".$idioma_sistema.".txt";
$titulo=$emTituloConta1;
$mensagem=$emMensagemConta1;

mail($to,"$titulo",$mensagem,"From: $de");

$sucesso=$sg001;
header("Location:login.php?sucesso=$sucesso");
exit;
}
}
}
?>
