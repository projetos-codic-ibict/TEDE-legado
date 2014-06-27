<?php
//
// +----------------------------------------------------------------------+
// | PHP Version 4                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2002 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.02 of the PHP license,      |
// | that is bundled with this package in the file LICENSE, and is        |
// | available at through the world-wide-web at                           |
// | http://www.php.net/license/2_02.txt.                                 |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Gabriel Franklin Araújo Mathias <gabrielmathias@ibict.br>    |
// +----------------------------------------------------------------------+
//
// $Id: IBICT.php,v 1.1 2003/09/13 07:37:25 ssb Exp $
// $str =~ s/([\x80-\xFF])/chr(0xC0|ord($1)>>6).chr(0x80|ord($1)&0x3F)/goe;
/**
 * IBICT's TEDE_MTDBR:: Interface
 *
 * @access public
 * @version $Revision: 2.0 $
 * @package mtdbr
 *
 * Estrutura geral deste pacote : (* este desenho não é UML)
 *
 * +----------+         +--------------+         +-------------+
 * | TAGXML   | <------ |  TEDE_MTDBR  | <------ |  OAI_MTDBR  |  <---- OAI-PMH
 * +----------+         +--------------+         +-------------+
 * 
 * Responsabilidades:
 * - TAGXML     : funcionalidade de contrução de XML
 * - TEDE_MTDBR : "montar" registros MTD-BR a partir da estrutura relacional do TEDE em banco de dados
 * - OAI_MTDBR  : interface para recepção e associação dos verbos e parametros passados via OAI-PMH
 *                para a classe de montagem de registros MTD-BR.
 *
 * -------------------------------------------------------------------------------------------------------
 Historico:

 Versao 1.0.14:
  - Adicionada o error_reporting(0), troca do nivelDeAcesso de arquivo de "Retido" para "Restrito", MAX_IDS aumentado para 500 e MAX_RECORDS para 50.

 Versao 1.0.13:
  - Corrigida  a montagem do campo Programa  na versao mtd-br (IBICT.php) 

 Versao 1.0.12:
  - Corrigida  a variavel de versao

 Versao 1.0.11:
  - Corrigido a montagem de BibliotecaDepositaria

 Versao 1.0.9:
  - Corrigido a montagem de BibliotecaDepositaria
 
 Versao 1.0.8:
  - Correções menores no mtd2-br

 Versao 1.0.7:
  - Inserido o padrao de metadados OAI_DC (BUG #10)

 Versao 1.0.6:
  - Tratados o problema de Instituicao de defesa (multiinstitucional)
  - Aplicado o filtro Mestre/Doutor em tsGrau, para que apareca no protocolo
  somente registros destes tipos de documentos.

 Versão 1.0.5 : 
  - Publicado em 25-08-2005
  - modificada os requires das bibliotecas TEDE
  - Conserta a visualização da versão do sistema pelo verbo Identify
 Versão 1.0.4 : 
  - iniciada a documentação das classes do arquivo mtdbr.php
  - adicionado tratamento do mtd2-br
  - retiradas algumas funções de conversão de caracteres que não estavam sendo utilizadas
  - retiradas mensagens de debugação que eventualmente crasharam repositórios 
 
 */
//
//
global $versao_protocolo;
$versao_protocolo = "1.0.14 (2008-02-20)";

//
//

// {{{ Funcões Auxiliares

function toMysqlDate ($date)
{

  $a = explode ("/", $date);
  if (!is_array ($a)) {
    $a = explode ("-", $date);
  }
  if (count ($a) < 2) {
    return null;
  }
  if ($a[0] > 100) {
    $d = $a[0]."-".$a[1]."-".$a[2];
  }
  else {
    $d = $a[0]."-".$a[1]."-".$a[2];
  }
  return $d;
}

function unescape ($metadata)
{
  return $metadata;

  for ($i = 0; $i < strlen ($metadata); $i++) {
    $char = null;
    while ($metadata[$i] != '&' && $i < strlen ($metadata)) {
      $saida.= $metadata[$i];
      $i++;
    }
    while ($metadata[$i + 1] != ';' && $i < strlen ($metadata)) {
      $i++;
      $char.= $metadata[$i];
    }
    $i++;
    if ($char) {
      $antes = $char;
      $char = str_replace (";", "", $char);
      //$char = substr($char,1);
      if (ereg ('#', $char)) {
	$char = str_replace ("#", "", $char);
	if (ereg ('x', $char)) {
	  $char = hexdec ('0'.$char);
	}
	if ($char > 0x80) {
	  $c = u2utf8 (chr ($char));
	}
	else if ($char < 32) {
	  $c = "";
	}
	else {
	  $c = "&#".$char.";";
	}
      }
      else {
	if ('apos' == $char) {
	  $c = "'";
	}
	else {
	  $c = "&$char;";
	}
      }
      $saida.= $c;
      $char = null;
    }
  }	//For
  $saida.= $char;
  return $saida;
}

function u2utf8 ($c)
{
  $str = '';
  if ($c < 0x20) {
  }
  else if ($c < 0x80) {
    $str.= $c;
  }
  else if ($c < 0x800) {
    $str.= (0xC0 | $c >> 6);
    $str.= (0x80 | $c & 0x3F);
  }
  else if ($c < 0x10000) {
    $str.= (0xE0 | $c >> 12);
    $str.= (0x80 | $c >> 6 & 0x3F);
    $str.= (0x80 | $c & 0x3F);
  }
  else if ($c < 0x200000) {
    $str.= (0xF0 | $c >> 18);
    $str.= (0x80 | $c >> 12 & 0x3F);
    $str.= (0x80 | $c >> 6 & 0x3F);
    $str.= (0x80 | $c & 0x3F);
  }
  for ($i = 0; $i < strlen ($str); $i++) {
    $out.= "&#".ord ($str[$i]).";";
  }
  return $out;
}

// }}}

//
// A Classe TAGXML oferece os comandos básicos para a geração de XML´s bem formados
// e com prefixo de namespace
//

// {{{ class TAGXML

class TAGXML {
  /**
  * Provides an interface for generating TEDE_MTDBR:: objects 
  * @return object TEDE_MTDBR
   */
  var $_xml_prefix;

  // PUBLIC
  function setPrefix ($prefix = null) {
    $this->_xml_prefix = $prefix;
  }
  // PUBLIC 
  function getPrefix () {
    return $this->_xml_prefix;
  }

  //
  function toDateTime ($date) {
    return str_replace (' ', 'T', $date).'Z';
  }

  // PUBLIC
  function tag ($tag, $value, $atributos = null, $unescaped = false) {
    $tab = '';
    for ($k = 1; $k < $this->tabs; $k++)
      $tab.= "   ";
    $tab = null;
    if (is_array ($atributos)) {
      while (list ($at, $val) = each ($atributos)) {
	if ($val != null && $val != "") {
	  $atts.= " $at=\"$val\" ";
	}
      }
    }
    if ($this->_xml_prefix != null)
      $tag = $this->_xml_prefix.":".$tag;
    if ($unescaped) {
      return "<$tag$atts>".$value."</$tag>\n";
    }
    else {
      return "<$tag$atts>".unescape ($value)."</$tag>\n";
    }
  }

