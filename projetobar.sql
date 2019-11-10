-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 10-Nov-2019 às 12:34
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `projetobar`
--
CREATE DATABASE IF NOT EXISTS `projetobar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetobar`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(2, 'BEBIDAS', 1, '2019-11-01 10:41:28', '0000-00-00 00:00:00'),
(3, 'SANDUÍCHES', 1, '2019-11-01 10:41:41', '0000-00-00 00:00:00'),
(4, 'PORÇÕES', 1, '2019-11-01 10:43:02', '0000-00-00 00:00:00'),
(8, 'PIZZAS', 1, '2019-11-07 19:31:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2020 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `usuario`, `cadastro`) VALUES
(1980, 1, '2019-11-07 19:34:24'),
(1981, 1, '2019-11-07 19:34:24'),
(1982, 1, '2019-11-07 19:34:24'),
(1983, 1, '2019-11-07 19:34:24'),
(1984, 1, '2019-11-07 19:34:24'),
(1985, 1, '2019-11-07 19:34:24'),
(1986, 1, '2019-11-07 19:34:25'),
(1987, 1, '2019-11-07 19:34:25'),
(1988, 1, '2019-11-07 19:34:25'),
(1989, 1, '2019-11-07 19:34:25'),
(1990, 1, '2019-11-07 19:34:25'),
(1991, 1, '2019-11-07 19:34:25'),
(1992, 1, '2019-11-07 19:34:25'),
(1993, 1, '2019-11-07 19:34:25'),
(1994, 1, '2019-11-07 19:34:25'),
(1995, 1, '2019-11-07 19:34:25'),
(1996, 1, '2019-11-07 19:34:25'),
(1997, 1, '2019-11-07 19:34:25'),
(1998, 1, '2019-11-07 19:34:25'),
(1999, 1, '2019-11-07 19:34:25'),
(2000, 1, '2019-11-07 19:34:26'),
(2001, 1, '2019-11-07 19:34:26'),
(2002, 1, '2019-11-07 19:34:26'),
(2003, 1, '2019-11-07 19:34:26'),
(2004, 1, '2019-11-07 19:34:26'),
(2005, 1, '2019-11-07 19:34:26'),
(2006, 1, '2019-11-07 19:34:26'),
(2007, 1, '2019-11-07 19:34:26'),
(2008, 1, '2019-11-07 19:34:26'),
(2009, 1, '2019-11-07 19:34:26'),
(2010, 1, '2019-11-07 19:34:26'),
(2011, 1, '2019-11-07 19:34:26'),
(2012, 1, '2019-11-07 19:34:27'),
(2013, 1, '2019-11-07 19:34:27'),
(2014, 1, '2019-11-07 19:34:27'),
(2015, 1, '2019-11-07 19:34:27'),
(2016, 1, '2019-11-07 19:34:27'),
(2017, 1, '2019-11-07 19:34:27'),
(2018, 1, '2019-11-07 19:34:27'),
(2019, 1, '2019-11-07 19:34:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_pedido` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `produto` varchar(200) NOT NULL,
  `preco` double NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'FK',
  `usuario` varchar(200) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=185 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `categoria` int(11) NOT NULL COMMENT 'FK',
  `preco` double NOT NULL,
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categoria`, `preco`, `usuario`, `cadastro`, `modificado`) VALUES
(67, 'X-PICANHA', 3, 14, 1, '2019-10-31 18:55:26', '2019-11-08 11:36:06'),
(73, 'X-BACON', 3, 13, 1, '2019-10-31 19:09:14', '2019-11-08 11:36:15'),
(77, 'X-FRANGO', 3, 12, 1, '2019-10-31 21:07:20', '2019-11-06 19:39:51'),
(98, 'X-SALADA', 3, 12, 1, '2019-11-01 15:20:24', '2019-11-08 11:37:26'),
(101, 'CALABRESA', 8, 20, 1, '2019-11-07 19:31:53', '0000-00-00 00:00:00'),
(102, 'MODA DA CASA', 8, 50, 1, '2019-11-08 11:17:59', '0000-00-00 00:00:00'),
(103, 'COCA-COLA 1,5L', 2, 6, 1, '2019-11-08 11:18:26', '2019-11-08 11:18:55'),
(104, 'FANTA 1,5L', 2, 6, 1, '2019-11-08 11:18:40', '2019-11-08 11:19:00'),
(105, 'SKOL', 2, 5, 1, '2019-11-08 11:19:38', '0000-00-00 00:00:00'),
(106, 'CALABRESA', 4, 15, 1, '2019-11-08 11:19:47', '0000-00-00 00:00:00'),
(107, 'BATATA FRITA COM QUEIJO', 4, 19.9, 1, '2019-11-08 11:20:05', '0000-00-00 00:00:00'),
(108, 'PEIXE FRITO', 4, 22, 1, '2019-11-08 11:20:23', '0000-00-00 00:00:00'),
(109, 'CAMARAO', 4, 25, 1, '2019-11-08 11:20:32', '0000-00-00 00:00:00'),
(110, 'X-TUDO', 3, 20, 1, '2019-11-10 10:30:45', '0000-00-00 00:00:00'),
(111, 'GUARANÁ 600ml', 2, 6, 1, '2019-11-10 10:31:07', '0000-00-00 00:00:00'),
(112, 'GUARANÁ 1,5L', 2, 8, 1, '2019-11-10 10:31:25', '0000-00-00 00:00:00'),
(113, 'PORTUGUESA', 8, 22, 1, '2019-11-10 10:31:38', '0000-00-00 00:00:00'),
(114, 'QUATRO QUEIJO', 8, 22, 1, '2019-11-10 10:31:50', '0000-00-00 00:00:00'),
(115, 'Strogonoff de Carne', 8, 25, 1, '2019-11-10 10:32:07', '0000-00-00 00:00:00'),
(116, 'AMERICANA', 8, 20, 1, '2019-11-10 10:32:21', '0000-00-00 00:00:00'),
(117, 'SUCO DE MORANGO', 2, 6, 1, '2019-11-10 10:32:41', '0000-00-00 00:00:00'),
(118, 'SUCO DE LARANJA', 2, 6, 1, '2019-11-10 10:32:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sidebar`
--

CREATE TABLE IF NOT EXISTS `sidebar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `sidebar`
--

INSERT INTO `sidebar` (`id`, `id_usuario`, `status`, `cadastro`) VALUES
(4, 1, 'toggled', '2019-11-09 10:15:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `login` varchar(30) DEFAULT NULL,
  `nome` varchar(155) NOT NULL,
  `sobrenome` varchar(155) NOT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `nivel` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nome`, `sobrenome`, `senha`, `email`, `nivel`) VALUES
(0000000001, 'projetobar', 'projetobar', '', '5e0b1add25eddd4228e1111d9746b00f', 'projetobar@gmail.com', 'adm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
