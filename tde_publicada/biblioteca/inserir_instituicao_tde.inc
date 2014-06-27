<?
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($TSinCod!="") {
$SinCod=$TSinCod;
}
if ($tsIdentificador=="") {
$tsIdentificador=$VtsIdentificador;
}
if ($pfCod=="") {
$pfCod=$VpfCod;
}
if ($cod=="Inserir" and $SinCod!="") {

if ($SinCod=="Nenhum" and $inNome!="" and $inCNPJ!="") {

//Verificar o Nome da Afiliacao para evitar duplicaчуo
$SEL="SELECT inCod FROM Instituicao WHERE inNome='$inNome' or inCNPJ='inCNPJ'";
$SEL_query=mysql_db_query($base_fim,$SEL,$conexao_fim);
$SEL_RES=mysql_fetch_array($SEL_query);
	
if ($SEL_RES!="") {
$erro="Jс existe";
header("Location:inserir_instituicao_tde.php?VtsIdentificador=$tsIdentificador&VpfCod=$pfCod&erro=$erro");
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

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$tsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_instituicao_tde.php?VtsIdentificador=$tsIdentificador&VpfCod=$pfCod&sucesso=$sucesso");
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
$inconteudo_ints=mysql_db_query($base_fim, $total_ints, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$tsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_instituicao_tde.php?VtsIdentificador=$tsIdentificador&VpfCod=$pfCod&sucesso=$sucesso");
exit;
}
}	
}
?>