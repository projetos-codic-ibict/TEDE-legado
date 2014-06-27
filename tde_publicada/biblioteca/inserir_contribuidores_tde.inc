<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
if ($tsIdentificador=="") {
$tsIdentificador=$VtsIdentificador;
}
if ($pfCod=="") {
$pfCod=$VpfCod;
}
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

if ($cod=="Excluir") {

$total="DELETE FROM TSPF WHERE pfCod='$MpfCod' and tsIdentificador=$VtsIdentificador";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao2=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_contribuidores_tde.php?pfCod=$pfCod&VtsIdentificador=$VtsIdentificador&$sucesso=$sucesso");
exit;
}

if ($cod=="Inserir") {

$sel="select pfCod from TSPF where tsIdentificador=$VtsIdentificador and pfCod=$MpfCod";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);

if ($selRESP!="") {


//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e007;
header("Location: inserir_contribuidores_tde.php?pfCod=$pfCod&VtsIdentificador=$VtsIdentificador&erro=$erro");
exit;

} else {

$selpp="select * from Papel where ppCod='3' and ppIdiomaPais='$idioma_sistema'";
$selpp_query=mysql_db_query($base,$selpp,$conexao);
$selppRESP=mysql_fetch_array($selpp_query);
$ppOrientador=$selppRESP['ppNome'];

if ($tspfTipo=="$ppOrientador") {
$sel2="select pfCod from TSPF where tsIdentificador=$VtsIdentificador and tspfTipo='$ppOrientador'";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

if ($sel2RESP!="") {
//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e020;
header("Location: inserir_contribuidores_tde.php?pfCod=$pfCod&VtsIdentificador=$VtsIdentificador&erro=$erro");
exit;
}
}
// inclusуo do relacionamento da tabela TSPF
$campos_tspf="tsIdentificador,pfCod,tspfTipo,tspfDispEmail";
$inclusao_tspf="'$VtsIdentificador','$MpfCod','$tspfTipo','Nao'";
$total_tspf="insert into TSPF ($campos_tspf) values ($inclusao_tspf)";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);
$inconteudo_tspf2=mysql_db_query($base_fim, $total_tspf, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: inserir_contribuidores_tde.php?pfCod=$pfCod&VtsIdentificador=$VtsIdentificador&sucesso=$sucesso");
exit;

} }
}
?>