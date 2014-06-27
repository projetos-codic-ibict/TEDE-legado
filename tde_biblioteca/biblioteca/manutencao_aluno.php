<?
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

//Selecionar o codPessoaFisica do aluno na tabela TSPF para saber se o aluno pode ou nгo ser excluнdo
$SEL="SELECT pfCod FROM TSPF WHERE pfCod='$pfCod' and tspfTipo='Autor' and tsIdentificador!='0' and tspfDisponivel!='9' and tspfDisponivel!='8'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);
if  ($SEL_RES!="") {
$erro=$e005;
header("Location: visualizar_alunos.php?EVpfCod=$pfCod&erro=$erro");
exit;
} else {
$SEL2="SELECT pfCod FROM PessoaFisica WHERE pfCod='$pfCod' and pfContribuidor='1'";
$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
$SEL2_RES=mysql_fetch_array($SEL2_query);

if ($SEL2_RES!="") {

$inclusao_pf="pfAutor='0'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$pfCod'";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);

$total3="DELETE FROM TSPF WHERE pfCod='$pfCod' and tsIdentificador='0'";
$exclusao3=mysql_db_query($base, $total3, $conexao);
/*
$total4="DELETE FROM PFPR WHERE pfCod='$pfCod'";
$exclusao4=mysql_db_query($base, $total4, $conexao);
*/
$sucesso=$sg001;

header("Location: visualizar_alunos.php?sucesso=$sucesso");
exit;

} else {

//Selecionar o codPessoaFisica do aluno na tabela TSPF para saber se o aluno pode ou nгo ser excluнdo
$SEL4="SELECT pfCod FROM TSPF WHERE pfCod='$pfCod' and (tspfDisponivel!='9' or tspfDisponivel!='8')";
$SEL4_query=mysql_db_query($base,$SEL4,$conexao);
$SEL4_RES=mysql_fetch_array($SEL4_query);
if  ($SEL4_RES!="") {

$total3="DELETE FROM TSPF WHERE pfCod='$pfCod' and tsIdentificador='0'";
$exclusao3=mysql_db_query($base, $total3, $conexao);
$exclusao3_fim=mysql_db_query($base_fim, $total3, $conexao_fim);

}else{
$total="DELETE FROM PessoaFisica WHERE pfCod='$pfCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$total2="DELETE FROM PFPJ WHERE pfCod='$pfCod'";
$exclusao2=mysql_db_query($base, $total2, $conexao);
$exclusao2_fim=mysql_db_query($base_fim, $total2, $conexao_fim);

$total3="DELETE FROM TSPF WHERE pfCod='$pfCod' and tsIdentificador='0'";
$exclusao3=mysql_db_query($base, $total3, $conexao);
$exclusao3_fim=mysql_db_query($base_fim, $total3, $conexao_fim);
/*
$total4="DELETE FROM PFPR WHERE pfCod='$pfCod'";
$exclusao4=mysql_db_query($base, $total4, $conexao);
$exclusao4_fim=mysql_db_query($base_fim, $total4, $conexao_fim);
*/
}
$sucesso=$sg001;

header("Location: visualizar_alunos.php?EVpfCod=$pfCod&sucesso=$sucesso");
exit;
}
}
}
if ($cod=="Editar") {

// troca o programa do autor

if ($prCodAntigo!=$prCod) {

$total_prog="UPDATE TSPF SET prCod=$prCod WHERE pfCod=$pfCod and tspfTipo='Autor' ORDER BY tsIdentificador DESC";
$alt_prog=mysql_db_query($base, $total_prog, $conexao);

$SELid="SELECT tsIdentificador FROM TSPF WHERE pfCod=$pfCod and tspfTipo='Autor' ORDER BY tsIdentificador DESC";
$SELid_query=mysql_db_query($base,$SELid,$conexao);
$SELid_RES=mysql_fetch_array($SELid_query);

$tsIdentificador=$SELid_RES['tsIdentificador'];

$SELar="SELECT * FROM Arquivos WHERE tsIdentificador=$tsIdentificador";
$SELar_query=mysql_db_query($base,$SELar,$conexao);
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

$SELar_RES=mysql_fetch_array($SELar_query);
}

}

// Alteraзгo

$inclusao_pf="pfNome='$pfNome',pfCitacao='$pfCitacao',pfCitacaoABNT='$pfCitacaoABNT',pfLattes='$pfLattes',pfCPF='$pfCPF',pfEmail='$pfEmail'";
$total_pf="UPDATE PessoaFisica SET $inclusao_pf WHERE pfCod='$pfCod'";
$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf, $conexao_fim);

$inclusao_cn="cnNome='$pfNome',cnEmail='$pfEmail'";
$total_cn="UPDATE Contas SET $inclusao_cn WHERE pfCod='$pfCod'";
$inconteudo_cn=mysql_db_query($base, $total_cn, $conexao);

if ($pjCod=="" and $ApjNome!="") {

//Verificar o Nome da Afiliacao para evitar duplicaзгo
$SEL="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' or pjCNPJ='$ApjCNPJ'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

if ($SEL_RES=="") {

// inclusгo da Afiliaзгo do autor da tese na tabela PessoaJuridica
$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao";
$inclusao_pj="'$ApjNome','$ApjSigla','$ApjPais','$ApjUF','$ApjCNPJ','$ApjURL','1'";
$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

//Selecionar o pjCod da Afiliacao do Autor
$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' and pjCNPJ='$ApjCNPJ' ORDER BY pjCod DESC";
$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

//Armazena o pjCod do Aluno na variбvel 
$pjCod=$SEL_pjCod_RES["pjCod"];

// inclusгo da Afiliaзгo do autor da tese na tabela PessoaJuridica na base TDE
$campos_pj_fim="pjCod,pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
$inclusao_pj_fim="'$pjCod','$ApjNome','$ApjSigla','$ApjPais','$ApjUF','$ApjCNPJ','$ApjURL'";
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
header("Location: visualizar_alunos.php?EVpfCod=$pfCod&sucesso=$sucesso");
exit;

}

?>