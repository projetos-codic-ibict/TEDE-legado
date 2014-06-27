<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php

function mostra($texto){
	global $CONTADOR_DE_TESTES_DO_PHP;	
	$CONTADOR_DE_TESTES_DO_PHP++;	
	echo "[".$CONTADOR_DE_TESTES_DO_PHP."] ";
	echo $texto;
}

function falha($texto,$resultado,$esperado,$falha){
	$t="<font color=\"red\">";
	$t.="O teste [".$texto."] ";	
	$t.=" FALHOU ! $falha";	
	$t.="</font><br/>";	
	mostra($t);
}

function passou($texto,$resultado,$esperado,$passou=null){
	$t="<font color=\"green\">";	
	$t.="O teste [".$texto."] ";		
	$t.=" PASSOU ! $passou <!-- $esperado,$resultado -->";
	$t.="</font><br/>";
	mostra($t);
}

function teste($texto,$resultado,$esperado = true){
	if ($resultado == $esperado){
		passou($texto,$resultado,$esperado);
	} else {
		falha($texto,$resultado,$esperado,"Era esperado $esperado e retornou $resultado");
	}
}

function testeminimo($texto,$resultado,$esperado){
	$resultado2=1+strtr($resultado,M,"000")-1;
	$esperado2=1+strtr($esperado,M,"000")-1;
	if ($resultado2 >= $esperado2){
		passou($texto,$resultado,$esperado,"Minimo esperado $esperado e retornou $resultado");	
	} else {
		falha($texto,$resultado,$esperado,"Era esperado pelo menos $esperado e retornou $resultado");
	}
}

function testephp($texto,$resultado,$esperado){
	if(version_compare($resultado,$esperado,">=")){
		passou($texto,$resultado,$esperado,"Minimo esperado $esperado e retornou $resultado");	
	} else{
		falha($texto,$resultado,$esperado,"Era esperado pelo menos $esperado e retornou $resultado");
	}
}

testephp("Versão do PHP ",phpversion(),"4.0.1");
teste("Modulo Mysql",function_exists('mysql_connect'),true);
teste("Register Globals",get_cfg_var('register_globals'),true);
teste("Output Buffering",get_cfg_var('output_buffering'),true);
teste("Magic Quotes GPC",get_magic_quotes_gpc(),true);
teste("Magic Quotes Runtime",get_magic_quotes_runtime(),false);
teste("Magic Quotes SyBase",get_cfg_var('magic_quotes_sybase'),false);
testeminimo("Post Maximum Size",get_cfg_var('post_max_size'),"20M");
testeminimo("Upload Max Size",get_cfg_var('upload_max_filesize'),"20M");



phpinfo();
?>
</body>
</html>
