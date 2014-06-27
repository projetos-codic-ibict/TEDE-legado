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
  require('./biblioteca/elementosPagina.inc');       // Funcoes para construcao da pagina
  require('./biblioteca/montaPagina.inc');           // Funcao para montar pagina pelo modelo
  
  // -- SESSAO --
  
  session_start();                      // Inicia sessao para variaveis registradas

  // -- VARIAVEIS SESSAO --

  //Pasta de Trabalhos
  if (!session_is_registered('pasta'))
  {
    session_register('pasta');          //Inicia pasta vazia
    $pasta = array();
  }

  //Tipo de pesquisa
  if (!session_is_registered('tipoPesquisa'))
  {
   session_register('tipoPesquisa');    //Inicia como Pesquisa Simples = 0 / Avancado = 1
   $tipoPesquisa = 0;
  }

  //Recupera valor passado via parametros
  if (in_array("tipoPesquisa",array_keys($HTTP_GET_VARS)))
  {
   $tipoPesquisa = $HTTP_GET_VARS["tipoPesquisa"];
  }

  // -- Construcao --
  if ($tipoPesquisa == 1)
  {
    require('./biblioteca/pesquisaAvancada.inc');          //Funcao para formulario pesquisa avancada

    $titulo = $txPesquisaAvancada;

    //Parametro formulario avancado, valores iniciais
    $paramForm = array();

    array_push($paramForm, '', 'AUTOR', 'NA', '', 'TITULO', 'NA', '', 'CONTRIBUIDOR', 'NA', '', 'ASSUNTO');
    array_push($paramForm, 'QQR', 'QQR');
    array_push($paramForm, '', '');
    array_push($paramForm, 5);

    //Preeche pagina com formulario de pesquisa avancada
    $pagina .= gera_pesquisa_avanc($paramForm, 4, "index.php");
  }
  else
  {
    require('./biblioteca/pesquisaSimples.inc');   //Funcao para formulario pesquisa simples
    require('./biblioteca/ultFutTrabalhos.inc');  //Funcao para exibicao dos ultimos e futuros trabalhos

    $titulo = 'Pesquisa Simples';

    //Param formulario simples, valores iniciais
    $paramForm = array();
    array_push($paramForm, '', 5);

    //Preenche pagina com formulario de pesquisa simples
    $pagina .= gera_pesquisa_simples($paramForm, "index.php");

    //Tabela com ultimos e futuros trabalhos
    $linTabela = 1;
    $colTabela = 2;
    $col1 = array(gera_ult_trabalhos(5));
    $col2 = array(gera_fut_trabalhos(5));
    $cfgTabela = "width=\"80%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" class=\"loginTable\"";
    $cfgCelulas = array(array("width=\"50%\" align=\"center\" valign=\"top\"","align=\"center\" valign=\"top\""));
    $dadosTabela = array($col1,$col2);
    $tabelaUltFutTrabalhos = gera_tabela($linTabela, $colTabela, $cfgTabela, $cfgCelulas, $dadosTabela);

    //Preenche pagina com os ultimos e futuros trabalhos
    $pagina .= $tabelaUltFutTrabalhos;
  }

  //Processa pagina
  //ob_start("monta");
  //echo monta_pagina($titulo, $pagina);     //Adapta pagina ao modelo
  //$pagina = ob_get_contents();
  //ob_end_clean();
  eval(' ?>'.$pagina.'<?php ');            //Avalia pagina
  
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
