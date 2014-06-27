<?
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";
require "../bibliotecas/logos.bib";
require "../bibliotecas/diretorio_layout.inc";

if ($trocar!="") {
if ($arquivo!="none" and $arquivo!="") {
$ArquivoDir=$diretorio_layout."imagens/";
$arquivo_split=split("\.",$arquivo_name);
$arquivo_ext=$arquivo_split[1];
$arquivo_ext=strtoupper($arquivo_ext);
if ($arquivo_ext=="JPG") {

	if (copy($arquivo,"$ArquivoDir".$arquivo_name)){
	
	$arquivo_nome_novo=$ArquivoDir."logo_inst.jpg";
    
    $arquivo_velho=$ArquivoDir.$arquivo_name;

    rename ($arquivo_velho, $arquivo_nome_novo);
	
	
	$i=0;
	}else{
	$erro=$e013;
	}

	  } else {
	  $erro=$e014;
	  }
}
$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/logos.bib","w");

if ($Alink!="") {
$link=$Alink;
}
if ($Atexto!="") {
$texto=$Atexto;
}
fputs($fp,$abre.'? $link="'.$link.'"; $link2="'.$link2.'"; $link3="'.$link3.'"; $texto="'.$texto.'"; $texto2="'.$texto2.'"; $texto3="'.$texto3.'";?'.$fecha);

fclose($fp);

$v=1;
}

if ($trocar2!="") {
if ($arquivo2!="none" and $arquivo2!="") {
$ArquivoDir=$diretorio_layout."imagens/";
$arquivo_split=split("\.",$arquivo2_name);
$arquivo_ext=$arquivo_split[1];
$arquivo_ext=strtoupper($arquivo_ext);
if ($arquivo_ext=="GIF") {

	if (copy($arquivo2,"$ArquivoDir".$arquivo2_name)){
	
	$arquivo_nome_novo=$ArquivoDir."logo_tede1.gif";
    
    $arquivo_velho=$ArquivoDir.$arquivo2_name;

    rename ($arquivo_velho, $arquivo_nome_novo);
	
	
	$i=0;
	}else{
	$erro=$e013;
	}

	  } else {
	  $erro=$e015;
	  }
}
$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/logos.bib","w");

if ($Alink2!="") {
$link2=$Alink2;
}
if ($Atexto2!="") {
$texto2=$Atexto2;
}
fputs($fp,$abre.'? $link="'.$link.'"; $link2="'.$link2.'"; $link3="'.$link3.'"; $texto="'.$texto.'"; $texto2="'.$texto2.'"; $texto3="'.$texto3.'";?'.$fecha);

fclose($fp);

$v=1;
}

if ($trocar3!="") {
if ($arquivo3!="none" and $arquivo3!="") {

$ArquivoDir=$diretorio_layout."imagens/";
$arquivo_split=split("\.",$arquivo3_name);
$arquivo_ext=$arquivo_split[1];
$arquivo_ext=strtoupper($arquivo_ext);
if ($arquivo_ext=="GIF") {

	if (copy($arquivo3,"$ArquivoDir".$arquivo3_name)){
	
	$arquivo_nome_novo=$ArquivoDir."logo_tede2.gif";
    
    $arquivo_velho=$ArquivoDir.$arquivo3_name;

    rename ($arquivo_velho, $arquivo_nome_novo);
	
	
	$i=0;
	}else{
	$erro=$e013;
	}

	  } else {
	  $erro=$e015;
	  }
}
$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/logos.bib","w");

if ($Alink3!="") {
$link3=$Alink3;
}
if ($Atexto3!="") {
$texto3=$Atexto3;
}
fputs($fp,$abre.'? $link="'.$link.'"; $link2="'.$link2.'"; $link3="'.$link3.'"; $texto="'.$texto.'"; $texto2="'.$texto2.'"; $texto3="'.$texto3.'";?'.$fecha);

fclose($fp);

$v=1;
}

if ($erro=="") {
$sucesso=$sg001;
}
?>