  function tag_facultativo ($tag, $value, $att = null) {
    if ($value != null && strlen ($value) > 0)
      return $this->tag ($tag, $value, $att);
    return null;
  }

  function tag_obrigatorio ($tag, $value, $att = null) {
    if (!$value) {
      $this->status = false;
      $this->erro ("Campo $tag obrigatório faltando");
      return null;
    }
    return $this->tag ($tag, $value, $att);
  }

  //
  // este método deve corrigir os caracteres que não podem aparecer unescaped em XML
  //

  // PUBLIC
  function trata ($metadata) {
    // Retiramos aqui todos os caracteres que não são ISO-8859-1
    $metadata =
      preg_replace ('/[^\x09\x0A\x0D\x20-\x7F\xC0-\xFF]/', '', $metadata);
    $metadata = str_replace ('&', '&amp;', $metadata);
    $metadata = str_replace ('<', '&lt;', $metadata);
    $metadata = str_replace ('>', '&gt;', $metadata);
    $metadata = str_replace ('&amp;amp;', '&amp;', $metadata);
    return $metadata;
  }
}

// }}}

/**
 * IBICT's TEDE_MTDBR:: interface. Defines the interface for implementing
 *
 * @access public
 * @version $Revision: 1.0 $
 * @package IBICT
 */
// {{{ Class TEDE_MTDBR extends TAGXML

class TEDE_MTDBR extends TAGXML {
  /**
  * Provides an interface for generating TEDE_MTDBR:: objects 
  *
  * @return object TEDE_MTDBR
   */
  var $_version = null;
  var $_reg = null;
  var $_id = null;
  var $_erro = array ();
  var $status = true;
  var $_DB = null;
  var $bbURL = null;

  function TEDE_MTDBR ($prefix = null) {
    $this->setPrefix ($prefix);
    $this->_reg = null;
    $this->_version = null;
  } function setversion ($version = "1.0") {
    $this->_version = $version;
  }

  function checkCNPJ ($cnpj) {
    if ($this->_version != '1.0') {
      $cnpj = str_replace ("-", "", $cnpj);
      $cnpj = str_replace ("_", "", $cnpj);
      $cnpj = str_replace (".", "", $cnpj);
      $cnpj = str_replace ('/', "", $cnpj);
      $cnpj = str_replace ('\\', "", $cnpj);
      if (strlen ($cnpf) != 14) {
	//$this->erro("CNPF com tamanho diferente de 14!");
	$cnpj = null;
      }
    }
    if ($cnpj == "")
      return null;
    return $cnpj;
  }

  function tag_PessoaJuridica ($row) {
    $r = $this->tag_obrigatorio ('Nome', $this->trata ($row['Nome']));
    $r.= $this->tag_facultativo ('Sigla', $this->trata ($row['Sigla']));
    $r.= $this->tag_facultativo ('Pais', $this->trata ($row['Pais']));
    $r.= $this->tag_facultativo ('UF', $this->checkUF ($row['UF']));
    $r.= $this->tag_facultativo ('CNPJ', $this->checkCNPJ ($row['CNPJ']));
    $r.= $this->tag_facultativo ('URL', $this->trata ($row['URL']));
    return $r;
  }

  function erro ($msg = null)	// Getter and Setter
  {
    if ($msg) {
      array_push ($this->_erro, $msg.'');
    }
    return $this->_erro;
  }

  function checkUF ($uf) {
    $estados = split (',', 'SC,PR,SP,RJ,MG,ES,DF,GO,TO,MS,MT,BA,CE,SE,AL,PE,PB,PI,MA,AM,PA,RS,AC,RO,RR,AP,RN');

    if (@in_array (strtoupper ($uf), $estados)) {
      return strtoupper ($uf);
    }
    return null;
  }

  function checkIdioma ($id) {
    if ($this->_version != '1.0' && $id != "") {
      if (strlen ($id) < 2 || strlen ($id) > 3)
	//$this->erro('Idioma utilizado fora do padrão de 2 ou 3 letras ['.$id.']' );
	return null;
    }
    return strtolower ($id);
  }

  function getControle ($row) {
    $r = '';
    if (is_array ($row)) {
      $r.= $this->tag_obrigatorio ('Sigla', $this->trata ($this->_sigla));
      $r.= $this->tag_obrigatorio ('DataAtualizacao', $this->toDateTime ($row['datestamp']));
      $r.= $this->tag_obrigatorio ('IdentificacaoDocumento', $row['tsIdentificador']);
      $r.= $this->getControleTipo ($row['tsIdentificador']);
      $r = $this->tag_obrigatorio ('Controle', $r);
      return $r;
    }
    $this->erro ("Controle obrigatório faltando");
    return null;
  }

  function getControleTipo ($id) {
    //
    // Modificado por Gabriel F.A.M. em 2005-05-24
    // A partir da versão 2 do MTD-BR o TEDE passa a suportar 
    // registros de TDE´s completos ou referenciais
    //    
    // Se possuir Arquivos então deve ser tese eletrônica
    if ($this->getArquivo ($id) != null)
      return $this->tag_obrigatorio ('Tipo',
				     "Tese ou Dissertação Eletrônica");
    return $this->tag_obrigatorio ('Tipo', "Tese ou Dissertação Impressa");
  }

