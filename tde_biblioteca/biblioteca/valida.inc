<?
session_start();
session_destroy();
	
	//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no   caminho especificado
    require "../conexao/conexao.inc";
	
	require "../bibliotecas/idioma_sistema.bib";
	require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
	
	session_start();
    session_unregister(SprCod);
	session_unregister(SbdCod);
    session_destroy();
	
	if ($cnLogin!=""){
	
	//Verificar se o nome e a senha confere
    $SEL_cn="SELECT * FROM Contas WHERE (cnLogin='$cnLogin' and (cnTipo='Catalogador' or cnTipo='MasterCataloga'))";
    $SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
    $SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
    
	$VcnSenha=$SEL_cn_RES["cnSenha"];
	$SbdCod=$SEL_cn_RES["bdCod"];
	$ScnCod=$SEL_cn_RES["cnCod"];
	$ScnTipo=$SEL_cn_RES["cnTipo"];
	$ScnBloqueado=$SEL_cn_RES["cnBloqueado"];
	//$cnDataTermino=$SEL_cn_RES["cnDataTermino"];
	//$cnDataInicio=$SEL_cn_RES["cnDataInicio"];
	
	if ($SEL_cn_RES!="") {
	   if ($VcnSenha!=$cnSenha) {
	   $erro2=$eg002;
	   } else {
	   if ($ScnBloqueado==1) {
	   $erro0=$eg011;
	   header("Location:login.php?erro=$erro0");
	   exit;
	   }
	   //Verificar se a Biblioteca esta ATIVA
    $SEL_bd="SELECT bdStatus FROM BibliotecaDepositaria WHERE bdCod='$SbdCod'";
    $SEL_bd_query=mysql_db_query($base,$SEL_bd,$conexao);
    $SEL_bd_RES=mysql_fetch_array($SEL_bd_query);
	$SbdStatus=$SEL_pr_RES['bdStatus'];
	
	if ($SbdStatus=='INATIVO') {
	$erro0=$eg011;
	header("Location:login.php?erro=$erro0");
	exit;
	}
	
	   session_start();
	   session_register("SbdCod", "ScnCod", "ScnTipo");
	   if ($alterar==1) {
	   header("Location: alterar_login.php");
	   }else{
	   header("Location: tde_pos.php");
	   }

		}
	} else {
	$erro3=$eg006;
	}
}else{
$erro1=$eg004;
}

 ?>