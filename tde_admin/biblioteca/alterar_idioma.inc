<? 
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/idioma_sistema.bib","w");


fputs($fp,$abre.'? $idioma_sistema="'.$idioma.'";?'.$fecha);

fclose($fp);

header("Location:alterar_idioma.php?sucesso=$s001");
exit; 

?>
