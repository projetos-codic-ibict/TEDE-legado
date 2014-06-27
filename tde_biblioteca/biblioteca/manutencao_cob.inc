<?
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";

if ($cod=="Excluir") {

$total="DELETE FROM Cobertura WHERE cbCod='$cbCod'";
$exclusao=mysql_db_query($base, $total, $conexao);

$sucesso=$sg001;

header("Location: visualizar_cobertura_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod");
exit;
}

if ($cod=="Inserir") {

// inclusуo da cobertura na tabela Corbetura
$campos_cb="tsIdentificador,cbCobertura,cbIdioma";
$inclusao_cb="'$tsIdentificador','$cbCobertura','$cbIdioma'";
$total_cb="insert into Cobertura ($campos_cb) values ($inclusao_cb)";
$inconteudo_cb=mysql_db_query($base, $total_cb, $conexao);

//Seleciona o cbCod para marcaчуo da insersуo na tela de visualizaчуo
$sel="select * from Cobertura where tsIdentificador=$tsIdentificador and cbCobertura='$cbCobertura' and cbIdioma='$cbIdioma'";
$sel_query=mysql_db_query($base,$sel,$conexao);
$selRESP=mysql_fetch_array($sel_query);
$cbCod=$selRESP['cbCod'];

//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_cobertura_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&EVcbCod=$cbCod");
exit;

}

if ($cod=="Editar") {

// inclusуo do relacionamento da tabela TSPF
$inclusao_cb="cbCobertura='$cbCobertura',cbIdioma='$cbIdioma'";
$total_cb="UPDATE Cobertura  SET $inclusao_cb WHERE cbCod=$cbCod";

$inconteudo_cb=mysql_db_query($base, $total_cb, $conexao);


//Direciona para a tela de inserчуo com a mensagem de sucesso
$sucesso=$sg001;
header("Location: visualizar_cobertura_tde.php?tsIdentificador=$tsIdentificador&sucesso=$sucesso&pfCod=$pfCod&EVcbCod=$cbCod");
exit;

}
?>