<?

require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {
if ($pjNome=="") {
header("Location: visualizar_agfomento.php");
exit;
}
		//Verificar o Nome da Agencia de Fomento para evitar duplicação

		$SEL="SELECT pjCod, pjAgFomento FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);

        $pjCod=$SEL_RES[pjCod];
		$pjAgFomento=$SEL_RES['pjAgFomento'];

		if ($SEL_RES!="") {
		if ($pjAgFomento=="0") {

				$total_ag="UPDATE PessoaJuridica SET pjAgFomento='1' WHERE pjCod='$pjCod'";
				$inconteudo_ag=mysql_db_query($base, $total_ag, $conexao);
				$inconteudo_ag=mysql_db_query($base_fim, $total_ag, $conexao_fim);

			$sucesso=$sg001;

header("Location: visualizar_agfomento.php?EVpjCod=$pjCod&sucesso=$sucesso");
exit;

			} else {

				$erro=$e014;
				header("Location: visualizar_agfomento.php?erro=$erro");

				exit;
			} 
		} else {

			// inclusão da Ag Fomento do autor da tese na tabela PessoaJuridica

			$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAgFomento,pjAfiliacao";
			$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','1','0'";
			$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
			$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

			$campos_pj_fim="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
			$inclusao_pj_fim="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";

			$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
			$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

			$sucesso=$sg001;
			
			$SEL="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);
$pjCod=$SEL_RES[pjCod];
header("Location: visualizar_agfomento.php?EVpjCod=$pjCod&sucesso=$sucesso");
exit;

		}
}
?>