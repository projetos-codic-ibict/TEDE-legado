<?
//Funcao para gerar tabela em HTML em forma de string
//lin - Quantidade de linhas
//col - Quantidade de colunas
//cfgTabela - Configuracao de toda a tabela
//cfgCelula - Array com configuracao de cada celula da tabela <TD>
//dados - Array dos dados, organizado em arrays de colunas
function gera_tabela($lin, $col, $cfgTabela, $cfgCelula, $dados)
{
 $qtdColunas = sizeof($dados);     //Quantidade de colunas passados nos dados
 $qtdLinCfg = sizeof($cfgCelula);  //Quantidade de linhas de configuracao

 //Inicia construcao tabela
 $saida = "<table $cfgTabela>\n";
 for ($i=0;$i<$lin;$i++)
 {
  $saida .= "<tr>\n";      //Linhas
  for ($j=0;$j<$col;$j++)
  {
   //Configuracao
   $idxLinCfg = $i % $qtdLinCfg; //Gera indice de acesso das cfg, possibilitando repetir os dados
   $linCfg = $cfgCelula[$idxLinCfg];  //Configuracao da linha idxLinCfg
   $qtdColCfg = sizeof($linCfg);  //Quantidade de colunas de cfg da linha
   $idxColCfg = $j % $qtdColCfg;  //Gera indice de acesso da cfg, possibilitando repetir
   //Dados
   $idxCol = $j % $qtdColunas;   //Gera indice de acesso dos dados, possibilitando repetir os dados
   $colDados = $dados[$idxCol];  //Dado da coluna idxCol
   $qtdLin = sizeof($colDados);  //Quantidade de linhas da coluna
   $idxLin = $i % $qtdLin;  //Gera indice de acesso dos dados, possibilitando repetir

   $saida .= "<td $linCfg[$idxColCfg]>\n"; //Cfg da TD
   $saida .= "$colDados[$idxLin]\n";  //Dados da TD
   $saida .= "</td>\n";
  }
  $saida .= "</tr>\n";
 }
 $saida .= "</table>\n";

 return $saida;  //Retorna a tabela em forma de string
}

//Funcao para gerar hyperlink, retornando string
//link - String com o link de destino
//legenda - Legenda para o link
function gera_link($link, $legenda)
{
  $saida .= "<a href=\"$link\">$legenda</a>\n";

  return $saida;
}
?>