  function getBibliotecaDigital ($id) {
    //
    // Há sempre somente 1 biblioteca digital
    // para cada instalação TEDE
    //    
    $query = @mysql_query ("
      SELECT   bbNome,bbSigla,bbURL, inCod
      FROM BibliotecaDigital 
      LIMIT 1");

    $r = null;
    if ($row = @mysql_fetch_array ($query)) {
      $r.= $this->tag_obrigatorio ('Nome', $this->trata ($row['bbNome']));
      $r.= $this->tag_obrigatorio ('Sigla', $this->trata ($row['bbSigla']));
      $r.= $this->tag_obrigatorio ('URL', $this->trata ($row['bbURL']));
      $this->bbURL = $row['bbURL'];
      if ($this->_version == "1.1") {
	$r.= $this->getBibliotecaDigitalArquivo ($id);
      }
      if ($this->_version == "2.0") {
	// O campo saiu daqui e foi direto para a raiz do mtd-br
      }
      else {
	$r.= $this->getBibliotecaDigitalURLDocumento ($id);
      }
      $r.= $this->getBibliotecaDigitalProvedorServico ($row['inCod']);
      return $this->tag_facultativo ('BibliotecaDigital', $r);
    }
    else {
      return null;
    }
  }

  function getBibliotecaDigitalURLDocumento ($id) {
    $r = null;
    $query = @mysql_query ("SELECT * FROM Arquivos WHERE tsIdentificador=\"$id\" ");
    while ($row = @mysql_fetch_array ($query)) {
      $a['Formato'] = $row['arFormato'];
      $r.= $this->tag_obrigatorio ('URLDocumento', str_replace ("http://http://", "http://", trata ("http://".$this->bbURL.  "/tde_busca/arquivo.php?codArquivo=".  $row['arCod'])), $a);

    }
    mysql_free_result (query);
    return $r;
  }

  function getArquivoLegenda ($id) {
    $query = @mysql_query ("SELECT * FROM LegendaArquivo WHERE arCod=\"$id\" ");
    while ($row = @mysql_fetch_array ($query)) {
      $a['Idioma'] = $this->checkIdioma ($row['laIdioma']);
      $r.= $this->tag_facultativo ('Legenda', $this->trata ($row['laLegenda']), $a);
    }
    mysql_free_result (query);
    return $r;
  }

  function makeURL ($cod) {
    return str_replace ("http://http://", "http://",
			$this->trata ("http://".$this->bbURL.
				      "/tde_busca/arquivo.php?codArquivo=".
				      $cod));
  }

  function getArquivo ($id = null) {
    $r = null;
    if ($id != null) {
      $query = @mysql_query ("SELECT * FROM Arquivos WHERE tsIdentificador=$id ");
      while ($row = @mysql_fetch_array ($query)) $rows[] = $row;
      mysql_free_result (query);

      foreach ($rows as $row) {
	$a['Formato'] = $row['arFormato'];
	$t = $this->tag_obrigatorio ('URL', $this->makeURL ($row['arCod']), $a);
	$t.= $this->getArquivoLegenda ($row['arCod']);
	if ("Retido" == $row['arDireitos'])
	  $t.= $this->tag_facultativo ('NivelAcesso', 'Restrito');
	else
	  $t.= $this->tag_facultativo ('NivelAcesso', $row['arDireitos']);
	$r.= $this->tag_obrigatorio ('Arquivo', $t);
      }
    }
    return $r;
  }

  function getBibliotecaDigitalArquivo ($id) {
    $x = null;
    $query =
      @mysql_query ("SELECT * FROM Arquivos WHERE tsIdentificador=\"$id\" ");
    while ($row = @mysql_fetch_array ($query)) {
      $r = null;
      $a['Formato'] = $row['arFormato'];
      $r.= $this->tag_obrigatorio ('URL', $this->trata ($row['arURL']), $a);
      $a = null;
      $query2 = @mysql_query ("SELECT * FROM LegendaArquivo WHERE arCod=\"". $row['arCod']."\" ");
      $l = null;
      while ($row2 = @mysql_fetch_array ($query2)) {
	$a['Idioma'] = $this->checkIdioma ($row2['laIdioma']);
	$l.=
	  $this->tag_facultativo ('Legenda',
				  $this->trata ($row2['laLegenda']), $a);
	$a = null;
      }
      mysql_free_result ($query2);
      $r.= $l;
      if (ereg ('Publ', $row['arDireitos'])) {
	$nivel = 'Publico';
      }
      else {
	$nivel = 'Restrito';
      }
      $r.= $this->tag_obrigatorio ('NiveldeAcesso', $nivel);
      $x.= $this->tag_facultativo ('Arquivo', $r);
    }
    mysql_free_result ($query);
    return $x;
  }

  function getBibliotecaDigitalProvedorServico ($id) {
    $sql = "SELECT  inNome as Nome,
                    inSigla as Sigla,
                    inURL as URL,
                    inPais as Pais,
                    inUF as UF,
                    inCNPJ as CNPJ
            FROM Instituicao
            WHERE inCod=1
          ";
    $query = @mysql_query ($sql);
    if ($row = @mysql_fetch_array ($query)) {
      return $this->tag_facultativo ('ProvedorServico', $this->tag_PessoaJuridica ($row));
    }
    mysql_free_result ($query);
    return null;
  }

  function getBibliotecaDepositaria ($tese) {
    if (is_array ($tese)) {
      $sql = "
        SELECT  bdNome,
                bdSigla,
                bdURL
        FROM BibliotecaDepositaria, TSPF, Programa
        WHERE 
            TSPF.tsIdentificador = '".$tese['tsIdentificador']."'
	AND TSPF.tspfTipo = 'Autor'
        AND Programa.prCod = TSPF.prCod
        AND BibliotecaDepositaria.bdCod = Programa.bdCod
        LIMIT 1";
      $query = mysql_query ($sql);
      $r = null;
      if ($row = @mysql_fetch_array ($query)) {
	$r.= $this->tag_facultativo ('Nome', $this->trata ($row['bdNome']));
	$r.= $this->tag_facultativo ('Sigla', $this->trata ($row['bdSigla']));
	$r.= $this->tag_facultativo ('URL', $this->trata ($row['bdURL']));
	$r.= $this->tag_facultativo ('NumeroChamada', $this->trata ($tese['tsNumeroChamada']));
	return $this->tag_facultativo ('BibliotecaDepositaria', $r);
      }
      mysql_free_result ($query);
    }
    return null;
  }

  function getTitulo ($id) {
    $query = @mysql_query ("SELECT * FROM Titulo WHERE tsIdentificador =$id ");
    while ($row = @mysql_fetch_array ($query)) {
      $a['Idioma'] = $this->checkIdioma ($row['ttIdioma']);
      $r.= $this->tag_obrigatorio ('Titulo', $this->trata ($row['ttTitulo']), $a);
      $a = null;
    }
    mysql_free_result ($query);
    return $r;
  }

  function getResumo ($id) {
    $query = @mysql_query ("SELECT rsIdioma, rsResumo FROM Resumo WHERE tsIdentificador = $id");
    $r = "";
    while ($row = @mysql_fetch_array ($query)) {
      $att['Idioma'] = $this->checkIdioma ($row['rsIdioma']);
      $r.= $this->tag_facultativo ('Resumo', $this->trata ($row['rsResumo']), $att);
    }
    mysql_free_result ($query);
    return $r;
  }

  function getCobertura ($id) {
    $query = @mysql_query ("SELECT * FROM Cobertura WHERE tsIdentificador =$id ");
    $r = null;
    while ($row = @mysql_fetch_array ($query)) {
      $att['Idioma'] = $this->checkIdioma ($row['cbIdioma']);
      $r.= $this->tag_facultativo ('Cobertura', $this->trata ($row['cbCobertura']), $att);
    }
    mysql_free_result ($query);
    return $r;
  }

  // Gabriel 13-06-2006, BUG#9
  // separacao do getInsituicaoDefesaProgramaArea para correcao do BUG#9
  function getInstituicaoDefesaProgramaArea ($id_tese) {
    $sql = "SELECT *
      FROM Assunto
      WHERE asEsquema ='Tabela CNPQ'
      AND tsIdentificador ='$id_tese' 
      LIMIT 1";
    $query = @mysql_query ($sql);
    $r = null;
    if ($row = @mysql_fetch_array ($query)) {
      $r.= $this->tag_facultativo ('Area', $this->trata ($row['asAssunto']));
    }
    mysql_free_result ($query);
    return $r;
  }

  function getAssunto ($id) {
    $query =
      @mysql_query ("SELECT * FROM Assunto WHERE tsIdentificador =$id ");
    $r = null;
    while ($row = @mysql_fetch_array ($query)) {
      $att['Idioma'] = $this->checkIdioma ($row['asIdioma']);
      $att['Esquema'] = $row['asEsquema'];
      $r.=
	$this->tag_facultativo ('Assunto', $this->trata ($row['asAssunto']),
				$att);
    }
    mysql_free_result ($query);
    return $r;
  }

  function getLocalDefesa ($row) {
    if (is_array ($row)) {
      $r.= $this->tag_obrigatorio ('Cidade', $row['tsCidadeLocalDefesa']);
      $r.=
	$this->tag_facultativo ('UF',
				$this->checkUF ($row['tsUFLocalDefesa']));
      $r.= $this->tag_obrigatorio ('Pais', $row['tsPaisLocalDefesa']);
      return $this->tag_facultativo ('LocalDefesa', $r);
    }
    return null;
  }

  function getAfiliacao ($id, $facultativo) {
    $r = null;
    $query = @mysql_query ("
          SELECT PessoaJuridica.pjNome as Nome
                , PessoaJuridica.pjSigla as Sigla
                , PessoaJuridica.pjPais as Pais 
                , PessoaJuridica.pjUF as UF 
                , PessoaJuridica.pjCNPJ as CNPJ
                , PessoaJuridica.pjURL as URL
          FROM PessoaJuridica, PFPJ 
          WHERE PessoaJuridica.pjCod = PFPJ.pjCod
          AND PFPJ.pfCod = '$id'
          AND PFPJ.pfpjTipo = 'Afiliacao'
	LIMIT 1
    ");
    if ($row = @mysql_fetch_array ($query)) {
      if ($facultativo) {
	return $this->tag_facultativo ('Afiliacao',
				       $this->tag_PessoaJuridica ($row));
      } else {
	return $this->tag_obrigatorio ('Afiliacao',
				       $this->tag_PessoaJuridica ($row));
      }
    }
    mysql_free_result ($query);
    if (!$facultativo) {
      $this->erro ("Afiliação esperada inexistente !");
    }
    return null;
  }

  function getPessoaFisica ($tag, $id) {

    $opcao = true;
    if ($tag == "Autor") {
      $filter = " TSPF.tspfTipo=\"Autor\" ";
    } else {
      $filter = " TSPF.tspfTipo!=\"Autor\" ";
    }
    if ($this->_version != '1.0') {
      $sql_abnt = " PessoaFisica.pfCitacaoABNT, ";
    }
    $sql = "SELECT   PessoaFisica.pfNome, 
        PessoaFisica.pfCitacao, $sql_abnt
        PessoaFisica.pfLattes, 
        PessoaFisica.pfCPF, 
        PessoaFisica.pfCod,
        TSPF.tspfTipo 
      FROM PessoaFisica, TSPF
      WHERE PessoaFisica.pfCod = TSPF.pfCod
      AND TSPF.tsIdentificador = '$id'
      AND $filter
    ";
    $query = @mysql_query ($sql);
    while ($row = @mysql_fetch_array ($query)) {
      $r = null;
      $a = null;
      $r.= $this->tag_obrigatorio ('Nome', $this->trata ($row['pfNome']));
      $r.= $this->tag_facultativo ('Citacao', $this->trata ($row['pfCitacao']));
      if ($this->_version != '1.0') {
	$abnt['Norma'] = 'ABNT';
	$r.= $this->tag_facultativo ('Citacao', $this->trata ($row['pfCitacaoABNT']), $abnt);
      }
      $r.= $this->tag_facultativo ('Lattes', $this->trata ($row['pfLattes']));
      if ($this->_version == '2.0') {
	$r.= $this->tag_facultativo ('CPF', str_replace ('.', '', str_replace ('-', '', $row['pfCPF'])));
      } else {
	$r.= $this->tag_facultativo ('CPF', $row['pfCPF']);
      }
      if ($row['tspfTipo'] != "Autor") {
	$a['Papel'] = $row['tspfTipo'];
      }
      $r.= $this->getAfiliacao ($row['pfCod'], $opcao);
      $resp.= $this->tag_obrigatorio ($tag, $r, $a);
    }
    mysql_free_result ($query);
    return $resp;
  }

  function getPrograma ($id, $inCod) {
    $sql = "
      SELECT * 
      FROM Programa 
      INNER JOIN TSPF 
        ON (Programa.prCod = TSPF.prCod) WHERE TSPF.tspfTipo='Autor' AND TSPF.tsIdentificador = \"$id\" 
      LIMIT 1";
    $query = @mysql_query ($sql);
    $r = null;
    if ($row = @mysql_fetch_array ($query)) {
      $r.= $this->tag_facultativo ('Nome', $this->trata ($row['prNome']));
      // Gabriel 13-06-2006, BUG#9
      // O campo Area no Tede nao corresponde ao 
      // campo Area no MTD-BR
      //$r.=$this->tag_obrigatorio('Area',$this->trata($row['prArea']));
      $r.= $this->getInstituicaoDefesaProgramaArea ($id);
      $i = $this->getProgramaInstituicao ($inCod);

      if ($i) {
	return $this->tag_facultativo ('Programa', $r.$i);
      }
    }
    mysql_free_result ($query);
    return null;
  }

  function getInstituicaoDefesaPrograma ($id_tese) {
    $sql = "
      SELECT * 
      FROM Programa 
      INNER JOIN TSPF 
        ON (Programa.prCod = TSPF.prCod) 
        WHERE 
        TSPF.tspfTipo = 'Autor' AND
        TSPF.tsIdentificador = $id_tese 
      LIMIT 1";
    $query = @mysql_query ($sql);
    $r = null;
    if ($row = @mysql_fetch_array ($query)) {
      $r = $this->tag_facultativo ('Nome', $this->trata ($row['prNome']));
      // Gabriel 13-06-2006, BUG#9
      // O campo Area no Tede nao corresponde ao 
      // campo Area no MTD2-BR
      //$r.=$this->tag_obrigatorio('Area',$this->trata($row['prArea']));
      $r.= $this->getInstituicaoDefesaProgramaArea ($id_tese);
      return $this->tag_facultativo ('Programa', $r);
    }
    mysql_free_result ($query);
    return null;
  }

  function getProgramaInstituicao ($id) {
    $sql = "SELECT   inNome as Nome, 
                    inSigla as Sigla, 
                    inURL as URL, 
                    inPais as Pais, 
                    inUF as UF,   
                    inCNPJ as CNPJ
             FROM Instituicao 
            WHERE inCod=$id 
            LIMIT 1
          ";
    $query = @mysql_query ($sql);
    if ($row = @mysql_fetch_array ($query)) {
      mysql_free_result (query);
      return $this->tag_facultativo ('Instituicao', $this->tag_PessoaJuridica ($row));
    }
    return null;
  }

  function getInstituicaoDefesa ($id_tese, $id_instituicao) {
    $sql = "SELECT   inNome as Nome, 
        inSigla as Sigla, 
        inURL as URL, 
        inPais as Pais, 
        inUF as UF,   
        inCNPJ as CNPJ
       FROM Instituicao 
      WHERE inCod=$id_instituicao
      LIMIT 1
      ";
    $query = @mysql_query ($sql);
    $r = null;
    if ($row = @mysql_fetch_array ($query)) {
      $s = $this->getInstituicaoDefesaPrograma ($id_tese);
      $r =
	$this->tag_facultativo ('InstituicaoDefesa',
				$this->tag_PessoaJuridica ($row).$s);
    }
    mysql_free_result (query);
    return $r;
  }

  function getAgenciaFomento ($id) {

    $sql = "SELECT   pjNome as Nome, 
          pjSigla as Sigla, 
          pjURL as URL, 
          pjPais as Pais, 
          pjUF as UF,   
          pjCNPJ as CNPJ
      FROM PessoaJuridica
        INNER JOIN PFPJ 
          ON (PFPJ.pjCod = PessoaJuridica.pjCod)
          INNER JOIN TSPF
          ON (TSPF.pfCod = PFPJ.pfCod)
          WHERE TSPF.tspfTipo = 'Autor'
          AND PFPJ.pfpjTipo = 'AgenciaFomento'
          AND TSPF.tsIdentificador = '$id'
    ";
    $query = @mysql_query ($sql);
    $resp = '';
    while ($row = @mysql_fetch_array ($query)) {
      $resp.= $this->tag_facultativo ('AgenciaFomento', $this->tag_PessoaJuridica ($row));
    }
    mysql_free_result (query);
    return $resp;

  }

  function getDireitos ($id) {
    $sql = "SELECT drIdioma, 
            drDireito
            FROM Direitos
            WHERE tsIdentificador ='$id'
            ";
    $query = @mysql_query ($sql);
    while ($row = @mysql_fetch_array ($query)) {
      $a['Idioma'] = $this->checkIdioma ($row['drIdioma']);
      $resp.= $this->tag_facultativo ('Direitos', $row['drDireito'], $a);
    }
    mysql_free_result (query);
    return $resp;
  }

  // Fim mtdbr  

  function getid () {
    return $this->_id;
  }

  function checkDeleted ($id = null) {
    global $DB_NAME;
    if ($id == null)
      $id = $this->_id;
    if ($id != null) {
      $sql = "SELECT * FROM OAIControle WHERE tsIdentificador=\"$id\" ";
      if ($row = mysql_fetch_array (@mysql_query ($sql))) {
	if (is_array ($row))
	  return true;
      }
    }
    return false;
  }

  function loadETDMS ($id) {
    // 14-06-2006 Gabriel Bug #11
    // Rotina encomendada pelo BUG #10
    //

    $this->_id = $id;
    $this->_reg = null;
    $this->_erro = array ();

    $r = false;

    $tmp_prefix = $this->getPrefix ();
    $this->setPrefix ("oai_etdms");

    $sql = " SELECT *,";
    $sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
    $sql.= " FROM Teses WHERE tsIdentificador = \"$id\" LIMIT 1";

    if ($rowTese = mysql_fetch_array (@mysql_query ($sql))) {
      $id = $rowTese['tsIdentificador'];

      // TITLE ========================================
      $querytitulo =
	@mysql_query ("SELECT * FROM Titulo WHERE tsIdentificador =\"$id\" ");
      while ($rowtitulo = @mysql_fetch_array ($querytitulo)) {
	$reg.= $this->tag_obrigatorio ('title', $this->trata ($rowtitulo['ttTitulo']));
      }

      // CREATOR ========================================
      $sql = "SELECT  PessoaFisica.pfNome,
                                PessoaFisica.pfCitacao, $sql_abnt
                                PessoaFisica.pfLattes,
                                PessoaFisica.pfCPF,
                                PessoaFisica.pfCod,
                                TSPF.tspfTipo
                        FROM PessoaFisica, TSPF
                        WHERE PessoaFisica.pfCod = TSPF.pfCod
                        AND TSPF.tsIdentificador = $id
                        AND TSPF.tspfTipo=\"Autor\" ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_obrigatorio ('creator', $this->trata ($row['pfNome']));
      }

      // SUBJECT ========================================
      $sql = "SELECT * FROM Assunto WHERE tsIdentificador =$id ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('subject', $this->trata ($row['asAssunto']), $att);
      }
      mysql_free_result (query);

      // DESCRIPTION ========================================
      $sql = "SELECT rsIdioma, rsResumo FROM Resumo WHERE tsIdentificador = $id";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('description', $this->trata ($row['rsResumo']), $att);
      }
      mysql_free_result (query);

      // PUBLISHER ========================================
      $sql = " SELECT  bbNome FROM BibliotecaDigital LIMIT 1";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('publisher', $this->trata ($row['bbNome']), $att);
      }
      mysql_free_result (query);

