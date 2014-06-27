<? 
require "../bibliotecas/bloqueio_arquivo.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/bloqueio_arquivo.bib","w");

fputs($fp,$abre.'? $arBloqueioNecessario="'.$arBloqueioNecessarioA.'"; ?'.$fecha);

fclose($fp);

header("Location:alterar_bloqueio_arquivo.php?sucesso=$s001");
exit; 
?>
