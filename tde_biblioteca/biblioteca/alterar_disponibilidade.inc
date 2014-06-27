<? 
if ($VtsIdentificador=="") {
$VtsIdentificador=$tsIdentificador;
}
//Abre a conexao com o Banco TEDE utilizando o arquivo encontrado no caminho especificado

require "../conexao/conexao.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

if ($Alterar=="") {

// Visualiza a Disponibilidade da tese na tabela de Direitos

$SEL_dr="SELECT * FROM Direitos WHERE tsIdentificador=$VtsIdentificador";
$SEL_dr_query=mysql_db_query($base,$SEL_dr,$conexao);
$SEL_dr_RES=mysql_fetch_array($SEL_dr_query);

//Armazena a Disponibilidade da Tese na variável drDireito	

$drDireito=$SEL_dr_RES["drDireito"];


} else {
if ($drDireito!="") {
if ($cod=="Inserir"){

// inclusão dos Direitos dos arquivos da tese na tabela de Direitos
$campos_dr="tsIdentificador,drDireito,drIdioma";
$inclusao_dr="'$VtsIdentificador','$drDireito','pt'";
$total_dr="insert into Direitos ($campos_dr) values ($inclusao_dr)";
$inconteudo_dr=mysql_db_query($base, $total_dr, $conexao);

} else {
// Alterar os Direitos dos arquivos da tese na tabela de Direitos

$inclusao_dr="drDireito='$drDireito'";
$total_dr="UPDATE Direitos SET $inclusao_dr WHERE tsIdentificador=$VtsIdentificador";

$inconteudo_dr=mysql_db_query($base, $total_dr, $conexao);
}
$sucesso=$sg001;
}
} 
?>