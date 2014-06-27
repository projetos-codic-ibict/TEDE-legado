<?php 
session_start();

/** 
 * Returns true if $string is valid UTF-8 and false otherwise. 
 * 
 * @since        1.14 
 * @param [mixed] $string     string to be tested 
 * @subpackage 
 */ 
 /*
function is_utf8($string) { 
   
	// From http://w3.org/International/questions/qa-forms-utf-8.html 
	return preg_match('%^(?: 
		  [\x09\x0A\x0D\x20-\x7E]            # ASCII 
		| [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte 
		|  \xE0[\xA0-\xBF][\x80-\xBF]        # excluding overlongs 
		| [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte 
		|  \xED[\x80-\x9F][\x80-\xBF]        # excluding surrogates 
		|  \xF0[\x90-\xBF][\x80-\xBF]{2}     # planes 1-3 
		| [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15 
		|  \xF4[\x80-\x8F][\x80-\xBF]{2}     # plane 16 
	)*$%xs', $string); 
   
} 
*/
function is_utf8($string) { 

		$string = preg_replace("#[\x09\x0A\x0D\x20-\x7E]#"        ,"",$string);         // ASCII 
		$string = preg_replace("#[\xC2-\xDF][\x80-\xBF]#"         ,"",$string);             // non-overlong 2-byte 
		$string = preg_replace("#\xE0[\xA0-\xBF][\x80-\xBF]#"    ,"",$string);     // excluding overlongs 
		$string = preg_replace("#[\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}#","",$string);     // straight 3-byte 
		$string = preg_replace("#\xED[\x80-\x9F][\x80-\xBF]#"    ,"",$string);     // excluding surrogates 
		$string = preg_replace("#\xF0[\x90-\xBF][\x80-\xBF]{2}#","",$string);     // planes 1-3 
		$string = preg_replace("#[\xF1-\xF3][\x80-\xBF]{3}#"    ,"",$string);     //  planes 4-15 
		$string = preg_replace("#\xF4[\x80-\x8F][\x80-\xBF]{2}#","",$string);     // plane 16 

		$rc = ($string == ""?true:false); 
		return $rc;
}
				
function codificacao($string) {
	return mb_detect_encoding($string.'x', 'UTF-8, ISO-8859-1');
}

  //$enc pode ser [iso-8859-1/UTF-8/etc..] 
function RemoveAcentos($str, $enc = 'iso-8859-1'){ 

    $acentos = array( 
        'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/', 
        'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/', 
        'C' => '/&Ccedil;/', 
        'c' => '/&ccedil;/', 
        'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/', 
        'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/', 
        'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/', 
        'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/', 
        'N' => '/&Ntilde;/', 
        'n' => '/&ntilde;/', 
        'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/', 
        'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/', 
        'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/', 
        'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/', 
        'Y' => '/&Yacute;/', 
        'y' => '/&yacute;|&yuml;/', 
        'a.' => '/&ordf;/', 
        'o.' => '/&ordm;/' 
    ); 

      return preg_replace($acentos, array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
  } 

function xmlEscape($string) {
    return str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $string);
} 
  
function normalizaNomeDiretorio($string){
	$search = array("/", "\\", "*", "?", "|", "<", ">");
	$search1 = array(" ","  ","   ","    ","     ");
	$replace = "-";
	$replace1 = "_";
	$string = RemoveAcentos($string);
	$string = RemoveAcentos($string,"UTF-8");
	$string = trim(str_replace($search, $replace, $string));
	$string = str_replace($search1,  $replace1, $string);
	return $string;
}

function normalizaCPF($string){
	$search = array(".", "-");
	$replace = "";
	if (!empty($string)){
		$string = trim(str_replace($search, $replace, $string));
		$string ="CPF:".$string;
	}
	return $string;
}

function normalizaLattes($string){
	$search = array("visualizacv.jsp");
	$replace = "visualizacv.do";
	
	if (!empty($string)){
		$string = trim(str_replace($search, $replace, xmlEscape($string)));
	}
	return $string;
}

function normalizaEspacos($str){
	$str = trim($str);
	$str = preg_replace('/\s(?=\s)/', '', $str);
	$str = preg_replace('/[\n\r\t]/', ' ', $str);
	return $str;
}

function count_pages($pdfname) {
  $pdftext = file_get_contents($pdfname);
  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
  return $num;
}

function citacaoNomeABNT($autor){
	$sobrenomesArray =array('primeiro','segundo','terceiro', 'quarto', 'quinto',
							'primeira','segunda','terceira', 'quarta', 'quinta',
							'i', 'ii' , 'iii', 'iv', 'v', 
							'neto','filho','sobrinho', 
							'neta','filha','sobrinha', 
							'junior', 'júnior', 'jr', 'j.r', 'j.r.');
	$preposicaoArray =array('e','de','da','do', 'das', 'dos');
	
	$codificacao=codificacao($autor);
	$autor=mb_strtolower($autor,$codificacao);

	//echo "<br />Autor: ". $autor;
	
	$nome=normalizaEspacos($autor);
	$array_nome = explode(" ", $nome);
	$tamanho=count($array_nome);
	
	/*
	echo "<br />Nome: ". $nome;
	echo "<br /> array: " . $array_nome[$tamanho-1];
	echo "<br /> Sem acentos array: " . RemoveAcentos($array_nome[$tamanho-1],$codificacao) . "<br />"; */
	
	if (in_array(RemoveAcentos($array_nome[$tamanho-1],$codificacao), $sobrenomesArray)){
		$sobrenomeComposto=true;
		$sobrenome=mb_strtoupper($array_nome[$tamanho-2], $codificacao) . " ". mb_strtoupper($array_nome[$tamanho-1], $codificacao) ;
	}else{
		$sobrenomeComposto=false;
		$sobrenome=mb_strtoupper($array_nome[$tamanho-1], $codificacao);
	}
	
	$nome="";
	foreach ($array_nome as $key => $value){
		if(!in_array($value,$preposicaoArray)){
			$value=ucfirst($value);
		}
		if ($sobrenomeComposto==true){
			if ($key<$tamanho-2){
				$nome.=" ".$value;
			}
		}else{
			if ($key<$tamanho-1){
				$nome.=" ".$value;
			}
		}
	}

	$citacao=$sobrenome.", ".$nome;
	$citacao=htmlspecialchars(normalizaEspacos($citacao), ENT_QUOTES);
	//echo " Citacao: ". $citacao. "<br />";
	return $citacao;
}

