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
		//Verificar o Nome da Afiliacao para evitar duplicação

		$SEL="SELECT pjCod, pjAfiliacao FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);
	
        $pjCod=$SEL_RES[pjCod];
		$pjAfiliacao=$SEL_RES['pjAfiliacao'];

		if ($SEL_RES!="") {

		if ($pjAfiliacao=="0") {


				$total_af="UPDATE PessoaJuridica SET pjAfiliacao='1' WHERE pjCod='$pjCod'";
				$inconteudo_af=mysql_db_query($base, $total_af, $conexao);
				$inconteudo_af=mysql_db_query($base_fim, $total_af, $conexao_fim);

		
			$sucesso=$sg001;

header("Location: visualizar_afiliacao.php?EVpjCod=$pjCod&sucesso=$sucesso");

exit;
	

			} else {

				$erro=$e009;

				header("Location: visualizar_afiliacao.php?erro=$erro");
				exit;

			} 
		} else {

			// inclusão da Afiliação do autor da tese na tabela PessoaJuridica

			$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAgFomento,pjAfiliacao";
			$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','0','1'";
			$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
			$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);

$SEL="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='pjCNPJ'";
		$SEL_query=mysql_db_query($base,$SEL,$conexao);
		$SEL_RES=mysql_fetch_array($SEL_query);
$pjCod=$SEL_RES[pjCod];

			$campos_pj_fim="pjCod,pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
			$inclusao_pj_fim="'$pjCod','$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";

			$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
			$inconteudo_pj_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);
			
			$sucesso=$sg001;
			

header("Location: visualizar_afiliacao.php?EVpjCod=$pjCod&sucesso=$sucesso");
exit;

}}
?>