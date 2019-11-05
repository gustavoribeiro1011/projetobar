-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 05-Nov-2019 às 00:24
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `usuario`, `cadastro`, `modificado`) VALUES
(2, 'BEBIDAS', 1, '2019-11-01 10:41:28', '0000-00-00 00:00:00'),
(3, 'SANDUÍCHES', 1, '2019-11-01 10:41:41', '0000-00-00 00:00:00'),
(4, 'PORÇÕES', 1, '2019-11-01 10:43:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1888 ;

--
-- Extraindo dados da tabela `mesas`
--

INSERT INTO `mesas` (`id`, `usuario`, `cadastro`) VALUES
(1838, 1, '2019-11-02 17:28:15'),
(1839, 1, '2019-11-02 17:28:15'),
(1840, 1, '2019-11-02 17:28:15'),
(1841, 1, '2019-11-02 17:28:15'),
(1842, 1, '2019-11-02 17:28:15'),
(1843, 1, '2019-11-02 17:28:15'),
(1844, 1, '2019-11-02 17:28:15'),
(1845, 1, '2019-11-02 17:28:15'),
(1846, 1, '2019-11-02 17:28:15'),
(1847, 1, '2019-11-02 17:28:16'),
(1848, 1, '2019-11-02 17:28:16'),
(1849, 1, '2019-11-02 17:28:16'),
(1850, 1, '2019-11-02 17:28:16'),
(1851, 1, '2019-11-02 17:28:16'),
(1852, 1, '2019-11-02 17:28:16'),
(1853, 1, '2019-11-02 17:28:16'),
(1854, 1, '2019-11-02 17:28:16'),
(1855, 1, '2019-11-02 17:28:16'),
(1856, 1, '2019-11-02 17:28:16'),
(1857, 1, '2019-11-02 17:28:16'),
(1858, 1, '2019-11-02 17:28:16'),
(1859, 1, '2019-11-02 17:28:16'),
(1860, 1, '2019-11-02 17:28:16'),
(1861, 1, '2019-11-02 17:28:16'),
(1862, 1, '2019-11-02 17:28:16'),
(1863, 1, '2019-11-02 17:28:16'),
(1864, 1, '2019-11-02 17:28:16'),
(1865, 1, '2019-11-02 17:28:16'),
(1866, 1, '2019-11-02 17:28:16'),
(1867, 1, '2019-11-02 17:28:16'),
(1868, 1, '2019-11-02 17:28:16'),
(1869, 1, '2019-11-02 17:28:16'),
(1870, 1, '2019-11-02 17:28:16'),
(1871, 1, '2019-11-02 17:28:16'),
(1872, 1, '2019-11-02 17:28:16'),
(1873, 1, '2019-11-02 17:28:16'),
(1874, 1, '2019-11-02 17:28:16'),
(1875, 1, '2019-11-02 17:28:17'),
(1876, 1, '2019-11-02 17:28:17'),
(1877, 1, '2019-11-02 17:28:17'),
(1878, 1, '2019-11-02 17:28:17'),
(1879, 1, '2019-11-02 17:28:17'),
(1880, 1, '2019-11-02 17:28:17'),
(1881, 1, '2019-11-02 17:28:17'),
(1882, 1, '2019-11-02 17:28:17'),
(1883, 1, '2019-11-02 17:28:17'),
(1884, 1, '2019-11-02 17:28:17'),
(1885, 1, '2019-11-02 17:28:17'),
(1886, 1, '2019-11-02 17:28:17'),
(1887, 1, '2019-11-02 17:28:17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `categoria`, `preco`, `usuario`, `cadastro`, `modificado`) VALUES
(67, 'X-PICANHA', 3, 0, 1, '2019-10-31 18:55:26', '2019-11-01 15:19:29'),
(70, 'X-TUDO', 3, 0, 1, '2019-10-31 19:01:12', '2019-11-01 15:19:17'),
(73, 'X-BACON', 3, 0, 1, '2019-10-31 19:09:14', '2019-11-01 15:28:42'),
(77, 'X-FRANGO', 3, 0, 1, '2019-10-31 21:07:20', '2019-11-01 15:19:36'),
(79, 'COCA-COLA', 2, 0, 1, '2019-10-31 21:19:03', '2019-11-01 15:09:31'),
(80, 'FANTA', 2, 0, 1, '2019-10-31 21:19:07', '2019-11-01 15:09:35'),
(81, 'GUARANÁ', 2, 0, 1, '2019-10-31 21:19:13', '2019-11-01 15:09:40'),
(82, 'SPRITE', 2, 0, 1, '2019-10-31 21:19:16', '2019-11-01 15:17:39'),
(83, 'SUBZERO', 2, 0, 1, '2019-10-31 21:19:53', '2019-11-01 15:17:52'),
(84, 'SKOL', 2, 0, 1, '2019-10-31 21:19:57', '2019-11-01 15:17:30'),
(85, 'BRAHMA', 2, 0, 1, '2019-10-31 21:20:13', '2019-11-04 17:46:46'),
(86, 'STELLA', 2, 0, 1, '2019-10-31 21:20:18', '2019-11-01 15:17:43'),
(87, 'PROIBIDA', 2, 0, 1, '2019-10-31 21:20:25', '2019-11-01 15:17:27'),
(88, 'JOIBICO', 2, 0, 1, '2019-10-31 21:20:35', '2019-11-01 15:15:35'),
(89, 'SUCO DE LARANJA', 2, 0, 1, '2019-10-31 21:20:40', '2019-11-01 15:18:02'),
(90, 'SUCO DE LIMÃO', 2, 0, 1, '2019-10-31 21:20:45', '2019-11-01 15:18:22'),
(91, 'SUCO DE MORANGO', 2, 0, 1, '2019-10-31 21:20:49', '2019-11-01 15:18:50'),
(92, 'SUCO DE UVA', 2, 0, 1, '2019-10-31 21:20:56', '2019-11-01 15:19:05'),
(93, 'SUCO DE MARACUJA', 2, 0, 1, '2019-10-31 21:21:10', '2019-11-01 15:18:30'),
(98, 'X-SALADA', 3, 0, 1, '2019-11-01 15:20:24', '0000-00-00 00:00:00'),
(101, 'BATATA FRITA', 4, 17, 1, '2019-11-01 17:45:28', '2019-11-04 19:53:52'),
(102, 'CALABRESA', 4, 0, 1, '2019-11-01 17:45:45', '2019-11-01 18:30:33'),
(114, 'teste', 2, 4.5, 1, '2019-11-04 19:49:22', '2019-11-04 19:51:20');

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
(4, 1, 'toggled', '2019-11-04 22:21:58');

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
