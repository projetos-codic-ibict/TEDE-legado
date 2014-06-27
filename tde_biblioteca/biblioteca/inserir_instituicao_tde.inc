<?
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($TSinCod!="") {
$SinCod=$TSinCod;
}

if ($cod=="Inserir" and $SinCod!="") {

if ($SinCod=="Nenhum" and $inNome!="" and $inCNPJ!="") {

//Verificar o Nome da Afiliacao para evitar duplicaчуo
$SEL="SELECT inCod FROM Instituicao WHERE inNome='$inNome' or inCNPJ='inCNPJ'";
$SEL_query=mysql_db_query($base_fim,$SEL,$conexao_fim);
$SEL_RES=mysql_fetch_array($SEL_query);
	
if ($SEL_RES!="") {
$erro="Jс existe";
header("Location:inserir_instituicao_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
} else {
// inclusуo da Afiliaчуo do autor da tese na tabela PessoaJuridica

$campos_in_fim="inNome,inSigla,inPais,inUF,inCNPJ,inURL";
$inclusao_in_fim="'$inNome','$inSigla','$inPais','$inUF','$inCNPJ','$inURL'";
$total_in_fim="insert into Instituicao ($campos_in_fim) values ($inclusao_in_fim)";
$inconteudo_in_fim=mysql_db_query($base_fim, $total_in_fim, $conexao_fim);

$SEL="SELECT inCod FROM Instituicao WHERE inNome='$inNome' and inCNPJ='$inCNPJ'";
$SEL_query=mysql_db_query($base_fim,$SEL,$conexao_fim);
$SEL_RES=mysql_fetch_array($SEL_query);
$TinCod=$SEL_RES['inCod'];

$total_ints="UPDATE Teses SET inCod='$TinCod' WHERE tsIdentificador='$tsIdentificador'";
$inconteudo_ints=mysql_db_query($base, $total_ints, $conexao);

$sucesso=$sg001;
header("Location: inserir_instituicao_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&sucesso=$sucesso");
exit;

}} else {
if ($SinCod=="Nenhum" and ($inNome=="" or $inCNPJ!="")) {
$erro="Nome ou CNPJ vazios";
header("Location: inserir_instituicao_tde.php?erro=$erro");
exit;
}
if ($SinCod!="Nenhum") {
$total_ints="UPDATE Teses SET inCod='$SinCod' WHERE tsIdentificador='$tsIdentificador'";
$inconteudo_ints=mysql_db_query($base, $total_ints, $conexao);

$sucesso=$sg001;
header("Location: inserir_instituicao_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&sucesso=$sucesso");
exit;
}
}	
}
?>