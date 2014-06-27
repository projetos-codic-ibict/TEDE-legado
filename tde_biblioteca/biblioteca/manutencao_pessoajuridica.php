<?php

if ($pjTipo=="AgenciaFomento") {

$RpjTipo="Agкncia de Fomento";
$pjLink="visualizar_agfomento.php"; 
$VpjTipo="pjAgFomento";
$VpjTipo2="pjAfiliacao";
$pfpjTipo="AgenciaFomento";

}else {

$RpjTipo="Afiliaзгo";
$pjLink="visualizar_afiliacao.php"; 
$VpjTipo="pjAfiliacao";
$VpjTipo2="pjAgFomento";
$pfpjTipo="Afiliacao";

}

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

//Selecionar o codPessoaJuridica do aluno na tabela TSPF para saber se o aluno pode ou nгo ser excluнdo

$SEL="SELECT pjCod FROM PFPJ WHERE pjCod='$pjCod' and pfpjTipo='$pjTipo'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

if  ($SEL_RES!="") {

$erro=$e003;
header("Location: $pjLink?erro=$erro&vTipo=$vTipo");
exit;

} else {

$SEL2="SELECT pjCod FROM PessoaJuridica WHERE pjCod='$pjCod' and $VpjTipo2='1'";
$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
$SEL2_RES=mysql_fetch_array($SEL2_query);

if ($SEL2_RES!="") {

$total_pj="UPDATE PessoaJuridica SET $VpjTipo='0' WHERE pjCod='$pjCod'";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

$sucesso=$sg001;

header("Location: $pjLink?EVpjCod=$pjCod&sucesso=$sucesso&vTipo=$vTipo");
exit;

} else {

$total="DELETE FROM PessoaJuridica WHERE pjCod='$pjCod'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$SEL2="SELECT pjCod FROM PessoaJuridica WHERE pjCod='$pjCod' and $VpjTipo2='1'";
$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
$SEL2_RES=mysql_fetch_array($SEL2_query);

$EVpjCod=$SEL2_RES[pjCod];
$sucesso=$sg001;

header("Location: $pjLink?EVpjCod=$EVpjCod&sucesso=$sucesso&vTipo=$vTipo");

exit;
}
}
}

if ($cod=="Editar") {

// Alteraзгo

$inclusao_pj="pjNome='$pjNome',pjSigla='$pjSigla',pjPais='$pjPais',pjUF='$pjUF',pjCNPJ='$pjCNPJ',pjURL='$pjURL'";
$total_pj="UPDATE PessoaJuridica SET $inclusao_pj WHERE pjCod='$pjCod'";
$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);
$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj, $conexao_fim);

//Direciona para a tela de ediзгo com a mensagem de sucesso

$sucesso=$sg001;

header("Location: $pjLink?EVpjCod=$pjCod&sucesso=$sucesso&vTipo=$vTipo");
exit;

}
?>