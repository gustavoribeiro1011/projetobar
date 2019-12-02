-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Dez-2019 às 14:50
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(1, 'BEBIDAS', 1, '2019-11-27 11:34:15', '2019-11-28 09:32:21'),
(2, 'SANDUÍCHES', 1, '2019-11-28 11:23:08', '0000-00-00 00:00:00'),
(3, 'PORÇÕES', 1, '2019-11-28 16:24:46', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `num_mesa`, `status`, `usuario`, `cadastro`, `modificado`) VALUES
(11, 1, 'disponivel', 1, '2019-11-29 09:38:57', '2019-12-02 10:32:18'),
(12, 2, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(13, 3, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(14, 4, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(15, 5, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(16, 6, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(17, 7, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(18, 8, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(19, 9, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00'),
(20, 10, 'disponivel', 1, '2019-11-29 09:38:57', '0000-00-00 00:00:00');

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
  `param_1` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL COMMENT 'FK',
  `usuario` varchar(200) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=218 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`id`, `id_produto`, `variacao`, `preco`, `cadastro`, `modificado`) VALUES
(5, 2, 1, 3, '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(6, 2, 2, 5, '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(7, 2, 3, 8, '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(8, 3, 1, 5, '2019-11-28 11:22:54', '0000-00-00 00:00:00'),
(9, 3, 2, 8, '2019-11-28 11:22:54', '0000-00-00 00:00:00'),
(10, 4, 1, 12, '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(11, 5, 1, 20, '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(12, 6, 1, 14, '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(13, 7, 1, 14, '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(14, 8, 1, 5, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(15, 8, 2, 8, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(16, 9, 1, 6, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(17, 9, 2, 3.5, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(18, 10, 1, 20, '2019-11-28 16:25:14', '0000-00-00 00:00:00'),
(19, 11, 1, 15.9, '2019-11-28 16:25:31', '0000-00-00 00:00:00'),
(20, 12, 1, 18.9, '2019-11-28 16:25:43', '0000-00-00 00:00:00'),
(21, 13, 1, 15, '2019-11-28 16:26:07', '0000-00-00 00:00:00'),
(22, 14, 1, 0.01, '2019-11-29 14:58:52', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(2, 'FANTA', 1, 1, '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(3, 'COCA-COLA', 1, 1, '2019-11-28 11:22:54', '0000-00-00 00:00:00'),
(4, 'X-SALADA', 2, 1, '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(5, 'X-TUDO', 2, 1, '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(6, 'X-EGG', 2, 1, '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(7, 'X-FRANGO', 2, 1, '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(8, 'SKOL', 1, 1, '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(9, 'PEPSI', 1, 1, '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(10, 'BATATA FRITA COM QUEIJO', 3, 1, '2019-11-28 16:25:14', '0000-00-00 00:00:00'),
(11, 'BATATA FRITA', 3, 1, '2019-11-28 16:25:31', '0000-00-00 00:00:00'),
(12, 'CALABRESA', 3, 1, '2019-11-28 16:25:43', '0000-00-00 00:00:00'),
(13, 'PEIXE FRITO', 3, 1, '2019-11-28 16:26:07', '0000-00-00 00:00:00'),
(14, 'teste', 1, 1, '2019-11-29 14:58:52', '0000-00-00 00:00:00');

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
(4, 1, 'toggled', '2019-11-28 09:23:58'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `unidade_medida`
--

INSERT INTO `unidade_medida` (`id`, `id_produto`, `variacao`, `medida`, `unidade_medida`, `cadastro`, `modificado`) VALUES
(5, 2, 1, 350, 'ml', '2019-11-28 09:35:20', '2019-11-28 09:39:42'),
(6, 2, 2, 1, 'l', '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(7, 2, 3, 2, 'l', '2019-11-28 09:39:42', '0000-00-00 00:00:00'),
(8, 3, 1, 1, 'l', '2019-11-28 11:22:54', '0000-00-00 00:00:00'),
(9, 3, 2, 2, 'l', '2019-11-28 11:22:54', '0000-00-00 00:00:00'),
(10, 4, 1, 1, 'un', '2019-11-28 11:23:26', '0000-00-00 00:00:00'),
(11, 5, 1, 1, 'un', '2019-11-28 11:23:38', '0000-00-00 00:00:00'),
(12, 6, 1, 1, 'un', '2019-11-28 11:24:02', '0000-00-00 00:00:00'),
(13, 7, 1, 1, 'un', '2019-11-28 11:24:22', '0000-00-00 00:00:00'),
(14, 8, 1, 350, 'ml', '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(15, 8, 2, 1, 'l', '2019-11-28 11:24:55', '0000-00-00 00:00:00'),
(16, 9, 1, 1, 'l', '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(17, 9, 2, 350, 'ml', '2019-11-28 11:26:16', '2019-11-28 16:24:39'),
(18, 10, 1, 1, 'un', '2019-11-28 16:25:14', '0000-00-00 00:00:00'),
(19, 11, 1, 1, 'un', '2019-11-28 16:25:31', '0000-00-00 00:00:00'),
(20, 12, 1, 1, 'un', '2019-11-28 16:25:43', '0000-00-00 00:00:00'),
(21, 13, 1, 1, 'un', '2019-11-28 16:26:07', '0000-00-00 00:00:00'),
(22, 14, 1, 1, 'un', '2019-11-29 14:58:52', '0000-00-00 00:00:00');

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