      // CONTRIBUTOR ========================================
      $sql = "SELECT  PessoaFisica.pfNome,
                                PessoaFisica.pfCitacao, $sql_abnt
                                PessoaFisica.pfLattes,
                                PessoaFisica.pfCPF,
                                PessoaFisica.pfCod,
                                TSPF.tspfTipo
                        FROM PessoaFisica, TSPF
                        WHERE PessoaFisica.pfCod = TSPF.pfCod
                        AND TSPF.tsIdentificador = '$id'
                        AND TSPF.tspfTipo!=\"Autor\" ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.=
	  $this->tag_obrigatorio ('contributor',
				  $this->trata ($row['pfNome']));
      }
      mysql_free_result (query);

      // DATE ========================================
      $reg.= $this->tag_facultativo ('date', $rowTese['tsDataDefesa']);

      // TYPE ========================================
      if ($this->getArquivo ($id) != null) {
	$reg.=
	  $this->tag_obrigatorio ('type', "Eletronic Thesis or Dissertation");
	$reg.=
	  $this->tag_obrigatorio ('type', "Tese ou Dissertação Eletrônica");
      }
      else {
	$reg.=
	  $this->tag_obrigatorio ('type', "Printed Thesis or Dissertation");
	$reg.=
	  $this->tag_obrigatorio ('type', "Tese ou Dissertação Impressa");
      }

      // IDENTIFIER + FORMAT ==============================
      $sql = "SELECT * FROM Arquivos WHERE tsIdentificador=$id ";
      $query = @mysql_query ($sql);
      $att = null;
      if ($this->bbURL == null) $this->getBibliotecaDigital ($rowTese['tsId']);
      $regIDENTIFIER = null;
      while ($row = @mysql_fetch_array ($query)) {
	//$att['Idioma'] = $this->checkIdioma($row['asIdioma']);
	$reg.= $this->tag_facultativo ('format', $row['arFormato']);
	$regIDENTIFIER.= $this->tag_facultativo ('identifier', $this->makeURL ($row['arCod']));
      }
      mysql_free_result (query);
      if ($regIDENTIFIER) $reg.= $regIDENTIFIER;

      // LANGUAGE ========================================
      $reg.= $this->tag_facultativo ('language', $this->checkIdioma ($rowTese['tsIdioma']));
      // RIGHTS ========================================
      $sql = "SELECT drIdioma, drDireito
            FROM Direitos
            WHERE tsIdentificador ='$id'
            ";
      $query = @mysql_query ($sql);
      while ($row = @mysql_fetch_array ($query)) {
	//$a['Idioma'] = $this->checkIdioma($row['drIdioma']);
	$reg.=
	  $this->tag_facultativo ('rights', $this->trata ($row['drDireito']));
      }
      mysql_free_result (query);

      // DEGREE ========================================
      // <degree>
      //   <name xml:lang="PT">Mestre</name>
      //  <level>masters/doctoral/postdoctoral</level>
      //  <discipline></discipline>
      //  <grantor></grantor>
      //</degree>

      $a['xml:lang'] = 'pt';
      $regDEG = $this->tag_facultativo ('name', $rowTese['tsGrau'], $a);
      $a = null;
      if ($rowTese['tsGrau'] == 'Doutor') {
	$regDEG.= $this->tag_facultativo ('level', 'doctoral');
      }
      else {
	$regDEG.= $this->tag_facultativo ('level', 'masters');
      }
      $sql = "SELECT   inNome as Nome, 
        inSigla as Sigla, 
        inURL as URL, 
        inPais as Pais, 
        inUF as UF,   
        inCNPJ as CNPJ
       FROM Instituicao 
      WHERE inCod=".$rowTese['inCod']."
      LIMIT 1
      ";
      $query = @mysql_query ($sql);
      if ($row = @mysql_fetch_array ($query)) {
	$regDEG.=
	  $this->tag_facultativo ('grantor', $this->trata ($row['Nome']));
      }
      $reg.= $this->tag_facultativo ('degree', $regDEG);
      mysql_free_result (query);

      // ==================================================
      if (!$this->erro ()) {
	$this->_reg = $reg;
	$r = true;
      }
    }
    $this->setPrefix ($tmp_prefix);
    return $r;

  }

  function loadOAIDC ($id) {
    // 13-06-2006 Gabriel Bug #10
    // Rotina totalmente modificada para implementacao
    // encomendada pelo BUG #10
    //

    $this->_id = $id;
    $this->_reg = null;
    $this->_erro = array ();

    $r = false;

    $tmp_prefix = $this->getPrefix ();
    $this->setPrefix ("dc");

    $sql = " SELECT *,";
    $sql.= ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
    $sql.= " FROM Teses WHERE tsIdentificador = \"$id\" LIMIT 1";

    if ($rowTese = mysql_fetch_array (@mysql_query ($sql))) {
      $id = $rowTese['tsIdentificador'];

      // TITLE ========================================
      $querytitulo = @mysql_query ("SELECT * FROM Titulo WHERE tsIdentificador =$id ");
      while ($rowtitulo = @mysql_fetch_array ($querytitulo)) {
	$reg.= $this->tag_obrigatorio ('title', $this->trata ($rowtitulo['ttTitulo']));
      }
      mysql_free_result (querytitulo);

      // CREATOR ========================================
      $sql = "SELECT  PessoaFisica.pfNome,
                                PessoaFisica.pfCitacao, $sql_abnt
                                PessoaFisica.pfLattes,
                                PessoaFisica.pfCPF,
                                PessoaFisica.pfCod,
                                TSPF.tspfTipo
                        FROM PessoaFisica, TSPF
                        WHERE PessoaFisica.pfCod = TSPF.pfCod
                        AND TSPF.tsIdentificador = '$id'
                        AND TSPF.tspfTipo=\"Autor\" ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_obrigatorio ('creator', $this->trata ($row['pfNome']));
      }
      mysql_free_result (query);

      // SUBJECT ========================================
      $sql = "SELECT * FROM Assunto WHERE tsIdentificador ='$id' ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('subject', $this->trata ($row['asAssunto']), $att);
      }
      mysql_free_result (query);

      // DESCRIPTION ========================================
      $sql = "SELECT rsIdioma, rsResumo FROM Resumo WHERE tsIdentificador = '$id'";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('description', $this->trata ($row['rsResumo']), $att);
      }
      mysql_free_result (query);

      // PUBLISHER ========================================
      $sql = " SELECT  bbNome FROM BibliotecaDigital LIMIT 1";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('publisher', $this->trata ($row['bbNome']), $att);
      }
      mysql_free_result (query);

      // CONTRIBUTOR ========================================
      $sql = "SELECT  PessoaFisica.pfNome,
                                PessoaFisica.pfCitacao, $sql_abnt
                                PessoaFisica.pfLattes,
                                PessoaFisica.pfCPF,
                                PessoaFisica.pfCod,
                                TSPF.tspfTipo
                        FROM PessoaFisica, TSPF
                        WHERE PessoaFisica.pfCod = TSPF.pfCod
                        AND TSPF.tsIdentificador = '$id'
                        AND TSPF.tspfTipo!=\"Autor\" ";
      $query = @mysql_query ($sql);
      $att = null;
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_obrigatorio ('contributor', $this->trata ($row['pfNome']));
      }
      mysql_free_result (query);

      // DATE ========================================
      $reg.= $this->tag_facultativo ('date', $rowTese['tsDataDefesa']);

      // TYPE ========================================
      if ($this->getArquivo ($id) != null) {
	$reg.=
	  $this->tag_obrigatorio ('type', "Eletronic Thesis or Dissertation");
	$reg.=
	  $this->tag_obrigatorio ('type', "Tese ou Dissertação Eletrônica");
      }
      else {
	$reg.=
	  $this->tag_obrigatorio ('type', "Printed Thesis or Dissertation");
	$reg.=
	  $this->tag_obrigatorio ('type', "Tese ou Dissertação Impressa");
      }

      // IDENTIFIER + FORMAT ==============================
      $sql = "SELECT * FROM Arquivos WHERE tsIdentificador=$id ";
      $query = @mysql_query ($sql);
      $att = null;
      if ($this->bbURL == null)
	$this->getBibliotecaDigital ($rowTese['tsId']);
      while ($row = @mysql_fetch_array ($query)) {
	//$att['Idioma'] = $this->checkIdioma($row['asIdioma']);
	$reg.= $this->tag_facultativo ('format', $row['arFormato']);
	$reg.= $this->tag_facultativo ('identifier', $this->makeURL ($row['arCod']));
      }
      mysql_free_result (query);

      // LANGUAGE ========================================
      $reg.= $this->tag_facultativo ('language', $this->checkIdioma ($rowTese['tsIdioma']));
      // RIGHTS ========================================
      $sql = "SELECT drIdioma, drDireito
            FROM Direitos
            WHERE tsIdentificador =$id
            ";
      $query = @mysql_query ($sql);
      while ($row = @mysql_fetch_array ($query)) {
	$reg.= $this->tag_facultativo ('rights', $row['drDireito']);
      }
      mysql_free_result (query);

      // ==================================================
      if (!$this->erro ()) {
	$this->_reg = $reg;
	$r = true;
      }
    }
    $this->setPrefix ($tmp_prefix);
    return $r;

  }

  //
  //  Este metodo carrega o registro do tede em MTD-BR 
  //  e na versão estabelecida
  //

  function load ($id) {
    if ($this->_version == "oai_dc")
      return $this->loadOAIDC ($id);
    if ($this->_version == "oai_etdms")
      return $this->loadETDMS ($id);

    $this->_id = $id;
    $this->_reg = null;
    $this->_erro = array ();

    $r = false;

    $sql = " SELECT *,";
    $sql.=
      ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
    $sql.= " FROM Teses WHERE tsIdentificador = \"$id\" LIMIT 1";

    if ($row = mysql_fetch_array (@mysql_query ($sql))) {
      if ($this->_version == "2.0") {
	$tmp_prefix = $this->getPrefix ();
	$this->setPrefix ("mtd2-br");
      }
      $reg = $this->getControle ($row);
      $reg.= $this->getBibliotecaDigital ($row['tsIdentificador']);
      $reg.= $this->getBibliotecaDepositaria ($row);
      $reg.= $this->getTitulo ($row['tsIdentificador']);
      if ($this->_version == "2.0") {
	$reg.= $this->getArquivo ($row['tsIdentificador']);
      }
      $reg.=
	$this->tag_obrigatorio ('Idioma',
				$this->checkIdioma ($row['tsIdioma']));
      $reg.= $this->tag_facultativo ('Grau', $row['tsGrau']);
      $reg.=
	$this->tag_facultativo ('Titulacao',
				$this->trata ($row['tsTitulacao']));
      $reg.= $this->getResumo ($row['tsIdentificador']);
      $reg.= $this->getCobertura ($row['tsIdentificador']);
      $reg.= $this->getAssunto ($row['tsIdentificador']);
      $reg.= $this->getLocalDefesa ($row);
      $reg.= $this->tag_facultativo ('DataDefesa', $row['tsDataDefesa']);
      $reg.= $this->getPessoaFisica ('Autor', $row['tsIdentificador']);
      $reg.=
	$this->getPessoaFisica ('Contribuidor', $row['tsIdentificador']);
      if ($this->_version == "2.0") {
	$reg.=
	  $this->getInstituicaoDefesa ($row['tsIdentificador'],
				       $row['inCod']);
      }
      else {
	$reg.= $this->getPrograma ($row['tsIdentificador'], $row['inCod']);
      }
      $reg.= $this->getAgenciaFomento ($row['tsIdentificador']);
      $reg.= $this->getDireitos ($row['tsIdentificador']);
      if ($this->_version == "2.0") {
	$this->setPrefix ($tmp_prefix);
      }
      if (!$this->erro ()) {
	$this->_reg = $reg;
	$r = true;
      }
    }
    return $r;
  }


  //
  // Após ter sido feita a carga do registro a partir do banco
  // este método deve ser invocado para retornar a montagem
  // do registro em XML .
  //

  function show () {
    $r = null;
    if ($this->checkDeleted ()) {
      return null;
    }
    else if ($this->_version == "oai_etdms") {
      $a['xmlns:oai_etdms'] =
	"http://www.ndltd.org/standards/metadata/etdms/1.0/";
      $a['xmlns:xsi'] = "http://www.w3.org/2001/XMLSchema-instance";
      $a['xsi:schemaLocation'] =
	"http://www.ndltd.org/standards/metadata/etdms/1.0/
http://www.ndltd.org/standards/metadata/etdms/1.0/etdms.xsd";
      $tmp_prefix = $this->getPrefix ();
      $this->setPrefix ("oai_etdms");
      if ($this->_reg) {
	$r = $this->tag ('thesis', $this->_reg, $a);
      }
      $this->setPrefix ($tmp_prefix);
    }
    else if ($this->_version == "oai_dc") {
      $a['xmlns:dc'] = "http://purl.org/dc/elements/1.1/";
      $a['xmlns:oai_dc'] = "http://www.openarchives.org/OAI/2.0/oai_dc/";
      $a['xmlns:xsi'] = "http://www.w3.org/2001/XMLSchema-instance";
      $a['xsi:schemaLocation'] = "http://www.openarchives.org/OAI/2.0/oai_dc/
http://www.openarchives.org/OAI/2.0/oai_dc.xsd";
      $tmp_prefix = $this->getPrefix ();
      $this->setPrefix ("oai_dc");
      if ($this->_reg) {
	$r = $this->tag ('dc', $this->_reg, $a);
      }
      $this->setPrefix ($tmp_prefix);
    }
    else if ($this->_version == "1.0") {
      $a['xmlns'] = "http://www.ibict.br/schema/";
      $a['xmlns:xsi'] = "http://www.w3.org/2001/XMLSchema-instance";
      $a['xsi:schemaLocation'] = "http://www.ibict.br/schema/
                              http://www.ibict.br/schema/mtd-br(v1.0).xsd";
      if ($this->_reg) {
	$r = $this->tag ('mtdbr', $this->_reg, $a);
      }
    }
    else if ($this->_version == "2.0") {
      $a['xmlns:mtd2-br'] = "http://oai.ibict.br/mtd2-br/";
      $a['xmlns:xsi'] = "http://www.w3.org/2001/XMLSchema-instance";
      $a['xsi:schemaLocation'] = "http://oai.ibict.br/mtd2-br/
                              http://oai.ibict.br/mtd2-br/mtd2-br.xsd";
      $tmp_prefix = $this->getPrefix ();
      $this->setPrefix ("mtd2-br");
      if ($this->_reg) {
	$r = $this->tag ('mtd2br', $this->_reg, $a);
      }
      $this->setPrefix ($tmp_prefix);
    }
    else {
      $a['xmlns'] = "http://www.ibict.br/schema/";
      $a['xmlns:xsi'] = "http://www.w3.org/2001/XMLSchema-instance";
      $a['xsi:schemaLocation'] = "http://www.ibict.br/schema/
                              http://www.ibict.br/schema/mtd-br(v1.1).xsd";
      if ($this->_reg) {
	$r = $this->tag ('mtdbr', $this->_reg, $a);
      }
    }
    return $r;
  }

}

