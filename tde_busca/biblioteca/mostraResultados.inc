<?
//Funcao que localiza um padrao no string e insere destaque, retornando o string modificado
//texto - String de texto a ser modificado
//chave - padrao a ser destacado no texto
//marcaInic - marcador do inicio do destaque
//marcaFim - marcador de fim do destaque
function destaca($texto, $chave, $marcaInic, $marcaFim)
{
 require "../bibliotecas/idioma_sistema.bib";
 require "../tde_i18n/texto_".$idioma_sistema.".txt";
 
 //Prepara a chave para busca de padrao
 $chave = str_replace('^','',$chave);
 $chave = str_replace('$','',$chave);
 //Destaca do texto parte que inicia com a chave. Procura case not-sensitive
 $destacaTexto = stristr($texto, $chave);
 if ($destacaTexto != "")        //Caso ache a chave no texto
 {
  $destacaTexto = substr($destacaTexto, 0, strlen($chave));  //Isola somente a chave no texto
  $chave = $destacaTexto;               //Chave exatamente igual a chave encontrada no texto
  $destacaTexto = $marcaInic.$destacaTexto.$marcaFim; //Destaca texto ja com os marcadores de destaque
  $texto = ereg_replace($chave, $destacaTexto, $texto); //Retorna texto com todos as chaves destacadas
 }
 return $texto;
}

//Funcao que colhe as chaves de destaque das expressoes que possuem o mesmo campo que o solicitado ou possua campo de pesquisa todos
//camposExpressoes - campos de pesquisa das expressoes
//plavrasExpressoes - elementos que compoe as expressoes
//campoAtual - campo de pesquisa a qual deseja-se obter as chaves de elementos
function colhe_chaves($camposExpressoes, $palavrasExpressoes, $campoAtual)
{
     require "../bibliotecas/idioma_sistema.bib";
 require "../tde_i18n/texto_".$idioma_sistema.".txt";
 
 //colhe indice das expressoes cujos campos de pesquisa sejam 'campoAtual' ou no caso 'todos'
 $idxExpressoes = array_merge(array_keys($camposExpressoes, $campoAtual), array_keys($camposExpressoes, "TODOS"));
 $idxExpressoes = array_unique($idxExpressoes);  //Elimina indices repetidos
 $qtdIdxExpressoes = sizeof($idxExpressoes);
 $chaves = array();  //Inicia array com plavras chaves para destaque
 for ($j=0;$j<$qtdIdxExpressoes;$j++)
 {
  //Colhe as palavras que seram destacadas em cada uma das expressoes que pesquisaram em titulo
  $chaves = array_merge($chaves, $palavrasExpressoes[$idxExpressoes[$j]]);
 }
 $chaves = array_unique($chaves);
 return $chaves;                 //Retorna as chaves das expressoes
}

