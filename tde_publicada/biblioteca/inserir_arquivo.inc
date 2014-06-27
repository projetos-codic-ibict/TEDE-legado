<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao_fim.inc";
if ($cod=="Excluir") {

if ($arCod!="") {

if ($arURL!="") {

unlink ($arURL);

}

$total="DELETE FROM Arquivos WHERE arCod='$arCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$total_la="DELETE FROM LegendaArquivo WHERE arCod='$arCod'";
$exclusao_la=mysql_db_query($base, $total_la, $conexao);
$exclusao_la_fim=mysql_db_query($base_fim, $total_la, $conexao_fim);

//Atualizaחדo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

header("Location: inserir_arquivo.php");

}
}

if ($cod=="Inserir") {

//Verificar extensao do Arquivo
//Se for PHP nדo enviarב o arquivo
$arquivo_name_split=split("\.",$arquivo_name);
$extensao=strtoupper($arquivo_name_split[1]);
$nome_arquivo=$arquivo_name_split[0];
//Variavel verifica a existךncia de ponto no nome do arquivo
$verificaponto=$arquivo_name_split[2];
if ($extensao=="PHP") {
$erro=$e011;
header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
exit;
}

// Verifica acento no nome do arquivo
function temAcento($string) 
{ 
    $regExp = "[באגדה×ְֱֲֳִיטךכָֹÊֻםלמןּֽ־ֿףעפץצ÷׃ׂװױײתשûüÚÙÛÜחַׁס.]";
    return  ereg($regExp,$string); 
} 

if(temAcento($nome_arquivo)) unset($nao); 
else $nao = "n";

if ($verificaponto!="") {
$nao="";
}
if ($nao=="n") {

$erro="";
$erro1="";
$sucesso="";

$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$SEL_ts_query=mysql_db_query($base_fim,$SEL_ts,$conexao_fim);
$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);

//Pega a DataDiretorio para saber o local onde colocar a TESE. OBS: Quando a TESE estב em fase de publicaחדo o sistema peda a tsDataAtualizacao. Neste caso י utilizado a tsDataDiretorio
$tsDataDiretorio=$SEL_ts_RES["tsDataDiretorio"];
$tsDataDiretorio_split=split(" ",$tsDataDiretorio);
$tsDataDiretorio=$tsDataDiretorio_split[0]."T".$tsDataDiretorio_split[1]."Z";
$tsDataDiretorio=str_replace(":","",$tsDataDiretorio);
if ($arquivo!="none") {

$ArquivoDir="../tde_arquivos/".$VprCod."/TDE-".$tsDataDiretorio."-".$VtsIdentificador."/".$arDireitos."/";

if (!is_writeable($ArquivoDir)){
mkdir ("../tde_arquivos/".$VprCod,0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataDiretorio."-".$VtsIdentificador,0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataDiretorio."-".$VtsIdentificador."/Retido",0770);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataDiretorio."-".$VtsIdentificador."/Restrito",0775);
mkdir ("../tde_arquivos/".$VprCod."/TDE-".$tsDataDiretorio."-".$VtsIdentificador."/Publico",0775);
if (!is_writeable($ArquivoDir)){
$erro=$e012;
header("Location: inserir_arquivo.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
exit;
}
} 

//chmod ("arquivos/pesquisa/".$arquivo_name,0775);

	if (copy($arquivo,"$ArquivoDir".$arquivo_name)){

	$arURL=$ArquivoDir.$arquivo_name;
	$arFormato_split=split("\.",$arquivo_name);
	$arFormato=$arFormato_split[1];
	$arFormato=strtoupper($arFormato);

	}else{

	$erro=$e003;

	}
}

//Verifica se arquivo PDF estב protegido com senha

$extencao_arquivo_split=split("\.",$arquivo_name);
$extencao_arquivo=$extencao_arquivo_split[1];
$extencao_arquivo=strtolower($extencao_arquivo);

if ($extencao_arquivo=="pdf"){

$variavel=file("$arURL");
$qtd=count($variavel);

for ($i=0; $qtd>=$i; $i++) {

$verifica=preg_match('/\/Encrypt/',$variavel[$i]);

if ($verifica!="") {

$protegido="Sim";

}
}

if ($protegido!="Sim") {

$erro=$e002;
unlink($arURL);

header("Location: inserir_arquivo.php?erro=$erro");

exit;

}
}

$SEL_ar="SELECT arURL FROM Arquivos WHERE tsIdentificador=$VtsIdentificador and arURL='$arURL'";
$SEL_ar_query=mysql_db_query($base_fim,$SEL_ar,$conexao_fim);
$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);

if ($SEL_ar_RES=="") {

$campos="tsIdentificador,arFormato,arURL,arDireitos";
$inclusao="'$VtsIdentificador','$arFormato','$arURL','$arDireitos'";
$total="insert into Arquivos ($campos) values ($inclusao)";
$inconteudo=mysql_db_query($base, $total, $conexao);

$SEL_ar_cod="SELECT arCod FROM Arquivos WHERE tsIdentificador=$VtsIdentificador and arURL='$arURL'";
$SEL_ar_codquery=mysql_db_query($base,$SEL_ar_cod,$conexao);
$SEL_ar_codRES=mysql_fetch_array($SEL_ar_codquery);
$arCod=$SEL_ar_codRES['arCod'];

$campos="arCod, tsIdentificador,arFormato,arURL,arDireitos";
$inclusao="'$arCod','$VtsIdentificador','$arFormato','$arURL','$arDireitos'";
$total="insert into Arquivos ($campos) values ($inclusao)";
$inconteudo_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Insere a Legenda do arquivo na Tabela LegendaArquivo

$campos_la="arCod,laLegenda,laIdioma";
$inclusao_la="'$arCod','$laLegenda','$laIdioma'";
$total_la="insert into LegendaArquivo ($campos_la) values ($inclusao_la)";
$inconteudo_la=mysql_db_query($base, $total_la, $conexao);
$inconteudo_la_fim=mysql_db_query($base_fim, $total_la, $conexao_fim);

}
//Atualizaחדo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
} else{

$erro=$e010;
header("Location: inserir_arquivo.php?erro=$erro");

exit;
}
}
}
?>