// }}}

//
// A Classe OAI_MTDBR implementa a interface básica com os verbos do protocolo OAI-PMH
// que são diretamente associados aos registros (records) : ListRecords, GetRecord e
// ListIdentifiers
//

// {{{ Class OAI_MTDBR extends TEDE_MTDBR

class OAI_MTDBR extends TEDE_MTDBR {
  var $_identifier_prefix = null;
  var $_sigla;

  function OAI_MTDBR ($sigla, $identifier_prefix, $oai_version = "1.1") {
    $this->setversion ($oai_version);
    $this->_identifier_prefix = $identifier_prefix;
    $this->_sigla = $sigla;
  }

  function identifier ($id = null) {
    if ($id) {
      return $this->_identifier_prefix.$id;
    }
    else {
      return $this->_identifier_prefix.$this->getid ();
    }
  }

  function tag_header ($row, $deleted = null) {
    $resp =
      $this->tag_obrigatorio ('identifier',
			      $this->identifier ($row['identifier']));
    $resp.=
      $this->tag_obrigatorio ('datestamp',
			      str_replace (" ", "T", $row['datestamp']).'Z');
    if ($deleted)
      return $this->tag_obrigatorio ('header', $resp, array ('status' =>'deleted'));
    else
      return $this->tag_obrigatorio ('header', $resp);
  }

