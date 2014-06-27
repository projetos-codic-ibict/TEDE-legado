<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

if ($cod=="Excluir") {

$total="DELETE FROM Cobertura WHERE cbCod='$cbCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;

header("Location: visualizar_cobertura_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod");
exit;
}

if ($cod=="Inserir") {

// inclusуo da cobertura na tabela Corbetura
$campos_cb="tsIdentificador,cbCobertura,cbIdioma";
$inclusao_cb="'$VtsIdentificador','$cbCobertura','$cbIdioma'";
$total_cb="insert into Cobertura ($campos_cb) values ($inclusao_cb)";
$inconteudo_cb=mysql_db_query($base, $total_cb, $conexao);

//Seleciona o cbCod para marcaчуo da insersуo na tela de visualizaчуo
$sel="select * from Cobertura where tsIdentificador=$VtsIdentificador and cbCobertura='$cbCobertura' and cbIdioma='$cbIdioma'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);
$IcbCod=$selRESP['cbCod'];

$campos_cb_fim="cbCod,tsIdentificador,cbCobertura,cbIdioma";
$inclusao_cb_fim="'$IcbCod','$VtsIdentificador','$cbCobertura','$cbIdioma'";
$total_cb_fim="insert into Cobertura ($campos_cb_fim) values ($inclusao_cb_fim)";
$inconteudo_cb_fim=mysql_db_query($base_fim, $total_cb_fim, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_cobertura_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod&EVcbCod=$cbCod");
exit;

}

if ($cod=="Editar") {

// inclusуo do relacionamento da tabela TSPF
$inclusao_cb="cbCobertura='$cbCobertura',cbIdioma='$cbIdioma'";
$total_cb="UPDATE Cobertura  SET $inclusao_cb WHERE cbCod=$cbCod";

$inconteudo_cb=mysql_db_query($base, $total_cb, $conexao);
$inconteudo_cb_fim=mysql_db_query($base_fim, $total_cb, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_cobertura_tde.php?VtsIdentificador=$VtsIdentificador&sucesso=$sucesso&VpfCod=$VpfCod&EVcbCod=$cbCod");
exit;

}}
?>