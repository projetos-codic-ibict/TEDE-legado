<? 
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_aluno/mensagens_".$idioma_sistema.".txt";
if ($VpfCod=="") {
$VpfCod=$pfCod;
}
if ($cod=="Inserir") {

	if ($pjCod=="") {
        if ($pjNome=="") {
		header("Location: inserir_agfomento_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&");
		exit;
		}
		//Verificar o Nome da Agencia de Fomento para evitar duplicação

		$SEL="SELECT pjCod, pjAgFomento FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);

        $pjCod=$SEL_RES[pjCod];
		$pjAgFomento=$SEL_RES[pjAgFomento];

		if ($SEL_RES!="") {

			$SEL2="SELECT pjCod FROM PFPJ WHERE pjCod='$pjCod' and pfCod='$VpfCod' and pfpjTipo='AgenciaFomento'";
			$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
			$SEL2_RES=mysql_fetch_array($SEL2_query);

			if ($SEL2_RES=="") {

			if ($pjAgFomento=="0") {

	            $total_ag="UPDATE PessoaJuridica SET pjAgFomento='1' WHERE pjCod='$pjCod'";
				$inconteudo_ag=mysql_db_query($base, $total_ag, $conexao);

				$campos_pfpj="pfCod,pjCod,pfpjTipo";

				$inclusao_pfpj="'$VpfCod','$pjCod','AgenciaFomento'";
				$total_pfpj="INSERT INTO PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
				$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
				$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

			} else {

				$erro=$e004;
				header("Location: inserir_agfomento_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
				exit;

			} 
			}
		} else {

			// inclusão da Ag Fomento do autor da tese na tabela PessoaJuridica
			$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao,pjAgFomento";
			$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','0','1'";
			$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
			$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

			$campos_pj_fim="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
			$inclusao_pj_fim="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";
			$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
			$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

			//Selecionar o pjCod da Agencia de fomento do Autor

			$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' and pjCNPJ='$pjCNPJ' ORDER BY pjCod DESC";
			$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
			$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

			//Armazena o pjCod do Aluno na variável 
			$pjCod=$SEL_pjCod_RES["pjCod"];
			$campos_pfpj="pfCod,pjCod,pfpjTipo";
			$inclusao_pfpj="'$VpfCod','$pjCod','AgenciaFomento'";
			$total_pfpj="INSERT INTO PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
			$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
			$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		}
	} else {

		$SEL2="SELECT pjCod FROM PFPJ WHERE pjCod='$pjCod' and pfCod='$VpfCod' and pfpjTipo='AgenciaFomento'";
		$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
		$SEL2_RES=mysql_fetch_array($SEL2_query);

		if ($SEL2_RES=="") {

			$campos_pfpj="pfCod,pjCod,pfpjTipo";
			$inclusao_pfpj="'$VpfCod','$pjCod','AgenciaFomento'";
			$total_pfpj="INSERT INTO PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
			$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
			$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

		} else {

			$erro=$e005;
			header("Location: inserir_agfomento_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&erro=$erro");
			exit;

		}
	}


$sucesso=$sg001;
header("Location: inserir_agfomento_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&sucesso=$sucesso&EVpjCod=$pjCod");
exit;
}

if ($cod=="Excluir") {

$total="DELETE FROM PFPJ WHERE pjCod='$pjCod' and pfCod='$VpfCod' and pfpjTipo='AgenciaFomento'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao2=mysql_db_query($base_fim, $total, $conexao_fim);

$sucesso=$sg001;

header("Location: inserir_agfomento_tde.php?tsIdentificador=$tsIdentificador&pfCod=$pfCod&sucesso=$sucesso");

exit;
}

?>