//Funcao que gera uma tabela HTML com os dados dos registros pesquisados
//resultados - Array com os IDs dos registros a serem exibidos
//inicio - indice do inicio dos registros a serem exibidos
//fim - indice do fim dos registros a serem exibidos
//palavrasExpressoes - Conjunto de palavras das expressoes a serem destacados em cada campo afetado pela expressao
//camposExpressoes - Campos utilizados nas expressoes
//listaDetalhes - Lista de registros a serem exibidos de forma detalhada
function gera_tabela_dados($resultados, $inicio, $fim, $palavrasExpressoes, $camposExpressoes, $listaDetalhes, $mostraArquivos=1)
{
     require "../bibliotecas/idioma_sistema.bib";
 require "../tde_i18n/texto_".$idioma_sistema.".txt";
 require('../conexao/conexao_fim.inc');
echo "<link href=".$diretorio_layout."estilos/estilo_geral.css\" rel=\"stylesheet\" type=\"text/css\">";
 //Inicia a tabela dos dados
 $tabelaDados = array();

 for ($i=$inicio;$i<$fim;$i++)
 {
 
  //Sinaliza se o registro esta na lista a ser detalhado
  $flagDetalhe = in_array($resultados[$i], $listaDetalhes);

  //Executa queries para obter dados do registro

  // -- Autor & Lattes & e-mail --
  $query = "select distinct pf.pfNome, pf.pfLattes, pf.pfEmail, tp.tspfDispEmail from PessoaFisica pf, TSPF tp where (tp.tsIdentificador = $resultados[$i]) and (tp.pfCod = pf.pfCod) and (tp.tspfTipo regexp 'Autor')";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (autor): " . mysql_error());

  //Preenche variaveis com resultados
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   $autor = $elemResultQuery['pfNome'];
   $lattes = $elemResultQuery['pfLattes'];
   $email = $elemResultQuery['pfEmail'];
   $dispEmail = $elemResultQuery['tspfDispEmail'];
  }

// -- Titulo --
  $query = "select distinct ttIdioma, ttTitulo from Titulo where tsIdentificador = $resultados[$i] ORDER BY ttCod";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (titulo): " . mysql_error());

  //Preenche array com resultado
  $titulo = array();
  $idioma = array();
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   array_push($titulo, $elemResultQuery["ttTitulo"]);
   array_push($idioma, $elemResultQuery["ttIdioma"]);
  }
  $qtdTitulos = sizeof($titulo);

  // -- Programa & Area de Concentracao --
  $query = "select distinct pr.prNome, pr.prArea from Programa pr, TSPF tp where (tp.tsIdentificador = $resultados[$i]) and (pr.prCod = tp.prCod)";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (Programa): " . mysql_error());

  //Preenche variaveis com resultados
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   $programa = $elemResultQuery['prNome'];
   $area = $elemResultQuery['prArea'];
  }

 // -- Resumo --
  $resumo = array();
  $idiomaResumo = array();
  $query = "select distinct rsResumo, rsIdioma from Resumo where tsIdentificador = $resultados[$i] ORDER BY rsCod";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (resumo): " . mysql_error());

  //Preenche array com resultado
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   array_push($resumo, $elemResultQuery['rsResumo']);
   array_push($idiomaResumo, $elemResultQuery['rsIdioma']);
  }
  $qtdResumos = sizeof($resumo);


  // -- Grau & Data defesa --
  $query = "select distinct tsTitulacao, tsGrau, tsDataDefesa from Teses where tsIdentificador = $resultados[$i]";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (Grau-Datadefesa): " . mysql_error());

  //Preenche array com resultado
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   $grau = $elemResultQuery['tsGrau'];
   $dataDefesa = $elemResultQuery['tsDataDefesa'];
   $tsTitulacao = $elemResultQuery['tsTitulacao'];
  }
  //Divide Data de defesa nos tres componentes
  $dataDefesa = split('-', $dataDefesa);
  //Reescreve no formato dd/mm/aaaa
  if ($dataDefesa[2]=="00" or $dataDefesa[1]=="00") {
  if ($dataDefesa[2]=="00" and $dataDefesa[1]!="00") {
  $dataDefesa = $dataDefesa[1].'/'.$dataDefesa[0];
  }else{
  $dataDefesa = $dataDefesa[0];
  }
  } else {
  $dataDefesa = $dataDefesa[2].'/'.$dataDefesa[1].'/'.$dataDefesa[0];
  }
  // -- Contribuidores --
  $contrib = array();
  $tipoContrib = array();
  $query = "select distinct pf.pfNome, tp.tspfTipo from PessoaFisica pf, TSPF tp where (tp.tsIdentificador = $resultados[$i]) and (tp.pfCod = pf.pfCod) and (tp.tspfTipo not regexp 'Autor') ORDER BY tp.tspfTipo DESC";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (Contribuidores): " . mysql_error());

  //Preenche array com resultado
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   array_push($contrib, $elemResultQuery['pfNome']);
   array_push($tipoContrib, $elemResultQuery['tspfTipo']);
  }
  $qtdContribs = sizeof($contrib);

  // -- Assunto --
  $assunto = array();
  $idiomaAssunto = array();
  $query = "select distinct asAssunto, asIdioma from Assunto where tsIdentificador = $resultados[$i]";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (assunto): " . mysql_error());

  //Preenche array com resultado
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   array_push($assunto, $elemResultQuery['asAssunto']);
   array_push($idiomaAssunto, $elemResultQuery['asIdioma']);
  }
  $qtdAssuntos = sizeof($assunto);

  // -- Arquivos --
  $arquivos = array();
  $arFormato = array();
  $arDireitos = array();
  $legArquivos = array();
  $query = "select ar.arCod, ar.arFormato, ar.arDireitos, la.laLegenda  from Arquivos ar left join LegendaArquivo la on la.arCod = ar.arCod where ar.tsIdentificador = $resultados[$i]";
  $resultQuery = mysql_db_query($base_fim,$query,$conexao_fim) or die("Query failed (arquivos): " . mysql_error());

  //Preenche array com resultado
  while ($elemResultQuery = mysql_fetch_array($resultQuery))
  {
   array_push($arquivos, $elemResultQuery['arCod']);
   array_push($arFormato, $elemResultQuery['arFormato']);
   array_push($arDireitos, $elemResultQuery['arDireitos']);

   if ($elemResultQuery['laLegenda']=="") {
   $elemResultQuery['laLegenda']="Sem legenda";
   }
   array_push($legArquivos, $elemResultQuery['laLegenda']);
  }
  $qtdArquivos = sizeof($arquivos);


  //-- Geracao da Tabelas com os dados--

  //Colunas de dados da tabela principal
  $tabPrincipalCol1 = array();        //Coluna de Legenda
  $tabPrincipalCol2 = array();        //Coluna dos dados

  //-- Autor --

  //colhe indice das expressoes cujos campos de pesquisa sejam 'autor' ou no caso 'todos'
  $chaves = colhe_chaves($camposExpressoes, $palavrasExpressoes, "AUTOR");

  $qtdChaves = sizeof($chaves);
  
  $exibeTexto = $autor;
 
  for ($k=0;$k<$qtdChaves;$k++)
  {
   //Destaca do texto a ser exibido as chaves
   $exibeTexto = destaca($exibeTexto, $chaves[$k], '<strong>', '</strong>');
  }
  //Tabela de Autor = a uma string
  if ($lattes!="") {
  $tabelaAutor = "<a href=\"".$lattes."\" target=\"_blank\">".$exibeTexto."</a>";
  }else{
  $tabelaAutor =$exibeTexto;
  }
  //Insere na coluna de dados da tabela principal
  array_push($tabPrincipalCol1, "<span class=\"textoBuscaB\">".$txAutor.":</span>");
  array_push($tabPrincipalCol2, $tabelaAutor);

  //-- Titulo --

  //Prepara as palavras chaves a serem destacadas nos dados

  //colhe indice das expressoes cujos campos de pesquisa sejam 'titulo' ou no caso 'todos'
  $chaves = colhe_chaves($camposExpressoes, $palavrasExpressoes, "TITULO");

  //Preenche colunas para criacao da tabela HTML
  $col1 = array();
  $col2 = array();
  $qtdChaves = sizeof($chaves);
  for ($j=0;$j<$qtdTitulos;$j++)
  {
   $exibeTexto = $titulo[$j];   //Colhe dado a ser exibido
   for ($k=0;$k<$qtdChaves;$k++)
   {
    //Destaca do texto a ser exibido todas as chaves
    $exibeTexto = destaca($exibeTexto, $chaves[$k], '<strong>', '</strong>');
   }
   //Insere nos arrays de dados
   //Idioma do titulo entre []
   array_push($col1,'['.$idioma[$j].']');
   //Titulo com as chaves destacadas
   array_push($col2, $exibeTexto);
  }

  //Monta a tabela HTML
  $linTabela = $qtdTitulos;       //qtd de linhas
  $colTabela = 2;                 //qtd de colunas
  //Configuracao da tabela
  $cfgTabela = "align=\"left\" class=\"txt\"";
  //preenche o array de dados para a tabela
  $dadosTabela = array($col1, $col2);
  //Cfg das celulas da tabela TD
  $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"textoBusca\"","valign=\"top\" align=\"left\" class=\"BuscaTxt\"")); //somente define 1a e 2a coluna e uma linha. Repete p/ as demais
  //Gera a string com a tabela gerada
  $tabelaTitulo = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Insere na coluna de dados da tabela principal
  //Salto e Legenda
  array_push($tabPrincipalCol1, "&nbsp;", "<span class=\"textoBuscaB\">".$txTitulos.":</span>");
  //Salto e Dados
  array_push($tabPrincipalCol2, "&nbsp;", $tabelaTitulo);

  // -- Resumo --

  //Campo de resumo somente e exibido se:
  // - tiver algum dado a ser apresentado e
  // - o registro estiver marcado como exibicao detalhada
  // ou
  // - este campo estiver incluso na pesquisa
  if ( (($flagDetalhe)||(in_array("RESUMO", $camposExpressoes))) && ($qtdResumos > 0) )
  {
   //colhe indice das expressoes cujos campos de pesquisa sejam 'contribuidor' ou no caso 'todos'
   $chaves = colhe_chaves($camposExpressoes, $palavrasExpressoes, "RESUMO");

   $col1 = array();
   $col2 = array();
   $qtdChaves = sizeof($chaves);
   for ($j=0;$j<$qtdResumos;$j++)
   {
    //Colhe dados
    $exibeTexto = $resumo[$j];
    for ($k=0;$k<$qtdChaves;$k++)
    {
     //Destaca do texto a ser exibido as chaves
     $exibeTexto = destaca($exibeTexto, $chaves[$k], '<strong>', '</strong>');
    }
    //idioma resumo
    array_push($col1,'['.$idiomaResumo[$j].']');
    //resumo
    array_push($col2,$exibeTexto);
   }

   $linTabela = $qtdResumos;
   $colTabela = 2;
   $cfgTabela = "valign=\"top\" align=\"left\" class=\"BuscaTxt\"";
   $dadosTabela = array($col1, $col2);
   $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"textoBusca\"","align=\"left\" class=\"texto\""));
   $tabelaResumo = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //Insere na tabela principal
   array_push($tabPrincipalCol1, "&nbsp;","<span class=\"textoBuscaB\">".$txResumos.":</span>");
   array_push($tabPrincipalCol2, "&nbsp;",$tabelaResumo);
  }


  //--- Titulacao ---

  //Campo de titulacao somente e exibido se:
  // - o registro estiver marcado como exibicao detalhada
  if ($flagDetalhe)
  {
   $tabelaTitulacao = $tsTitulacao;

   //Insere na tabela principal
   array_push($tabPrincipalCol1, "&nbsp;","<span class=\"textoBuscaB\">".$txTitulacao.":</span>");
   array_push($tabPrincipalCol2, "&nbsp;",$tabelaTitulacao);
  }


  //--- Contribuidor ---

  //Campo dos contribuidores somente e exibido se:
  // - tiver algum dado a ser apresentado e
  // - o registro estiver marcado como exibicao detalhada
  // ou
  // - este campo estiver incluso na pesquisa
  if ( (($flagDetalhe)||(in_array("CONTRIBUIDOR", $camposExpressoes))) && ($qtdContribs > 0) )
  {
   //colhe indice das expressoes cujos campos de pesquisa sejam 'contribuidor' ou no caso 'todos'
   $chaves = colhe_chaves($camposExpressoes, $palavrasExpressoes, "CONTRIBUIDOR");

   $col1 = array();
   $col2 = array();
   $qtdChaves = sizeof($chaves);
   for ($j=0;$j<$qtdContribs;$j++)
   {
    //Colhe dados
    $exibeTexto = $contrib[$j];
    for ($k=0;$k<$qtdChaves;$k++)
    {
     //Destaca do texto a ser exibido as chaves
     $exibeTexto = destaca($exibeTexto, $chaves[$k], '<strong>', '</strong>');
    }
    //Tipo de contribuidor
    array_push($col1,'['.$tipoContrib[$j].']');
    //Contribuidor
    array_push($col2,$exibeTexto);
   }

   $linTabela = $qtdContribs;
   $colTabela = 2;
   $cfgTabela = "valign=\"top\" align=\"left\" class=\"BuscaTxt\"";
   $dadosTabela = array($col1, $col2);
   $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"textoBusca\""," align=\"left\" class=\"texto\""));
   $tabelaContrib = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //Insere na tabela principal
   array_push($tabPrincipalCol1, "&nbsp;", "<span class=\"textoBuscaB\">".$txContribuidorEes.":</span>");
   array_push($tabPrincipalCol2, "&nbsp;",$tabelaContrib);
  }

  //-- Assunto --

  //Campo de assunto somente e exibido se:
  // - tiver algum dado a ser apresentado e
  // - o registro estiver marcado como exibicao detalhada
  // ou
  // - este campo estiver incluso na pesquisa
  if ( (($flagDetalhe)||(in_array("ASSUNTO", $camposExpressoes))) && ($qtdAssuntos > 0) )
  {
   //colhe indice das expressoes cujos campos de pesquisa sejam 'contribuidor' ou no caso 'todos'
   $chaves = colhe_chaves($camposExpressoes, $palavrasExpressoes, "ASSUNTO");

   $col1 = array();
   $col2 = array();
   $qtdChaves = sizeof($chaves);
   for ($j=0;$j<$qtdAssuntos;$j++)
   {
    //Colhe dado
    $exibeTexto = $assunto[$j];
    for ($k=0;$k<$qtdChaves;$k++)
    {
     //Destaca do texto a ser exibido as chaves
     $exibeTexto = destaca($exibeTexto, $chaves[$k], '<strong>', '</strong>');
    }
    //Idioma assunto
    array_push($col1, '['.$idiomaAssunto[$j].']');
    //assunto
    array_push($col2, $exibeTexto);
   }

   $linTabela = $qtdAssuntos;
   $colTabela = 2;
   $cfgTabela = "valign=\"top\" align=\"left\" class=\"BuscaTxt\"";
   $dadosTabela = array($col1, $col2);
   $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"textoBusca\"","align=\"left\" class=\"texto\""));
   $tabelaAssunto = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //Insere na tabela principal
   array_push($tabPrincipalCol1, "&nbsp;", "<span class=\"textoBuscaB\">".$txAssuntos.":</span>");
   array_push($tabPrincipalCol2, "&nbsp;", $tabelaAssunto);
  }

 //-- Data de defesa --
  $tabelaDataDefesa = $dataDefesa;

  //Insere na coluna de dados da tabela principal
  array_push($tabPrincipalCol1, "&nbsp;","<span class=\"textoBuscaB\">".$txDataDaDefesa.":</span>");
  array_push($tabPrincipalCol2, "&nbsp;",$tabelaDataDefesa);

  // -- Arquivo --

  //Campo de arquivo somente e exibido se:
  // - tiver algum dado a ser apresentado e
  // - o registro estiver marcado como exibicao detalhada e
  // - o campo de exibicao de arquivos estiver habilitado
  if ( ($flagDetalhe) && ($mostraArquivos) && ($qtdArquivos > 0) )
  {
   $col1 = array();
   for ($j=0;$j<$qtdArquivos;$j++)
   {
    //preenche a coluna 1 com os links dos arquivos
	if ($arDireitos[$j]!="Retido") {
	if ($arDireitos[$j]=="Publico") {
	array_push($col1,"<a href=\"arquivo.php?codArquivo=$arquivos[$j]\" target=_blank class=\"linkpreto\">$arFormato[$j] - $legArquivos[$j]</a>");
	}else{
    array_push($col1,"<a href=\"arquivo.php?codArquivo=$arquivos[$j]\" target=_blank class=\"linkpreto\">$arFormato[$j] - $legArquivos[$j] - [$arDireitos[$j]]</a>");
	}}else{
	array_push($col1,"<span class=\"txt\">$arFormato[$j] - $legArquivos[$j] - [$arDireitos[$j]]</span>");
	}
   }

   $linTabela = $qtdArquivos;
   $colTabela = 1;
   $cfgTabela = "valign=\"top\" align=\"left\" class=\"BuscaTxt\"";
   $dadosTabela = array($col1);
   $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"BuscaTxt\"","align=\"left\" class=\"BuscaTxt\""));
   $tabelaArquivos = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //Preenche a tabela principal
   array_push($tabPrincipalCol1, "&nbsp;","<span class=\"textoBuscaB\">".$txArquivos.":</span>");
   array_push($tabPrincipalCol2, "&nbsp;",$tabelaArquivos);
  }


  //-- Email -->

  //Campo de e-mail somente e exibido se:
  // - tiver disponibilidade de e-mail e
  // - o registro estiver marcado como exibicao detalhada
  if ( ($flagDetalhe) && ($dispEmail == "Sim") )
  {
   //Preenche a tabela com o link para o e-mail
   $tabelaEmail = "<a href=\"mailto:$email\" class=\"linkpreto\">$email</a>";

   //Preenche a tabela principal
   array_push($tabPrincipalCol1, "&nbsp;",$txEMail.":");
   array_push($tabPrincipalCol2, "&nbsp;",$tabelaEmail);
  }


  //-- Tabelas principais. 1 para cada registro --

  $linTabela = sizeof($tabPrincipalCol1);
  $colTabela = 2;
  $cfgTabela = "width=\"100%\" class=\"BuscaTxt\"";
  $dadosTabela = array($tabPrincipalCol1, $tabPrincipalCol2);
  $cfgCelulas = array(array("align=\"right\" valign=\"top\" class=\"BuscaTxt\""," valign=\"top\" align=\"left\" class=\"BuscaTxt\""));
  $tabelaCampos = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Indice de ordem do registro
  $linTabela = 2;
  $colTabela = 1;
  $cfgTabela = "width=\"100%\" align=\"center\" class=\"loginTable\"";
  $col1 = array('<strong>'.($i+1).'</strong>',$tabelaCampos);
  $dadosTabela = array($col1);
  $cfgCelulas = array(array("align=\"left\" valign=\"top\" class=\"BuscaTxt\" bgcolor=\"#EAEAEA\""),array("align=\"left\" class=\"BuscaTxt\""));
  $tabelaRegistro = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Insere no array de tabelas
  array_push($tabelaDados, $tabelaRegistro);
 }
 @mysql_free_result($resultQuery);
 return $tabelaDados;            //retorna array com as tabelas em forma de string e HTML
}