function montaCitacaoDocumento($pfNomeAutor,$ttTitulo,$tsDataDefesa_ano, $pageCount,$grauTipo,
								$prArea,$inNome,$tsCidadeLocalDefesa,$tsDataFinalizacao_ano){
	$citacao="";

	if (!(($pageCount==0) or ($pfNomeAutor=="") or ($prArea=="") or ($inNome=="") 
		or ($tsDataDefesa_ano=="") or ($tsDataDefesa_ano=="0000") or ($tsDataFinalizacao_ano=="") or ($tsDataFinalizacao_ano=="0000") or ($tsCidadeLocalDefesa==""))){
		if($grauTipo=="Tese"){
			$grau="Doutorado em ";
		}else{
			$grau="Mestrado em ";	
		}
		$citacao=citacaoNomeABNT($pfNomeAutor).". ".trim(htmlspecialchars($ttTitulo, ENT_QUOTES)).". ".
			$tsDataDefesa_ano .". ". $pageCount." f. ". utf8_decode($grauTipo) ." (". $grau . trim($prArea). ") - " .
			trim($inNome) .", ".trim($tsCidadeLocalDefesa).", ". trim($tsDataFinalizacao_ano).".";
	}
	
	return $citacao;
}

function montaClausuraINProgramas($programas){
	if (in_array("Todos", $programas)) { 
		$clasuraIN="  ";
	}else{
		$clasuraIN=" AND TSPF.prCod IN(";
	   
		for ($i=0; $i<count($programas); $i++){
			$clasuraIN=$clasuraIN.$programas[$i].",";
		}
		$clasuraIN = substr($clasuraIN,0,-1).") ";
		return $clasuraIN;
	}
}

function montaClausuraGrau($grau){
	if ($grau=="Todos"){ 
		$clasura="  ";
	}elseif($grau=="M"){
		$clasura=" AND (Teses.tsGrau='Mestre' or Teses.tsGrau='Master') ";
	}elseif($grau=="D"){
		$clasura=" AND (Teses.tsGrau='Doutor' or Teses.tsGrau='Doctor') ";
	}else{
		$clasura="  ";
	}
	
	return $clasura;
}

function normalizaGrau($grau){
	$grau=trim($grau);
	if ($grau=="Mestre" or $grau=="Master"){ 
		$grauSigla="M";
	}elseif($grau=="Doutor" or $grau=="Doctor"){ 
		$grauSigla="D";
	}else{
		$grauSigla="";
	}
	return $grauSigla;
}
function grauPorExtensoCaminho($grauSigla){
	if ($grauSigla=="M"){ 
		$grauExtenso="/Mestrado";
	}elseif($grauSigla=="D"){ 
		$grauExtenso="/Doutorado";
	}else{
		$grauExtenso="";
	}
	return $grauExtenso;
}

/*
* Monta a arvore completa da área de Conhecimento de arcordo com a tabela cnpq e Tematres.
* 
*/

function arvoreAreaConhecimentoCNPQ($nomeArea){
	//global $base_fim, $conexao_fim;
	require "../conexao/conexao.inc"; 
	mysql_select_db($base, $conexao);
	$SEL_AreaCNPQ_RESULT=mysql_query("SELECT acCod, acNome FROM AreaConhecimento WHERE acNome='".$nomeArea."'");
	$SEL_AreaCNPQ_RES=mysql_fetch_array($SEL_AreaCNPQ_RESULT);
	
	if($SEL_AreaCNPQ_RES!="") {
		$acCod=$SEL_AreaCNPQ_RES["acCod"];
		$acNome=$SEL_AreaCNPQ_RES["acNome"];

		$codPai = substr(utf8_encode($acCod), 0, 5)."00";

		$SEL_CodPai_RES=mysql_fetch_array(mysql_query("SELECT acCod, acNome FROM AreaConhecimento WHERE acCod LIKE '".$codPai."%'"));
		if($SEL_CodPai_RES!="") {
			$acNomePai=$SEL_CodPai_RES["acNome"];
		}
		
		$codAvo = substr(utf8_encode($acCod), 0, 3)."0000";
		
		$SEL_CodAvo_RES=mysql_fetch_array(mysql_query("SELECT acCod, acNome FROM AreaConhecimento WHERE acCod LIKE '".$codAvo."%'"));
		if($SEL_CodAvo_RES!="") {
			$acNomeAvo=$SEL_CodAvo_RES["acNome"];
		}
		
		$codBisavo = substr(utf8_encode($acCod), 0, 1)."000000";
		
		$SEL_CodBisavo_RES=mysql_fetch_array(mysql_query("SELECT acCod, acNome FROM AreaConhecimento WHERE acCod LIKE '".$codBisavo."%'"));
		if($SEL_CodBisavo_RES!="") {
			$acNomeBisavo=$SEL_CodBisavo_RES["acNome"];
		}
			
		if (($acNomeBisavo==$acNomeAvo) and ($acNomeAvo==$acNomePai) and ($acNomePai==$acNome)){
			$arvore=$acNome;
		}elseif(($acNomeBisavo!=$acNomeAvo) and ($acNomeAvo==$acNomePai) and ($acNomePai==$acNome)){
			$arvore=$acNomeBisavo. "::". $acNomeAvo;
		}elseif(($acNomeBisavo!=$acNomeAvo) and ($acNomeAvo!=$acNomePai) and ($acNomePai==$acNome)){
			$arvore=$acNomeBisavo. "::". $acNomeAvo ."::". $acNomePai;
		}elseif(($acNomeBisavo!=$acNomeAvo) and ($acNomeAvo!=$acNomePai) and ($acNomePai!=$acNome)){
			$arvore=$acNomeBisavo ."::". $acNomeAvo ."::". $acNomePai ."::". $acNome;
		}
	}
	mysql_free_result($SEL_AreaCNPQ_RESULT);
	
	return $arvore;
		
}

$arrayFormats=array("PDF"=>"application/pdf","DOC"=>"application/msword","DOT"=>"application/msword","ZIP"=>"application/zip","JPG"=>"image/jpeg");
$arrayIdiomas=array("pt"=>"por","en"=>"eng","fr"=>"fra","es"=>"spa","al"=>"deu", "de"=>"deu", "it"=>"ita","jp"=>"jpn","nl"=>"nld",""=>"eng");

