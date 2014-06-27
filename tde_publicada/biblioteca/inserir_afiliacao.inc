<? session_start();
if(!session_is_registered("SbdCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao_fim.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

	if ($pjCod=="") {

		//Verificar o Nome da Afiliacao para evitar duplicação

		$SEL="SELECT pjCod, pjAfiliacao FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);

        $pjCod=$SEL_RES[pjCod];
		$pjAfiliacao=$SEL_RES[pjAfiliacao];

		if ($SEL_RES!="") {

			if ($pjAfiliacao=="0") {

			    $total_af="UPDATE PessoaJuridica SET pjAfiliacao='1' WHERE pjCod='$pjCod'";
				$inconteudo_af=mysql_db_query($base, $total_af, $conexao);

				$campos_pfpj="pjCod='$pjCod'";

				$total_pfpj="UPDATE PFPJ SET $campos_pfpj WHERE pfCod='$VpfCod' and pfpjTipo='Afiliacao' ";
				$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
				$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

			} else {

				$erro=$e006;
				header("Location: inserir_afiliacao.php?erro=$erro");
				exit;
			} 
		} else {

			// inclusão da Afiliação do autor da tese na tabela PessoaJuridica

			$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao,pjAgFomento";
			$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','1','0'";
			$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
			$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

        	$campos_pj_fim="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";

			$inclusao_pj_fim="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";
			$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
			$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

			//Selecionar o pjCod da Afiliacao do Autor

			$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' and pjCNPJ='$pjCNPJ' ORDER BY pjCod DESC";
			$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
			$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

			//Armazena o pjCod do Aluno na variável 

			$pjCod=$SEL_pjCod_RES["pjCod"];

			$SEL2="SELECT pjCod FROM PFPJ WHERE pfCod='$VpfCod' and pfpjTipo='Afiliacao'";
		$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
		$SEL2_RES=mysql_fetch_array($SEL2_query);

		if ($SEL2_RES=="") {

			$campos_pfpj="pfCod,pjCod,pfpjTipo";
			$inclusao_pfpj="'$VpfCod','$pjCod','Afiliacao'";
			$total_pfpj="INSERT INTO PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
			$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
			$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		} else {

		$campos_pfpj="pjCod='$pjCod'";
		$total_pfpj="UPDATE PFPJ SET $campos_pfpj WHERE pfCod='$VpfCod' and pfpjTipo='Afiliacao' ";
		$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
		$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		}

		}

	} else {

		$SEL2="SELECT pjCod FROM PFPJ WHERE pfCod='$VpfCod' and pfpjTipo='Afiliacao'";
		$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
		$SEL2_RES=mysql_fetch_array($SEL2_query);

		if ($SEL2_RES=="") {

			$campos_pfpj="pfCod,pjCod,pfpjTipo";
			$inclusao_pfpj="'$VpfCod','$pjCod','Afiliacao'";
			$total_pfpj="INSERT INTO PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
			$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
			$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		} else {

		$campos_pfpj="pjCod='$pjCod'";
		$total_pfpj="UPDATE PFPJ SET $campos_pfpj WHERE pfCod='$VpfCod' and pfpjTipo='Afiliacao' ";
		$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
		$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		}
	}

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_afiliacao.php?sucesso=$sucesso");
exit;
}

if ($cod=="Excluir") {

$total="DELETE FROM PFPJ WHERE pjCod='$pjCod' and pfCod='$VpfCod' and pfpjTipo='Afiliacao'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao2=mysql_db_query($base_fim, $total, $conexao_fim);

//Atualização da tsDataAtualizacao da tabela TESES
$unix = gmmktime();
$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
$inclusao_oai="tsDataAtualizacao='$tsDataAtualizacao'";
$total_oai="UPDATE Teses SET $inclusao_oai WHERE tsIdentificador=$VtsIdentificador";
$inconteudo_oai=mysql_db_query($base, $total_oai, $conexao);
$inconteudo_oai_fim=mysql_db_query($base_fim, $total_oai, $conexao_fim);

$sucesso=$sg001;
header("Location: inserir_afiliacao.php?sucesso=$sucesso");
exit;

}
}

?>