-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 22-Nov-2019 às 19:22
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(2, 'BEBIDAS', 1, '2019-11-01 10:41:28', '2019-11-21 15:20:57'),
(3, 'SANDUÍCHES', 1, '2019-11-01 10:41:41', '0000-00-00 00:00:00'),
(4, 'PORÇÕES', 1, '2019-11-01 10:43:02', '0000-00-00 00:00:00'),
(8, 'PIZZAS', 1, '2019-11-07 19:31:39', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2319 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `num_mesa`, `status`, `usuario`, `cadastro`, `modificado`) VALUES
(2299, 1, 'indisponivel', 1, '2019-11-21 14:58:32', '2019-11-21 14:58:54'),
(2300, 2, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2301, 3, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2302, 4, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2303, 5, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2304, 6, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2305, 7, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2306, 8, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2307, 9, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2308, 10, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2309, 11, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2310, 12, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2311, 13, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2312, 14, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2313, 15, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2314, 16, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2315, 17, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2316, 18, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2317, 19, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00'),
(2318, 20, 'disponivel', 1, '2019-11-21 14:58:32', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `num_pedido`, `mesa`, `origem`, `id_produto`, `produto`, `preco`, `id_categoria`, `categoria`, `status`, `id_usuario`, `usuario`, `cadastro`, `modificado`) VALUES
(11, 1, 1, 'comanda eletronica', 0, '', 0, 0, '', 'pedido aberto', 1, 'projetobar ', '2019-11-21 14:58:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `categoria` int(11) NOT NULL COMMENT 'FK',
  `unidade_medida` int(11) NOT NULL COMMENT 'FK',
  `medida` double NOT NULL,
  `preco` double NOT NULL,
  `usuario` int(11) NOT NULL COMMENT 'FK',
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categoria`, `unidade_medida`, `medida`, `preco`, `usuario`, `cadastro`, `modificado`) VALUES
(67, 'X-PICANHA', 3, 0, 0, 14, 1, '2019-10-31 18:55:26', '2019-11-13 14:40:38'),
(73, 'X-BACON', 3, 0, 0, 13, 1, '2019-10-31 19:09:14', '2019-11-13 13:59:35'),
(77, 'X-FRANGO', 3, 0, 0, 12, 1, '2019-10-31 21:07:20', '2019-11-13 13:53:47'),
(98, 'X-SALADA', 3, 0, 0, 12, 1, '2019-11-01 15:20:24', '2019-11-22 10:33:30'),
(101, 'CALABRESA', 8, 0, 0, 20, 1, '2019-11-07 19:31:53', '0000-00-00 00:00:00'),
(102, 'MODA DA CASA', 8, 0, 0, 50, 1, '2019-11-08 11:17:59', '0000-00-00 00:00:00'),
(103, 'COCA-COLA', 2, 1, 1.5, 6, 1, '2019-11-08 11:18:26', '2019-11-22 16:20:15'),
(104, 'FANTA', 2, 1, 1.5, 6, 1, '2019-11-08 11:18:40', '2019-11-22 16:20:30'),
(105, 'SKOL', 2, 2, 0, 5, 1, '2019-11-08 11:19:38', '2019-11-22 10:36:52'),
(106, 'CALABRESA', 4, 0, 0, 15, 1, '2019-11-08 11:19:47', '0000-00-00 00:00:00'),
(107, 'BATATA FRITA COM QUEIJO', 4, 0, 0, 19.9, 1, '2019-11-08 11:20:05', '0000-00-00 00:00:00'),
(108, 'PEIXE FRITO', 4, 0, 0, 22, 1, '2019-11-08 11:20:23', '2019-11-13 14:47:08'),
(109, 'CAMARAO', 4, 0, 0, 25, 1, '2019-11-08 11:20:32', '0000-00-00 00:00:00'),
(110, 'X-TUDO', 3, 0, 0, 20, 1, '2019-11-10 10:30:45', '2019-11-22 10:09:31'),
(111, 'GUARANÁ', 2, 2, 600, 6, 1, '2019-11-10 10:31:07', '2019-11-22 16:21:03'),
(112, 'GUARANÁ', 2, 1, 1.5, 8, 1, '2019-11-10 10:31:25', '2019-11-22 16:20:36'),
(113, 'PORTUGUESA', 8, 0, 0, 22, 1, '2019-11-10 10:31:38', '2019-11-13 14:39:45'),
(114, 'QUATRO QUEIJO', 8, 0, 0, 22, 1, '2019-11-10 10:31:50', '2019-11-13 13:59:43'),
(115, 'STROGONOFF DE CARNE', 8, 0, 0, 25, 1, '2019-11-10 10:32:07', '2019-11-13 13:41:35'),
(116, 'AMERICANA', 8, 0, 0, 20, 1, '2019-11-10 10:32:21', '2019-11-22 16:19:52'),
(117, 'SUCO DE MORANGO', 2, 1, 0, 6, 1, '2019-11-10 10:32:41', '2019-11-22 10:37:02'),
(118, 'SUCO DE LARANJA', 2, 1, 0, 6, 1, '2019-11-10 10:32:52', '2019-11-22 10:36:58');

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
(4, 1, '', '2019-11-22 16:01:42'),
(5, 2, 'toggled', '2019-11-14 14:06:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade_medida`
--

CREATE TABLE IF NOT EXISTS `unidade_medida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unidade_medida` varchar(100) NOT NULL,
  `unidade_medida_abreviado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id`, `unidade_medida`, `unidade_medida_abreviado`) VALUES
(1, 'litro', 'l'),
(2, 'mililitro', 'ml');

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
