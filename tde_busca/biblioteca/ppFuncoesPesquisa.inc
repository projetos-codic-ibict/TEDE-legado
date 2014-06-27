<?

//Funcao que elimina os conectores da expressao
//elementos - Array de array dos elementos de expressoes string
function elimina_conectores($elementos)
{
 //Importa os conectores definidos globalmente
 global $conectores;

 $retorno = array();               //Inicia array de elementos retornados
 if (is_array($elementos))         //Verifica se elementos e array
 {
  $qtdExpressoes = sizeof($elementos);       //Quantidade de expressoes
  for ($i=0; $i < $qtdExpressoes; $i++)
  {
   if (is_array($elementos[$i]))             //Verifica se as expressoes de elementos sao array
   {
    //Elimina os conectores das expressoes
    array_push($retorno, array_values(array_diff($elementos[$i], $conectores)));
   }
   else
   {
    array_push($retorno, array());           //Caso nao exista expressao, forneca array vazio
   }
  }
 }

 return $retorno;        //Retorna o array de array com elementos das expressoes
}

//Funcao que executa a pesquisa, retornando um array com os IDs dos registros
//
//---------------------------------------------------------------------------
//campoExpressao - array com os campos de pesquisa das expressoes
//conectivoExpressao - array com os conectivos entre as expressoes de pesquisa
//qtdExpressao - quantidade de expressoes de pesquisas a serem processadas
//query - array com as queries das expressoes
function exec_pesquisa($campoExpressao, $conectivoExpressao, $qtdExpressoes, $query)
{
 require('../conexao/conexao_fim.inc');

 $expressaoFinal = array();              //Expressao para o resultado final
 $pilhaConectivos = array();             //Pilha de conectivos

 for ($i=0;$i<$qtdExpressoes;$i++)
 {
  $resultados = array();                 //Array com resultados finais
  if ($query[$i] != "")
  {
   //Executa query
   if ($campoExpressao[$i] != 'TODOS')   //Verifica se a query nao e formada de multiplas queries
   {
    //Executa a query de forma simples
    $resultQuery = mysql_db_query($base_fim,$query[$i],$conexao_fim) or die("Query failed : " . mysql_error());
    //Preenche array com resultados
    while ($elemResultQuery = mysql_fetch_array($resultQuery))
   	{
     array_push($resultados, $elemResultQuery[0]);
    }
   }
   else   //Query multipla nao suportada por mysql. Quando pesquisa varios campos juntos. Executa query por query
   {
    //Quebra uma query multipla em varias queries. Separador = ;
    //Baseado na solucao de Predrag Supurovic (www.php.net -> mysql_query)
	$query_split = preg_split ("/[;]+/", $query[$i]);      //Separa queries
	foreach ($query_split as $command_line)                //executa cada uma
	{
     $command_line = trim($command_line);
   	 if ($command_line != '')                              //Verifica se nao e comando vazio
	 {
      $resultQuery = mysql_db_query($base_fim,$command_line,$conexao_fim);
	  //Preenche array com resultado
	  while ($elemResultQuery = mysql_fetch_array($resultQuery))
      {
	   array_push($resultados, $elemResultQuery[0]);
      }
	 }//fim if
	}//fim foreach
	//Fim da solucao adaptada
   }

   // -- Escreve expressao final com array dos resultados e conectivos em ordem prefixada--
   
   if ($i==0)    //Verifica se e primeira expressao
   {
    array_push($expressaoFinal, $resultados);      //Insere os resultados da(s) quer(y/ies)
   }
   else
   {
    $ultConectivo = array_pop($pilhaConectivos);   //POP ultimo conectivo da pilha
    //Escreve conectivos na ordem de prioridade
    switch ($conectivoExpressao[$i])
    {
     case "AND": case "NOT":                       //AND e NOT com mesma prioridade
      switch ($ultConectivo)
      {
       case "AND": case "NOT":                      //ultimo conectivo com mesma prioridade
        array_push($expressaoFinal, $ultConectivo); //Acrescenta ultimo conectivo guardado a expressao
        array_push($pilhaConectivos, $conectivoExpressao[$i]);  //Empilha conectivo processado
        break;
       case "OR": case NULL:                        //ultimo conectivo com prioridade menor ou pilha vazia
        //Empilha o conectivo processado apos o ultimo conectivo empilhado
        array_push($pilhaConectivos, $ultConectivo, $conectivoExpressao[$i]);
        break;
       default:                                     //nao executa
        break;
      }
      break;
     case "OR":                                   //OR com prioridade menor que AND e NOT
      switch ($ultConectivo)
      {
       case "AND": case "NOT": case "OR":         //Seja qual for o ultimo conectivo empilhado
        array_push($expressaoFinal, $ultConectivo);  //Acrescenta ultimo conectivo passado a expressao final
        array_push($pilhaConectivos, $conectivoExpressao[$i]); //Empilha conectivo processado
        break;
       case NULL:                                 //Pilha vazia
        array_push($pilhaConectivos, $ultConectivo, $conectivoExpressao[$i]); //Empilha conectivo processado apos o ultimo conectivo
        break;
       default:                                   //nao executa
        break;
      }
      break;
     default:                                     //nao executa
      break;
    }

    //Acrescenta array de resultados a expressao final
    array_push($expressaoFinal, $resultados);
   }//Fim do else (if $i != 0)
  }
 }

 //Esvazia pilha operadores completando a expressao final
 $ultConectivo = array_pop($pilhaConectivos);
 while ($ultConectivo != NULL)
 {
  array_push($expressaoFinal, $ultConectivo);
  $ultConectivo = array_pop($pilhaConectivos);
 }
//Processa a expressao final
 $resultados = exec_expressao($expressaoFinal);
  //Retira as TDEs excluidas
  require "../conexao/conexao_fim.inc";
if ($resultados[0]!="") {
$SEL_exc="SELECT * FROM OAIControle";
$SEL_exc_query=mysql_db_query($base_fim,$SEL_exc,$conexao_fim);
$SEL_exc_RES=mysql_fetch_array($SEL_exc_query);

while ($SEL_exc_RES!="") {
$tsIdentificadorExc=$SEL_exc_RES['tsIdentificador'];
 $qtd_r=count($resultados);
 for ($ir=0; $ir<$qtd_r; $ir++) {

 if ($resultados[$ir]==$tsIdentificadorExc) {
 unset($resultados[$ir]);
 }
 }
 
 $SEL_exc_RES=mysql_fetch_array($SEL_exc_query);
 }
 }

 if (is_array($resultados))                              //Existe os resultados
 {
  /* libera o resultados da query */
  mysql_free_result($resultQuery);

  //Organiza resultados pelos mais encontrados nas expressoes
  
  $resultados = array_count_values($resultados);          //Conta achados, colocando as chaves como IDs e valores como os contadores
  arsort($resultados);                                    //Ordena decrescente
  $resultados = array_keys($resultados);                  //Retorna as chaves que sao os IDs
 }
 else
 {
  $resultados = array();                                  //Sem Resultados
 }

 return $resultados;                                      //Retorna array com os IDs dos resultados
}

