<?
// Este arquivo tem por finalidade inserir uma nova Instituição no Banco TDE na tabela Instituicao
// Após inserir, ele automaticamente redirecionará para o arquivo instituicao.php
// Caso ocorra algum erro ele informará a frase da linha 14, senão, a informação será o da linha 25 
require "../conexao/conexao_fim.inc";
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/mensagens_".$idioma_sistema.".txt";
require "../tde_i18n/tde_admin/mensagens_".$idioma_sistema.".txt";

if ($cod=="Inserir") {

//Selecionar instituição para evitar duplicação
$SEL_inCod="SELECT inCod FROM Instituicao";
$SEL_inCod_query=mysql_db_query($base_fim,$SEL_inCod,$conexao_fim);
$SEL_inCod_RES=mysql_fetch_array($SEL_inCod_query);

if ($SEL_inCod_RES!="") {
$erro=$e005;
header("Location=inserir_inst.php?erro=$erro");

} else {
/*
//Retirar todos os caracteres que nao sejam 0-9
   $s="";
   for ($x=1; $x<=strlen($inCNPJ); $x=$x+1)
   {
    $ch=substr($inCNPJ,$x-1,1);
    if (ord($ch)>=48 && ord($ch)<=57)
    {
      $s=$s.$ch;
    }
   }
   
$inCNPJ=$s;
*/
// inclusão da instituição do sistema na tabela Instituicao
$campos_in="inNome,inSigla,inPais,inUF,inCNPJ,inURL";
$inclusao_in="'$inNome','$inSigla','$inPais','$inUF','$inCNPJ','$inURL'";
$total_in="insert into Instituicao ($campos_in) values ($inclusao_in)";
$inconteudo_in=mysql_db_query($base_fim, $total_in, $conexao_fim);

$sucesso=$sg001;
header("Location: visualizar_inst.php?sucesso=$sucesso");
exit;
}
}

if ($cod=="Editar") {

//Retirar todos os caracteres que nao sejam 0-9

//Edita a Biblioteca Depositária
$inclusao_in="inNome='$inNome',inSigla='$inSigla',inPais='$inPais',inUF='$inUF',inCNPJ='$inCNPJ',inURL='$inURL'";
$total_in="UPDATE Instituicao SET $inclusao_in";
$inconteudo_in=mysql_db_query($base_fim, $total_in, $conexao_fim);

$sucesso=$sg001;
header("Location: visualizar_inst.php?sucesso=$sucesso");
exit;

}

?>