  // private
  function tag_record ($row) {
    $resp = null;
    if ($this->checkDeleted ($row['identifier'])) {
      $r = $this->tag_header ($row, 'deleted');
    }
    else if ($this->load ($row['identifier'])) {
      $r = $this->tag_header ($row);
      $r.= $this->tag_obrigatorio ('metadata', $this->show ());
    }
    $resp = $this->tag_obrigatorio ('record', $r);
    return $resp;
  }

  // private
  function dateQuery ($d) {
    // converting data format in YYYY-MM-DDTHH:mm:ssZ
    return ' FROM_UNIXTIME(UNIX_TIMESTAMP(\''.str_replace ("Z", "",
							   str_replace ("T",
									" ",
									$d)).
      '\')-3600*3) ';
  }

  // private
  // filter for until
  function untilQuery ($until) {
    return ' AND tsDataAtualizacao <= '.$this->dateQuery ($until).' ';
  }

  // private
  // filter for from
  function fromQuery ($from) {
    return ' AND tsDataAtualizacao >= '.$this->dateQuery ($from).' ';
  }

  // private
  // filter for sets, mesmo sem estarmos utilizando sets neste momento
  // já preparamos para utilização futura

  function setQuery ($set) {
    return ' AND oaiset LIKE "%'.$set.'%" ';
  }