//Funcao que executa a expressao prefixada com os arrays IDs e conectivos e retorna array com o resultado da expressao
//expressao - expressao formado de arrays de IDs de registros e conectivos
function exec_expressao($expressao)
{
 $resultAvaliacao = array();              //Inicia array de resultados
 $tamExpressao = sizeof($expressao);      //Guarda tamanho da expressao
 for ($i=0;$i<$tamExpressao;$i++)
 {
  switch ($expressao[$i])                 //Percorre a expressao
  {
   case "AND":                                 //Conectivo AND
    $array2 = array_pop($resultAvaliacao);     //POP segundo array operando
    $array1 = array_pop($resultAvaliacao);     //POP primeiro array operando
    array_push($resultAvaliacao, array_values(array_intersect($array1, $array2))); //Interseccao dos arrays
    break;
   case "OR":                                  //Conectivo OR
    $array2 = array_pop($resultAvaliacao);     //POP segundo array operando
    $array1 = array_pop($resultAvaliacao);     //POP primeiro array operando
    array_push($resultAvaliacao, array_merge($array1, $array2)); //Uniao dos arrays
    break;
   case "NOT":                                 //Conectivo NOT
    $array2 = array_pop($resultAvaliacao);     //POP segundo array operando
    $array1 = array_pop($resultAvaliacao);     //POP primeiro array operando
    array_push($resultAvaliacao, array_values(array_diff($array1, $array2))); //Diferenca entre array1 contra array2
    break;
   default:                                    //Array operando
    array_push($resultAvaliacao, $expressao[$i]);  //Insere array de operando
    break;
  }
 }
 return $resultAvaliacao[0];         //Retorna o primeiro array da avaliacao
}


