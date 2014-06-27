<?
function check_mysql_db_query($base,$parametro2,$conexao){	
 	$result = mysql_db_query($base, $parametro2, $conexao);
	if (!$result){
		sleep(4);
		$result = mysql_db_query($base, $parametro2, $conexao);
		if (!$result){
			erro_geral("Erro de acesso à banco na query:<br/><br/>".$parametro2,mysql_error());
			exit;
		}
	}
	return $result;
 }
 
 function erro_geral($msg,$msg2=null){
 	echo "<h3> ERRO GERAL :</h3> $msg ";
	echo "<br/><br/>Tente novamente e verifique os campos preenchidos. <br/><br/><b>Se persistir informe ao administrador do sistema TEDE sobre o erro: <br/><br/><font color=#FF0000>'";
	if ($msg2){
		echo $msg2."</font></b>";
	}
 }
 
 function check_mysql_fetch_array($stmt){
 	$row = mysql_fetch_array($stmt);
	//
	// No caso de magic_quotes_gpc estiver ligado precisamos
	// retirar as 'barras' extras
	//
	if (get_magic_quotes_gpc()&false) {
		if (is_array($row)){
			foreach($row as $k=>$v){
				$new_row[$k] = stripslashes($v);
			}
			return $new_row;
		}
	}
	return $row;
 }
?>
