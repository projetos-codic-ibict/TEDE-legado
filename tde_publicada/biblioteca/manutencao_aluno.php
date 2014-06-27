<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Editar") {

if ($prCodAntigo!=$prCod) {

$total_prog="UPDATE TSPF SET prCod=$prCod WHERE tsIdentificador=$tsIdentificador and tspfTipo='Autor'";
$alt_prog=mysql_db_query($base, $total_prog, $conexao);
$alt_prog_fim=mysql_db_query($base_fim, $total_prog, $conexao_fim);

$SELar="SELECT * FROM Arquivos WHERE tsIdentificador=$tsIdentificador";
$SELar_query=mysql_db_query($base_fim,$SELar,$conexao_fim);
$SELar_RES=mysql_fetch_array($SELar_query);

while ($SELar_RES!="") {

$arURL=$SELar_RES['arURL'];
$arURLsplit=split("/",$arURL);
//Altera a pasta de armazenamento do arquivo
$arURLnovo=$arURLsplit[0]."/".$arURLsplit[1]."/".$prCod."/".$arURLsplit[3]."/".$arURLsplit[4]."/".$arURLsplit[5];
$arURLRetido=$arURLsplit[0]."/".$arURLsplit[1]."/".$prCod."/".$arURLsplit[3]."/".$arURLsplit[4];
$arURLRestrito=$arURLsplit[0]."/".$arURLsplit[1]."/".$prCod."/".$arURLsplit[3]."/".$arURLsplit[4];

mkdir ("../tde_arquivos/".$prCod."/".$arURLsplit[3],0775);
mkdir ("../tde_arquivos/".$prCod."/".$arURLsplit[3]."/Retido",0770);
mkdir ("../tde_arquivos/".$prCod."/".$arURLsplit[3]."/Restrito",0775);
mkdir ("../tde_arquivos/".$prCod."/".$arURLsplit[3]."/Publico",0775);

copy($arURL,$arURLnovo);
chmod("$arURLRestrito",0775);
chmod("$arURLRetido",0770);

chmod("$arURL",0777);
unlink($arURL);

$arCod=$SELar_RES['arCod'];

$total_ar="UPDATE Arquivos SET arURL='$arURLnovo' WHERE arCod='$arCod'";
$inconteudo_ar=mysql_db_query($base, $total_ar, $conexao);
$inconteudo_ar_fim=mysql_db_query($base_fim, $total_ar, $conexao_fim);

$SELar_RES=mysql_fetch_array($SELar_query);
}

}

// Alteraчуo

$inclusao_pf="pfNome='$pfNome',pfCitacao='$pfCitacao',pfCitacaoABNT='$pfCitacaoABNT',pfLattes='$pfLattes',pfCPF='$pfCPF',pfEmail='$pfEmail'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$pfCod'";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf, $conexao_fim);

$inclusao_cn="cnNome='$pfNome',cnEmail='$pfEmail'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE pfCod='$pfCod'";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

if ($pjCod=="" and $ApjNome!="") {

//Verificar o Nome da Afiliacao para evitar duplicaчуo
$SEL="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' or pjCNPJ='$ApjCNPJ'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

if ($SEL_RES=="") {

// inclusуo da Afiliaчуo do autor da tese na tabela PessoaJuridica
$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao";
$inclusao_pj="'$ApjNome','$ApjSigla','$ApjPais','$ApjUF','$ApjCNPJ','$ApjURL','1'";
$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

// inclusуo da Afiliaчуo do autor da tese na tabela PessoaJuridica
$campos_pj_fim="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
$inclusao_pj_fim="'$ApjNome','$ApjSigla','$ApjPais','$ApjUF','$ApjCNPJ','$ApjURL'";
$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
$inconteudo_pj2_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

//Selecionar o pjCod da Afiliacao do Autor
$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' and pjCNPJ='$ApjCNPJ' ORDER BY pjCod DESC";
$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

//Armazena o pjCod do Aluno na variсvel 
$pjCod=$SEL_pjCod_RES["pjCod"];

if ($EpjCod!="") {
$inclusao_pfpj="pjCod='$pjCod'";
$total_pfpj="UPDATE PFPJ SET $inclusao_pfpj WHERE pfCod='$pfCod' and pfpjTipo='Afiliacao'";
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
$total_pfpj="UPDATE PFPJ SET $inclusao_pfpj WHERE pfCod='$pfCod' and pfpjTipo='Afiliacao'";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
} else {
$campos_pfpj1="pjCod,pfCod,pfpjTipo";
$inclusao_pfpj1="'$pjCod','$pfCod','Afiliacao'";
$total_pfpj="INSERT INTO PFPJ ($campos_pfpj1) values ($inclusao_pfpj1)";
$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
$inconteudo_pfpj_fim=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
} }

$total="DELETE FROM PFPJ WHERE pjCod='0'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualizaчуo da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$tsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: editar_aluno.php?pfCod=$VpfCod&sucesso=$sucesso");
exit;

}
}
?>