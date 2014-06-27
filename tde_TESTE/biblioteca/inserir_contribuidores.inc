<? session_start();
if(!session_is_registered("SprCod")) {
header("Location: login.php");
}else{

require "../conexao/conexao.inc";
require "../conexao/conexao_fim.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_pos/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {
if ($pfCPF!="" or $pfEstrangeiro!="") {
if ($pfEstrangeiro!="") {
$vCPF="";
} else {
$vCPF="or pfCPF='$pfCPF'";
}
	//Verificar o Nome do Contribuidor para evitar duplicaчуo
	$SEL="SELECT pfCod, pfContribuidor FROM PessoaFisica WHERE pfNome='$pfNome' $vCPF";
	$SEL_query=mysql_db_query($base,$SEL,$conexao);
	$SEL_RES=mysql_fetch_array($SEL_query);
    
	$pfCod_alt=$SEL_RES['pfCod'];
	$pfContribuidor=$SEL_RES[pfContribuidor];
   
	if ($SEL_RES!="") {

		if ($pfContribuidor==1) {
			$erro=$e008;
			header("Location: visualizar_contribuidores.php?EVpfCod=$pfCod_alt&erro=$erro");
			exit;
		} else {
			$total_pf="UPDATE PessoaFisica SET pfContribuidor='1' WHERE pfCod='$pfCod_alt'";
			$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
						
			$sucesso=$sg001;
			header("Location: visualizar_contribuidores.php?EVpfCod=$pfCod_alt&&sucesso=$sucesso");
			exit;
			
		}

	} else {
	
		if ($SpjCod=="Nenhum" and $pjNome!="") {
		//Verificar o Nome e o CNPJ da Afiliaчуo para evitar duplicaчуo
		$SEL2="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' or pjCNPJ='$pjCNPJ'";
		$SEL2_query=mysql_db_query($base,$SEL2,$conexao);
		$SEL2_RES=mysql_fetch_array($SEL2_query);

		$pjCod_alt=$SEL2_RES["pjCod"];
		$pjAfiliacao=$SEL2_RES["pjAfiliacao"];
        	
			if ($pjCod_alt!="") {
				if ($pjAfiliacao=="1") {
					$erro=$e009;
					$pjCod=$pjCod_alt;
					
				} else {
					$total_pj="UPDATE PessoaJuridica SET pjAfiliacao='1' WHERE pjCod='$pjCod_alt'";
					$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);
					$pjCod=$pjCod_alt;
				}
			} else {
				if ($pjNome=="" and $SpjCod=="") {
					$erro=$e010;
					header("Location: inserir_contribuidor.php?erro=$erro");
					exit;
				}
				
				if ($pjNome!="" and $SpjCod=="Nenhum") {

					// inclusуo da Afiliaчуo do autor da tese na tabela PessoaJuridica
					$campos_pj="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL,pjAfiliacao";
					$inclusao_pj="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL','1'";
					$total_pj="insert into PessoaJuridica ($campos_pj) values ($inclusao_pj)";
					$inconteudo_pj=mysql_db_query($base, $total_pj, $conexao);
					
					// inclusуo da Afiliaчуo do autor da tese na tabela PessoaJuridica
					$campos_pj_fim="pjNome,pjSigla,pjPais,pjUF,pjCNPJ,pjURL";
					$inclusao_pj_fim="'$pjNome','$pjSigla','$pjPais','$pjUF','$pjCNPJ','$pjURL'";
					$total_pj_fim="insert into PessoaJuridica ($campos_pj_fim) values ($inclusao_pj_fim)";
					$inconteudo_pj2_fim=mysql_db_query($base_fim, $total_pj_fim, $conexao_fim);

					//Selecionar o pjCod da Afiliacao do Autor
					$SEL_pjCod="SELECT pjCod FROM PessoaJuridica WHERE pjNome='$pjNome' and pjCNPJ='$pjCNPJ'";
					$SEL_pjCod_query=mysql_db_query($base,$SEL_pjCod,$conexao);
					$SEL_pjCod_RES=mysql_fetch_array($SEL_pjCod_query);

					//Armazena o pjCod do Aluno na variсvel 
					$pjCod=$SEL_pjCod_RES["pjCod"];
				} 
				
				
			}
       }
		   
	   // Inserir Contribuidor
		$campos_pf="pfNome,pfCitacao,pfLattes,pfCPF,pfEmail,pfContribuidor";
		$inclusao_pf="'$pfNome','$pfCitacao','$pfLattes','$pfCPF','$pfEmail','1'";
		$total_pf="insert into PessoaFisica ($campos_pf) values ($inclusao_pf)";
		$inconteudo_pf=mysql_db_query($base, $total_pf, $conexao);
		
		$campos_pf_fim="pfNome,pfCitacao,pfLattes,pfCPF,pfEmail";
		$inclusao_pf_fim="'$pfNome','$pfCitacao','$pfLattes','$pfCPF','$pfEmail'";
		$total_pf_fim="insert into PessoaFisica ($campos_pf_fim) values ($inclusao_pf_fim)";
		$inconteudo_pf_fim=mysql_db_query($base_fim, $total_pf_fim, $conexao_fim);

		//Selecionar o pfCod do Contribuidor
		$SEL_pfCod="SELECT pfCod FROM PessoaFisica WHERE pfNome='$pfNome' and pfCPF='$pfCPF'";
		$SEL_pfCod_query=mysql_db_query($base,$SEL_pfCod,$conexao);
		$SEL_pfCod_RES=mysql_fetch_array($SEL_pfCod_query);

		//Armazena o pfCod do Contribuidor gerado na variсvel 
		$pfCod=$SEL_pfCod_RES["pfCod"];

		//Insere o pjCod e o pfCod na tabela de relacionamento PFPJ 
		
		//if ($SpjCod!="") {
			//$pjCod=$SpjCod;
		//}

		$campos_pfpj="pjCod,pfCod";
		$inclusao_pfpj="'$pjCod','$pfCod'";
		$total_pfpj="insert into PFPJ ($campos_pfpj) values ($inclusao_pfpj)";
		$inconteudo_pfpj=mysql_db_query($base, $total_pfpj, $conexao);
		$inconteudo_pfpj2=mysql_db_query($base_fim, $total_pfpj, $conexao_fim);

$total="DELETE FROM PFPJ WHERE pjCod='0'";
$exclusao=mysql_db_query($base, $total, $conexao);
$exclusao_fim=mysql_db_query($base_fim, $total, $conexao_fim);

$sucesso=$sg001;
header("Location: visualizar_contribuidores.php?EVpfCod=$pfCod&sucesso=$sucesso");
exit;
}
} else {
$erro=$e018;
}
}
}
?>