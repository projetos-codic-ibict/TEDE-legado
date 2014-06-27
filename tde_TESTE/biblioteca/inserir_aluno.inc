<? session_start(SprCod ,ScnCod);
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

require "../conexao/conexao_fim.inc";

if ($cod=="Inserir") {

//Verificar o Nome , o CPF e o e-mail para evitar duplicaчуo
$SEL="SELECT pfCod, pfAutor FROM PessoaFisica WHERE (pfEmail='$pfEmail' and pfAutor='1') or (pfNome='$pfNome' and pfCPF='$pfCPF')";
$SEL_query=mysql_db_query($base,$SEL,$conexao);
$SEL_RES=mysql_fetch_array($SEL_query);

$pfCod_alt=$SEL_RES[pfCod];
$SpfEmail=$SEL_RES["pfEmail"];
$pfAutor=$SEL_RES[pfAutor];

if ($pfAutor=='1' and $SpfEmail=='$pfEmail') {
$erro=$e012;
} else {

if ($pfCod_alt!="") {
	if ($pfAutor==1) {
		$erro=$e013;
		
	} else {
		$total_pf="UPDATE PessoaFisica SET pfAutor='1' WHERE pfCod='$pfCod_alt'";
		$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
		/*
		//Insere o prCod e o pfCod na tabela de relacionamento PFPR 

		$campos_pfpr="pfCod_alt,prCod";
		$inclusao_pfpr="'$pfCod_alt','$SprCod'";
		$total_pfpr="insert into PFPR ($campos_pfpr) values ($inclusao_pfpr)";
		$inconteudo_pfpr=mysql_db_query($base, $total_pfpr, $conexao);
		$inconteudo_pfpr2=mysql_db_query($base_fim, $total_pfpr, $conexao_fim);
         */
		//Insere o pfCod e o prCod na tabela de relacionamento TSPF 
		$campos_tspf="pfCod,prCod,tspfTipo";
		$inclusao_tspf="'$pfCod_alt','$SprCod','Autor'";
		$total_tspf="insert into TSPF ($campos_tspf) values ($inclusao_tspf)";
		$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);
		
		$sucesso=$sg001;
		header("Location:visualizar_alunos.php?EVpfCod=$pfCod_alt&sucesso=$sucesso");
		exit;
	}

} else {

	if ($SpjCod=="Nenhum" and $ApjNome!="") {
		//Verificar o Nome e o CNPJ da Afiliaчуo para evitar duplicaчуo
		$SEL2="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' or pjCNPJ='$ApjCNPJ'";
	
		$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
		$SEL2_RES=mysql_fetch_array($SEL2_query);

		$pjCod_alt=$SEL2_RES["pjCod"];
		$pjAfiliacao=$SEL2_RES["pjAfiliacao"];
        	
			if ($pjCod_alt!="") {
				if ($pjAfiliacao=="1") {
					$erro=$e009;
					$pjCod=$pjCod_alt;
					//header("Location: inserir_aluno.php?erro=$erro");
					//exit;
				} else {
					$total_pj="UPDATE PessoaJuridica SET pjAfiliacao='1' WHERE pjCod='$pjCod_alt'";
					$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);
					$pjCod=$pjCod_alt;
				}
			} else {
				if ($ApjNome=="" and $SpjCod=="") {
					$erro=$e010;
					header("Location: inserir_aluno.php?erro=$erro");
					exit;
				}
				
				if ($ApjNome!="" and $SpjCod=="Nenhum") {

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
					$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$ApjNome' and pjCNPJ='$ApjCNPJ'";
					$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
					$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

					//Armazena o pjCod do Aluno na variсvel 
					$pjCod=$SEL_pjCod_RES["pjCod"];
				} 
				
				
			}
       }
		// Inserir Aluno
		$campos_pf="pfNome,pfLattes,pfCPF,pfEmail,pfAutor";
		$inclusao_pf="'$pfNome','$pfLattes','$pfCPF','$pfEmail','1'";
		$total_pf="insert into PessoaFisica ($campos_pf) values ($inclusao_pf)";
		$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
		
		$campos_pf_fim="pfNome,pfLattes,pfCPF,pfEmail";
		$inclusao_pf_fim="'$pfNome','$pfLattes','$pfCPF','$pfEmail'";
		$total_pf_fim="insert into PessoaFisica ($campos_pf_fim) values ($inclusao_pf_fim)";
		$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf_fim, $conexao_fim);

		//Selecionar o pfCod do Autor
		$SEL_pfCod="SELECT pfCod FROM PessoaFisica WHERE pfNome='$pfNome' and pfCPF='$pfCPF'";
		$SEL_pfCod_query=mysql_db_query($base,$SEL_pfCod,$conexao);
		$SEL_pfCod_RES=mysql_fetch_array($SEL_pfCod_query);

		//Armazena o pfCod do Aluno gerado na variсvel 
		$pfCod=$SEL_pfCod_RES["pfCod"];
/*
		//Insere o prCod e o pfCod na tabela de relacionamento PFPR 

		$campos_pfpr="pfCod,prCod";
		$inclusao_pfpr="'$pfCod','$prCod'";
		$total_pfpr="insert into PFPR ($campos_pfpr) values ($inclusao_pfpr)";
		$inconteudo_pfpr=mysql_db_query($base, $total_pfpr, $conexao);
		$inconteudo_pfpr2=mysql_db_query($base_fim, $total_pfpr, $conexao_fim);
*/
		//Insere o pfCod e o prCod na tabela de relacionamento TSPF 
		$campos_tspf="pfCod,prCod,tspfTipo";
		$inclusao_tspf="'$pfCod','$prCod','Autor'";
		$total_tspf="insert into TSPF ($campos_tspf) values ($inclusao_tspf)";
		$inconteudo_tspf=mysql_db_query($base, $total_tspf, $conexao);

		// inclusуo do relacionamento da tabela PFPJ
		
		//if ($SpjCod!="" and SpjCod!="Nenhum") {
			//$pjCod=$SpjCod;
		//}
		
		$campos_pfpj="pjCod,pfCod,pfpjTipo";
		$inclusao_pfpj="'$pjCod','$pfCod','Afiliacao'";
		$total_pfpj="insert into PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
		$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
		$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);
        
$total="DELETE FROM PFPJ WHERE pjCod='0'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

		
$sucesso=$sg001;
header("Location:visualizar_alunos.php?EVpfCod=$pfCod&sucesso=$sucesso");
exit;
}
}
}


}
?>