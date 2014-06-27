<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM TSPF WHERE pfCod='$ApfCod' and tsIdentificador=$VtsIdentificador";

$exclusao=mysql_db_query($base, $total, $conexao);
$sucesso=$sg001;
header("Location: alterar_contribuidores.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod&VprCod=$SprCod");
exit;
}

if ($cod=="Inserir") {

$sel="select pfCod from TSPF where tsIdentificador=$VtsIdentificador and pfCod=$MpfCod";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);

if ($selRESP!="") {


//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e007;
header("Location: alterar_contribuidores.php?VtsIdentificador=$VtsIdentificador&erro=$erro&VpfCod=$VpfCod&VprCod=$SprCod");
exit;

} else {

if ($tspfTipo=="Orientador") {
$sel2="select pfCod from TSPF where tsIdentificador=$VtsIdentificador and tspfTipo='Orientador'";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

if ($sel2RESP!="") {
//Direciona para a tela de inserчуo com a mensagem de erro
$erro=$e020;
header("Location: alterar_contribuidores.php?VtsIdentificador=$VtsIdentificador&erro=$erro&VpfCod=$VpfCod&VprCod=$SprCod");
exit;
}
}

// inclusуo do relacionamento da tabela TSPF
$campos_tspf="tsIdentificador,pfCod,tspfTipo,tspfDispEmail";
$inclusao_tspf="'$VtsIdentificador','$MpfCod','$tspfTipo','Nao'";
$total_tspf="insert into TSPF ($campos_tspf) values ($inclusao_tspf)";
$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);


//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: alterar_contribuidores.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod&VprCod=$SprCod");
exit;

} }
}
?>