<? 
require "../bibliotecas/diretorio_layout.inc";

require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$diretorio_antigo=$diretorio_layout;

$fecha=">";

$diretorio_layout_novo="<? \$diretorio_layout=\"../tde_layout".$n_layout."/\"; \$diretorio_layout_index=\"tde_layout".$n_layout."/\"; ?";

$fp=fopen("../bibliotecas/diretorio_layout.inc","w");

fputs($fp,"$diretorio_layout_novo$fecha");
fclose($fp); 
/*
require "../bibliotecas/diretorio_layout.inc";

$arquivo=file($diretorio_layout."scripts/menu.js");
$qtd=count($arquivo);
$texto="";
for ($i=0; $i<$qtd; $i++) {
$texto=$texto.$arquivo[$i];
}
$d_antigo_split=split("/",$diretorio_antigo);
$d_antigo=$d_antigo_split[1]."/";
$d_atual_split=split("/",$diretorio_layout);
$d_atual=$d_atual_split[1]."/";
$texto_replace=str_replace($d_antigo,$d_atual,$texto);

$fp=fopen($diretorio_layout."scripts/menu.js","w");
fputs($fp,"$texto_replace");
fclose($fp); 
$i=0;
*/
header("Location:alterar_layout.php?sucesso=$s001");
exit; 
?>
