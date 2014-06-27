<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: ../index.php");
}else{

if ($codRestaurar!="") {

require "../conexao/conexao.inc"; 
require "../conexao/conexao_fim.inc"; 
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

//Alterar a disponibilidade da Tese na tabela TSPF 
$inclusao_cn="tspfDisponivel='9'"; //A Tese fica disponível nas buscas
$total_cn="UPDATE TSPF SET $inclusao_cn WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

$total="DELETE FROM OAIControle WHERE tsIdentificador='$VtsIdentificador'";
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
header("Location:../tde_biblioteca/tde_bib.php?v=Publicadas&sucesso=$sucesso");
}
}
?>
