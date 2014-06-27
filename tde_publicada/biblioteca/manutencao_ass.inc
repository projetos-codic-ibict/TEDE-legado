<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";
if ($cod=="Excluir") {
$total="DELETE FROM Assunto WHERE asCod='$asCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;

header("Location: visualizar_assunto_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod");
exit;
}
if ($cod=="Inserir") {
if ($asEsquema=="") {
$asEsquema="Palavra-chave";
}
$asAssuntoSplit=split(";",$asAssunto);
$asQTD=count($asAssuntoSplit);

for ($i=0; $i<=$asQTD; $i++) {
// inclusão do Assunto na tabela Assunto
$campos_as="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as="'$VtsIdentificador','$asAssuntoSplit[$i]','$asIdioma','$asEsquema'";
$total_as="insert into Assunto ($campos_as) values ($inclusao_as)";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);

$sel1="select * from Assunto where tsIdentificador=$VtsIdentificador and asAssunto='$asAssuntoSplit[$i]' and asIdioma='$asIdioma' and asEsquema='$asEsquema'";
$sel_query1=mysql_db_query($base,$sel1,$conexao);
$selRESP1=mysql_fetch_array($sel_query1);
$IasCod=$selRESP1['asCod'];
$campos_as_fim="asCod,tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as_fim="'$IasCod','$VtsIdentificador','$asAssuntoSplit[$i]','$asIdioma','$asEsquema'";
$total_as_fim="insert into Assunto ($campos_as_fim) values ($inclusao_as_fim)";
$inconteudo_as_fim=mysql_db_query($base_fim, $total_as_fim, $conexao_fim);
}
// Excluir o Assunto em branco do banco
$total_exclusao_as="DELETE FROM Assunto WHERE asAssunto=' ' or asAssunto='  '";
$exclusao_as=mysql_db_query($base, $total_exclusao_as, $conexao);
$exclusao_as_fim=mysql_db_query($base_fim, $total_exclusao_as, $conexao_fim);

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserção com a mensagem de sucesso
$sucesso=$sg001;

header("Location: visualizar_assunto_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod");
exit;

}

if ($cod=="Editar") {
if ($asEsquema=="") {
$asEsquema="Palavra-chave";
}
if ($tabelaCNPQ=="Sim") {
// inclusão de Assunto(tabela cnpq) da tese

if ($asAssunto1!="") {

if ($asAssunto1=="NENHUMA ABAIXO") {
if ($AreaCNPQ==1) {
$asAssunto1="Exatas e da Terra";
}
if ($AreaCNPQ==2) {
$asAssunto1="Ciências Biológicas";
}
if ($AreaCNPQ==3) {
$asAssunto1="Engenharias";
}
if ($AreaCNPQ==4) {
$asAssunto1="Ciências da Saúde";
}
if ($AreaCNPQ==5) {
$asAssunto1="Ciências Agrárias";
}
if ($AreaCNPQ==6) {
$asAssunto1="Ciências Sociais Aplicadas";
}
if ($AreaCNPQ==7) {
$asAssunto1="Ciências Humanas";
}
if ($AreaCNPQ==8) {
$asAssunto1="Lingüística, Letras e Artes";
}
if ($AreaCNPQ==9) {
$asAssunto1="Outros";
}                       
}
$inclusao_as="asAssunto='$asAssunto1',asEsquema='Tabela CNPQ',asIdioma='pt'";
$total_as="UPDATE Assunto SET $inclusao_as WHERE asCod=$asCod";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);
$inconteudo_as_fim=mysql_db_query($base_fim, $total_as, $conexao_fim);
}
} else {
// alteração do assunto

$inclusao_as="asAssunto='$asAssunto',asEsquema='$asEsquema',asIdioma='$asIdioma'";
$total_as="UPDATE Assunto SET $inclusao_as WHERE asCod=$asCod";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);
$inconteudo_as_fim=mysql_db_query($base_fim, $total_as, $conexao_fim);
}

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserção com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_assunto_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod&EVasCod=$asCod");
exit;

}}
?>