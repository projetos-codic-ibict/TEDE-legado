<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/tde_busca.dwt" codeOutsideHTMLIsLocked="false" -->
<?
require "../bibliotecas/diretorio_layout.inc";
require "../bibliotecas/urlibictbdtd.bib";
require "../bibliotecas/idioma_sistema.bib";
require "../bibliotecas/logos.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
?>
<head> 
<!-- InstanceBeginEditable name="doctitle" -->
<title>TEDE | Layout P&aacute;gina 1 - Inicio da Se&ccedil;&atilde;o</title>
<!-- InstanceEndEditable --> 
<link href="<? echo $diretorio_layout; ?>estilos/estilo_geral.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_validacao.css" rel="stylesheet" type="text/css">
<link href="<? echo $diretorio_layout; ?>estilos/estilo_busca.css" rel="stylesheet" type="text/css">
<script language="JavaScript1.2" type="text/javascript" src="<? echo $diretorio_layout; ?>scripts/menu.js"></script>
<?
$script='<script language="JavaScript" src="../tde_i18n/mensagens_js_'.$idioma_sistema.'.js"></script>';
echo $script;
?>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<meta name="Pragma" content="no-cache">
<meta name="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width="100%" height="100%"  border="0" align="left" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="78" align="left" valign="top"><table width="100%" height="87"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="139" height="87" align="center" valign="top"><table width="100%" height="78"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="60" align="center" valign="middle" bgcolor="#FFFFFF"><a href="<? echo $link; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_inst.jpg" alt="<? echo $texto; ?>" name="logoInst" width="139" height="60" hspace="0" vspace="0" border="0" id="logoInst"></a></td>
              </tr>
              <tr> 
                <td width="138" height="17" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/subMenuarr.gif" width="139" height="20" hspace="0" vspace="0" border="0"></td>
              </tr>
            </table></td>
          <td width="31" height="87" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="menuBusca"><img src="<? echo $diretorio_layout; ?>imagens/menuSep_busca.gif" name="menuSep" width="62" height="68" hspace="0" vspace="0" border="0" id="menuSep"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table></td>
          <td width="100%" align="left" valign="top"><table width="100%" height="68"  border="0" align="left" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="44" align="left" valign="top"><table width="100%"  border="0" align="left" cellpadding="0" cellspacing="0" class="tituloSistemaInterno">
                    <tr> 
                      <td align="center" valign="middle"> 
                        <? echo $txSPETD_T; ?>
                        <span class="tituloPos"> | 
                        <? echo $txBusca_T; ?>
                        |</span></td>
                      <td width="25" height="44" align="left" valign="top" class="menuBusca"><img src="<? echo $diretorio_layout; ?>imagens/titleSep.gif" width="25" height="44" hspace="0" vspace="0" border="0"></td>
                    </tr>
                  </table></td>
              </tr>
              <tr> 
                <td height="37" align="center" valign="top"><table width="100%" height="24" border="0" align="left" cellpadding="0" cellspacing="0" class="menuBusca">
                    <tr> 
                      <td height="15" align="center" valign="middle">| <a href="javascript:changeMenu(0,'../');" target="_self" class="menu" onMouseOver="javascript:overMenu(0,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        <? echo $txInicio_T; ?> </a> | <a href="javascript:changeMenu(1,'../');" class="menu" onMouseOver="javascript:overMenu(1,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        <? echo $txBusca_T; ?> </a> | <a href="javascript:changeMenu(2,'../');" class="menu" onMouseOver="javascript:overMenu(2,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        </a><a href="javascript:changeMenu(4,'../');" class="menu" onMouseOver="javascript:overMenu(4,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        <? echo $txBiblioteca_T; ?> </a> | <a href="javascript:changeMenu(5,'../');" class="menu" onMouseOver="javascript:overMenu(5,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        <? echo $txAdministracao_T; ?> </a> | <a href="javascript:changeMenu(6,'../');" class="menu" onMouseOver="javascript:overMenu(6,'../');" onMouseOut="javascript:overMenu(1,'../');"> 
                        <? echo $txContato_T; ?> </a> |</td>
                    </tr>
                    <tr> 
                      <td height="9" align="left" valign="top"><img src="<? echo $diretorio_layout; ?>imagens/menuTile_busca.gif" name="menuBar" width="100%" height="9" hspace="0" vspace="0" border="0" id="menuBar"></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="100%" align="left" valign="top"><!-- InstanceBeginEditable name="Conteudo da Pagina" -->
	<?

 //Arquivos complementares
  require('./biblioteca/elementosPagina.inc');
  require('./biblioteca/mostraResultados.inc');
  require('./biblioteca/montaPagina.inc');
  require('./biblioteca/ppFuncoesPesquisa.inc');

  //Variaveis globais
  global $conect_AND;
  global $conect_OR;
  global $conect_NOT;
  global $conectores;


  // -- SESSAO --
  session_start();

  if (!session_is_registered('paramPesquisa')) //Parametros para pesquisa
  {
   session_register('paramPesquisa');
   $paramPesquisa = array
   (
     "resultado" => array(),           //IDs com resultado da pesquisa
     "campo" => array(),               //Campos de pesquisa
     "palavra" => array(),             //Elementos das expressoes menos conectivos
     "query" => array(),               //Query da pesquisa
     "pesqExecutada" => 0,             //Verifica se a pesquisa ja foi realizada
     "qtdRegPagina" => 5,              //Quantidade de teses por pagina
     "nrPagina" => 1,                  //Numero da pagina
     "nrExpressoes" => 1,              //Numero de expressoes de pesquisa
     "paramFormulario" => array()      //Parametros com valores para formulario
   );
  }

  //Recupera velores passados por parametros
  $id = $HTTP_GET_VARS['id'];                           //ID para apresentacao de tese individual
  $texto = $HTTP_GET_VARS['texto'];                     //Array com textos das expressoes
  $campo = $HTTP_GET_VARS['campo'];                     //Array com campos das expressoes
  $conectivo = $HTTP_GET_VARS['conectivo'];             //Array com conectivos das expresoes
  $grau = $HTTP_GET_VARS['grau'];                       //Filtro de grau para pesquisa
  $idioma = $HTTP_GET_VARS['idioma'];                   //Filtro de idioma para pesquisa
  $dataInicDefesa = $HTTP_GET_VARS['dataInicDefesa'];   //Filtro para data inicial da defesa
  $dataFimDefesa = $HTTP_GET_VARS['dataFimDefesa'];     //Filtro para data final da defesa
  $nrExpressoes = $HTTP_GET_VARS['nrExpressoes'];       //Quantidade de expressoes da pesquisa
  $listaDetalhes = $HTTP_GET_VARS['listaDetalhes'];     //Lista de registros para serem detalhados
  $listaIncluiPasta = $HTTP_GET_VARS['listaIncluiPasta'];//Lista de registros a incluir na pasta de trabalhos
  $listaApagaPasta = $HTTP_GET_VARS['listaApagaPasta']; //Lista de registros a remover da pasta de trabalhos

  //Pesquisa executada
  if (in_array("pesqExecutada",array_keys($HTTP_GET_VARS)))
  {
   $paramPesquisa["pesqExecutada"] = $HTTP_GET_VARS["pesqExecutada"];
  }
  //Quantidade de registros po pagina
  if (in_array("qtdRegPagina",array_keys($HTTP_GET_VARS)))
  {
   $paramPesquisa["qtdRegPagina"] = $HTTP_GET_VARS["qtdRegPagina"];
  }
  //Numero da pagina
  if (in_array("nrPagina",array_keys($HTTP_GET_VARS)))
  {
   $paramPesquisa["nrPagina"] = $HTTP_GET_VARS["nrPagina"];
  }
  //Numero de expressoes
  if (in_array("nrExpressoes",array_keys($HTTP_GET_VARS)))
  {
   $paramPesquisa["nrExpressoes"] = $HTTP_GET_VARS["nrExpressoes"];
  }

  // -- Inicia a pesquisa --
  
  //Pesquisa nao realizada. Inicia
  if ($paramPesquisa["pesqExecutada"]==0)
  {
   //Gera a lista de conectores validos para as expressoes
   $conect_AND = array("and","AND", "&");
   $conect_OR = array("or","OR", "+");
   $conect_NOT = array("not","NOT", "!");
   $conectores = array_merge($conect_AND, $conect_OR, $conect_NOT);

   //Inicia parametros para formulario de pesquisa
   $paramPesquisa["paramFormulario"] = array();

   //Pesquisa avancada
   if ($tipoPesquisa==1)
   {
    //Elimina barras do texto adquirido via formulario
    for ($i=0;$i<$paramPesquisa["nrExpressoes"];$i++)
    {
     $texto[$i] = stripslashes($texto[$i]);
    }
    //Preenche os parametros do formulario avancado
    array_push($paramPesquisa["paramFormulario"], $texto[0], $campo[0]); //1a expr. sem conectivo
    for ($i=1;$i<$paramPesquisa["nrExpressoes"];$i++)
    {
     array_push($paramPesquisa["paramFormulario"], $conectivo[$i], $texto[$i], $campo[$i]);
    }
    array_push($paramPesquisa["paramFormulario"], $grau, $idioma);
    array_push($paramPesquisa["paramFormulario"], $dataInicDefesa, $dataFimDefesa);
    array_push($paramPesquisa["paramFormulario"], $paramPesquisa["qtdRegPagina"]);

    //Gera filtro para complemento da query. Retorna $complementoQuerie
    require('./biblioteca/ppGeraComplemento.inc');
   }
   else  //Pesquisa simples
   {
    //Preenche os parametros do formulario simples
    $texto[0] = stripslashes($texto[0]);
    array_push($paramPesquisa["paramFormulario"], $texto[0], $paramPesquisa["qtdRegPagina"]);
    $complementoQuerie = '';  //Sem filtros
   }

   //Guarda os campos de pesquisa
   $paramPesquisa["campo"] = $campo;
   //Separa os elementos das expressoes

   //Separa palavras e sentencas entre aspas da expressao
   for ($i=0;$i<$paramPesquisa["nrExpressoes"];$i++)
   {
    if ($texto[$i] == "")                                //Sem expressao
    {
     $paramPesquisa["campo"][$i] = "NA";                 //Elimina campo
    }
    if (($campo[$i] != "NA")&&($conectivo[$i] != "NA"))  //Se campo e conectivo foram escolhidos
    {
     $citacao = '"[^"\r\n]+"';           // Match com a ocorrencia de uma citação - "aspas" "algo dentro sem aspas"+ e "aspas"
     $palavra = '[^\s]+';                // Match com qualquer coisa + que não tenha espaços (tabs, etc)
     $pattern = "/$citacao|$palavra/";   // Padrao igual a citacao ou palavra

     //Necessario remover os backslashes duplos
     preg_match_all($pattern,stripslashes($texto[$i]),$elementos);

     $elementos = str_replace('"','',$elementos[0]);  //Remove aspas das expressoes
     $expressao[$i] = $elementos;
    }
    else      //Se o campo estiver vazio, zera conectivo e texto
    {
     $paramPesquisa["campo"][$i] = "NA";
     $conectivo[$i] = "NA";
     $texto[$i] = "";
     $expressao[$i] = array();
    }
   }

   //Gera a query para realizar a pesquisa
   $query = gera_query($paramPesquisa["campo"], $expressao, $complementoQuerie, $paramPesquisa["nrExpressoes"]);
   //Executa a pesquisa e guarda os IDs dos resultados
   $paramPesquisa["resultado"] = exec_pesquisa($paramPesquisa["campo"], $conectivo, $paramPesquisa["nrExpressoes"], $query);
   //Guarda a query e os conectivos para apresentacao
   $paramPesquisa["query"] = array(array_merge(array(" "),$conectivo),$query);
   //Separa os elementos das expressoes para apresentacao, eliminando conectores
   $paramPesquisa["palavra"] = elimina_conectores($expressao);
   //Sinaliza que a pesquisa ja foi realizada
   $paramPesquisa["pesqExecutada"]=1;
  }
  else //Pesquisa ja realizada. Somente reapresentacao dos dados
  {
   if ($id<>"")   //Fornecido ID da tese a ser apresentada
   {
    $paramPesquisa["query"] = array();         //Zera a query de apresentacao
    $paramPesquisa["resultado"] = array($id);  //Resultado de 1 trabalho
    $paramPesquisa["nrPagina"] = 1;            //Primeira pagina
    $paramPesquisa["campo"] = array();         //Sem campos de pesquisa
    $paramPesquisa["paramFormulario"] = array("",$paramPesquisa["qtdRegPagina"]); //Zera
    $expressao = array();                      //Sem expressao de pesquisa
   }
  }

  //Processa as listas de registros para colocar em detalhes ou na pasta de trabalhos
  if (!is_array($listaDetalhes))                       //Verifica se lista existe
  {
   $listaDetalhes=array();                             //Inicia uma lista
  }

  if (session_is_registered('pasta'))                  //Verifica se a lista da pasta esta registrada
  {
   if (is_array($listaIncluiPasta))                    //Verifica se lista existe
   {
    $pasta = array_merge($pasta, $listaIncluiPasta);   //Inclui na pasta lista de pasta
    $pasta = array_values(array_unique($pasta));       //Unifica os registros das pastas
   }
   if (is_array($listaApagaPasta))                     //Verifica se lista existe
   {
    $pasta = array_values(array_diff($pasta, $listaApagaPasta)); //Remove da pasta registros da lista a apagar
   }
  }
  //Guarda a apresentacao dos resultados em string
  $registros = mostra_resultados($paramPesquisa["resultado"], $paramPesquisa["palavra"], $paramPesquisa["campo"], $paramPesquisa["qtdRegPagina"], $paramPesquisa["nrPagina"], $paramPesquisa["query"], $listaDetalhes, $pasta, "Pesquisa resultou em:", "processaPesquisa.php");

  //Insere o formulario avancado ou simples em funcao da escolha
  if ($tipoPesquisa==1)
  {
   require('./biblioteca/pesquisaAvancada.inc');
   $formPesquisa = gera_pesquisa_avanc($paramPesquisa["paramFormulario"], $paramPesquisa["nrExpressoes"], "processaPesquisa.php");
  }
  else
  {
   require('./biblioteca/pesquisaSimples.inc');
   $formPesquisa = gera_pesquisa_simples($paramPesquisa["paramFormulario"], "processaPesquisa.php");
  }

  //Monta conteudo da pagina
  $pagina = $registros.$formPesquisa;

  //Processa a pagina
  //ob_start("monta");
  //echo monta_pagina("Resultados", $pagina);
  //$pagina = ob_get_contents();
  //ob_end_clean();
  eval(' ?>'.$pagina.'<?php ');
?>

	<!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td height="50" align="left" valign="bottom"><table width="100%" height="50"  border="0" align="left" cellpadding="0" cellspacing="0">
        <tr align="right" valign="bottom"> 
          <td width="139" nowrap><table width="139" height="50"  border="0" align="right" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="139" height="33" align="right" valign="middle" class="versao"><br>
                  <? require "../bibliotecas/versao_sistema.bib"; echo $versao ?>
                  | <? echo $txCopyright; ?></td>
              </tr>
            </table></td>
          <td width="100%" valign="middle"><table width="100%" height="50"  border="0" align="right" cellpadding="0" cellspacing="0" class="bttmBar">
            <tr align="center" valign="middle">
              <td width="25%" align="center"><a href="<? echo $link2; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede1.gif" / alt="<? echo $texto2; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $link3; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/logo_tede2.gif" / alt="<? echo $texto3; ?>" height="33" border="0"></a></td>
              <td width="25%" align="center"><a href="<? echo $url_bdtd; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/teses_logo_tede.jpg" alt="<? echo $url_bdtd; ?>" name="bdtdLogo" border="0" id="bdtdLogo"></a></td>
              <td width="25%" align="center" valign="middle"><a href="<? echo $url_ibict; ?>" target="_blank" class="menu"><img src="<? echo $diretorio_layout; ?>imagens/ibict_logo_tede.jpg" alt="<? echo $url_ibict; ?>" name="ibictLogo" border="0" id="ibictLogo"></a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
