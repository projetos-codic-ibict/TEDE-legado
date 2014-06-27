<?
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM Assunto WHERE asCod='$asCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$sg001;
if ($tabelaCNPQ=="Sim") {
header("Location: editar_areaCNPQ_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod");
exit;
} else {
header("Location: visualizar_assunto_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod");
exit;
}
}

if ($cod=="Inserir") {
if ($asEsquema=="") {
$asEsquema="Palavra-chave";
}
if ($tabelaCNPQ=="Sim") {
// inclusão de Assunto(tabela cnpq) da tese

if ($asAssunto1!="") {

if ($asAssunto1=="NENHUMA ABAIXO") {
if ($AreaCNPQ==1) {
$asAssunto1="Exatas e da Terra";
}
if ($AreaCNPQ==2) {
$asAssunto1="Ciências Biológicas";
}
if ($AreaCNPQ==3) {
$asAssunto1="Engenharias";
}
if ($AreaCNPQ==4) {
$asAssunto1="Ciências da Saúde";
}
if ($AreaCNPQ==5) {
$asAssunto1="Ciências Agrárias";
}
if ($AreaCNPQ==6) {
$asAssunto1="Ciências Sociais Aplicadas";
}
if ($AreaCNPQ==7) {
$asAssunto1="Ciências Humanas";
}
if ($AreaCNPQ==8) {
$asAssunto1="Lingüística, Letras e Artes";
}
if ($AreaCNPQ==9) {
$asAssunto1="Outros";
}                       
}

$total="DELETE FROM Assunto WHERE tsIdentificador='$tsIdentificador' and asEsquema='Tabela CNPQ'";
$exclusao=mysql_db_query($base, $total, $conexao);

$campos_as="tsIdentificador,asAssunto,asEsquema,asIdioma";
$inclusao_as="'$tsIdentificador','$asAssunto1','Tabela CNPQ','pt'";
$total_as="INSERT INTO Assunto ($campos_as) values ($inclusao_as)";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);

}
} else {
// inclusão do Assunto na tabela Assunto
$campos_as="tsIdentificador,asAssunto,asIdioma,asEsquema";
$inclusao_as="'$tsIdentificador','$asAssunto','$asIdioma','$asEsquema'";
$total_as="insert into Assunto ($campos_as) values ($inclusao_as)";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);

//Seleciona o asCod para marcação da insersão na tela de visualização
$sel="select * from Assunto where tsIdentificador=$tsIdentificador and asAssunto='$asAssunto' and asIdioma='$asIdioma' and asEsquema='$asEsquema'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);
$asCod=$selRESP['asCod'];
}
//Direciona para a tela de inserção com a mensagem de sucesso
$sucesso=$sg001;
if ($tabelaCNPQ=="Sim") {
header("Location: editar_areaCNPQ_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&areaCNPQV=$AreaCNPQ&subArea=$asAssunto1");
exit;
} else {
header("Location: visualizar_assunto_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&EVasCod=$asCod");
exit;
}
}

if ($cod=="Editar") {
if ($asEsquema=="") {
$asEsquema="Palavra-chave";
}
if ($tabelaCNPQ=="Sim") {
// inclusão de Assunto(tabela cnpq) da tese

if ($asAssunto1!="") {

if ($asAssunto1=="NENHUMA ABAIXO") {
if ($AreaCNPQ==1) {
$asAssunto1="Exatas e da Terra";
}
if ($AreaCNPQ==2) {
$asAssunto1="Ciências Biológicas";
}
if ($AreaCNPQ==3) {
$asAssunto1="Engenharias";
}
if ($AreaCNPQ==4) {
$asAssunto1="Ciências da Saúde";
}
if ($AreaCNPQ==5) {
$asAssunto1="Ciências Agrárias";
}
if ($AreaCNPQ==6) {
$asAssunto1="Ciências Sociais Aplicadas";
}
if ($AreaCNPQ==7) {
$asAssunto1="Ciências Humanas";
}
if ($AreaCNPQ==8) {
$asAssunto1="Lingüística, Letras e Artes";
}
if ($AreaCNPQ==9) {
$asAssunto1="Outros";
}                       
}
$inclusao_as="asAssunto='$asAssunto1',asEsquema='Tabela CNPQ',asIdioma='pt'";
$total_as="UPDATE Assunto SET $inclusao_as WHERE tsIdentificador=$tsIdentificador and asEsquema='Tabela CNPQ'";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);
} } else {
// inclusão do relacionamento da tabela TSPF

$inclusao_as="asAssunto='$asAssunto',asEsquema='$asEsquema',asIdioma='$asIdioma'";
$total_as="UPDATE Assunto SET $inclusao_as WHERE asCod=$asCod";
$inconteudo_as=mysql_db_query($base, $total_as, $conexao);
}
//Direciona para a tela de inserção com a mensagem de sucesso
$sucesso=$sg001;
if ($tabelaCNPQ=="Sim") {
header("Location: editar_areaCNPQ_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&areaCNPQV=$AreaCNPQ&subArea=$asAssunto1");
exit;
} else {
header("Location: visualizar_assunto_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&EVasCod=$asCod");
exit;
}
}
?>