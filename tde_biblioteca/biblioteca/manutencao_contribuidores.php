<?
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";
 
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {
 
//Selecionar o codPessoaFisica do contribuidor na tabela TSPF para saber se o aluno pode ou nгo ser excluнdo
$SEL="SELECT pfCod FROM TSPF WHERE pfCod='$pfCod' and tsIdentificador<>'0'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);
if  ($SEL_RES!="") {
$erro=$e004;
header("Location: visualizar_contribuidores.php?EVpfCod=$pfCod&erro=$erro");
exit;
} else {
$SEL2="SELECT pfCod FROM PessoaFisica WHERE pfCod='$pfCod' and pfAutor='1'";
$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
$SEL2_RES=mysql_fetch_array($SEL2_query);

if ($SEL2_RES!="") {

$inclusao_pf="pfContribuidor='0'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$pfCod'";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);

$sucesso=$sg001;

header("Location: visualizar_contribuidores.php?sucesso=$sucesso");
exit;

} else {
$total="DELETE FROM PessoaFisica WHERE pfCod='$pfCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$total2="DELETE FROM PFPJ WHERE pfCod='$pfCod'";
$exclusao2=mysql_db_query($base, $total2, $conexao);
$exclusao2_fim=mysql_db_query($base_fim, $total2, $conexao_fim);

$sucesso=$sg001;

header("Location: visualizar_contribuidores.php?sucesso=$sucesso");
exit;
}
}
}
if ($cod=="Editar") {

// Alteraзгo
if ($pfCPF!="" or $pfEstrangeiro!="") {

$inclusao_pf="pfNome='$pfNome',pfCitacao='$pfCitacao',pfLattes='$pfLattes',pfCPF='$pfCPF',pfEmail='$pfEmail'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$pfCod'";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf, $conexao_fim);

$inclusao_cn="cnNome='$pfNome',cnEmail='$pfEmail'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE pfCod='$pfCod'";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

if ($pjCod=="" and $pjNome!="") {

//Verificar o Nome da Afiliacao para evitar duplicaзгo
$SEL="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

if ($SEL_RES=="") {

// inclusгo da Afiliaзгo do contribuidor da tese na tabela PessoaJuridica
$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao";
$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','1'";
$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

//Selecionar o pjCod da Afiliacao do Contribuidor
$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' and pjCNPJ='$pjCNPJ' ORDER BY pjCod DESC";
$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

//Armazena o pjCod do Contribuidor na variбvel 
$pjCod=$SEL_pjCod_RES["pjCod"];

// inclusгo da Afiliaзгo do contribuidor da tese na tabela PessoaJuridica na base TDE
$campos_pj_fim="pjCod,pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
$inclusao_pj_fim="'$pjCod','$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";
$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
$inconteudo_pj2_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

if ($EpjCod!="") {
$inclusao_pfpj="pjCod='$pjCod'";
$total_pfpj="UPDATE PFPJ SET $inclusao_pfpj WHERE pfCod='$pfCod'";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
} else {
$campos_pfpj1="pjCod,pfCod,pfpjTipo";
$inclusao_pfpj1="'$pjCod','$pfCod','Afiliacao'";
$total_pfpj="INSERT INTO PFPJ ($campos_pfpj1) values ($inclusao_pfpj1)";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
}
} } else {

if ($EpjCod!="") {

$inclusao_pfpj="pjCod='$pjCod'";
$total_pfpj="UPDATE PFPJ SET $inclusao_pfpj WHERE pfCod='$pfCod'";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
} else {
$campos_pfpj1="pjCod,pfCod,pfpjTipo";
$inclusao_pfpj1="'$pjCod','$pfCod','Afiliacao'";
$total_pfpj="INSERT INTO PFPJ ($campos_pfpj1) values ($inclusao_pfpj1)";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
} }

if ($SpjCod=="SemAfiliacao") {
$total="DELETE FROM PFPJ WHERE pfCod='$pfCod' and pfpjTipo='Afiliacao'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);
}

$total="DELETE FROM PFPJ WHERE pjCod='0'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Direciona para a tela de inserзгo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_contribuidores.php?EVpfCod=$pfCod&sucesso=$sucesso");
exit;
} else {
$erro=$e018;
}
}

?>