  // PUBLIC
  function listIdentifiers ($maxidentifiers, $from = null, $until =
			    null, $oaiset = null, $offset = 0) {
    global $repositoryFilter;

    $sql = ' SELECT tsIdentificador as identifier, ';
    $sql.=
      ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
    $sql.= ' FROM Teses ';
    if ($repositoryFilter != "TODOS") {
      $sql.= ' WHERE inCod = "1" ';	// selecionar somente Teses defendidas pela Instituição do Tede
    }
    else {
      $sql.= ' WHERE inCod = inCod ';	// a menos que seja o IBICT!
    }
    if ($from)
      $sql.= $this->fromQuery ($from);
    if ($until)
      $sql.= $this->untilQuery ($until);
    if ($oaiset)
      $sql.= $this->setQuery ($oaiset);
    $sql.= " AND tsGrau in('Mestre','Doutor') ";
    if ($offset > 0)
      $sql.= " LIMIT $offset,99999999 ";

    $query = mysql_query ($sql);
    $t['count'] = mysql_num_rows ($query) + $offset;
    $i = 0;
    while ($i <= $maxidentifiers & ($row = mysql_fetch_array ($query))) {
      if ($i < $maxidentifiers) {
	if ($this->checkDeleted ($row['identifier']))
	  $t['verb'].= $this->tag_header ($row, 'deleted');
	else
	  $t['verb'].= $this->tag_header ($row);
      }
      else {
	$t['continue'] = true;
      }
      $i++;
    }
    if ($i == 0) {
      $this->erro ('resultset vazio');
    }
    return $t;
  }