if(!session_is_registered("VAdmin_cnCod")) {
	header("Location: ../index.php");
}else{
	//Local onde os arquivos serão salvos
	$diretorio="/dspace-base/exports/";
	require "../conexao/conexao_fim.inc";
	mysql_select_db($base_fim, $conexao_fim);	
	
	
	/*
	//set character_set_results = 'utf8';
	set character_set_client = 'utf8';
	//  set character_set_connection = 'utf8';
		set character_set_database = 'utf8';
		set character_set_server = 'utf8';

	$result = mysql_query('SET character_set_client = utf8') or die('Query failed: ' . mysql_error());
		$result = mysql_query('SET character_set_results = utf8') or die('Query failed: ' . mysql_error());
		$result = mysql_query('SET character_set_connection = utf8') or die('Query failed: ' . mysql_error());
	*/
	$programas=$_GET["programa"];
	$grauForm=$_GET["grau"];
	$organizar=$_GET["organizar"]; 
	
	$clausuraINProgramas=montaClausuraINProgramas($programas);
	$clausuraGrau=montaClausuraGrau($grauForm);
	$SEL_ts="SELECT DISTINCT Teses.*, Programa.prNome FROM Teses "
			."INNER JOIN TSPF ON Teses.tsIdentificador = TSPF.tsIdentificador "
			."INNER JOIN Programa ON Programa.prCod = TSPF.prCod "
			."WHERE TSPF.prCod is not null "
			."AND TSPF.tspfTipo = 'Autor' "
			. $clausuraINProgramas 
			. $clausuraGrau 
			."ORDER BY Teses.tsIdentificador ";
	$SEL_ts_query=mysql_db_query($base_fim,$SEL_ts,$conexao_fim)  or die('Query failed: ' . mysql_error());
	$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);
	$id="";
	$datatime=date("Y-m-d H:i:s");

	$datatimed=str_replace(":","",$datatime);
	$datatimed=str_replace(" ","",$datatimed);
	$datatimed=str_replace("-","",$datatimed);
	mkdir ($diretorio.$datatimed,0775);
	$diretorio=$diretorio.$datatimed."/";
	$verifica_permissao_diretorio=is_writeable($diretorio);
	mkdir($diretorio."exportados", 0775);

	if ($verifica_permissao_diretorio!="1") {		
		header("Location: exportar.php?e=finalizado&erro=1");
	exit;
	}
	
	while ($SEL_ts_RES!="") {
		$grauSigla="";
		$tsIdioma="";
		$grauExtensoCaminho="";
		$qtd_erro_metadado_a="";
		$qtd_erro_arquivo_a="";
		$qtd_erro_a="";
		$erro_metadados="";
		$erro_arquivos="";
		
		$id=$id+1;
		
		$tsIdentificador=$SEL_ts_RES["tsIdentificador"];
		$programaNome=normalizaNomeDiretorio($SEL_ts_RES["prNome"]);
		$tsGrau=$SEL_ts_RES["tsGrau"];
		$grauSigla=normalizaGrau($tsGrau);
		$grauExtensoCaminho=grauPorExtensoCaminho($grauSigla);
		
		if ($organizar=="PG"){

			if(!is_dir($diretorio."exportados/".$programaNome)){
				mkdir($diretorio."exportados/".$programaNome, 0775);
			}
			
			if(!is_dir($diretorio."exportados/".$programaNome.$grauExtensoCaminho)){
				mkdir($diretorio."exportados/".$programaNome.$grauExtensoCaminho, 0775);
			}
		
			if(!is_dir($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador)){
				mkdir($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador, 0775);
			}
	
		}else{
			if(!is_dir($diretorio."exportados/".$tsIdentificador)){
				mkdir($diretorio."exportados/".$tsIdentificador, 0775);
			}
		}

		if(!is_dir($diretorio."_arquivos_nao_encontrados")){
			mkdir($diretorio."_arquivos_nao_encontrados", 0775);
		}
		if(!is_dir($diretorio."_caracter_invalido")){
			mkdir($diretorio."_caracter_invalido", 0775);
		}
		

		if ($tsIdentificador=="") {
			$erro_metadados=$erro_metadados."tsIdentificador: vazio;";
		}
		$tsNumeroChamada=$SEL_ts_RES["tsNumeroChamada"];
		$tsIdioma=$SEL_ts_RES["tsIdioma"];
		if ($tsIdioma=="") {
			$erro_metadados=$erro_metadados."tsIdioma: vazio;";
		}

		$language="<dcvalue element=\"language\" language=\"".$arrayIdiomas[$tsIdioma]."\">".$arrayIdiomas[$tsIdioma]."</dcvalue>";
		
		if ($tsGrau=="") {
			$erro_metadados=$erro_metadados."tsGrau: vazio;";
		}
		$tsTitulacao=$SEL_ts_RES["tsTitulacao"];
		if ($tsTitulacao=="") {
			$erro_metadados=$erro_metadados."tsTitulacao: vazio;";
		}
		//$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
		//Pegar a Data de Atualização(DateStamp)
		//$unix = gmmktime();
		//$tsDataAtualizacao = date("Y-m-d\TH:i:s\Z", $unix);
		$tsDataAtualizacao=$SEL_ts_RES["tsDataAtualizacao"];
		if ($tsDataAtualizacao=="") {
			$erro_metadados=$erro_metadados."tsDataAtualizacao: vazio;";
		}
		$acessioned="<dcvalue element=\"date\" qualifier=\"accessioned\">".$tsDataAtualizacao."</dcvalue>";
		
		$tsCidadeLocalDefesa=$SEL_ts_RES["tsCidadeLocalDefesa"];
		if ($tsCidadeLocalDefesa=="") {
			$erro_metadados=$erro_metadados."tsCidadeLocalDefesa: vazio;";
		}
		$tsUFLocalDefesa=$SEL_ts_RES["tsUFLocalDefesa"];
		if ($tsUFLocalDefesa=="") {
			$erro_metadados=$erro_metadados."tsUFLocalDefesa: vazio;";
		}
		$tsPaisLocalDefesa=$SEL_ts_RES["tsPaisLocalDefesa"];
		$tsDataDefesa=$SEL_ts_RES["tsDataDefesa"];
		if ($tsDataDefesa=="") {
			$erro_metadados=$erro_metadados."tsDataDefesa: vazio;";
		}
		$issued="<dcvalue element=\"date\" qualifier=\"issued\">".$tsDataDefesa."</dcvalue>";
		$tsDataDefesa_split=split("-",$tsDataDefesa);
		$tsDataDefesa_ano=$tsDataDefesa_split[0];
		//$available_ano="<dcvalue element=\"date\" qualifier=\"available\">".$tsDataDefesa_ano."</dcvalue>";
		$tsDataFinalizacao=$SEL_ts_RES["tsDataFinalizacao"];
		if ($tsDataFinalizacao=="") {
			$erro_metadados=$erro_metadados."tsDataFinalizacao: vazio;";
		}
		
		if (($tsDataFinalizacao_ano=="") or ($tsDataFinalizacao_ano="0000")){
			$tsDataFinalizacao=$tsDataAtualizacao;
			$tsDataFinalizacao_split=split("-",$tsDataFinalizacao);
			$tsDataFinalizacao_ano=$tsDataFinalizacao_split[0];	
		}else{
			$tsDataFinalizacao_split=split("-",$tsDataFinalizacao);
			$tsDataFinalizacao_ano=$tsDataFinalizacao_split[0];	
		}
		
		
		$available="<dcvalue element=\"date\" qualifier=\"available\">".$tsDataFinalizacao."</dcvalue>";
		$tsDataLiberacaoPos=$SEL_ts_RES["tsDataLiberacaoPos"];
		$cnCodPos=$SEL_ts_RES["cnCodPos"];
		$tsDataRevisao=$SEL_ts_RES["tsDataRevisao"];
		$cnCodRevisor=$SEL_ts_RES["cnCodRevisor"];
		$tsDataCatalogacao=$SEL_ts_RES["tsDataCatalogacao"];
		$cnCodCatalogador=$SEL_ts_RES["cnCodCatalogador"];
		$inCod=$SEL_ts_RES["inCod"];
		$tsDataDiretorio=$SEL_ts_RES["tsDataAtualizacao"];
		$inCod=$SEL_ts_RES["inCod"];
		
		$SEL_in="SELECT * FROM Instituicao WHERE inCod=$inCod";
		$SEL_in_query=mysql_db_query($base_fim,$SEL_in,$conexao_fim);
		$SEL_in_RES=mysql_fetch_array($SEL_in_query);
		
		$inNome=trim($SEL_in_RES["inNome"]);
		$inSigla=trim($SEL_in_RES["inSigla"]);
		$inPais=trim($SEL_in_RES["inPais"]);

		if ($inNome=="") {
			$erro_metadados=$erro_metadados."inNome: vazio;";
		}
		if ($inSigla=="") {
			$erro_metadados=$erro_metadados."inSigla: vazio;";
		}
		if ($inPais=="") {
			$erro_metadados=$erro_metadados."inPais: vazio;";
		}
		
		$publisher_initials="<dcvalue element=\"publisher\" qualifier=\"initials\" language=\"por\">".htmlspecialchars($inSigla, ENT_QUOTES)."</dcvalue>";	
		$publisher="<dcvalue element=\"publisher\" language=\"por\">".htmlspecialchars($inNome, ENT_QUOTES)."</dcvalue>";
		$publisher_country="<dcvalue element=\"publisher\" qualifier=\"country\" language=\"por\">".htmlspecialchars($inPais, ENT_QUOTES)."</dcvalue>";

		// inclusão dos Dados Iniciais da tese na tabela Teses


		// Seleciona todos os registros da Tabela TSPF relacionado a esta Tese e armazena no banco TEDE
		$SEL_tspf="SELECT * FROM TSPF WHERE tsIdentificador=$tsIdentificador ORDER by tspfTipo";
		$SEL_tspf_query=mysql_db_query($base_fim,$SEL_tspf,$conexao_fim);
		$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query);
		
		$prCod=$SEL_tspf_RES["prCod"];
		
		$SEL_pr="SELECT prNome, prArea FROM Programa WHERE prCod=$prCod";
		$SEL_pr_query=mysql_db_query($base_fim,$SEL_pr,$conexao_fim);
		$SEL_pr_RES=mysql_fetch_array($SEL_pr_query);
		
		$prNome=trim($SEL_pr_RES["prNome"]);
		$prArea=trim($SEL_pr_RES["prArea"]);
		if ($prNome=="") {
			$erro_metadados=$erro_metadados."prNome: vazio;";
		}

		$program="<dcvalue element=\"publisher\" qualifier=\"program\" language=\"por\">".htmlspecialchars($prNome, ENT_QUOTES)."</dcvalue>";
		$department="<dcvalue element=\"publisher\" qualifier=\"department\" language=\"por\">".htmlspecialchars($prArea, ENT_QUOTES)."</dcvalue>";
		
		$advisor="";
		$advisorID="";
		$advisorLattes="";
		$advisorco="";
		$advisorcoID="";
		$advisorcoLattes="";
		
		$author="";
		$referees="";
		$refereesID="";
		$refereesLattes="";

		$idAdvisorco=0;
		$idReferees=0;
		
		$pfNomeAutor="";
		$pageCount=0;
		while ($SEL_tspf_RES!="") {
			$pfNome="";
			$pfCPF="";
			$pfLattes="";
			$pfEmail="";
			$pfCitacaoABNT="";
			$pfCitacao="";
			
			$pfCod=$SEL_tspf_RES["pfCod"];
			$tspfTipo=$SEL_tspf_RES["tspfTipo"];
			$tspfDispEmail=$SEL_tspf_RES["tspfDispEmail"];

			$SEL_pf="SELECT * FROM PessoaFisica WHERE pfCod=$pfCod";
			$SEL_pf_query=mysql_db_query($base_fim,$SEL_pf,$conexao_fim);
			$SEL_pf_RES=mysql_fetch_array($SEL_pf_query);
		
			$pfNome=$SEL_pf_RES["pfNome"];
			
			//echo "NOME: " . $pfNome ." - ";
			//echo "CITACAO: " . citacaoNomeABNT($pfNome) ." <br /> ";
			
			$pfCPF=normalizaCPF($SEL_pf_RES["pfCPF"]);
			$pfLattes=normalizaLattes($SEL_pf_RES["pfLattes"]);
			$pfEmail=$SEL_pf_RES["pfEmail"];

			$pfCitacaoABNT=$SEL_pf_RES["pfCitacaoABNT"];
			$pfCitacao=$SEL_pf_RES["pfCitacao"];
			if (($tspfTipo=="Orientador") or ($tspfTipo=="Director") or ($tspfTipo=="Advisor")) {
				if ($pfNome=="") {
					$erro_metadados=$erro_metadados."pfNome_ORIENTADOR: vazio;";
				}
				/*
				if ($pfCPF=="") {
					$erro_metadados=$erro_metadados."pfCPF_Orientador: vazio;";
				}
				if ($pfLattes=="") {
					$erro_metadados=$erro_metadados."pfLattes Autor : vazio;";
				}
				*/
				
				if (!empty($pfNome)){
					$advisor=$advisor."\n<dcvalue element=\"contributor\" qualifier=\"advisor\">".citacaoNomeABNT($pfNome)."</dcvalue>";
				}elseif(!empty($pfCitacao)){
					$advisor=$advisor."\n<dcvalue element=\"contributor\" qualifier=\"advisor\">".htmlspecialchars($pfCitacao, ENT_QUOTES)."</dcvalue>";
				}elseif(!empty($pfCitacaoABNT)){
					$advisor=$advisor."\n<dcvalue element=\"contributor\" qualifier=\"advisor\">".htmlspecialchars($pfCitacaoABNT, ENT_QUOTES)."</dcvalue>";
				}else{
					$advisor=$advisor."\n<dcvalue element=\"contributor\" qualifier=\"advisor\">".htmlspecialchars($pfNome, ENT_QUOTES)."</dcvalue>";
				}	
				
				if(!empty($pfCPF)){
					$advisorID=$advisorID."\n<dcvalue element=\"contributor\" qualifier=\"advisorID\" language=\"por\">".$pfCPF."</dcvalue>";
				}
				if(!empty($pfLattes)){
					$advisorLattes=$advisorLattes."\n<dcvalue element=\"contributor\" qualifier=\"advisorLattes\" language=\"por\">".$pfLattes."</dcvalue>";
				}
				
			}
			if (($tspfTipo=="Co-Orientador") or ($tspfTipo=="Co-director") or ($tspfTipo=="Co-advisor")) {
				$idAdvisorco++;
				
				if ($idAdvisorco<=2){
					
					if ($pfNome=="") {
						$erro_metadados=$erro_metadados."pfNome_CO-Orientador: vazio;";
					}
					/*
					if ($pfCPF=="") {
						$erro_metadados=$erro_metadados."pfCPF_Co-Orientador: vazio;";
					}
					if ($pfLattes=="") {
						$erro_metadados=$erro_metadados."pfLattes Co-Orientador : vazio;";
					}
					*/
		
					if (!empty($pfNome)){
						$advisorco=$advisorco."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."\">".citacaoNomeABNT($pfNome)."</dcvalue>";
					}elseif (!empty($pfCitacao)){
						$advisorco=$advisorco."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."\">".htmlspecialchars($pfCitacao, ENT_QUOTES)."</dcvalue>";
					}elseif(!empty($pfCitacaoABNT)){
						$advisorco=$advisorco."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."\">".htmlspecialchars($pfCitacaoABNT, ENT_QUOTES)."</dcvalue>";
					}else{
						$advisorco=$advisorco."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."\">".htmlspecialchars($pfNome, ENT_QUOTES)."</dcvalue>";
					}
					
					if(!empty($pfCPF)){
						$advisorcoID=$advisorcoID."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."ID\" language=\"por\">".$pfCPF."</dcvalue>";
					}
					
					if(!empty($pfLattes)){
						$advisorcoLattes=$advisorcoLattes."\n<dcvalue element=\"contributor\" qualifier=\"advisor-co".$idAdvisorco."Lattes\" language=\"por\">".$pfLattes."</dcvalue>";
					}
				}
				
			}
			if ($tspfTipo=="Autor") {
				$pfNomeAutor=$pfNome;
				if ($pfNome=="") {
					$erro_metadados=$erro_metadados."pfNome_AUTOR: vazio;";
				}
				/*
				if ($pfCPF=="") {
					$erro_metadados=$erro_metadados."pfCPF_AUTOR: vazio;";
				}
				if ($pfLattes=="") {
					$erro_metadados=$erro_metadados."pfLattes : vazio;";
				}
				*/
				
				if(!empty($pfNome)){
					$author="<dcvalue element=\"contributor\" qualifier=\"author\">".citacaoNomeABNT($pfNome)."</dcvalue>";
				}elseif (!empty($pfCitacao)){
					$author="<dcvalue element=\"contributor\" qualifier=\"author\">".htmlspecialchars($pfCitacao, ENT_QUOTES)."</dcvalue>";
				}elseif(!empty($pfCitacaoABNT)){
					$author="<dcvalue element=\"contributor\" qualifier=\"author\">".htmlspecialchars($pfCitacaoABNT, ENT_QUOTES)."</dcvalue>";
				}else{
					$author="<dcvalue element=\"contributor\" qualifier=\"author\">".htmlspecialchars($pfNome, ENT_QUOTES)."</dcvalue>";
				}
				
				if(!empty($pfCPF)){
					$contributorauthorID="<dcvalue element=\"contributor\" qualifier=\"authorID\" language=\"por\">".$pfCPF."</dcvalue>";
				}
				
				if(!empty($pfLattes)){
					$contributorauthorLattes="<dcvalue element=\"contributor\" qualifier=\"authorLattes\" language=\"por\">".$pfLattes."</dcvalue>";
				}

				//$citation="<dcvalue element=\"identifier\" qualifier=\"citation\">".$pfCitacaoABNT."</dcvalue>";
		
				$SEL_pfpj="SELECT * FROM PFPJ WHERE pfCod=$pfCod and pfpjTipo=\"AgenciaFomento\"";
				$SEL_pfpj_query=mysql_db_query($base_fim,$SEL_pfpj,$conexao_fim);
				$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);
		
				while ($SEL_pfpj_RES!="") {
					$afiliacao_agfomento=$SEL_pfpj_RES["pjCod"];
			
					$SEL_pj="SELECT * FROM PessoaJuridica WHERE pjCod=$afiliacao_agfomento";
					$SEL_pj_query=mysql_db_query($base_fim,$SEL_pj,$conexao_fim);
					$SEL_pj_RES=mysql_fetch_array($SEL_pj_query);
		
					$pjNome=$SEL_pj_RES["pjNome"];
					$description_sponsorship="<dcvalue element=\"description\" qualifier=\"sponsorship\">".htmlspecialchars($pjNome, ENT_QUOTES)."</dcvalue>";
					$SEL_pfpj_RES=mysql_fetch_array($SEL_pfpj_query);
				}
		
			}
			if (($tspfTipo=="Membro da Banca") or ($tspfTipo=='Miembro de la mesa') or ($tspfTipo=='Chair Member')) {
				$idReferees++;
				
				if ($idReferees<=5){	
				
					if ($pfNome==""){
						$erro_metadados=$erro_metadados."pfNome_MEMBRO_DA_BANCA: vazio;";
					}
					/*
					if ($pfCPF=="") {
						$erro_metadados=$erro_metadados."pfCPF_MEMBRO_DA_BANCA: vazio;";
					}
					if ($pfLattes=="") {
						$erro_metadados=$erro_metadados."pfLattes_MEMBRO_DA_BANCA : vazio;";
					}
					*/

					if (!empty($pfNome)){
						$referees=$referees."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."\">".citacaoNomeABNT($pfNome)."</dcvalue>";
					}elseif(!empty($pfCitacao)){
						$referees=$referees."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."\">".htmlspecialchars($pfCitacao, ENT_QUOTES)."</dcvalue>";
					}elseif(!empty($pfCitacaoABNT)){
						$referees=$referees."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."\">".htmlspecialchars($pfCitacaoABNT, ENT_QUOTES)."</dcvalue>";
					}else{
						$referees=$referees."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."\">".htmlspecialchars($pfNome, ENT_QUOTES)."</dcvalue>";
					}
					
					if(!empty($pfCPF)){
						$refereesID=$refereesID."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."ID\" language=\"por\">".$pfCPF."</dcvalue>";
					}
				
					if(!empty($pfLattes)){
						$refereesLattes=$refereesLattes."\n<dcvalue element=\"contributor\" qualifier=\"referees".$idReferees."Lattes\" language=\"por\">".$pfLattes."</dcvalue>";
					}
					
				}

			}
			//var_dump($tspfTipo);
			$SEL_tspf_RES=mysql_fetch_array($SEL_tspf_query); 
		}
		
		// Inserir o prCod do Autor na tabela TSPF do banco TEDE
		$inclusao_tspf_pr="prCod='$prCod'";

		//Selecionar os Títulos dessa Tese
		$SEL_tt="SELECT ttTitulo,ttIdioma  FROM Titulo WHERE tsIdentificador=$tsIdentificador ORDER BY ttCod";
		$SEL_tt_query=mysql_db_query($base_fim,$SEL_tt,$conexao_fim);
		$num_rows=0;
		$num_rows = mysql_num_rows($SEL_tt_query);
		
		$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);
		$title="";
		$titleAlternative="";
		if ($SEL_tt_RES=="") {
			$erro_metadados=$erro_metadados."ttTitulo: vazio;";
		}
		
	
		/*
		$jaTemPt=false;
		foreach ($SEL_tt_RES as $key => $value){
			if  ($key=="ttIdioma" and $value=="pt"){
				$jaTemPt=true;
			}
		}
		*/
		while ($SEL_tt_RES!="") {
			$ttTitulo=trim($SEL_tt_RES["ttTitulo"]);
			$ttIdioma=strtolower($SEL_tt_RES["ttIdioma"]);
			if ($ttTitulo=="") {
					$erro_metadados=$erro_metadados."ttTitulo_".$ttIdioma.": vazio;";
			}
			//echo "QTD de TITULOS: ".$num_rows;
			//echo "<br />jaTemPt: ".$jaTemPt;
			if ($num_rows>=2){
				//Para funcionar o tsIdioma e o ttIdioma não podem ser nulos
				if($tsIdioma==$ttIdioma){
					$title=$title."<dcvalue element=\"title\" language=\"".$arrayIdiomas[$ttIdioma]."\">".htmlspecialchars($ttTitulo, ENT_QUOTES)."</dcvalue>";
				}else{
					$titleAlternative=$titleAlternative."<dcvalue element=\"title\" qualifier=\"alternative\" language=\"".$arrayIdiomas[$ttIdioma]."\">".htmlspecialchars($ttTitulo, ENT_QUOTES)."</dcvalue>";
				}
			}else{
				$title="<dcvalue element=\"title\" language=\"".$arrayIdiomas[$ttIdioma]."\">".htmlspecialchars($ttTitulo, ENT_QUOTES)."</dcvalue>";
			}
		
			$SEL_tt_RES=mysql_fetch_array($SEL_tt_query);
		}
				
		//Selecionar as Coberturas dessa Tese
		$SEL_cb="SELECT * FROM Cobertura WHERE tsIdentificador=$tsIdentificador ORDER BY cbCod";
		$SEL_cb_query=mysql_db_query($base_fim,$SEL_cb,$conexao_fim);
		$SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
		
		while ($SEL_cb_RES!="") {
			$cbCod=$SEL_cb_RES["cbCod"];
			$cbCobertura=$SEL_cb_RES["cbCobertura"];
			$cbIdioma=$SEL_cb_RES["cbIdioma"];

			$SEL_cb_RES=mysql_fetch_array($SEL_cb_query);
		}
		
		//Selecionar os Assuntos dessa Tese
		$SEL_as="SELECT * FROM Assunto WHERE tsIdentificador=$tsIdentificador ORDER BY asCod";
		$SEL_as_query=mysql_db_query($base_fim,$SEL_as,$conexao_fim);
		$SEL_as_RES=mysql_fetch_array($SEL_as_query);
		$subject="";
		$subjectCnpq="";
		while ($SEL_as_RES!="") {
			$asCod=$SEL_as_RES["asCod"];
			$asAssunto=trim($SEL_as_RES["asAssunto"]);
			$asEsquema=$SEL_as_RES["asEsquema"];
			$asIdioma=$SEL_as_RES["asIdioma"];
			
			if($asEsquema=="Tabela CNPQ"){
				$subjectCnpq=$subjectCnpq."<dcvalue element=\"subject\" qualifier=\"cnpq\" language=\"".$arrayIdiomas[$asIdioma]."\">".arvoreAreaConhecimentoCNPQ($asAssunto)."</dcvalue>";
			
			}else{
				$subject=$subject."\n<dcvalue element=\"subject\" language=\"".$arrayIdiomas[$asIdioma]."\">".htmlspecialchars($asAssunto, ENT_QUOTES)."</dcvalue>";
			}
		// inclusão dos Assuntos da tese na tabela Assunto no banco TEDE

			
			$SEL_as_RES=mysql_fetch_array($SEL_as_query);
		}
		$num_rows=0;
		//Selecionar os resumos dessa Tese
		$SEL_rs="SELECT * FROM Resumo WHERE tsIdentificador=$tsIdentificador ORDER BY rsCod";
		$SEL_rs_query=mysql_query($SEL_rs);
		
		$num_rows = mysql_num_rows($SEL_rs_query);
		$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);
		$abstract="";
		$resumo="";
		if ($SEL_rs_RES=="") {
			$erro_metadados=$erro_metadados."rsResumo: vazio;";
		}
		
		/*
		$jaTemPt=false;
		foreach ($SEL_rs_RES as $key => $value){
			if  ($key=="rsIdioma" and $value=="pt"){
				$jaTemPt=true;
			}
		}
		*/
		while ($SEL_rs_RES!="") {
			$rsResumo=$SEL_rs_RES["rsResumo"];
			$rsIdioma=strtolower($SEL_rs_RES["rsIdioma"]);
			if ($rsResumo=="") {
				$erro_metadados=$erro_metadados."rsResumo_".$rsIdioma.": vazio;";
			}
			
			if ($num_rows>=2){
				//Para funcionar o tsIdioma e o ttIdioma não podem ser nulos
				if($tsIdioma==$rsIdioma){
					$resumo=$resumo."<dcvalue element=\"description\" qualifier=\"resumo\" language=\"".$arrayIdiomas[$rsIdioma]."\">".htmlspecialchars($rsResumo, ENT_QUOTES)."</dcvalue>";
				}else{
					$abstract=$abstract."<dcvalue element=\"description\" qualifier=\"abstract\" language=\"".$arrayIdiomas[$rsIdioma]."\">".htmlspecialchars($rsResumo, ENT_QUOTES)."</dcvalue>";
				}
			}else{
				$resumo=$resumo."<dcvalue element=\"description\" qualifier=\"resumo\" language=\"".$arrayIdiomas[$rsIdioma]."\">".htmlspecialchars($rsResumo, ENT_QUOTES)."</dcvalue>";
			}
			
			$SEL_rs_RES=mysql_fetch_array($SEL_rs_query);
		}
		
		//Selecionar os direito dessa Tese
		$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador=$tsIdentificador";
		$SEL_dr_query=mysql_db_query($base_fim,$SEL_dr,$conexao_fim);
		$SEL_dr_RES=mysql_fetch_array($SEL_dr_query);
		
		$drDireito=$SEL_dr_RES["drDireito"];
		$drIdioma=$SEL_dr_RES["drIdioma"];
		//$rigths="<dcvalue element=\"rights\"   language=\"".$drIdioma."\">".htmlspecialchars($drDireito, ENT_QUOTES)."</dcvalue>";
	// inclusão dos Direitos dos arquivos da tese na tabela de Direitos
		if ($drDireito=="") {
			$erro_metadados=$erro_metadados."drDireito: vazio;";
		}
	/*########################
		//Selecionar os Arquivos dessa Tese
		$SEL_ar="SELECT * FROM Arquivos WHERE tsIdentificador=$tsIdentificador ORDER BY arCod";
		$SEL_ar_query=mysql_db_query($base_fim,$SEL_ar,$conexao_fim);
		$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
		
		if ($SEL_ar_RES=="") {
			$erro_metadados=$erro_metadados."arURL: vazio;";
		}
		
		while ($SEL_ar_RES!="") {
		$arCod=$SEL_ar_RES["arCod"];
		$arURL=$SEL_ar_RES["arURL"];
		$arURL=str_replace(":", "_", $arURL);
		$arFormato=$SEL_ar_RES["arFormato"];
		$arDireitos=$SEL_ar_RES["arDireitos"];
		
		
		
		$SEL_la="SELECT * FROM LegendaArquivo WHERE arCod=$arCod";
		$SEL_la_query=mysql_db_query($base_fim,$SEL_la,$conexao_fim);
		$SEL_la_RES=mysql_fetch_array($SEL_la_query);
		
		$arCod=$SEL_la_RES["arCod"];
		$laLegenda=$SEL_la_RES["laLegenda"];
		$laIdioma=$SEL_la_RES["laIdioma"];
		
	// inclusão dos Arquivos da tese no Banco TEDE
	// inclusão da Legenda do Arquivo da tese no Banco TEDE


		$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
		}
	*/			
		//Selecionar os Tipos dessa Tese
		$SEL_tp="SELECT * FROM Tipo WHERE tsIdentificador=$tsIdentificador ORDER BY tpCod";
		$SEL_tp_query=mysql_db_query($base_fim,$SEL_tp,$conexao_fim);
		$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
		$type="";
		$grauTipo="";
		while ($SEL_tp_RES!="") {
			$tpCod=$SEL_tp_RES["tpCod"];
			$tpTipo=$SEL_tp_RES["tpTipo"];
			
			if ($tsGrau=="Doutor" or $tsGrau=="Doctor") {
				$grauTipo="Tese";
				$type="<dcvalue element=\"type\" language=\"por\">". utf8_decode($grauTipo)."</dcvalue>";
			}elseif($tsGrau=="Mestre" or $tsGrau=="Master"){
				$grauTipo="Dissertação";
				$type="<dcvalue element=\"type\" language=\"por\">". utf8_decode($grauTipo)."</dcvalue>";
			}
			// inclusão dos Tipos da tese no Banco TEDE
			
			$SEL_tp_RES=mysql_fetch_array($SEL_tp_query);
		}
		
		//Importação dos arquivos da TDE
		
		$SEL_ar="SELECT * FROM Arquivos WHERE tsIdentificador=$tsIdentificador";
		$SEL_ar_query=mysql_db_query($base_fim,$SEL_ar,$conexao_fim);
		$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);
		$contents="";
		$numero_arquivo="";
		$tempDireito=array();
		//$arrayDireitos=array("Publico"=>"openAccess","Restrito"=>"restrictedAccess","Retido"=>"embargoedAccess");
	
		$i=0;
		$arFormato="";
		$contArqNaoExiste=0;
		while ($SEL_ar_RES!="") {
			$i=$i++;
			//clearstatcOache();
			$arDireitos=$SEL_ar_RES["arDireitos"];
			if($arDireitos=="Restrito"){
				$tempDireito[$i]="R";
			}elseif($arDireitos=="Retido"){
				$tempDireito[$i]="E";
			}else{
				$tempDireito[$i]="O";
			}
			
			$arFormato=$SEL_ar_RES["arFormato"];
			if(array_key_exists($arFormato,$arrayFormats)){
				$format="<dcvalue element=\"format\" language=\"por\">".$arrayFormats[$arFormato]."</dcvalue>";
			}else{
				$format="<dcvalue element=\"format\" language=\"por\">".$arFormato."</dcvalue>";
			}
			
			$arquivoorigem="";
			$arquivo_nome="";
			$arquivoorigem=$SEL_ar_RES["arURL"];
			
			$arquivoorigem=str_replace(":", "_", $arquivoorigem);

			$numero_arquivo=$numero_arquivo+1;
			//Verifica se diretório existe e se é permitido a escrita no mesmo
			
			
			if ($organizar=="PG"){

				$verifica_permissao_pasta_destino=is_writeable($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador);
							
				if ($verifica_permissao_pasta_destino!="1") {
					$erro_arquivos=$erro_arquivos."erro: ".$diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador." ->Não foi encontrado a pasta de destino ou não tem permissão de escrita;";
				}
			}else{
				$verifica_permissao_pasta_destino=is_writeable($diretorio."exportados/".$tsIdentificador);
				if ($verifica_permissao_pasta_destino!="1") {
					$erro_arquivos=$erro_arquivos."erro: ".$diretorio."exportados/".$tsIdentificador." ->Não foi encontrado a pasta de destino ou não tem permissão de escrita;";
				}
			}
			
			$arquivo_nome = substr(strrchr($arquivoorigem, "/"), 1);
		
			if ($organizar=="PG"){
				$arquivodestino=$diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/".$arquivo_nome;
			}else{
				$arquivodestino=$diretorio."exportados/".$tsIdentificador."/".$arquivo_nome;
			}
		
			$arquivo_existe=file_exists($arquivoorigem);
			
			//echo $tsIdentificador." -> ".$arquivoorigem." -> ".$arquivo_existe."<br>";
			
			if (($arquivo_existe!="1") or ($contArqNaoExiste>0)) {
				$erro_arquivos=$erro_arquivos."erro: ".$arquivoorigem." ->Não foi encontrado o arquivo;";
				$contArqNaoExiste++;
				
				if ($organizar=="PG"){
					if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome)){
						mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome, 0775);
					}
					
					if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho)){
						mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho, 0775);
					}
					if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador)){
						mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador, 0775);
					}
					
				}else{
					if(!is_dir($diretorio."_arquivos_nao_encontrados/".$tsIdentificador)){
						mkdir($diretorio."_arquivos_nao_encontrados/".$tsIdentificador, 0775);
					}
				}
				
				if ($contents=="") {
					$contents=$arquivo_nome."	bundle:ORIGINAL	license".$numero_arquivo.".txt	bundle:LICENSE";
				} else {
					$contents=$contents."".$arquivo_nome."	bundle:ORIGINAL	license.".$numero_arquivo.".txt	bundle:LICENSE";
				}
			}else{
				$tamanho_arquivo_origem=filesize($arquivoorigem);
				
				if (!copy($arquivoorigem,$arquivodestino)) {
					echo "<br /> Falha ao copiar arquivivo ORIGEM:  ". $arquivoorigem." DESTINO". $arquivodestino."...\n";

				}
				
				$tamanho_arquivo_destino=filesize($arquivodestino);
				
				//echo "<br />TAMANHO ARQ. ORIGEM: ".$tamanho_arquivo_origem." DESTINO: ". $tamanho_arquivo_destino."<br />";
				if ($tamanho_arquivo_origem!=$tamanho_arquivo_destino) {
					$erro_arquivos=$erro_arquivos."erro: ".$arquivoorigem." ->Verificar integridade do arquivo;";
				}
				if ($contents=="") {
					$contents=$arquivo_nome."	bundle:ORIGINAL	license".$numero_arquivo.".txt	bundle:LICENSE";
				} else {
					$contents=$contents."".$arquivo_nome."	bundle:ORIGINAL	license.".$numero_arquivo.".txt	bundle:LICENSE";
				}
				if (strtoupper($arFormato)=="PDF"){
					$pageCount= $pageCount+count_pages($arquivodestino);
				}
			}
			$SEL_ar_RES=mysql_fetch_array($SEL_ar_query);

		}
		if(in_array("R",$tempDireito)){
			$rigths="<dcvalue element=\"rights\" language=\"por\">Acesso Restrito</dcvalue>";
		}elseif(in_array("E",$tempDireito)){
			$rigths="<dcvalue element=\"rights\" language=\"por\">Acesso Embargado</dcvalue>";
		}else{
			$rigths="<dcvalue element=\"rights\" language=\"por\">Acesso Aberto</dcvalue>";
		}

		$citacaoDocumento=montaCitacaoDocumento($pfNomeAutor,$ttTitulo, $tsDataDefesa_ano, $pageCount, $grauTipo, $prArea ,$inNome, $tsCidadeLocalDefesa, $tsDataFinalizacao_ano);
		if ($citacaoDocumento!=""){
			$identifierCitation="<dcvalue element=\"identifier\" qualifier=\"citation\" language=\"por\">".$citacaoDocumento."</dcvalue>";
		}
		
		$arquivoxml="<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"no\"?>
		<dublin_core schema=\"dc\">\n".$author."
		".$contributorauthorID."
		".$contributorauthorLattes."
		".$advisor."
		".$advisorID."
		".$advisorLattes."
		".$advisorco."
		".$advisorcoID."
		".$advisorcoLattes."
		".$referees."
		".$refereesID."
		".$refereesLattes."
		".$acessioned."
		".$available."
		".$issued."
		".$identifierCitation. "
		".$resumo."
		".$abstract."
		".$sponsorship."
		".$publisher."
		".$publisher_country."
		".$publisher_initials."
		".$department."
		".$program."
		".$type."
		".$title."
		".$titleAlternative."
		".$language."
		".$rigths."
		".$subject."
		".$subjectCnpq."
		".$format."
		</dublin_core>";

		$arquivoxmlutf8 = utf8_encode($arquivoxml);

		//está OK
		
		if ($organizar=="PG"){
			$fp1=fopen($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/contents",a);
			$escreve1=fwrite($fp1,$contents); 
			fclose($fp1);
			
			$fp2=fopen($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/dublin_core.xml",a);
			$escreve2=fwrite($fp2,$arquivoxmlutf8); 
			fclose($fp2);
			
		}else{
			$fp1=fopen($diretorio."exportados/".$tsIdentificador."/contents",a);
			$escreve1=fwrite($fp1,$contents); 
			fclose($fp1);
			
			$fp2=fopen($diretorio."exportados/".$tsIdentificador."/dublin_core.xml",a);
			$escreve2=fwrite($fp2,$arquivoxmlutf8); 
			fclose($fp2);
		}
		
		
		
		
		//Arquivos não encontrados e Caracteres Inválido
		if(($contArqNaoExiste!=0) and (is_utf8($arquivoxmlutf8)==false)){
			
			if ($organizar=="PG"){
				if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome)){
					mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome, 0775);
				}
				if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho)){
					mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho, 0775);
				}
				rename($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/", $diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/"); 
				
			}else{
				rename($diretorio."exportados/".$tsIdentificador."/", $diretorio."_arquivos_nao_encontrados/".$tsIdentificador."/");
			
			}
		}elseif($contArqNaoExiste!=0){
			//Arquivos não encontrados
			if ($organizar=="PG"){
				if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome)){
					mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome, 0775);
				}
				if(!is_dir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho)){
					mkdir($diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho, 0775);
				}
				rename($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/", $diretorio."_arquivos_nao_encontrados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/"); 
				
			}else{
				rename($diretorio."exportados/".$tsIdentificador."/", $diretorio."_arquivos_nao_encontrados/".$tsIdentificador."/");
			
			}
		}elseif(is_utf8($arquivoxmlutf8)==false){
			//Problema de Caracteres
			if ($organizar=="PG"){
				if(!is_dir($diretorio."_caracter_invalido/".$programaNome)){
						mkdir($diretorio."_caracter_invalido/".$programaNome, 0775);
				}
				if(!is_dir($diretorio."_caracter_invalido/".$programaNome.$grauExtensoCaminho)){
					mkdir($diretorio."_caracter_invalido/".$programaNome.$grauExtensoCaminho, 0775);
				}
				rename($diretorio."exportados/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/", $diretorio."_caracter_invalido/".$programaNome.$grauExtensoCaminho."/".$tsIdentificador."/"); 

			}else{
				rename($diretorio."exportados/".$tsIdentificador."/", $diretorio."_caracter_invalido/".$tsIdentificador."/");
			
			}
		}
			

		
		
		//fputs($diretorio."exportados/".$programaNome."/".$tsIdentificador."contents",$contents);
		//flush();
		//fputs($diretorio."exportados/".$programaNome."/".$tsIdentificador."dublin_core.xml",$arquivoxml);
		//flush();
		
		// inclusão de conta na tabela Contas
		$campos_le="le_data,tsIdentificador,le_metadados,le_arquivos";
		$inclusao_le="'$datatime','$tsIdentificador','$erro_metadados','$erro_arquivos'";

		$total_le="insert into log_export ($campos_le) values ($inclusao_le)";
		$inconteudo_le=mysql_db_query($base_fim, $total_le, $conexao_fim);
			
		$qtd_erro_metadado_a=substr_count($erro_metadados,";");
		$qtd_erro_arquivo_a=substr_count($erro_arquivos,";");
		$qtd_erro_a=$qtd_erro_metadado+$qtd_erro_arquivo;

		$qtd_erro_metadado=$qtd_erro_metadado+$qtd_erro_metadado_a;
		$qtd_erro_arquivo=$qtd_erro_arquivo+$qtd_erro_arquivo_a;
		$qtd_erro=$qtd_erro+$qtd_erro_a;
					
		$SEL_ts_RES=mysql_fetch_array($SEL_ts_query);

	}
	
//	exit;
	header("Location: exportar.php?e=finalizado&qtd=$id&qtd2=$qtd_erro&qtd3=$qtd_erro_metadado&qtd4=$qtd_erro_arquivo");
	exit;
}
?>