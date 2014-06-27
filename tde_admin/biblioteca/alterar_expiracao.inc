<? 
require "../bibliotecas/validade.bib";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$expiracao=str_pad($expiracao, 2, "0", STR_PAD_LEFT);

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/validade.bib","w");


fputs($fp,$abre.'? $validade="'.$expiracao.'";?'.$fecha);


fclose($fp);

header("Location:alterar_expiracao.php?sucesso=$s001");
exit; 

?>
