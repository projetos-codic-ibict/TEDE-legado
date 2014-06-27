<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

if ($cod=="Alterar") {

$total="DELETE FROM LegendaArquivo WHERE arCod='$arCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$campos="arCod, laLegenda, laIdioma";
$inclusao="'$arCod','$laLegenda','PT'";
$total="insert into LegendaArquivo ($campos) values ($inclusao)";
$inconteudo=mysql_db_query($base, $total, $conexao);
$inconteudo_fim=mysql_db_query($base_fim, $total, $conexao_fim);

if ($arDireitosN!=$arDireitos) {
$arURLsplit=split("/",$arURL);
//Altera a pasta de armazenamento do arquivo
$arURLnovo=$arURLsplit[0]."/".$arURLsplit[1]."/".$arURLsplit[2]."/".$arURLsplit[3]."/".$arDireitosN."/".$arURLsplit[5];

$inclusao_drar="arDireitos='$arDireitosN',arURL='$arURLnovo'";
$total_drar="UPDATE Arquivos SET $inclusao_drar WHERE arCod=$arCod";
$inconteudo_drar=mysql_db_query($base, $total_drar, $conexao);
$inconteudo_drar_fim=mysql_db_query($base_fim, $total_drar, $conexao_fim);
echo $arURL;
echo "<br>";
echo $arURLnovo;
chmod("$arURL",0777);
copy($arURL,$arURLnovo);
unlink($arURL);
if ($arDireitosN=="Publico" or $arDireitosN=="Restrito") {
chmod("$arURLnovo",0775);
} else {
chmod("$arURLnovo",0770);
}
}
}
}
//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$tsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_arquivo.php?sucesso=$sucesso");
?>