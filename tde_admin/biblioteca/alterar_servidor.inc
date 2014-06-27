<? 
require "../bibliotecas/servidor.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/servidor.bib","w");

if ($servidorDiretorio!="") {
fputs($fp,$abre.'? $servidor_diretorio="'.$servidorDiretorio.'"; $servidor_email="'.$servidor_email.'";?'.$fecha);
} else {
fputs($fp,$abre.'? $servidor_diretorio="'.$servidor_diretorio.'"; $servidor_email="'.$servidorEmail.'";?'.$fecha);
}

fclose($fp);

if ($servidorDiretorio!="") {
header("Location:alterar_servidor_diretorio.php?sucesso=$s001");
exit; 
} else {
header("Location:alterar_servidor_email.php?sucesso=$s001");
exit; 
}
?>
