-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 31-Out-2019 às 14:52
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `projeto`
--
CREATE DATABASE IF NOT EXISTS `projeto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projeto`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1838 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `usuario`, `cadastro`) VALUES
(1808, 1, '2019-10-31 11:12:12'),
(1809, 1, '2019-10-31 11:12:12'),
(1810, 1, '2019-10-31 11:12:12'),
(1811, 1, '2019-10-31 11:12:12'),
(1812, 1, '2019-10-31 11:12:12'),
(1813, 1, '2019-10-31 11:12:12'),
(1814, 1, '2019-10-31 11:12:12'),
(1815, 1, '2019-10-31 11:12:12'),
(1816, 1, '2019-10-31 11:12:12'),
(1817, 1, '2019-10-31 11:12:12'),
(1818, 1, '2019-10-31 11:12:12'),
(1819, 1, '2019-10-31 11:12:12'),
(1820, 1, '2019-10-31 11:12:12'),
(1821, 1, '2019-10-31 11:12:12'),
(1822, 1, '2019-10-31 11:12:12'),
(1823, 1, '2019-10-31 11:12:12'),
(1824, 1, '2019-10-31 11:12:12'),
(1825, 1, '2019-10-31 11:12:12'),
(1826, 1, '2019-10-31 11:12:12'),
(1827, 1, '2019-10-31 11:12:12'),
(1828, 1, '2019-10-31 11:12:12'),
(1829, 1, '2019-10-31 11:12:12'),
(1830, 1, '2019-10-31 11:12:12'),
(1831, 1, '2019-10-31 11:12:12'),
(1832, 1, '2019-10-31 11:12:12'),
(1833, 1, '2019-10-31 11:12:12'),
(1834, 1, '2019-10-31 11:12:12'),
(1835, 1, '2019-10-31 11:12:12'),
(1836, 1, '2019-10-31 11:12:12'),
(1837, 1, '2019-10-31 11:12:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  `modificado` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `usuario`, `cadastro`, `modificado`) VALUES
(37, 'dog 1', 1, '2019-10-31 09:53:30', '2019-10-31 11:50:54'),
(38, 'x-salada', 1, '2019-10-31 09:53:34', '2019-10-31 11:50:17'),
(39, 'x-picanha', 1, '2019-10-31 09:53:42', '2019-10-31 11:09:01'),
(40, 'porção de batata frita2', 1, '2019-10-31 09:55:21', '2019-10-31 11:51:03'),
(41, 'x-dogão', 1, '2019-10-31 10:00:44', '2019-10-31 11:10:13'),
(42, 'pizza 2', 1, '2019-10-31 10:00:49', '2019-10-31 11:50:00'),
(43, 'dog 2', 1, '2019-10-31 10:01:39', '2019-10-31 11:49:19'),
(44, 'x-calabresa', 1, '2019-10-31 10:01:45', '2019-10-31 11:10:05'),
(45, 'teste', 1, '2019-10-31 10:27:33', '2019-10-31 11:50:39'),
(46, 'hot-dog', 1, '2019-10-31 11:13:23', '2019-10-31 11:44:59'),
(47, 'x-tudo', 1, '2019-10-31 11:13:36', '0000-00-00 00:00:00');

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
(4, 1, '', '2019-10-31 11:21:37');

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
