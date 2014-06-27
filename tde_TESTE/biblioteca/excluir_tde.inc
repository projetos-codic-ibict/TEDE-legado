<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: ../index.php");
}else{

if ($codExcluir!="") {

require "../conexao/conexao.inc"; 
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

$DEL_ts="DELETE FROM Teses WHERE tsIdentificador=$VtsIdentificador";
$DEL_ts_query=mysql_db_query($base,$DEL_ts,$conexao);

$DEL_tt="DELETE FROM Titulo WHERE tsIdentificador=$VtsIdentificador";
$DEL_tt_query=mysql_db_query($base,$DEL_tt,$conexao);

$DEL_as="DELETE FROM Assunto WHERE tsIdentificador=$VtsIdentificador";
$DEL_as_query=mysql_db_query($base,$DEL_as,$conexao);

$DEL_cb="DELETE FROM Cobertura WHERE tsIdentificador=$VtsIdentificador";
$DEL_cb_query=mysql_db_query($base,$DEL_cb,$conexao);
           
$DEL_rs="DELETE FROM Resumo WHERE tsIdentificador=$VtsIdentificador";
$DEL_rs_query=mysql_db_query($base,$DEL_rs,$conexao);
			
$DEL_tp="DELETE FROM Tipo WHERE tsIdentificador=$VtsIdentificador";
$DEL_tp_query=mysql_db_query($base,$DEL_tp,$conexao);
           
$DEL_dr="DELETE FROM Direitos WHERE tsIdentificador=$VtsIdentificador";
$DEL_dr_query=mysql_db_query($base,$DEL_dr,$conexao);

$DEL_pfpj="DELETE FROM PFPJ WHERE pfCod=$VpfCod";
$DEL_pfpj_query=mysql_db_query($base,$DEL_pfpj,$conexao);

$DEL_cn="DELETE FROM Contas WHERE pfCod=$VpfCod";
$DEL_cn_query=mysql_db_query($base,$DEL_cn,$conexao);

$DEL_tspf="DELETE FROM TSPF WHERE tsIdentificador=$VtsIdentificador and tspfTipo<>'Autor'";
$DEL_tspf_query=mysql_db_query($base,$DEL_tspf,$conexao);

$UPD_tspf="UPDATE TSPF SET tspfDispEmail='',tspfDisponivel='0',tsIdentificador='0' WHERE tsIdentificador=$VtsIdentificador";
$UPD_tspf_query=mysql_db_query($base,$UPD_tspf,$conexao);
			
//excluir arquivo
$sel2="select * from Arquivos where tsIdentificador=$VtsIdentificador";
$sel2_query=mysql_db_query($base,$sel2,$conexao);
$sel2RESP=mysql_fetch_array($sel2_query);

while ($sel2RESP!="") {

$arCod=$sel2RESP["arCod"];
$arURL=$sel2RESP["arURL"];
unlink ($arURL);
$total="DELETE FROM Arquivos WHERE arCod='$arCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$DEL_la="DELETE FROM LegendaArquivo WHERE arCod='$arCod'";
$DEL_la_query=mysql_db_query($base,$DEL_la,$conexao);
			
$sel2RESP=mysql_fetch_array($sel2_query);
}
$sucesso=$sg001;
header("Location:visualizar_tde_excluir.php?sucesso=$sucesso");
}
}
?>
