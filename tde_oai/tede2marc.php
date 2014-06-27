<?php
require_once('IBICT.php');
include_once('../conexao/conexao.inc');

$oai_prefix       = "oai:ibict.br";
$nome_repositorio = "IBICT";
$mtdbr_versao     = "1.0";

$marc21_prefix    = "tede";

if ($_REQUEST['submit']){
	$from   = toMysqlDate($_POST['from']);
	$until  = toMysqlDate($_POST['until']);


	mysql_select_db("TDE");

	$mtdbr  =& new OAI_MTDBR($nome_repositorio,$oai_prefix.":",$mtdbr_versao);
	$marc21 =& new MTDBR_ISO2709($marc21_prefix);

	$xml_tree = true;
	$off_set=0;
	$i=0;
	while ($xml_tree && $i<4){
		$xml			= $mtdbr->listRecords(1,$from,$until,null,$off_set++);
		$xml['verb'] = str_replace('&T;','',$xml['verb']);
		$xml_tree = domxml_open_mem(trata(unescape(utf8_encode($xml['verb'])),true));
		if ($xml_tree){
			$marc21->linkXML($xml_tree);
			if ($iso = $marc21->iso2709()){
				$i++;
				$output.= $iso;
			}
		}
	}

	if ($i == 0){
		echo "Erro! Nenhum registro encontrado no intervalo fornecido.";
	} else {
		header ('Cache-Control: no-cache, must-revalidate'); 
		header ('Pragma: no-cache'); 
		header("Content-type: application/octet-stream\n"); 
		header("Content-disposition: attachment; filename=\"tede".str_replace("-","",$from)."-".str_replace("-","",$until).".mrc\"\n"); 
		echo $output;
		exit;
	}
} else {
?>
<hr>
	<form method="POST" >
	<h2>Modulo exportador de teses e dissertaçoes eletronicas para o formato MARC21(ISO-2709)</h2>
	Utilize os campos abaixos para definir o intervalo de extração das teses a serem exportadas. 
	<br/>
	Da data:<input type="text" name="from" size="10">
	até a data:<input type="text" name="until" size="10">
	<input type="submit" name="submit" value="Exportar registros do período">
	</form>
</hr>
<?php
}
?>
