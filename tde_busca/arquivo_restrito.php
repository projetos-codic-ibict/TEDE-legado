<html>
<head>
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_busca.css" rel="stylesheet" type="text/css">
<body>
<p>&nbsp;</p>
<table width="75%" border="0" align="center" class="loginTable">
  <tr> 
    <td width="28%" rowspan="2"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" width="139" height="60"></td>
    <td height="57" colspan="2" align="center" class="txtBold"><? echo $txArquivoConteudoBlock; ?></td>
  </tr>
  <tr> 
    <td width="53%" align="center" class="txtBold">&nbsp;</td>
    <td width="19%" align="center" class="botao"><span class="linkpreto"><a href="javascript:this.window.close();">FECHAR 
      &raquo; </a></span></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
