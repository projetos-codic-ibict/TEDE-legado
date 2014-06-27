<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>AJUDA SISTEMA TEDE</p>
<p> 
<?php
// Tratamento para versões velhas do PHP.
if (!isset($_SERVER['HTTP_REFERER'])) $pagina_referencia = $HTTP_REFERER; else $pagina_referencia = $_SERVER['HTTP_REFERER'];
require "../bibliotecas/ajuda.bib";
?>
</p>
</body>
</html>
