-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Ago-2017 às 20:23
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db_eloquent`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `db_clientes`
--

DROP TABLE IF EXISTS `db_clientes`;
CREATE TABLE `db_clientes` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `db_clientes`
--

INSERT INTO `db_clientes` (`codigo`, `nome`, `descricao`) VALUES
(1, 'Thiago', 'Bulfaitelo'),
(2, 'Maria', 'trem'),
(3, 'abcde', 'ggghhij'),
(4, 'Hue', 'BR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `db_clientes_has_db_tipos`
--

DROP TABLE IF EXISTS `db_clientes_has_db_tipos`;
CREATE TABLE `db_clientes_has_db_tipos` (
  `codigo_cliente` int(10) UNSIGNED NOT NULL,
  `codigo_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `db_clientes_has_db_tipos`
--

INSERT INTO `db_clientes_has_db_tipos` (`codigo_cliente`, `codigo_tipo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(2, 2),
(3, 2),
(3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `db_telefones`
--

DROP TABLE IF EXISTS `db_telefones`;
CREATE TABLE `db_telefones` (
  `codigo` int(11) NOT NULL,
  `codigo_cliente` int(10) UNSIGNED NOT NULL,
  `numero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `db_telefones`
--

INSERT INTO `db_telefones` (`codigo`, `codigo_cliente`, `numero`) VALUES
(1, 1, '1111111'),
(2, 1, '13213131'),
(3, 2, '121313'),
(4, 2, '32133132'),
(5, 3, '321231313'),
(6, 3, '546876'),
(7, 4, '4878746465465');

-- --------------------------------------------------------

--
-- Estrutura da tabela `db_tipos`
--

DROP TABLE IF EXISTS `db_tipos`;
CREATE TABLE `db_tipos` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `db_tipos`
--

INSERT INTO `db_tipos` (`codigo`, `titulo`) VALUES
(1, 'Ativo'),
(2, 'Local'),
(3, 'Exterior'),
(4, 'Vip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_clientes`
--
ALTER TABLE `db_clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `db_clientes_has_db_tipos`
--
ALTER TABLE `db_clientes_has_db_tipos`
  ADD PRIMARY KEY (`codigo_cliente`,`codigo_tipo`),
  ADD KEY `fk_db_clientes_has_db_tipos_db_tipos1_idx` (`codigo_tipo`),
  ADD KEY `fk_db_clientes_has_db_tipos_db_clientes1_idx` (`codigo_cliente`);

--
-- Indexes for table `db_telefones`
--
ALTER TABLE `db_telefones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_tb_telefones_db_clientes_idx` (`codigo_cliente`);

--
-- Indexes for table `db_tipos`
--
ALTER TABLE `db_tipos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_clientes`
--
ALTER TABLE `db_clientes`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_telefones`
--
ALTER TABLE `db_telefones`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `db_tipos`
--
ALTER TABLE `db_tipos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `db_clientes_has_db_tipos`
--
ALTER TABLE `db_clientes_has_db_tipos`
  ADD CONSTRAINT `fk_db_clientes_has_db_tipos_db_clientes1` FOREIGN KEY (`codigo_cliente`) REFERENCES `db_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_db_clientes_has_db_tipos_db_tipos1` FOREIGN KEY (`codigo_tipo`) REFERENCES `db_tipos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `db_telefones`
--
ALTER TABLE `db_telefones`
  ADD CONSTRAINT `fk_tb_telefones_db_clientes` FOREIGN KEY (`codigo_cliente`) REFERENCES `db_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
