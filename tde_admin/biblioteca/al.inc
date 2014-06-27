<? 
//Insere o Link do Lattes do sistema
if ($cod=="linkLattes") {
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/linkLattes.bib","w");

fputs($fp,$abre.'? $linkLattes="'.$linkLattes.'";?'.$fecha);

fclose($fp);

header("Location:visualizar_al.php?sucesso=$sg001");
exit; 
}
// Insere dados de customização de CNPJ e CPF
if ($cod=="cpf_cnpj") {
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/cpf_cnpj.bib","w");

fputs($fp,$abre.'? $qtdCPF="'.$qtdCPF.'"; $qtdCNPJ="'.$qtdCNPJ.'"; $CPFMascara="'.$CPFMascara.'"; $CNPJMascara="'.$CNPJMascara.'"; ?'.$fecha);

fclose($fp);

header("Location:visualizar_al.php?sucesso=$sg001");
exit; 
}

// Insere dados de customização de CNPJ e CPF
if ($cod=="campoExtra") {
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

$abre="<";
$fecha=">";

$fp=fopen("../bibliotecas/campoExtra.bib","w");

fputs($fp,$abre.'? $VtsCampo1="'.$tsCampo1.'"; $VtsCampo2="'.$tsCampo2.'"; $c1_qtdLinhas="'.$c1_qtdLinhas.'"; $c2_qtdLinhas="'.$c2_qtdLinhas.'"; $c1_pos="'.$c1_pos.'"; $c1_pos_tipo="'.$c1_pos_tipo.'"; $c2_pos="'.$c2_pos.'"; $c2_pos_tipo="'.$c2_pos_tipo.'"; $c1_bib="'.$c1_bib.'"; $c1_bib_tipo="'.$c1_bib_tipo.'"; $c2_bib="'.$c2_bib.'"; $c2_bib_tipo="'.$c2_bib_tipo.'"; $c1_aut="'.$c1_aut.'"; $c1_aut_tipo="'.$c1_aut_tipo.'"; $c2_aut="'.$c2_aut.'"; $c2_aut_tipo="'.$c2_aut_tipo.'"; ?'.$fecha);

fclose($fp);

header("Location:visualizar_al.php?sucesso=$sg001");
exit; 
}
?>
