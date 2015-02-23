# phpMyAdmin MySQL-Dump
# version 2.3.0-rc4
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Servidor: localhost
# Tempo de Generação: Fev 17, 2005 at 04:51 PM
# Versão do Servidor: 3.23.47
# Versão do PHP: 4.0.6
# Banco de Dados : `TDE`
# --------------------------------------------------------

#
# Estrutura da tabela `Arquivos`
#

CREATE TABLE Arquivos (
  arCod int(10) NOT NULL default '0',
  tsIdentificador varchar(20) NOT NULL default '0',
  arFormato varchar(50) default NULL,
  arURL varchar(150) default NULL,
  arDireitos varchar(150) default NULL,
  PRIMARY KEY  (arCod),
  UNIQUE KEY ARQUIVOS_PK (arCod),
  KEY RELATION_393_FK (tsIdentificador)
) TYPE=MyISAM PACK_KEYS=1;

#
# Extraindo dados da tabela `Arquivos`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Assunto`
#

CREATE TABLE Assunto (
  asCod int(10) NOT NULL default '0',
  tsIdentificador varchar(20) NOT NULL default '0',
  asIdioma char(3) NOT NULL default '',
  asAssunto varchar(200) NOT NULL default '',
  asEsquema varchar(100) default NULL,
  PRIMARY KEY  (asCod),
  UNIQUE KEY ASSUNTO_PK (asCod),
  KEY RELATION_398_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Assunto`
#

# --------------------------------------------------------

#
# Estrutura da tabela `BibliotecaDepositaria`
#

CREATE TABLE BibliotecaDepositaria (
  bdCod int(10) NOT NULL auto_increment,
  bdNome varchar(255) default NULL,
  bdSigla varchar(30) default NULL,
  bdURL varchar(150) default NULL,
  PRIMARY KEY  (bdCod),
  UNIQUE KEY BIBLIOTECADEPOSITARIA_PK (bdCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `BibliotecaDepositaria`
#

# --------------------------------------------------------

#
# Estrutura da tabela `BibliotecaDigital`
#

CREATE TABLE BibliotecaDigital (
  bbCod int(10) NOT NULL auto_increment,
  bbNome varchar(255) NOT NULL default '',
  bbSigla varchar(30) NOT NULL default '',
  bbURL varchar(255) NOT NULL default '',
  inCod bigint(9) default NULL,
  PRIMARY KEY  (bbCod),
  UNIQUE KEY BIBLIOTECADIGITAL_PK (bbCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `BibliotecaDigital`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Cobertura`
#

CREATE TABLE Cobertura (
  cbCod int(10) NOT NULL default '0',
  tsIdentificador varchar(20) NOT NULL default '0',
  cbIdioma char(3) NOT NULL default '',
  cbCobertura varchar(200) NOT NULL default '',
  PRIMARY KEY  (cbCod),
  UNIQUE KEY COBERTURA_PK (cbCod),
  KEY RELATION_397_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Cobertura`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Conjuntos`
#

CREATE TABLE Conjuntos (
  cjCod int(10) NOT NULL auto_increment,
  cjNome varchar(50) NOT NULL default '',
  cjEspecificacao varchar(50) NOT NULL default '',
  cjDescricao varchar(255) NOT NULL default '',
  PRIMARY KEY  (cjCod),
  UNIQUE KEY SETS_PK (cjCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Conjuntos`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Direitos`
#

CREATE TABLE Direitos (
  drCod int(10) NOT NULL auto_increment,
  tsIdentificador varchar(20) NOT NULL default '0',
  drDireito text,
  drIdioma char(3) default NULL,
  PRIMARY KEY  (drCod),
  UNIQUE KEY DIREITOS_PK (drCod),
  KEY RELATION_400_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Direitos`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Instituicao`
#

CREATE TABLE Instituicao (
  inCod int(10) NOT NULL auto_increment,
  inNome varchar(100) NOT NULL default '',
  inSigla varchar(30) default NULL,
  inPais char(3) default NULL,
  inUF varchar(5) default NULL,
  inCNPJ varchar(30) default NULL,
  inURL varchar(150) default NULL,
  PRIMARY KEY  (inCod),
  UNIQUE KEY PESSOAJURIDICA_PK (inCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Instituicao`
#

# --------------------------------------------------------

#
# Estrutura da tabela `LegendaArquivo`
#

CREATE TABLE LegendaArquivo (
  laCod bigint(9) NOT NULL auto_increment,
  arCod bigint(9) NOT NULL default '0',
  laLegenda varchar(255) NOT NULL default '',
  laIdioma char(2) NOT NULL default '',
  PRIMARY KEY  (laCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `LegendaArquivo`
#

# --------------------------------------------------------

#
# Estrutura da tabela `OAIControle`
#

CREATE TABLE OAIControle (
  tsIdentificador int(11) NOT NULL default '0'
) TYPE=MyISAM;

#
# Extraindo dados da tabela `OAIControle`
#

# --------------------------------------------------------

#
# Estrutura da tabela `PFPJ`
#

CREATE TABLE PFPJ (
  pjCod int(10) NOT NULL default '0',
  pfCod int(10) NOT NULL default '0',
  pfpjTipo varchar(20) default '0',
  PRIMARY KEY  (pjCod,pfCod),
  UNIQUE KEY RELATION_409_PK (pjCod,pfCod),
  KEY RELATION_409_FK2 (pjCod),
  KEY RELATION_409_FK (pfCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `PFPJ`
#

# --------------------------------------------------------

#
# Estrutura da tabela `PessoaFisica`
#

CREATE TABLE PessoaFisica (
  pfCod int(10) NOT NULL default '0',
  pfNome varchar(100) NOT NULL default '',
  pfCitacao varchar(100) default NULL,
  pfCitacaoABNT varchar(100) default NULL,
  pfLattes varchar(255) default NULL,
  pfCPF varchar(20) default NULL,
  pfEmail varchar(150) default NULL,
  PRIMARY KEY  (pfCod),
  UNIQUE KEY PESSOAFISICA_PK (pfCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `PessoaFisica`
#

# --------------------------------------------------------

#
# Estrutura da tabela `PessoaJuridica`
#

CREATE TABLE PessoaJuridica (
  pjCod int(10) NOT NULL default '0',
  pjNome varchar(100) NOT NULL default '',
  pjSigla varchar(30) default NULL,
  pjPais char(3) default NULL,
  pjUF varchar(5) default NULL,
  pjCNPJ varchar(30) default NULL,
  pjURL varchar(150) default NULL,
  PRIMARY KEY  (pjCod),
  UNIQUE KEY PESSOAJURIDICA_PK (pjCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `PessoaJuridica`
#

INSERT INTO PessoaJuridica (pjCod, pjNome, pjSigla, pjPais, pjUF, pjCNPJ, pjURL) VALUES (1, 'Conselho Nacional de Desenvolvimento Científico e Tecnológico', 'CNPq', 'BR', 'DF', '33.654.831/0001-36', 'www.cnpq.br'),
(2, 'Coordenação de Aperfeiçoamento de Pessoal de Nível Superior', 'CAPES', 'BR', 'DF', '00.889.834/0001-08', 'www.capes.gov.br/'),
(3, 'Fundação de Amparo a Pesquisa do Estado de São Paulo', 'FAPESP', 'BR', 'SP', '43.828.151/0001-45', 'www.fapesp.br/'),
(4, 'Fundação Carlos Chagas Filho de Amparo a Pesquisa do Estado do Rio de Janeiro', 'FAPERJ', 'BR', 'RJ', '30.495.394/0001-67', 'www.faperj.br'),
(5, 'Fundação de Amparo a Pesquisa do Estado de Minas Gerais', 'FAPEMIG', 'BR', 'MG', '21.949.888/0001-83', 'www.fapemig.br'),
(6, 'Fundação de Amparo a Pesquisa no Estado do Rio Grande do Sul', 'FAPERGS', 'BR', 'RS', '93.017.663/0001-08', 'www.fapergs.tche.br'),
(7, 'Fundação de Amparo a Ciência e Tecnologia', 'FACEPE', 'BR', 'PE', '24.566.440/0001-79', 'www.facepe.br'),
(8, 'Fundação Cearense de Apoio ao Desenvolvimento Cientifico e Tecnológico', 'FUNCAP', 'BR', 'CE', '00.078.007/0001-26', 'www.funcap.ce.gov.br'),
(9, 'Fundação de Amparo a Pesquisa do Estado da Bahia', 'FAPESB', 'BR', 'BA', '04.902.299/0001-20', 'www.fapesb.ba.gov.br'),
(10, 'Fundação de Amparo a Pesquisa do Estado de Alagoas', 'FAPEAL', 'BR', 'AL', '35.562.321/0001-64', 'www.fapeal.br/');
# --------------------------------------------------------

#
# Estrutura da tabela `Programa`
#

CREATE TABLE Programa (
  prCod int(10) NOT NULL auto_increment,
  prNome varchar(255) NOT NULL default '',
  prArea varchar(100) NOT NULL default '',
  bdCod bigint(9) default NULL,
  PRIMARY KEY  (prCod),
  UNIQUE KEY PROGRAMA_PK (prCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Programa`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Resumo`
#

CREATE TABLE Resumo (
  rsCod int(10) NOT NULL auto_increment,
  tsIdentificador varchar(20) NOT NULL default '0',
  rsResumo longtext NOT NULL,
  rsIdioma char(3) NOT NULL default '',
  PRIMARY KEY  (rsCod),
  UNIQUE KEY RESUMO_PK (rsCod),
  KEY RELATION_399_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Resumo`
#

# --------------------------------------------------------

#
# Estrutura da tabela `TSCJ`
#

CREATE TABLE TSCJ (
  tsIdentificador varchar(20) NOT NULL default '',
  cjCod int(10) NOT NULL default '0',
  PRIMARY KEY  (tsIdentificador,cjCod),
  UNIQUE KEY TSCJ_PK (tsIdentificador,cjCod),
  KEY TSCJ_FK2 (tsIdentificador),
  KEY TSCJ_FK (cjCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `TSCJ`
#

# --------------------------------------------------------

#
# Estrutura da tabela `TSPF`
#

CREATE TABLE TSPF (
  tsIdentificador varchar(20) NOT NULL default '0',
  pfCod int(10) NOT NULL default '0',
  prCod bigint(9) default NULL,
  tspfTipo varchar(30) default NULL,
  tspfDispEmail char(3) default NULL,
  PRIMARY KEY  (tsIdentificador,pfCod),
  UNIQUE KEY RELATION_404_PK (tsIdentificador,pfCod),
  KEY RELATION_404_FK2 (tsIdentificador),
  KEY RELATION_404_FK (pfCod)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `TSPF`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Teses`
#

CREATE TABLE Teses (
  tsIdentificador bigint(20) NOT NULL default '0',
  tsNumeroChamada varchar(35) default '0',
  tsIdioma char(3) default NULL,
  tsGrau varchar(30) default NULL,
  tsTitulacao varchar(255) default NULL,
  tsDataAtualizacao datetime default NULL,
  tsCidadeLocalDefesa varchar(100) default NULL,
  tsUFLocalDefesa varchar(5) default NULL,
  tsPaisLocalDefesa char(3) default NULL,
  tsDataDefesa date default NULL,
  tsDataFinalizacao date default NULL,
  tsDataLiberacaoPos date default NULL,
  cnCodPos bigint(9) default NULL,
  tsDataRevisao date default NULL,
  cnCodRevisor bigint(9) default NULL,
  tsDatacatalogacao date default NULL,
  cnCodCatalogador bigint(9) default NULL,
  tsCampo1 text,
  tsCampo2 text,
  inCod int(11) NOT NULL default '1',
  tsDataDiretorio datetime default NULL,
  PRIMARY KEY  (tsIdentificador),
  UNIQUE KEY TESES_PK (tsIdentificador),
  FULLTEXT KEY tsTitulacao (tsTitulacao)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Teses`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Tipo`
#

CREATE TABLE Tipo (
  tpCod int(10) NOT NULL auto_increment,
  tsIdentificador varchar(20) NOT NULL default '0',
  tpTipo varchar(40) default NULL,
  PRIMARY KEY  (tpCod),
  UNIQUE KEY TIPO_PK (tpCod),
  KEY RELATION_401_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Tipo`
#

# --------------------------------------------------------

#
# Estrutura da tabela `Titulo`
#

CREATE TABLE Titulo (
  ttCod int(10) NOT NULL auto_increment,
  tsIdentificador varchar(20) NOT NULL default '0',
  ttTitulo text,
  ttIdioma char(3) default NULL,
  PRIMARY KEY  (ttCod),
  UNIQUE KEY TITULO_PK (ttCod),
  KEY RELATION_394_FK (tsIdentificador)
) TYPE=MyISAM;

#
# Extraindo dados da tabela `Titulo`
#


