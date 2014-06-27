-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Out 08, 2012 as 07:50 AM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `tede`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_export`
--

CREATE TABLE `log_export` (
  `le_data` datetime NOT NULL,
  `tsIdentificador` int(11) NOT NULL,
  `le_metadados` text,
  `le_arquivos` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