  // PUBLIC 
  function listRecords ($maxrecords, $from = null, $until = null, $oaiset =
			null, $offset = 0, $record_prefix = null) {
    global $repositoryFilter;
    $resp = null;

    $sql = ' SELECT tsIdentificador as identifier, ';
    $sql.=
      ' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
    $sql.= ' FROM Teses ';
    if ($repositoryFilter != "TODOS") {
      $sql.= ' WHERE inCod = "1" ';	// selecionar somente Teses defendidas pela Instituição do Tede
    }
    else {
      $sql.= ' WHERE inCod = inCod ';	// a menos que seja o IBICT, pois aí queremos todos.
    }
    if ($from)
      $sql.= $this->fromQuery ($from);
    if ($until)
      $sql.= $this->untilQuery ($until);
    if ($oaiset)
      $sql.= $this->setQuery ($oaiset);
    $sql.= " AND tsGrau in('Mestre','Doutor') ";
    if ($offset > 0)
      $sql.= " LIMIT $offset,99999999";
    if ($query = mysql_query ($sql)) {
      $t['count'] = mysql_num_rows ($query) + $offset;
      $i = 0;
      while ($i <= $maxrecords & ($row = mysql_fetch_array ($query))) {
	if ($i < $maxrecords) {
	  $t['verb'].= $this->tag_record ($row);
	}
	else {
	  $t['continue'] = true;
	}
	$i++;
      }
    }
    if ($i == 0) {
      $this->erro ('resultset vazio');
    }
    $t['err'] = $this->erro ();
    return $t;
  }

  // PUBLIC
  function getRecord ($id) {
    if (ereg ($this->_identifier_prefix, $id)) {
      $resp = null;
      $i = explode (":", $id, 3);
      $sql = ' SELECT tsIdentificador as identifier, ';
      $sql.=
	' FROM_UNIXTIME(UNIX_TIMESTAMP(tsDataAtualizacao)+3*3600) as datestamp ';
      $sql.= ' FROM Teses ';
      $sql.= ' WHERE tsIdentificador ="'.$i[2].'" ';
      $query = mysql_query ($sql);
      if ($row = mysql_fetch_array ($query)) {
	$t['verb'].= $this->tag_record ($row);
      }
      else {
	$this->erro ("Identificador não encontrado neste repositorio");
      }
    }
    else {
      $this->erro ("Identificador não pertence a este repositorio");
    }
    $t['continue'] = false;
    $t['err'] = $this->erro ();
    return $t;
  }
}

// }}}
?>
