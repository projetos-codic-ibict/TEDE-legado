<?

//Funcao para gerar lista dos ultimos trabalhos
//qtd - Quantidade de trabalhos a serem listados
function gera_ult_trabalhos($qtd)
{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
 //Ultimos Trabalhos
 
 //Conexao para ultimos trabalhos
 require('../conexao/conexao_fim.inc');

 //Inicia a Tabela

 //Variaveis de contagem
 $i=1;

 //Faz a aquisicao de dados
 //Query de pesquisa
$SEL_exc="SELECT * FROM OAIControle";
$SEL_exc_query=mysql_db_query($base_fim,$SEL_exc,$conexao_fim);
$SEL_exc_RES=mysql_fetch_array($SEL_exc_query);
while ($SEL_exc_RES!="") {
$tsIdentificadorExc=$SEL_exc_RES['tsIdentificador'];
if ($tsNaoConsultar=="") {
$tsNaoConsultar="and (ts.tsIdentificador!=".$tsIdentificadorExc;
$tsNaoConsultarC=")";
}else{
$tsNaoConsultar=$tsNaoConsultar." and ts.tsIdentificador!=".$tsIdentificadorExc;
}
$SEL_exc_RES=mysql_fetch_array($SEL_exc_query);
}
 $query = "select ts.tsIdentificador, pf.pfNome from Teses ts, PessoaFisica pf, TSPF tspf where (tspf.tsIdentificador = ts.tsIdentificador) and (pf.pfCod = tspf.pfCod) and (tspf.tspfTipo regexp 'autor') $tsNaoConsultar$tsNaoConsultarC ORDER BY ts.tsDataFinalizacao DESC LIMIT 0, $qtd";

 //Executa a pesquisa
 $result = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (ultimos trabalhos): " . mysql_error());


 //Preenche array com resultado
 $listaUltRegistros = array();
 while ($elemResult = mysql_fetch_array($result))
 {
  //Adquire id
  $idUltTese = $elemResult["tsIdentificador"];
  //Adquire nome do autor
  $autorUltTese = $elemResult["pfNome"];
  //Query para pesquisa do titulo
  $queryTitulo = "select ttTitulo from Titulo where (tsIdentificador = $idUltTese) ORDER BY ttCod LIMIT 0,1";
  //Pesquisa do titulo
  $resultTitulo = mysql_db_query($base_fim,$queryTitulo,$conexao_fim) or die("Query failed (UltTrab-Titulo): " . mysql_error());
  $elemResultTitulo = mysql_fetch_array($resultTitulo);
  $tituloUltTese = $elemResultTitulo["ttTitulo"];

  //Gera o link para o trabalho
  array_push($listaUltRegistros, "$i: <a href=\"processaPesquisa.php?pesqExecutada=1&id=$idUltTese\" class=\"linkpreto\"><strong>$tituloUltTese</strong> - $autorUltTese</a>");
  $i++;
 }
 //Se a pesquisa foi bem sucedida libera os resultados
 if ($i>1)
 {
  $linTabela = $i-1;
  $colTabela = 1;
  $cfgTabela = "width=\"100%\" align=\"center\" class=\"loginTable\"";
  $cfgCelulas = array(array("bgcolor=\"#EAEAEA\""),array("bgcolor=\"#FFFFFF\""));
  $col1 = $listaUltRegistros;
  $dadosTabela = array($col1);
  $tabelaRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  mysql_free_result($result);
  mysql_free_result($resultTitulo);
 }
 else
 {
  //Sem resultados
  $linTabela = 1;
  $colTabela = 1;
  $col1 = array($txNenhumRegistroE);
  $cfgTabela = "width=\"100%\" align=\"center\" class=\"loginTable\"";
  $cfgCelulas = array(array("bgcolor=\"#EAEAEA\""));
  $dadosTabela = array($col1);
  $tabelaRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);
 }
 
 //Tabela com titulo
 $linTabela = 2;
 $colTabela = 1;
 $col1 = array($txUltimasTDEs,$tabelaRegistros);
 $cfgTabela = "width=\"100%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"tituloBusca\"";
 $cfgCelulas = array(array("align=\"left\" class=\"titulo\""),array("align=\"center\""));
 $dadosTabela = array($col1);
 $tabelaUltRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

 return $tabelaUltRegistros; //Retorna a tabela com os trabalhos
}

