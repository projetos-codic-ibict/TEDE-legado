<?
//Funcao para gerar formulario de pesquisa avancada em forma de string
//parametro - Valores dos campos de pesquisa
//qtd - Quantidade de campos
//retorno - Arquivo de retorno para link de pasta de trabalhos
function gera_pesquisa_avanc($parametro, $qtdCampos, $retorno)
{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";

  $saida = "<form action=\"processaPesquisa.php\" method=\"GET\">\n";

  //Parametros para script destino
  $saida .= "<input type=\"hidden\" name=\"nrPagina\" value=\"1\">\n";
  $saida .= "<input type=\"hidden\" name=\"pesqExecutada\" value=\"0\">\n";
  $saida .= "<input type=\"hidden\" name=\"nrExpressoes\" value=\"$qtdCampos\">\n";

  //Constroi o formulario
  $saida .= "<table width=\"80%\" border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"3\" class=\"loginTable\">\n";
  $saida .= "  <tr>\n";
  $saida .= "    <th width=\"75%\" height=\"28\" colspan=\"2\" align=\"left\" valign=\"top\" class=\"loginBusca\">".$txBibDigitalTesesDiss."</th>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "  </tr>\n";
  $saida .= "  <tr>\n";
  $saida .= "    <th width=\"75%\" height=\"28\" colspan=\"2\" align=\"left\" valign=\"tituloBusca\">".$txBuscarPor."</th>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "  </tr>\n";
  $saida .= "  <tr>\n";
  $saida .= "    <td width=\"75%\" colspan=\"2\" align=\"center\" valign=\"top\">\n";
  $saida .= "      <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#E9E9E9\" class=\"loginTable\">\n";

  $contParametros = 0;
  //Processa cada campo
  for ($i=0;$i<$qtdCampos;$i++)
  {
    if ($i==0) //Primeiro campo. Sem conectivo
    {
      $saida .= "        <tr>\n";
    }
    else
    {
      $saida .= "        <tr>\n";
    }

    if ($i>0) //Campos seguintes
    {
      $saida .= "          <td width=\"40\" align=\"center\" class=\"subtitulo\">\n";
      $saida .= "          <select name=\"conectivo[$i]\" size=\"1\" class=\"selectBusca\">\n";

      //Conectivos de pesquisa
      $conectivo = array('NA', 'AND', 'OR', 'NOT');
      $legendaConectivo = array('---', 'AND', 'OR', 'NOT');
      for ($j=0;$j<4;$j++)
      {
        if ($parametro[$contParametros] == $conectivo[$j])
        {
          $extra = 'selected';
        }
        else
        {
          $extra = '';
        }
        //Constroi opcoes de conectivos
        $saida .= "            <option value=\"$conectivo[$j]\" $extra>$legendaConectivo[$j]</option>\n";
      }
      $contParametros++;
      $saida .= "          </select>\n";
      $saida .= "          </td>\n";
    }
    else
    {
      $saida .= "          <td width=\"40\" align=\"center\" class=\"subtitulo\">&nbsp;</td>\n";
    }

    $saida .= "          <td width=\"45\" align=\"center\" class=\"subtitulo\"><input type=\"text\" name=\"texto[$i]\" value='$parametro[$contParametros]' size=45 class=\"inputBusca\"></td>\n";
    $saida .= "          <td align=\"left\" >\n";
    $contParametros++;

    //Campos de Pesquisa
    $campo = array('NA', 'AUTOR', 'TITULO', 'CONTRIBUIDOR', 'ASSUNTO', 'RESUMO', 'TODOS');
    $legendaCampo = array('-----------', $txAutor, $txTitulo, $txContribuidor, $txAssunto, $txResumo, $txTodosCampos);
    $saida .= "          <select name=\"campo[$i]\" size=\"1\" class=\"selectBusca\">\n";

    for ($j=0;$j<7;$j++)
    {
      if ($parametro[$contParametros] == $campo[$j])
      {
        $extra = 'selected';
      }
      else
      {
        $extra = '';
      }
      $saida .= "            <option value=\"$campo[$j]\" $extra>$legendaCampo[$j]</option>\n";
    }
    $saida .= "          </select>\n";
    $contParametros++;

    $saida .= "          </td>\n";
    $saida .= "        </tr>\n";
  }

  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "    <td align=\"left\" valign=\"top\">\n";
  $saida .= "      <table width=\"100%\" border=\"0\" align=\"left\" cellpadding=\"3\" cellspacing=\"0\" class=\"loginTable\">\n";
  $saida .= "        <tr>\n";
  $saida .= "          <td align=\"left\" valign=\"center\" class=\"linkpreto\">\n";
  //Link para troca para pesquisa simples
  $saida .= "           <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"index.php?tipoPesquisa=0\" class=\"linkpreto\">".$txPesquisaSimples." &raquo;</a><br />\n";
  //Link para Pasta de Trabalhos
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"pastaTrabalhos.php?retorno=$retorno\" class=\"link\">".$txPastaDeTrabalho." &raquo;</a>\n";
  //Link para o Relatório de programas
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"tdes-programas.php\" target=\"_blank\" class=\"link\">".$txRelatorioProgramas." &raquo;</a><br>\n";
  //Link para Ajuda
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"../tde_ajuda/ajuda.php\" class=\"link\" target=\"_blank\">".$txAjuda." <img src=\"../tde_layout1/imagens/ajuda.gif\" hspace=\"3\" border=\"0\" align=\"top\"></a>\n";
  $saida .= "          </td>\n";
  $saida .= "        </tr>\n";
  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "  </tr>\n";

  //Construcao filtros
  $saida .= "  <tr>\n";
  $saida .= "    <th width=\"75%\" height=\"28\" colspan=\"2\" align=\"left\" valign=\"top\">".$txFiltros."</th>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "  </tr>\n";

  //Grau do trabalho
  $saida .= "  <tr>\n";
  $saida .= "    <td width=\"80%\" colspan=\"2\">\n";
  $saida .= "      <table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#E9E9E9\" class=\"loginTable\">\n";
  $saida .= "      <tr>\n";
  $saida .= "        <td width=\"35%\" align=\"left\" class=\"tag\">".$txGrau."</td>\n";
  $saida .= "        <td align=\"left\" class=\"tag\">\n";
  $saida .= "          <select name=\"grau\" size=\"1\" class=\"selectBusca\">\n";

  //opcoes de grau
  $grau = array('Mestre', 'Doutor', 'OUTROS', 'QQR');
  $legendaGrau = array($txMestrado, $txDoutorado, $txOutros, $txTodos);

  for ($j=0;$j<4;$j++)
  {
    if ($parametro[$contParametros] == $grau[$j])
    {
      $extra = 'selected';
    }
    else
    {
      $extra = '';
    }
    $saida .= "          <option value=\"$grau[$j]\" $extra>$legendaGrau[$j]</option>\n";
  }
  $contParametros++;

  $saida .= "          </select>\n";
  $saida .= "        </td>\n";
  $saida .= "      </tr>\n";

  //Idioma do trabalho
  $saida .= "      <tr>\n";
  $saida .= "        <td width=\"35%\" align=\"left\" class=\"tag\">".$txIdioma."</td>\n";
  $saida .= "        <td algin=\"left\" class=\"tag\">\n";
  $saida .= "          <select name=\"idioma\" size=\"1\" class=\"selectBusca\">\n";

  //opcoes de idioma
  $idioma = array('pt', 'en', 'fr', 'de', 'es', 'QQR');
  $legendaIdioma = array($txPortugues, $txIngles, $txFrances, $txAlemao, $txEspanhol, $txTodos);

  for ($j=0;$j<6;$j++)
  {
    if ($parametro[$contParametros] == $idioma[$j])
    {
      $extra = 'selected';
    }
    else
    {
      $extra = '';
    }
    $saida .= "          <option value=\"$idioma[$j]\" $extra>$legendaIdioma[$j]</option>\n";
  }
  $contParametros++;

  $saida .= "          </select>\n";
  $saida .= "        </td>\n";
  $saida .= "      </tr>\n";

  //Datas do trabalho

  //Array de datas (somente 1 - definido no IBICT)
  $legendaDatas = array($txDataDaDefesa);
  $datasInicParam = array('dataInicDefesa');
  $datasFimParam = array('dataFimDefesa');

  for ($j=0;$j<1;$j++)
  {
    $saida .= "      <tr>\n";
    $saida .= "        <td width=\"35%\" align=\"left\" class=\"tag\">$legendaDatas[$j]</td>\n";
    $saida .= "        <td align=\"left\" class=\"tag\">".$txDesde."&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"$datasInicParam[$j]\" value=\"$parametro[$contParametros]\" size=10 class=\"inputBusca\">";
    $contParametros++;
    $saida .= "        ".$txAte."&nbsp;&nbsp;<input type=\"text\" name=\"$datasFimParam[$j]\" value=\"$parametro[$contParametros]\" size=10 class=\"inputBusca\"></td>\n";
    $contParametros++;
    $saida .= "      </tr>\n";
  }

  //Quantidades de registros por pagina
  $saida .= "      <tr>\n";
  $saida .= "        <td width=\"35%\" align=\"left\" class=\"tag\">".$txRegistrosPorPagina."</td>\n";
  $saida .= "        <td class=\"tag\">\n";
  $saida .= "            <select name=\"qtdRegPagina\" size=\"1\" class=\"selectBusca\">\n";

  //Opcoes
  $qtdRegPagina = array(1,2,5,10,15,20);
  for ($j=0;$j<6;$j++)
  {
    if ($parametro[$contParametros] == $qtdRegPagina[$j])
    {
      $extra = "selected";
    }
    else
    {
      $extra = "";
    }
    $saida .= "            <option value=\"$qtdRegPagina[$j]\" $extra>$qtdRegPagina[$j]</option>\n";
  }
  
  //Continua o formulario
  $saida .= "            </select>\n";
  $saida .= "        </td>\n";
  $saida .= "      </tr>\n";
  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "  </tr>\n";
  $saida .= "  <tr>\n";
  $saida .= "    <td width=\"75%\" align=\"center\" class=\"tag\"><font size=\"2\"><input name=\"Submit\" type=\"submit\" class=\"botao\" value=\"".$txBuscar."\">&nbsp;&nbsp;&nbsp;<input name=\"Reset\" type=\"reset\" class=\"botao\" value=\"".$txRetornarValores."\"></font></td>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "    <td>&nbsp;</td>\n";
  $saida .= "  </tr>\n";
  $saida .= "</table>\n";
  $saida .= "</form>\n";

  return $saida;        //Retorna string com o formulario
}
?>
