<? 

if (isset($HTTP_POST_VARS)) {
       while(list($name,$value) = each($HTTP_POST_VARS))
        {   $$name=trim($value);
		

        };
   };

session_start();
session_destroy();

//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no   caminho especificado
    
	require "../conexao/conexao.inc";
	require "../bibliotecas/idioma_sistema.bib";
	require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
	
	if ($cnLogin!=""){
	
	//VerificarSelecionar o pfCod do Autor
    $SEL_cn="SELECT * FROM Contas WHERE cnLogin='$cnLogin' and cnTipo='Administrador'";
    $SEL_cn_query=mysql_db_query($base,$SEL_cn,$conexao);
    $SEL_cn_RES=mysql_fetch_array($SEL_cn_query);
    $VAdmin_cnCod=$SEL_cn_RES["cnCod"];
	$VcnSenha=$SEL_cn_RES["cnSenha"];
	//$cnDataTermino=$SEL_cn_RES["cnDataTermino"];
	//$cnDataInicio=$SEL_cn_RES["cnDataInicio"];
	
	//Fecha a conexao com o Banco TEDE
    mysql_close($conexao);




	if ($SEL_cn_RES!="") {
	   if ($VcnSenha!=$cnSenha) {
	   $erro2=$eg002;
	   } else {
	   
	  
	   session_start();
	   session_register('VAdmin_cnCod');
	   $_SESSION['VAdmin_cnCod']=$VAdmin_cnCod;
	   header("Location: tde_admin.php");
	 }
	}else{
	$erro3=$eg003;
	}
}else{
$erro1=$eg004;
}
 
 ?>