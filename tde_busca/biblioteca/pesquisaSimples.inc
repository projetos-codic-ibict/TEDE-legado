<?
//Funcao para gerar formulario de pesquisa simples em forma de string
//parametro - Valores dos campos de pesquisa
//retorno - Arquivo de retorno para link de pasta de trabalhos
function gera_pesquisa_simples($parametro,$retorno)
{
require "../bibliotecas/idioma_sistema.bib";
require "../tde_i18n/texto_".$idioma_sistema.".txt";
  $saida = "<form action=\"processaPesquisa.php\" method=\"GET\">\n";

  //Parametros para script destino
  $saida .= "<input type=\"hidden\" name=\"nrPagina\" value=\"1\">\n";
  $saida .= "<input type=\"hidden\" name=\"pesqExecutada\" value=\"0\">\n";
  $saida .= "<input type=\"hidden\" name=\"nrExpressoes\" value=\"1\">\n";
  $saida .= "<input type=\"hidden\" name=\"campo[0]\" value=\"TODOS\">\n";

  //Constroi o formulario
  $saida .= "<table width=\"80%\" border=\"0\" align=\"center\" class=\"loginTable\">\n";
  $saida .= "  <tr>\n";
  $saida .= "    <th height=\"28\" colspan=\"2\" align=\"left\" valign=\"top\" class=\"loginBusca\">".$txBibDigitalTesesDiss."</th>\n";
  $saida .= "    <td></td>\n";
  $saida .= "  </tr>\n";
  $saida .= "  <tr>\n";
  $saida .= "    <td width=\"80%\" align=\"center\" valign=\"top\">\n";
  $saida .= "      <table width=\"100%\" border=\"0\" align=\"left\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#E9E9E9\" class=\"loginTable\">\n";
  $saida .= "        <tr class=\"botaoTD\">\n";
  $saida .= "          <td width=\"69\" align=\"center\" class=\"tituloBusca\">".$txBusca." </td>\n";
  $saida .= "          <td width=\"310\" align=\"center\" class=\"tituloBusca\"><input type=\"text\" name=\"texto[0]\" value='$parametro[0]' size=50 class=\"inputBusca\"></td>\n";
  $saida .= "          <td width=\"60\" align=\"center\" class=\"tituloBusca\"><input name=\"Submit\" type=\"submit\" class=\"botao\" value=\"".$txBuscar." &raquo;\"></td>\n";
  $saida .= "          <td align=\"center\" class=\"tituloBusca\">&nbsp;</td>\n";
  $saida .= "        </tr>\n";
  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "    <td align=\"left\" valign=\"top\">\n";
  $saida .= "      <table width=\"100%\" border=\"0\" align=\"left\" cellpadding=\"3\" cellspacing=\"0\" class=\"loginTable\">\n";
  $saida .= "        <tr>\n";
  $saida .= "          <td align=\"left\" valign=\"center\" class=\"linkpreto\">\n";
  //Link para troca para pesquisa Avancada
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"index.php?tipoPesquisa=1\">".$txPesquisaAvancada." &raquo;</a><br />\n";
  //Link para Pasta de Trabalhos
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"pastaTrabalhos.php?retorno=$retorno\">".$txPastaDeTrabalho." &raquo;</a>\n";
   //Link para o Relatório de programas
  $saida .= "            <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"><a href=\"tdes-programas.php\" target=\"_blank\" class=\"link\">".$txRelatorioProgramas." &raquo;</a><br>\n";
  $saida .= "           <img src=\"../tde_layout1/imagens/arrow.gif\" hspace=\"3\" border=\"0\"> <a href=\"../tde_ajuda/ajuda.php\" class=\"link\" target=\"_blank\">".$txAjuda." <img src=\"../tde_layout1/imagens/ajuda.gif\" hspace=\"3\" border=\"0\" align=\"top\"></a>\n";
  $saida .= "          </td>\n";
  $saida .= "        </tr>\n";
  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "  </tr>\n";
  $saida .= "  <tr>\n";
  $saida .= "    <td></td>\n";
  $saida .= "    <td>\n";
  $saida .= "      <table border=\"0\" align=\"right\" cellpadding=\"3\" cellspacing=\"0\" class=\"loginTable\">\n";
  $saida .= "        <tr>\n";
  $saida .= "          <td width=\"150\" align=\"right\" class=\"tituloBusca\">".$txRegistrosPorPagina."</td>\n";
  $saida .= "          <td>\n";
  $saida .= "            <select name=\"qtdRegPagina\" size=\"1\" class=\"selectBusca\">\n";

  //Constroi opcoes de quantidade de registros por pagina
  $qtdRegPagina = array(1,2,5,10,15,20);         //Opcoes
  for ($i=0;$i<6;$i++)                           //Processa cada opcao
  {
    if ($parametro[1] == $qtdRegPagina[$i])      //Verifica se a opcao esta selecionada
    {
      $extra = "selected";                       //Seleciona a opcao
    }
    else
    {
      $extra = "";
    }
    //Constroi as selecoes;
    $saida .= "            <option value=\"$qtdRegPagina[$i]\" $extra>$qtdRegPagina[$i]</option>\n";
  }

  //Continua o formulario
  $saida .= "            </select>\n";
  $saida .= "          </td>\n";
  $saida .= "        </tr>\n";
  $saida .= "      </table>\n";
  $saida .= "    </td>\n";
  $saida .= "  </tr>\n";
  $saida .= "</table>\n";
  $saida .= "</form>\n";

  return $saida;             //Retorna string com o formulario
}
?>
