<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

if ($Alterar!="") {
// Alterar os Direitos dos arquivos da tese na tabela de Direitos
$SEL_drar="SELECT * FROM Arquivos WHERE tsIdentificador=$VtsIdentificador";
$SEL_drar_query=mysql_db_query($base_fim,$SEL_drar,$conexao_fim);
$SEL_drar_RES=mysql_fetch_array($SEL_drar_query);
if ($AdrDireito=="Liberar o conteúdo dos arquivos para acesso público") {
$VarDireito="Publico";
}
if ($AdrDireito=="Liberar o conteúdo dos arquivos somente para a comunidade da Universidade") {
$VarDireito="Restrito";
}
if ($AdrDireito=="Reter o conteúdo dos arquivos por motivos de patente, publicação e/ou direitos autorais") {
$VarDireito="Retido";
}
while ($SEL_drar_RES!="") {

$arDireitos=$SEL_drar_RES["arDireitos"];

if ($arDireitos!=$VarDireito and $VarDireito!="") {
$arCod=$SEL_drar_RES["arCod"];
$arURL=$SEL_drar_RES["arURL"];
$arURLsplit=split("/",$arURL);
//Altera a pasta de armazenamento do arquivo
$arURLnovo=$arURLsplit[0]."/".$arURLsplit[1]."/".$arURLsplit[2]."/".$arURLsplit[3]."/".$VarDireito."/".$arURLsplit[5];

$inclusao_drar="arDireitos='$VarDireito',arURL='$arURLnovo'";
$total_drar="UPDATE Arquivos SET $inclusao_drar WHERE arCod=$arCod";
$inconteudo_drar=mysql_db_query($base, $total_drar, $conexao);
$inconteudo_drar_fim=mysql_db_query($base_fim, $total_drar, $conexao_fim);

chmod("$arURL",0777);
copy($arURL,$arURLnovo);
unlink($arURL);
if ($VarDireito=="Publico" or $VarDireito=="Restrito") {
chmod("$arURLnovo",0775);
} else {
chmod("$arURLnovo",0770);
}
}
$SEL_drar_RES=mysql_fetch_array($SEL_drar_query);
}

$inclusao_dr="drDireito='$AdrDireito'";
$total_dr="UPDATE Direitos SET $inclusao_dr WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_dr=mysql_db_query($base, $total_dr, $conexao);
$inconteudo_dr_fim=mysql_db_query($base_fim, $total_dr, $conexao_fim);

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
}}
?>