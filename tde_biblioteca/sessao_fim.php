<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{
require "../conexao/conexao.inc";
$data=date("Y-m-d H:i:s");
$inclusao_ss="ssDataSaida='$data'";
$total_ss="UPDATE Sessao SET $inclusao_ss WHERE tsIdentificador=$tsIdentificador and cnCod='$ScnCod' and ssDataSaida='0000-00-00 00:00:00'";
$inconteudo_ss=mysql_db_query($base, $total_ss, $conexao);
header("Location: tde_pos.php");
exit;
}
?>