<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../conexao/conexao_fim.inc";
if ($cod=="Excluir") {

$total="DELETE FROM PessoaFisica WHERE pfCod='$pfCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$total1="DELETE FROM TSPF WHERE pfCod='$pfCod' and tsIdentificador=$tsIdentificador";
$exclusao1=mysql_db_query($base, $total1, $conexao);
$exclusao1_fim=mysql_db_query($base_fim, $total1, $conexao_fim);

$total2="DELETE FROM Pessoajuridica WHERE pjCod='$pjCod'";
$exclusao2=mysql_db_query($base, $tota2, $conexao);
$exclusao2_fim=mysql_db_query($base_fim, $tota2, $conexao_fim);

$total3="DELETE FROM TJPF WHERE pjCod='$pjCod' and tsIdentificador=$tsIdentificador";
$exclusao3=mysql_db_query($base, $total3, $conexao);
$exclusao3_fim=mysql_db_query($base_fim, $total3, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$tsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);
}

if ($cod=="Inserir") {

$campos_pf="pfNome,pfCitacao,pfLattes,pfCPF,pfEmail";
$inclusao_pf="'$pfNome','$pfCitacao','$pfLattes','$pfCPF','$pfEmail'";
$total_pf="insert into PessoaFisica ($campos_pf) values ($inclusao_pf)";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf, $conexao_fim);

//Selecionar o pfCod do Autor

$SEL_pfCod="SELECT pfCod FROM PessoaFisica WHERE pfNome='$pfNome' and pfCPF='$pfCPF' ORDER BY pfCod DESC";
$SEL_pfCod_query=mysql_db_query($base_fim,$SEL_pfCod,$conexao_fim);
$SEL_pfCod_RES=mysql_fetch_array($SEL_pfCod_query);

//Armazena o tsIdentificador da tese gerado na variсvel $tsIdentificador

$pfCod=$SEL_pfCod_RES["pfCod"];

$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";
$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);
$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj, $conexao_fim);

//Selecionar o pjCod da Afiliacao do Autor

$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' and pjCNPJ='$pjCNPJ' ORDER BY pjCod DESC";
$SEL_pjCod_query=mysql_db_query($base_fim,$SEL_pjCod,$conexao_fim);
$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

//Armazena o tsIdentificador da tese gerado na variсvel $tsIdentificador

$pjCod=$SEL_pjCod_RES["pjCod"];

// inclusуo do relacionamento da tabela PFPJ

$campos_pfpj="pjCod,pfCod";
$inclusao_pfpj="'$pjCod','$pfCod'";
$total_pfpj="insert into PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

$sucesso=$sg001;

}
}
?>