//Funcao para gerar lista dos futuros trabalhos
//qtd - Quantidade de trabalhos a serem listados
function gera_fut_trabalhos($qtd)
{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
 //Trabalhos futuros

 //Conexao para trabalhos futuros
 require('../conexao/conexao.inc');

 //Inicia a Tabela

 //Variaveis de contagem
 $i=1;

 //Faz a aquisicao de dados
 //Query de pesquisa
 $query = "select ts.tsIdentificador, pf.pfNome from Teses ts, PessoaFisica pf, TSPF tspf where (tspf.tsIdentificador = ts.tsIdentificador) and (pf.pfCod = tspf.pfCod) and (tspf.tspfTipo regexp 'autor' and tspf.tspfDisponivel<>'9' and tspf.tspfDisponivel<>'8' and tspf.tsIdentificador<>'0') ORDER BY ts.tsIdentificador DESC LIMIT 0, $qtd";
 //Executa a pesquisa
 $result = mysql_db_query($base,$query,$conexao) or die("Query failed (futuros trabalhos): " . mysql_error());

 //Preenche array com resultado
 $listaFutRegistros = array();
 while ($elemResult = mysql_fetch_array($result))
 {
  //Adquire id
  $idFutTese = $elemResult["tsIdentificador"];
  //Adquire nome do autor
  $autorFutTese = $elemResult["pfNome"];
  //Query para pesquisa do titulo
  $queryTitulo = "select ttTitulo from Titulo where (tsIdentificador = $idFutTese) ORDER BY ttCod LIMIT 0,1";
  //Pesquisa do titulo
  $resultTitulo = mysql_db_query($base,$queryTitulo,$conexao) or die("Query failed (FutTrab-Titulo): " . mysql_error());
  $elemResultTitulo = mysql_fetch_array($resultTitulo);
  $tituloFutTese = $elemResultTitulo["ttTitulo"];

  //Gera o link para o trabalho
  array_push($listaFutRegistros, "$i: $tituloFutTese</strong> - $autorFutTese</a>");
  $i++;
 }
 //Se a pesquisa foi bem sucedida libera os resultados
 if ($i>1)
 {
  $linTabela = $i-1;
  $colTabela = 1;
  $cfgTabela = "width=\"100%\" align=\"center\" class=\"loginTable\"";
  $cfgCelulas = array(array("bgcolor=\"#EAEAEA\""),array("bgcolor=\"#FFFFFF\""));
  $col1 = $listaFutRegistros;
  $dadosTabela = array($col1);
  $tabelaRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  mysql_free_result($result);
  mysql_free_result($resultTitulo);
 }
 else
 {
  //Sem resultados
  $linTabela = 1;
  $colTabela = 1;
  $col1 = array($txNenhumRegistroE);
  $cfgTabela = "width=\"100%\" align=\"center\" class=\"loginTable\"";
  $cfgCelulas = array(array("bgcolor=\"#EAEAEA\""));
  $dadosTabela = array($col1);
  $tabelaRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);
 }

 //Tabela com titulo
 $linTabela = 2;
 $colTabela = 1;
 $col1 = array($txFuturasTDEs,$tabelaRegistros);
 $cfgTabela = "width=\"100%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"tituloBusca\"";
 $cfgCelulas = array(array("align=\"left\" class=\"titulo\""),array("align=\"center\""));
 $dadosTabela = array($col1);
 $tabelaFutRegistros = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

 return $tabelaFutRegistros; //Retorna a tabela com os trabalhos
}
?>
