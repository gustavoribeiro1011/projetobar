-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Dez-2019 às 19:33
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(1, 'BEBIDAS', 1, '2019-11-27 11:34:15', '2019-11-28 09:32:21'),
(2, 'LANCHES', 1, '2019-11-28 11:23:08', '2019-12-03 11:40:39'),
(3, 'PORÇÕES', 1, '2019-11-28 16:24:46', '0000-00-00 00:00:00'),
(4, 'PASTÉIS', 1, '2019-12-03 11:38:21', '0000-00-00 00:00:00'),
(5, 'PIZZAS', 1, '2019-12-03 11:40:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_mesa` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `num_mesa`, `status`, `usuario`, `cadastro`, `modificado`) VALUES
(31, 1, 'indisponivel', 1, '2019-12-09 14:02:58', '2019-12-09 15:23:13'),
(32, 2, 'indisponivel', 1, '2019-12-09 14:02:58', '2019-12-09 14:23:56'),
(33, 3, 'indisponivel', 1, '2019-12-09 14:02:58', '2019-12-09 14:44:23'),
(34, 4, 'disponivel', 1, '2019-12-09 14:02:58', '2019-12-09 15:23:12'),
(35, 5, 'disponivel', 1, '2019-12-09 14:02:58', '0000-00-00 00:00:00'),
(36, 6, 'disponivel', 1, '2019-12-09 14:02:58', '0000-00-00 00:00:00'),
(37, 7, 'disponivel', 1, '2019-12-09 14:02:58', '2019-12-09 14:41:31'),
(38, 8, 'disponivel', 1, '2019-12-09 14:02:58', '0000-00-00 00:00:00'),
(39, 9, 'disponivel', 1, '2019-12-09 14:02:58', '0000-00-00 00:00:00'),
(40, 10, 'disponivel', 1, '2019-12-09 14:02:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_pedido` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `id_produto` int(11) NOT NULL COMMENT 'fk',
  `produto` varchar(200) NOT NULL,
  `id_preco` int(11) NOT NULL COMMENT 'fk',
  `preco` double NOT NULL,
  `id_unidade_medida` int(11) NOT NULL COMMENT 'fk',
  `unidade_medida` varchar(200) NOT NULL,
  `medida` double NOT NULL,
  `id_categoria` int(11) NOT NULL COMMENT 'fk',
  `categoria` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `param_1` varchar(200) NOT NULL,
  `param_2` varchar(200) NOT NULL,
  `param_3` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'FK',
  `usuario` varchar(200) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=372 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `num_pedido`, `mesa`, `origem`, `id_produto`, `produto`, `id_preco`, `preco`, `id_unidade_medida`, `unidade_medida`, `medida`, `id_categoria`, `categoria`, `status`, `param_1`, `param_2`, `param_3`, `id_usuario`, `usuario`, `cadastro`, `modificado`) VALUES
(368, 1, 1, 'comanda eletronica', 0, '', 0, 0, 0, '', 0, 0, '', 'pedido aberto', '', '', '', 1, 'projetobar ', '2019-12-09 15:23:13', '0000-00-00 00:00:00'),
(369, 1, 1, 'comanda eletronica', 14, 'BRAHMA', 22, 5, 22, 'ml', 350, 1, 'BEBIDAS', 'item cadastrado', '', '', '', 1, 'projetobar ', '2019-12-09 15:23:21', '0000-00-00 00:00:00'),
(370, 1, 1, 'comanda eletronica', 26, 'PASTEL DE PIZZA', 35, 5, 35, 'un', 1, 4, 'PASTÉIS', 'item cadastrado', '', '', '', 1, 'projetobar ', '2019-12-09 15:23:30', '0000-00-00 00:00:00'),
(371, 1, 1, 'comanda eletronica', 9, 'PEPSI', 17, 3.5, 17, 'ml', 350, 1, 'BEBIDAS', 'item cadastrado', '', '', '', 1, 'projetobar ', '2019-12-09 15:23:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE IF NOT EXISTS `precos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL COMMENT 'FK',
  `variacao` int(11) NOT NULL,
  `preco` double NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`id`, `id_produto`, `variacao`, `preco`, `cadastro`, `modificado`) VALUES
(5, 2, 1, 3, '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(6, 2, 2, 5, '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(7, 2, 3, 8, '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(8, 3, 1, 5, '2019-11-28 11:22:54', '2019-12-06 15:56:37'),
(9, 3, 2, 8, '2019-11-28 11:22:54', '2019-12-06 15:56:37'),
(10, 4, 1, 12, '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(11, 5, 1, 20, '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(12, 6, 1, 14, '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(13, 7, 1, 14, '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(14, 8, 1, 5, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(15, 8, 2, 8, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(16, 9, 1, 6, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(17, 9, 2, 3.5, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(18, 10, 1, 20, '2019-11-28 16:25:14', '2019-12-06 15:51:38'),
(19, 11, 1, 15.9, '2019-11-28 16:25:31', '2019-12-06 15:51:47'),
(20, 12, 1, 18.9, '2019-11-28 16:25:43', '2019-12-06 15:51:57'),
(21, 13, 1, 15, '2019-11-28 16:26:07', '2019-12-06 15:52:04'),
(22, 14, 1, 5, '2019-11-29 14:58:52', '2019-12-03 11:32:36'),
(23, 14, 2, 8, '2019-12-03 11:32:36', '0000-00-00 00:00:00'),
(24, 15, 1, 5, '2019-12-03 11:33:04', '0000-00-00 00:00:00'),
(25, 16, 1, 8, '2019-12-03 11:33:59', '0000-00-00 00:00:00'),
(26, 17, 1, 5, '2019-12-03 11:34:22', '0000-00-00 00:00:00'),
(27, 18, 1, 9, '2019-12-03 11:34:49', '0000-00-00 00:00:00'),
(28, 19, 1, 6, '2019-12-03 11:35:22', '0000-00-00 00:00:00'),
(29, 20, 1, 4, '2019-12-03 11:36:13', '0000-00-00 00:00:00'),
(30, 21, 1, 8, '2019-12-03 11:37:00', '0000-00-00 00:00:00'),
(31, 22, 1, 12, '2019-12-03 11:37:58', '0000-00-00 00:00:00'),
(32, 23, 1, 5, '2019-12-03 11:38:41', '2019-12-06 15:50:34'),
(33, 24, 1, 5, '2019-12-03 11:38:50', '2019-12-06 15:50:43'),
(34, 25, 1, 5, '2019-12-03 11:39:04', '2019-12-06 15:51:09'),
(35, 26, 1, 5, '2019-12-03 11:39:12', '2019-12-06 15:50:53'),
(36, 27, 1, 5, '2019-12-03 11:39:36', '2019-12-06 15:51:01'),
(37, 28, 1, 30, '2019-12-03 11:41:29', '2019-12-06 15:52:48'),
(38, 29, 1, 15, '2019-12-03 11:41:48', '2019-12-06 15:53:39'),
(39, 30, 1, 20, '2019-12-03 11:42:32', '2019-12-06 15:53:02'),
(40, 31, 1, 30, '2019-12-03 11:44:27', '2019-12-06 15:52:40'),
(41, 32, 1, 20, '2019-12-03 11:44:39', '2019-12-06 15:53:21'),
(42, 33, 1, 15, '2019-12-03 11:44:56', '2019-12-06 15:52:27'),
(43, 34, 1, 40, '2019-12-03 11:45:22', '2019-12-06 15:53:31'),
(44, 35, 1, 30, '2019-12-03 11:45:55', '2019-12-06 15:53:47'),
(45, 36, 1, 15, '2019-12-03 11:46:07', '2019-12-06 15:54:20'),
(46, 37, 1, 20, '2019-12-03 11:46:21', '2019-12-06 15:54:08'),
(47, 3, 3, 3.5, '2019-12-06 15:56:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `categoria` int(11) NOT NULL COMMENT 'FK',
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(2, 'FANTA', 1, 1, '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(3, 'COCA-COLA', 1, 1, '2019-11-28 11:22:54', '2019-12-06 15:56:37'),
(4, 'X-SALADA', 2, 1, '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(5, 'X-TUDO', 2, 1, '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(6, 'X-EGG', 2, 1, '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(7, 'X-FRANGO', 2, 1, '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(8, 'SKOL', 1, 1, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(9, 'PEPSI', 1, 1, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(10, 'PORÇÃO DE BATATA FRITA COM QUEIJO', 3, 1, '2019-11-28 16:25:14', '2019-12-06 15:51:38'),
(11, 'PORÇÃO DE BATATA FRITA', 3, 1, '2019-11-28 16:25:31', '2019-12-06 15:51:47'),
(12, 'PORÇÃO DE CALABRESA', 3, 1, '2019-11-28 16:25:43', '2019-12-06 15:51:57'),
(13, 'PORÇÃO DE PEIXE FRITO', 3, 1, '2019-11-28 16:26:07', '2019-12-06 15:52:04'),
(14, 'BRAHMA', 1, 1, '2019-11-29 14:58:52', '2019-12-03 11:32:36'),
(15, 'SUKITA', 1, 1, '2019-12-03 11:33:04', '0000-00-00 00:00:00'),
(16, 'SPRITE', 1, 1, '2019-12-03 11:33:59', '0000-00-00 00:00:00'),
(17, 'FANTA UVA', 1, 1, '2019-12-03 11:34:22', '0000-00-00 00:00:00'),
(18, 'TAMPICO', 1, 1, '2019-12-03 11:34:49', '0000-00-00 00:00:00'),
(19, 'RIO BRANCO', 1, 1, '2019-12-03 11:35:22', '0000-00-00 00:00:00'),
(20, 'MISTO QUENTE', 2, 1, '2019-12-03 11:36:13', '0000-00-00 00:00:00'),
(21, 'X-DOG', 2, 1, '2019-12-03 11:37:00', '0000-00-00 00:00:00'),
(22, 'X-CALABRESA', 2, 1, '2019-12-03 11:37:57', '0000-00-00 00:00:00'),
(23, 'PASTEL DE CARNE', 4, 1, '2019-12-03 11:38:41', '2019-12-06 15:50:34'),
(24, 'PASTEL DE FRANGO', 4, 1, '2019-12-03 11:38:50', '2019-12-06 15:50:43'),
(25, 'PASTEL DE CARNE COM OVO', 4, 1, '2019-12-03 11:39:04', '2019-12-06 15:51:09'),
(26, 'PASTEL DE PIZZA', 4, 1, '2019-12-03 11:39:12', '2019-12-06 15:50:53'),
(27, 'PASTEL DE QUEIJO', 4, 1, '2019-12-03 11:39:36', '2019-12-06 15:51:01'),
(28, 'PIZZA PORTUGUESA GRANDE', 5, 1, '2019-12-03 11:41:29', '2019-12-06 15:52:48'),
(29, 'PIZZA PORTUGUESA PEQUENA', 5, 1, '2019-12-03 11:41:48', '2019-12-06 15:53:39'),
(30, 'PIZZA PORTUGUESA MÉDIA', 5, 1, '2019-12-03 11:42:32', '2019-12-06 15:53:02'),
(31, 'PIZZA DE CALABRESA GRANDE', 5, 1, '2019-12-03 11:44:27', '2019-12-06 15:52:40'),
(32, 'PIZZA DE CALABRESA MÉDIA', 5, 1, '2019-12-03 11:44:39', '2019-12-06 15:53:21'),
(33, 'PIZZA DE CALABRESA PEQUENA', 5, 1, '2019-12-03 11:44:56', '2019-12-06 15:52:27'),
(34, 'PIZZA À MODA DA CASA GRANDE', 5, 1, '2019-12-03 11:45:22', '2019-12-06 15:53:31'),
(35, 'PIZZA DE QUATRO QUEIJO GRANDE', 5, 1, '2019-12-03 11:45:55', '2019-12-06 15:53:47'),
(36, 'PIZZA DE QUATRO QUEIJO PEQUENA', 5, 1, '2019-12-03 11:46:07', '2019-12-06 15:54:20'),
(37, 'PIZZA DE QUATRO QUEIJO MÉDIA', 5, 1, '2019-12-03 11:46:21', '2019-12-06 15:54:08');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `sidebar`
--

INSERT INTO `sidebar` (`id`, `id_usuario`, `status`, `cadastro`) VALUES
(4, 1, '', '2019-12-09 14:02:48'),
(5, 2, 'toggled', '2019-11-14 14:06:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `variacao` int(11) NOT NULL,
  `medida` double NOT NULL,
  `unidade_medida` varchar(100) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id`, `id_produto`, `variacao`, `medida`, `unidade_medida`, `cadastro`, `modificado`) VALUES
(5, 2, 1, 350, 'ml', '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(6, 2, 2, 1, 'l', '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(7, 2, 3, 2, 'l', '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(8, 3, 1, 1, 'l', '2019-11-28 11:22:54', '2019-12-06 15:56:37'),
(9, 3, 2, 2, 'l', '2019-11-28 11:22:54', '2019-12-06 15:56:37'),
(10, 4, 1, 1, 'un', '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(11, 5, 1, 1, 'un', '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(12, 6, 1, 1, 'un', '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(13, 7, 1, 1, 'un', '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(14, 8, 1, 350, 'ml', '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(15, 8, 2, 1, 'l', '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(16, 9, 1, 1, 'l', '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(17, 9, 2, 350, 'ml', '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(18, 10, 1, 1, 'un', '2019-11-28 16:25:14', '2019-12-06 15:51:38'),
(19, 11, 1, 1, 'un', '2019-11-28 16:25:31', '2019-12-06 15:51:47'),
(20, 12, 1, 1, 'un', '2019-11-28 16:25:43', '2019-12-06 15:51:57'),
(21, 13, 1, 1, 'un', '2019-11-28 16:26:07', '2019-12-06 15:52:04'),
(22, 14, 1, 350, 'ml', '2019-11-29 14:58:52', '2019-12-03 11:32:36'),
(23, 14, 2, 1.5, 'l', '2019-12-03 11:32:36', '0000-00-00 00:00:00'),
(24, 15, 1, 350, 'ml', '2019-12-03 11:33:04', '0000-00-00 00:00:00'),
(25, 16, 1, 2, 'l', '2019-12-03 11:33:59', '0000-00-00 00:00:00'),
(26, 17, 1, 350, 'ml', '2019-12-03 11:34:22', '0000-00-00 00:00:00'),
(27, 18, 1, 1, 'l', '2019-12-03 11:34:49', '0000-00-00 00:00:00'),
(28, 19, 1, 2, 'l', '2019-12-03 11:35:22', '0000-00-00 00:00:00'),
(29, 20, 1, 1, 'un', '2019-12-03 11:36:13', '0000-00-00 00:00:00'),
(30, 21, 1, 1, 'un', '2019-12-03 11:37:00', '0000-00-00 00:00:00'),
(31, 22, 1, 1, 'un', '2019-12-03 11:37:58', '0000-00-00 00:00:00'),
(32, 23, 1, 1, 'un', '2019-12-03 11:38:41', '2019-12-06 15:50:34'),
(33, 24, 1, 1, 'un', '2019-12-03 11:38:50', '2019-12-06 15:50:43'),
(34, 25, 1, 1, 'un', '2019-12-03 11:39:04', '2019-12-06 15:51:09'),
(35, 26, 1, 1, 'un', '2019-12-03 11:39:12', '2019-12-06 15:50:53'),
(36, 27, 1, 1, 'un', '2019-12-03 11:39:36', '2019-12-06 15:51:01'),
(37, 28, 1, 1, 'un', '2019-12-03 11:41:29', '2019-12-06 15:52:48'),
(38, 29, 1, 1, 'un', '2019-12-03 11:41:48', '2019-12-06 15:53:39'),
(39, 30, 1, 1, 'un', '2019-12-03 11:42:32', '2019-12-06 15:53:02'),
(40, 31, 1, 1, 'un', '2019-12-03 11:44:27', '2019-12-06 15:52:40'),
(41, 32, 1, 1, 'un', '2019-12-03 11:44:39', '2019-12-06 15:53:21'),
(42, 33, 1, 1, 'un', '2019-12-03 11:44:56', '2019-12-06 15:52:27'),
(43, 34, 1, 1, 'un', '2019-12-03 11:45:22', '2019-12-06 15:53:31'),
(44, 35, 1, 1, 'un', '2019-12-03 11:45:55', '2019-12-06 15:53:47'),
(45, 36, 1, 1, 'un', '2019-12-03 11:46:07', '2019-12-06 15:54:20'),
(46, 37, 1, 1, 'un', '2019-12-03 11:46:21', '2019-12-06 15:54:08'),
(47, 3, 3, 350, 'ml', '2019-12-06 15:56:37', '0000-00-00 00:00:00');

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
(0000000001, 'projetobar', 'projetobar', '', '5e0b1add25eddd4228e1111d9746b00f', 'projetobar@gmail.com', 'adm'),
(0000000002, 'gustavo.ribeiro', 'Gustavo', 'Ribeiro', '202cb962ac59075b964b07152d234b70', 'gustavoribeiro1011@gmail.com', 'adm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