//Funcoes para gerar as queries de pesquisa
//campoExpressoes - Campos de pesquisa das expressoes
//expressoes - Expressoes da pesquisa
//complExpressoes - Complemento das expressoes (filtro)
//qtdExpressoes - Quantidade de expressoes
function gera_query($campoExpressoes, $expressoes, $complExpressoes, $qtdExpressoes)
{
 for ($i=0; $i<$qtdExpressoes; $i++)
 {
  $qtdElementos = sizeof($expressoes[$i]);
  if ($qtdElementos > 0)
  {
   switch ($campoExpressoes[$i])                    //Gera query por tipo de campo
   {
    case "AUTOR":
     $campoQuery = "b.pfNome";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from TSPF a, PessoaFisica b, Teses c where (b.pfcod = a.pfcod) and (a.tspfTipo REGEXP \"Autor\") and ($semiQuery)$complExpressoes";
     break;
    case "TITULO":
     $campoQuery = "a.ttTitulo";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from Titulo a, Teses c where ($semiQuery)$complExpressoes";
     break;
    case "ASSUNTO":
     $campoQuery = "a.asAssunto";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from Assunto a, Teses c where ($semiQuery)$complExpressoes";
     break;
    case "CONTRIBUIDOR":
     $campoQuery = "b.pfNome";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from TSPF a, PessoaFisica b, Teses c where (b.pfcod = a.pfcod) and (a.tspfTipo NOT REGEXP \"Autor\") and ($semiQuery)$complExpressoes";
     break;
    case "RESUMO":
     $campoQuery = "a.rsResumo";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from Resumo a, Teses c where ($semiQuery)$complExpressoes";
     break;
    case "TODOS":
     //Para MySQL < 4, utilizo um separador ';' e faco a uniao das queries manualmente
	 $conexaoQuery = "; ";
	 //Para MySQL >= 4, pode-se substituir o ';' por UNION e o BD fara a uniao automaticamente
	 //$conexaoQuery = " UNION";

     //Todas as queries juntas
     //Autor e Contribuidor
     $campoQuery = "b.pfNome";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] = "select distinct a.tsidentificador from TSPF a, PessoaFisica b, Teses c where (b.pfcod = a.pfcod) and ($semiQuery)$complExpressoes";
     //Titulo
     $campoQuery = "a.ttTitulo";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] .= $conexaoQuery."select distinct a.tsidentificador from Titulo a, Teses c where ($semiQuery)$complExpressoes";
     //Assunto
     $campoQuery = "a.asAssunto";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);    //Gera uma semiquery a partir da expressao
     $query[$i] .= $conexaoQuery."select distinct a.tsidentificador from Assunto a, Teses c where ($semiQuery)$complExpressoes";
     //Resumo
     $campoQuery = "a.rsResumo";
     $semiQuery = gera_semiquery($campoQuery, $expressoes[$i]);
     $query[$i] .= $conexaoQuery."select distinct a.tsidentificador from Resumo a, Teses c where ($semiQuery)$complExpressoes";
     break;
    case "NA":  //Para campo nao escolhido (precaucao)
     $query[$i] = ""; //Vazia
     break;
    default:    //Nao executa (precaucao)
     $query[$i] = ""; //Vazia
     break;
   }
  }
 }
 return $query; //Retorna array com as queries de cada expressao
}

//Funcao que organiza a expressao a ser utilizada na query, traduzindo os conectivos
//campoQuery - campo a ser avaliado na query
//expressao - elementos da expressao a ser processada
function gera_semiquery($campoQuery, $expressao)
{
 //Importa a lista de conectivos
 global $conect_AND;
 global $conect_OR;
 global $conect_NOT;

 $qtdElementos = sizeof($expressao);       //Quantidade de elementos da expressao
 $semiQuery="";                            //Zera semi-query
 $operQuery = "LIKE";                    //(default)Operador de expressao regular do MySQL. Poderia-se utilizar LIKE, com outras funcionalidades
 for ($j=0;$j<$qtdElementos;$j++)
 {
  //Verifica se elemento e:
  if (in_array(strtoupper($expressao[$j]), $conect_AND))   //conectivo AND
  {
   $operQuery = "LIKE";                 //Para conectivo AND operador LIKE
   $conectivoQuery = "and";                //e conectivo 'and'
  }
  elseif (in_array(strtoupper($expressao[$j]), $conect_OR))  //conectivo OR
  {
   $operQuery = "LIKE";                 //Para conectivo AND operador LIKE
   $conectivoQuery = "or";
  }
  elseif (in_array(strtoupper($expressao[$j]), $conect_NOT))  //conectivo NOT
  {
   $operQuery = "NOT LIKE";                 //Para conectivo AND operador LIKE
   $conectivoQuery = "and";    //e o conectivo e 'and'
  }
  else             //termo nao conectivo da expressao
  {
   $semiQuery .= " $conectivoQuery $campoQuery $operQuery '%$expressao[$j]%'";
   $conectivoQuery = "or";        //Conectivo padrao
  }
 }
 return $semiQuery;  //Retorna a expressao parcial da query
}
?>