//Funcao para mostrar resultados da pesquisa
//resultados - Lista com os IDs dos registros a serem exibidos
//palavrasExpressoes - Conjunto de palavras das expressoes a serem destacados em cada campo afetado pela expressao
//camposExpressoes - Campos utilizados nas expressoes
//qtdPagina - Quantidade de registros a serem exibidos por pagina
//nrPagina - Numero da pagina da lista de registros a serem exibidos
//query - array com as queries de pesquisa e seus conectivos
//listaDetalhes - Lista de registros a serem exibidos de forma detalhada
//pasta - Lista dos registros armazenados na Pasta de Trabalhos
//tituloPagina - Titulo a ser exibido na pagina de resultados
//retorno - Link para retorno
function mostra_resultados($resultados, $palavrasExpressoes, $camposExpressoes, $qtdRegPagina, $nrPagina, $query, $listaDetalhes, $pasta, $tituloExibicao, $retorno)
{
     require "../bibliotecas/idioma_sistema.bib";
 require "../tde_i18n/texto_".$idioma_sistema.".txt";
 $saida = '';  //String de saida

 //Exibe a query - Desativado
 //
/*
 if (sizeof($query) > 0)         //Verifica se a algo para se exibir
 {
  //Prepara para exibir tabela com a query
  $linTabela = sizeof($query[1]);           //Quantidade de conectivos
  $colTabela = 2;
  $cfgTabela = "align=\"center\" class=\"loginTable\"";
  $dadosTabela = $query;     //Formada por dois arrays de colunas. Col1-Conectivos, Col2-Queries
  $cfgCelulas = array(array("width=\"5%\" class=\"loginTable\"","class=\"loginTable\""));
  //Tabela com as queries e conectivos
  $tabelaQuery = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Prepara tabela com titulo e tabela anterior. (Obs. Utiliza-se o mesmo nome p/ tabela)
  $linTabela = 2;
  $colTabela = 1;
  $cfgTabela = "width=\"80%\" align=\"center\"  class=\"loginTable\"";
  $col1 = array("Query", $tabelaQuery); //Col1 - Titulo e Tabela Query
  $dadosTabela = array($col1);          //dados = col1
  $cfgCelulas = array(array("class=\"tituloBusca\" align=\"center\""),array(" "));
  $tabelaQuery = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //String de saida acrescentada da tabela de query
  $saida .= " $tabelaQuery <br />";
 }
*/
//Fim de exibicao de Query - Desativado

 // -- Exibicao dos registros

 $qtdRegistros = sizeof($resultados);
 if ($qtdRegistros <= 0) //Sem resultados
 {
  $texto1 = $txNenhumRegistroE;

  //Gera tabela para exibicao
  $linTabela = 1;
  $colTabela = 1;
  $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
  $col1 = array($texto1);
  $dadosTabela = array($col1);
  $cfgCelulas = array(array("class =\"tituloBusca\" align=\"center\""));
  $tabelaCabecalho = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Cabecalho
  $saida .= "$tabelaCabecalho";
 }
 else    //Com resultados
 {
  //Calculo para quantidade de links de paginas a serem exibidas
  $totalLinksPagina = 11;   //total de links de pagina por pagina
  $totalPaginas = ceil($qtdRegistros / $qtdRegPagina);     //Calcula total de paginas. Arredonda para baixo

  //Se a quantidade de paginas dos resultados ultrapassa a quantidade
  //de links de pagina possiveis na pagina
  if ($totalPaginas > $totalLinksPagina)
  {
   //Define a pagina inical dos links de forma a pagina atual ficar em posicao mediana
   $paginaInicial = $nrPagina - ((int) ($totalLinksPagina/2));
   //Se a pagina inicial cair antes da pagina 1
   if ($paginaInicial < 1)
   {
    $paginaInicial = 1;
   }

   //Define a pagina final do link como sendo a pagina inicial mais a qtd possivel
   $paginaFinal = $paginaInicial + $totalLinksPagina;
   //Se a pagina final ultrapassa a ultima pagina
   if ($paginaFinal > $totalPaginas+1)
   {
    $paginaFinal = $totalPaginas+1;   //Define o link da pagina final como a ultima
    $paginaInicial = $paginaFinal - $totalLinksPagina; //Recalcula o link da pagina inicial em funcao da nova pagina final
   }
  }
  else //Total de pagina menor que o maximo de links permitidos por pagina
  {
   $paginaInicial = 1;              //Primeira pagina
   $paginaFinal = $totalPaginas+1;  //Ultima pagina
  }

  // -- Define os indices dos registros a serem apresentados --
  $idxInicio = ($nrPagina-1) * $qtdRegPagina;  //Define o inicio
  $idxFim = $idxInicio + $qtdRegPagina;        //Define o fim
  if ($idxFim > $qtdRegistros)
  {
   $idxFim = $qtdRegistros;                 //Caso o fim ultrapasse o numero de registros
  }

  // -- Define textos de exibicao dos resultados --
  $txtTitulo = $tituloExibicao.' '.$qtdRegistros.' registro(s)';
  $txtResultados = $txResultados.' ['.($idxInicio+1).' - '.$idxFim.']';
  $txtPaginas = "Total de P&aacute;ginas: $totalPaginas";

  // -- Cria os links para as paginas dos resultados --
  $linkPaginas = '';
  if ($nrPagina != 1)   //Caso nao seja a primeira pagina
  {
   $linkPaginas .= '<a href="'.$retorno.'?nrPagina='.($nrPagina-1).'" class=\"linkpreto\">'.$txAnterior.'</a> | ';
  }
  else
  {
   $linkPaginas .= $txPrimeira.' | ';
  }
  for ($i=$paginaInicial;$i<$paginaFinal;$i++)
  {
   if ($i != $nrPagina)         //Se nao eh pagina atual
   {
    $linkPaginas .= '<a href="'.$retorno.'?nrPagina='.$i.'" class=\"linkpreto\">'.$i.'</a> | ';
   }
   else          //Se e pagina atual. Nao possui link
   {
    $linkPaginas .= '<strong>'.$i.'</strong> | ';
   }
  }
  if ($nrPagina < $totalPaginas)            //Se pagina atual nao e a ultima
  {
   $linkPaginas .= '<a href="'.$retorno.'?nrPagina='.($nrPagina+1).'" class=\"linkpreto\">'.$txPosterior.'</a href>';
  }
  else           //Se for a ultima nao tem link para proxima
  {
   $linkPaginas .= $txUltima;
  }
    
  // -- Cria a tabela para cabecalho --
  require "../bibliotecas/diretorio_layout.inc";
  $linTabela = 5;
  $colTabela = 1;
  $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
  $col1 = array($txtTitulo,"P&aacute;ginas:",$linkPaginas,$txtResultados,$txtPaginas);
  $dadosTabela = array($col1);
  $cfgCelulas = array(array("class =\"BuscaTxt\" align=\"center\""),array("align=\"center\" class =\"BuscaTxt\""),array("align=\"center\" class =\"BuscaTxt\""),array("align=\"right\" class =\"BuscaTxt\""),array("align=\"right\" class =\"BuscaTxt\""));
  $tabelaCabecalho = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Cabecalho
  $saida .= "$tabelaCabecalho";

  //inicio do formulario
  $saida .= "<form action=\"$retorno\" method=\"GET\">\n";

  // -- Registros do resultado --

  //Colhe array com as tabelas dos registros
  $tabelasDados = gera_tabela_dados($resultados, $idxInicio, $idxFim, $palavrasExpressoes, $camposExpressoes, $listaDetalhes);

  //Prepara tabela para cada registro com dados e opcoes
  for ($i=$idxInicio;$i<$idxFim;$i++)
  {
   //Para cada registro verifica se este esta na lista dos regs. detalhados e/ou registros da pasta de trabalhos
   $flagDetalhe = in_array($resultados[$i], $listaDetalhes);
   $flagPasta = in_array($resultados[$i], $pasta);

   //Caso registro esteja marcado para ser detalhado
   if ($flagDetalhe)
   {
    //Marca checkbox de detalhado
    $checkboxDetalhe = '<input type="checkbox" name="listaDetalhes[]" value="'.$resultados[$i].'" checked>';
   }
   else
   {
    //checkbox permitindo a insercao em detalhes
    $checkboxDetalhe = '<input type="checkbox" name="listaDetalhes[]" value="'.$resultados[$i].'">';
   }
     
   //Caso registro esteja na pasta de trabalhos
   if ($flagPasta)
   {
    //Insere link para pasta de trabalhos
    $texto1 = "<a href=\"pastaTrabalhos.php?retorno=$retorno\" class=\"linkpreto\"><img src=\"".$diretorio_layout."imagens/pasta.gif\" width=\"20\" height=\"20\" border=\"0\"></a />";

    //Insere checkbox para remove-lo da pasta
    $texto2 = '<input type="checkbox" name="listaApagaPasta[]" value="'.$resultados[$i].'">'.$txRemoverDaPasta;
   }
   else     //caso nao esteja na pasta de trabalhos
   {

    $texto1 = '';
    //Insere checkbox para incluir o registro na pagina
    $texto2 = '<input type="checkbox" name="listaIncluiPasta[]" value="'.$resultados[$i].'">'.$txIncluirNaPasta;
   }

   //Tabela com as opcoes dos registros
   $col1 = array($checkboxDetalhe.$txDetalhar);
   $col2 = array($texto2."&nbsp;".$texto1);
   $linTabela = 1;
   $colTabela = 2;
   $cfgTabela = "width=\"80%\" align=\"center\" class=\"BuscaTxt\"";
   $dadosTabela = array($col1, $col2);
   $cfgCelulas = array(array("width=\"50%\" valign=\"bottom\" align=\"left\"","valign=\"bottom\" align=\"right\""));
   $tabelaOpcoes = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //Tabela com os dados
   //Coluna formada pelos dados, opcoes e botao de formulario
   $col1 = array($tabelasDados[$i-$idxInicio],$tabelaOpcoes,"&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"processar\" type=\"submit\" value=\"".$txProcessar."\" class=\"botao\">");
   $linTabela = 3;
   $colTabela = 1;
   $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
   $dadosTabela = array($col1);
   $cfgCelulas = array(array("valign=\"top\" align=\"left\" class=\"BuscaTxt\""));
   $tabelaRegistro = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

   //-- Impressao de cada registro--

   $saida .= "$tabelaRegistro";
   $saida .= "<br><br>\n";

  }
  
  // -- Rodape --
  //Define a tabela de rodape, com alguns dados do cabecalho
  $linTabela = 3;
  $colTabela = 1;
  $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
  $col1 = array($txtResultados,$linkPaginas,"P&aacute;ginas:");
  $dadosTabela = array($col1);
  $cfgCelulas = array(array("align=\"right\""),array("align=\"center\""),array("align=\"center\""));
  $tabelaRodape = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Finaliza o formulario
  $saida .= "</form>\n";
  //Rodape
  $saida .= "$tabelaRodape";
 }
 return $saida;             //retorna a string com a exibicao dos resultados
}
?>
