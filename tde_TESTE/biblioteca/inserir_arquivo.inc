<?php session_start();
if(!session_is_registered("SprCod")) {
header("Location: ../index.php");
}else{



if ($cod=="Excluir") {

if ($arCod!="") {

if ($arURL!="") {

unlink ($arURL);
}
$total="DELETE FROM Arquivos WHERE arCod='$arCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

header("Location: inserir_arquivo.php?VtsIdentificador=$VtsIdentificador&$sucesso=$sucesso&VpfCod=$VpfCod&VprCod=$SprCod&cod=");

//break;
}
}
if ($cod=="Inserir") {

$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);
				
$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
$tsDataAtualizacao_split=split(" ",$tsDataAtualizacao);

$tsDataAtualizacao=$tsDataAtualizacao_split[0]."T".$tsDataAtualizacao_split[1]."Z";
if ($arquivo!="none") {

$ArquivoDir="../tde_arquivos/".$VprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/".$arDireitos."/";

//chmod ("arquivos/pesquisa/".$arquivo_name,0775);
	if (copy($arquivo,"$ArquivoDir".$arquivo_name)){
	
	$arURL=$ArquivoDir.$arquivo_name;

	$arFormato_split=split("\.",$arquivo_name);
	$arFormato=$arFormato_split[1];
	$arFormato=strtoupper($arFormato);
	
	}else{
	$erro="Erro no envio do arquivo";
	}

}
$campos="tsIdentificador,arFormato,arLegenda,arURL,arDireitos";
$inclusao="'$VtsIdentificador','$arFormato','$arLegenda','$arURL','$arDireitos'";
$total="insert into Arquivos ($campos) values ($inclusao)";
$inconteudo=mysql_db_query($base, $total, $conexao);

mysql_close($conexao);
$sucesso="Arquivo enviado corretamente";
//header("Location: inserir_arquivo.php?VtsIdentificador=$VtsIdentificador&$sucesso=$sucesso&VpfCod=$VpfCod&VprCod=$SprCod");
//break;

}

if ($cod=="Alterar") {
$erro="";
if ($arquivo!="none") {
$SEL_ts="SELECT * FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$SEL_ts_query=mysql_db_query($base,$SEL_ts,$conexao);
$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);
				
$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];

$ArquivoDir="../tde_arquivos/".$SprCod."/TDE-".$tsDataAtualizacao."-".$VtsIdentificador."/".$arDireitos."/";

//chmod ("arquivos/pesquisa/".$arquivo_name,0775);
	if (copy($arquivo,"$ArquivoDir".$arquivo_name)){
	
	$arURL2=$ArquivoDir.$arquivo_name;

	$arFormato_split=split("\.",$arquivo_name);
	$arFormato=$arFormato_split[1];
	$arFormato=strtoupper($arFormato);
	
	}else{
	$erro="Erro no envio do arquivo";
	}
	
if ($arURL==$arURL2) {

//Verifica se arquivo PDF estб protegido com senha
$extencao_arquivo_split=split("\.",$arquivo_name);
$extencao_arquivo=$extencao_arquivo_split[1];
$extencao_arquivo=strtolower($extencao_arquivo);

if ($extencao_arquivo=="pdf"){
$variavel=file("$arURL2");
$qtd=count($variavel);
for ($i=0; $qtd>=$i; $i++) {
$verifica=strpos($variavel[$i],"/Encrypt");

if ($verifica!="") {

$total="UPDATE Arquivos SET arLegenda='$arLegenda', arDireitos='$arDireitos'  WHERE arCod=$arCod";
$inconteudo=mysql_db_query($base, $total, $conexao);
$sucesso=".:: Operaзгo concluнda. Arquivo substituнdo pelo arquivo bloqueado ::.";
$cod="";
$erro="";
header("Location: inserir_arquivo.php?sucesso=$sucesso&cod=&arCod=$arCod&VtsIdentificador=$VtsIdentificador");
exit;
}
}
$erro=".:: O arquivo nгo estб protegido. Por favor, proteja o arquivo e tente alterб-lo novamente.";
header("Location: inserir_arquivo.php?erro=$erro&cod=Alterar_arquivo&arCod=$arCod&VtsIdentificador=$VtsIdentificador");
exit;

}


} else {
unlink($arURL2);
$erro=".:: ERRO! O arquivo novo tem que ter o mesmo nome do arquivo a ser alterado! ::.";
}

} else {
$total="UPDATE Arquivos SET arLegenda='$arLegenda', arDireitos='$arDireitos'  WHERE arCod=$arCod";
$inconteudo=mysql_db_query($base, $total, $conexao);
$sucesso="Dados do arquivo alterado corretamente";
$cod="";
$erro="";
}




//header("Location: inserir_arquivo.php?VtsIdentificador=$VtsIdentificador&$sucesso=$sucesso&VpfCod=$VpfCod&VprCod=$SprCod");
//break;

}
}
?>