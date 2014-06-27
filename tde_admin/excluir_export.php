<?php 
session_start();
// -------------------------------------------------------------------
//  Exclui o Diretório dado com todos seus sub-diretórios e arquivos:
//  Obs.:   - Função recursiva;
//          - Montada para Linux (Separador "/").
// -------------------------------------------------------------------
function ExcluiDirExport($Dir){
    
    if ($dd = opendir($Dir)) {
        while (false !== ($Arq = readdir($dd))) {
            if($Arq != "." && $Arq != ".."){
                $Path = "$Dir/$Arq";
                if(is_dir($Path)){
                    ExcluiDirExport($Path);
                }elseif(is_file($Path)){
                    unlink($Path);
                }
            }
        }
        closedir($dd);
    }
    rmdir($Dir);
}


if(!session_is_registered("VAdmin_cnCod")) {
	header("Location: ../index.php");
}else{
	require "../conexao/conexao_fim.inc";
	$data=$_GET["data"];
	$SEL_le="SELECT le_diretorio FROM log_export WHERE le_data='$data'";
	$SEL_le_query=mysql_db_query($base_fim,$SEL_le,$conexao_fim);
	$SEL_le_RES=mysql_fetch_array($SEL_le_query);
	if ($SEL_le_RES!="") {
		$diretorio=$SEL_le_RES["le_diretorio"];
		
		ExcluiDirExport($diretorio);
		
		$DEL_le="DELETE FROM log_export WHERE le_data='$data'";
		$DEL_le_query=mysql_db_query($base_fim,$DEL_le,$conexao_fim);
		$alerta = '<script>alert("Exclusão realizada com sucesso!");</script>';
		print $alerta;
		header("Location: tela_export.php");
	}



	
} 
?>