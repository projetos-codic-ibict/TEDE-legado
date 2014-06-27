<?
require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

		$SEL="SELECT inCod FROM Instituicao WHERE inNome='$inNome'";
		$SEL_query=mysql_db_query($base_fim,$SEL,$conexao_fim);
		$SEL_RES=mysql_fetch_array($SEL_query);
		if ($SEL_RES!="") {
$erro=$e009;
header("Location: visualizar_instituicaodefesa.php?erro=$erro");
exit;

		} else {

			// inclusгo da Afiliaзгo do autor da tese na tabela PessoaJuridica

			$campos_in="inNome,inSigla,inPais,inUF,inCNPJ,inURL";
			$inclusao_in="'$inNome','$inSigla','$inPais','$inUF','$inCNPJ','$inURL'";
			$total_in="insert into Instituicao ($campos_in) values ($inclusao_in)";
			$inconteudo_in=mysql_db_query($base_fim, $total_in, $conexao_fim);
       		
$SEL="SELECT inCod FROM Instituicao WHERE inNome='$inNome'";
		$SEL_query=mysql_db_query($base_fim,$SEL,$conexao_fim);
		$SEL_RES=mysql_fetch_array($SEL_query);
$inCod=$SEL_RES[inCod];
	$sucesso=$sg001;
header("Location: visualizar_instituicaodefesa.php?EVinCod=$inCod&sucesso=$sucesso");
exit;
}
}

if ($cod=="Excluir") {

//Selecionar o codPessoaJuridica do aluno na tabela TSPF para saber se o aluno pode ou nгo ser excluнdo

$SEL="SELECT inCod FROM Teses WHERE inCod='$inCod'";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_query_fim=mysql_db_query($base_fim,$SEL,$conexao_fim);
$SEL_RES=mysql_fetch_array($SEL_query);
$SEL_RES_fim=mysql_fetch_array($SEL_query_fim);

if  ($SEL_RES_fim!="" and $SEL_RES!="") {

$erro=$e003;
header("Location: visualizar_instituicaodefesa.php?erro=$erro");
exit;
} else {

$total="DELETE FROM Instituicao WHERE inCod='$inCod'";
$exclusao=mysql_db_query($base_fim, $total, $conexao_fim);
$sucesso=$sg001;

header("Location: visualizar_instituicaodefesa.php?sucesso=$sucesso");
exit;
}
}

if ($cod=="Editar") {

// Alteraзгo

$inclusao_in="inNome='$inNome',inSigla='$inSigla',inPais='$inPais',inUF='$inUF',inCNPJ='$inCNPJ',inURL='$inURL'";
$total_in="UPDATE Instituicao SET $inclusao_in WHERE inCod='$inCod'";
$inconteudo_in_fim=mysql_db_query($base_fim, $total_in, $conexao_fim);
//Direciona para a tela de ediзгo com a mensagem de sucesso
$sucesso=$sg001;

header("Location: visualizar_instituicaodefesa.php?sucesso=$sucesso");
exit;
}
?>