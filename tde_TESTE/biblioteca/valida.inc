<?
session_start();
session_destroy();
	//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no   caminho especificado
    require "../conexao/conexao.inc";
	require "../bibliotecas/idioma_sistema.bib";
	
	require "../bibliotecas/idioma_sistema.bib";
	require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
	
	if ($cnLogin!=""){
	
	//Verificar se o email e a senha confere
    $SEL_cn="SELECT * FROM Contas WHERE (cnLogin='$cnLogin' and  cnTipo='Pos')";
    $SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
    $SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
    
	$VcnSenha=$SEL_cn_RES["cnSenha"];
	$SprCod=$SEL_cn_RES["prCod"];
	$ScnCod=$SEL_cn_RES["cnCod"];

	if ($SEL_cn_RES!="") {
	   if ($VcnSenha!=$cnSenha) {
	   $erro2=$eg002;
	   } else {
	   
	   //Verificar se o programa esta ATIVO
    $SEL_pr="SELECT prStatus FROM Programa WHERE prCod='$SprCod'";
    $SEL_pr_query=mysql_db_query($base,$SEL_pr,$conexao);
    $SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
	$SprStatus=$SEL_pr_RES['prStatus'];
	
	
	if ($SprStatus=='INATIVO') {
	$erro0=$eg005;
	}
	
	   session_start();
	   session_register("SprCod" ,"ScnCod");
	   header("Location: tde_pos.php");
	
		
	}}else{
	$erro3=$eg006;
	}
	
}else{
$erro1=$eg004;
}
 
 ?>