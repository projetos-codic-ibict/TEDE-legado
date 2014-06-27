<? 
require "../bibliotecas/ip.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/ip.bib","w");
fputs($fp,$abre.'? $ipPermitido="'.$ipPermitidoA.'";?'.$fecha);
fclose($fp);

header("Location:alterar_ip_restrito.php?sucesso=$s001");
exit; 

?>
