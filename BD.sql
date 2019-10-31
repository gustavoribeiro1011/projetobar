-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Out-2019 às 19:40
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1808 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `usuario`, `cadastro`) VALUES
(1788, 1, '2019-10-30 13:37:01'),
(1789, 1, '2019-10-30 13:37:01'),
(1790, 1, '2019-10-30 13:37:01'),
(1791, 1, '2019-10-30 13:37:01'),
(1792, 1, '2019-10-30 13:37:01'),
(1793, 1, '2019-10-30 13:37:01'),
(1794, 1, '2019-10-30 13:37:01'),
(1795, 1, '2019-10-30 13:37:01'),
(1796, 1, '2019-10-30 13:37:01'),
(1797, 1, '2019-10-30 13:37:01'),
(1798, 1, '2019-10-30 13:37:01'),
(1799, 1, '2019-10-30 13:37:01'),
(1800, 1, '2019-10-30 13:37:01'),
(1801, 1, '2019-10-30 13:37:01'),
(1802, 1, '2019-10-30 13:37:01'),
(1803, 1, '2019-10-30 13:37:01'),
(1804, 1, '2019-10-30 13:37:01'),
(1805, 1, '2019-10-30 13:37:01'),
(1806, 1, '2019-10-30 13:37:01'),
(1807, 1, '2019-10-30 13:37:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` varchar(200) NOT NULL,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `usuario`, `cadastro`) VALUES
(1, 'sanduiche', 1, '2019-10-30 14:54:05'),
(2, 'coca cola', 1, '2019-10-30 14:54:20'),
(3, 'x-salada', 1, '2019-10-30 15:31:51'),
(4, 'x-egg', 1, '2019-10-30 15:33:32'),
(5, 'x-picanha', 1, '2019-10-30 15:33:43'),
(6, 'x-calabresa', 1, '2019-10-30 15:33:49'),
(7, 'x-tudo', 1, '2019-10-30 15:33:58'),
(8, 'batata frita', 1, '2019-10-30 15:34:11'),
(9, 'batata frita com queijo', 1, '2019-10-30 15:34:19'),
(10, 'x-salada gourmet', 1, '2019-10-30 15:34:39'),
(11, 'x-salada egg gourmet', 1, '2019-10-30 15:34:46'),
(12, 'ts', 1, '2019-10-30 15:35:39'),
(13, '3', 1, '2019-10-30 15:42:04'),
(14, '2', 1, '2019-10-30 15:45:43'),
(15, '3', 1, '2019-10-30 15:45:53'),
(16, 'aaaa', 1, '2019-10-30 15:45:56'),
(17, 'aaaa', 1, '2019-10-30 15:46:27'),
(18, 'gadsad', 1, '2019-10-30 16:40:06');

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
(4, 1, '', '2019-10-30 16:21:25');

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
