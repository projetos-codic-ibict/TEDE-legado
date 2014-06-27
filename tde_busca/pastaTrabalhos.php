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

  // -- SESSAO --
  session_start();

  //Array que guarda os IDs dos registros inclusos na pasta de trabalhos
  if (!session_is_registered('pasta'))
  {
   session_register('pasta');
   $pasta = array();         //Inicia caso nao existisse
  }

  //Parametros para exibicao da pasta
  if (!session_is_registered('paramPasta'))
  {
   session_register('paramPasta');
   $paramPasta = array
   (
    "retorno" => "processaPesquisa.php",
    "qtdRegPagina" => 5,
    "nrPagina" => 1
   );
  }

  //Recupera variaveis passadas por parametros

  $listaDetalhes = $HTTP_GET_VARS['listaDetalhes'];        //Lista com os IDs dos registros a serem exibidos detalhadamente
  $listaIncluiPasta = $HTTP_GET_VARS['listaIncluiPasta'];  //Lista com IDs para serem inseridos na pasta
  $reset = $HTTP_GET_VARS['reset'];                        //Comando de limpar a pasta

  //Script de retorno. Link para opcao de retorno
  if (in_array("retorno",array_keys($HTTP_GET_VARS)))
  {
   $paramPasta["retorno"] = $HTTP_GET_VARS["retorno"];
  }
  //Quantidade de registros por pagina.
  if (in_array("qtdRegPagina",array_keys($HTTP_GET_VARS)))
  {
   $paramPasta["qtdRegPagina"] = $HTTP_GET_VARS["qtdRegPagina"];
  }
  //Numero da pagina
  if (in_array("nrPagina",array_keys($HTTP_GET_VARS)))
  {
   $paramPasta["nrPagina"] = $HTTP_GET_VARS["nrPagina"];
  }

  // -- Geracao de tabelas --
  
  //Titulo
  $lin = 1;
  $col = 1;
  $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
  $col1 = array("Pasta de Trabalhos");
  $dadosTabela = array($col1);
  $cfgCelulas = array(array("class =\"loginBusca\" align=\"center\""));
  $tabelaCabecalho = gera_tabela($lin, $col, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Opcoes
  $lin = 1;
  $col = 5;
  $cfgTabela = "width=\"80%\" align=\"center\" class=\"loginTable\"";
  //Link para apagar a pasta de trabalhos
  $col1 = array(gera_link("pastaTrabalhos.php?reset=1", $txApagarPasta));
  //Link para retornar para a pagina anterior
  $col2 = array(gera_link($paramPasta["retorno"], "&raquo; ".$txVoltar));
  //Link para a pagina de pesquisa
  $col3 = array(gera_link("index.php", $txBuscar." &raquo;"));
  //Link para script que gera um email com o conteudo da pasta de trabalhos
  $col4 = array(gera_link("geraEmail.php", $txEnviarPorEmail." &raquo;"));
  $col5 = array(gera_link("../tde_ajuda/ajuda.php", $txAjuda."<img src=\"../tde_layout1/imagens/ajuda.gif\" hspace=\"3\" border=\"0\" align=\"top\">"));
  $dadosTabela = array($col1,$col2,$col3,$col4,$col5);
  $cfgCelulas = array(array("width=\"25%\" align=\"center\" valign=\"top\" class=\"linkpreto\""));
  $tabelaLinks = gera_tabela($lin, $col, $cfgTabela, $cfgCelulas, $dadosTabela);

  //Caso a lista esteja de detalhes nao eh array
  if (!is_array($listaDetalhes))
  {
   $listaDetalhes=array(); //cria uma vazia
  }

  if (is_array($listaIncluiPasta))    //Verifica se lista existe
  {
    $pasta = array_merge($pasta, $listaIncluiPasta);      //Inclui na pasta a lista de inclusao
    $pasta = array_values(array_unique($pasta));          //Retira os IDs duplicados
  }
  if (is_array($listaApagaPasta))                         //Verifica se lista existe
  {
   $pasta = array_values(array_diff($pasta, $listaApagaPasta));  //Remove da pasta os IDs que estao na lista de remocao
  }

  //Limpa a pasta caso reset esteja sinalizado
  if ($reset)
  {
    $pasta = array();
  }

  //Recebe a exibicao dos registros
  $resultados = mostra_resultados($pasta, array(), array(), $paramPasta["qtdRegPagina"], $paramPasta["nrPagina"], array(), $listaDetalhes, $pasta, "Pasta:", "pastaTrabalhos.php");

  //Monta a pagina
  $pagina =  "$tabelaCabecalho <br />";
  $pagina .= "$tabelaLinks <br />";
  $pagina .= "$resultados";

  //Processa a pagina
  //ob_start("monta");
  //echo monta_pagina("Pasta de Trabalhos", $pagina);
  //$pagina = ob_get_contents();
  //ob_end_clean();
  eval(' ?>'.$pagina.'<?php ');
  echo "<br><br>";
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
