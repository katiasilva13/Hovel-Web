-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13-Nov-2020 às 02:25
-- Versão do servidor: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hovel_bd`
--
-- CREATE DATABASE IF NOT EXISTS `hovel_bd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
-- USE `hovel_bd`;

--
-- Database: `hovel_v1teste`
--
CREATE DATABASE IF NOT EXISTS `hovel_v1teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hovel_v1teste`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--
-- Criação: 11-Nov-2020 às 01:57
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nomeCargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nomeCargo`) VALUES
(1, 'VISITANTE'),
(2, 'CAIXA'),
(3, 'GERENTE'),
(4, 'ADMIN'),
(5, 'DEVELOPER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--
-- Criação: 11-Nov-2020 às 21:12
-- Última actualização: 11-Nov-2020 às 21:12
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--
-- Criação: 11-Nov-2020 às 02:00
-- Última actualização: 13-Nov-2020 às 02:06
-- Última verificação: 11-Nov-2020 às 02:00
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `horario` datetime DEFAULT NULL,
  `cargo_idcargo` int(11) NOT NULL,
  `pessoa_idpessoa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `horario`, `cargo_idcargo`, `pessoa_idpessoa`) VALUES
(1, '0000-00-00 00:00:00', 0, 0),
(18, '0000-00-00 00:00:00', 1, 36),
(17, '0000-00-00 00:00:00', 1, 35),
(16, '0000-00-00 00:00:00', 0, 34),
(15, '0000-00-00 00:00:00', 0, 33),
(14, '0000-00-00 00:00:00', 0, 32),
(13, '0000-00-00 00:00:00', 0, 31),
(19, '0000-00-00 00:00:00', 1, 37),
(9, '0000-00-00 00:00:00', 0, 0),
(10, '0000-00-00 00:00:00', 0, 27),
(11, '0000-00-00 00:00:00', 0, 28),
(12, '0000-00-00 00:00:00', 0, 29),
(20, '0000-00-00 00:00:00', 1, 38),
(21, '0000-00-00 00:00:00', 5, 39),
(22, '0000-00-00 00:00:00', 5, 40),
(23, '0000-00-00 00:00:00', 5, 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--
-- Criação: 11-Nov-2020 às 02:01
-- Última actualização: 11-Nov-2020 às 02:01
-- Última verificação: 11-Nov-2020 às 02:01
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `valorTotal` decimal(10,0) DEFAULT NULL,
  `tipoPagamento` varchar(20) DEFAULT NULL,
  `PedidoMesa_idPedidoMesa` int(11) NOT NULL,
  `pedidoBalcao_idpedidoBalcao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoBalcao`
--
-- Criação: 11-Nov-2020 às 02:01
-- Última actualização: 11-Nov-2020 às 02:01
--

DROP TABLE IF EXISTS `pedidoBalcao`;
CREATE TABLE `pedidoBalcao` (
  `idPedidoBalcao` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoMesa`
--
-- Criação: 11-Nov-2020 às 04:02
-- Última actualização: 11-Nov-2020 às 04:02
-- Última verificação: 11-Nov-2020 às 04:02
--

DROP TABLE IF EXISTS `pedidoMesa`;
CREATE TABLE `pedidoMesa` (
  `idPedidoMesa` int(11) NOT NULL,
  `quantidadePessoa` int(11) DEFAULT NULL,
  `numeroMesa` int(11) DEFAULT NULL,
  `funcionario_idPessoa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Pedido_has_Produto`
--
-- Criação: 26-Out-2020 às 20:19
-- Última actualização: 26-Out-2020 às 20:19
--

DROP TABLE IF EXISTS `Pedido_has_Produto`;
CREATE TABLE `Pedido_has_Produto` (
  `Pedido_idPedido` int(11) NOT NULL,
  `Produto_codigo` int(11) NOT NULL,
  `item` varchar(45) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `dataPedido` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--
-- Criação: 11-Nov-2020 às 05:41
-- Última actualização: 13-Nov-2020 às 02:06
-- Última verificação: 11-Nov-2020 às 05:41
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `cpf` int(10) UNSIGNED DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `endereco_idEndereco` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `cpf`, `nome`, `telefone`, `email`, `senha`, `endereco_idEndereco`, `usuario`) VALUES
(1, 4294967295, 'aparato futurista', NULL, 'aparato@futurista.com', '1234', 0, 'aparatoFuturista'),
(41, 4294967295, 'Katia Silva', NULL, 'ktiax13@gmail.com', '14434226728b5d55f7715f50c5bfeac3', 0, 'developer04'),
(40, 4294967295, 'Katia Silva', NULL, 'ktiax13@gmail.com', '14434226728b5d55f7715f50c5bfeac3', 0, 'developer04'),
(39, 4294967295, 'Katia Silva', NULL, 'ktiax13@gmail.com', '14434226728b5d55f7715f50c5bfeac3', 0, 'developer04'),
(38, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'aparatoFuturista12'),
(37, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(36, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(35, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(27, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(28, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(29, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(30, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(31, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(32, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(33, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12'),
(34, 4294967295, 'aparato futurista 12', NULL, 'aparato@futurista12.com', '12345', 0, 'aparatoFuturista12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--
-- Criação: 11-Nov-2020 às 05:04
-- Última actualização: 11-Nov-2020 às 05:04
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `fk_Funcionario_cargo1_idx` (`cargo_idcargo`),
  ADD KEY `fk_Funcionario_pessoa1_idx` (`pessoa_idpessoa`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_Pedido_PedidoMesa1_idx` (`PedidoMesa_idPedidoMesa`),
  ADD KEY `fk_Pedido_pedidoBalcao1_idx` (`pedidoBalcao_idpedidoBalcao`);

--
-- Indexes for table `pedidoBalcao`
--
ALTER TABLE `pedidoBalcao`
  ADD PRIMARY KEY (`idPedidoBalcao`);

--
-- Indexes for table `pedidoMesa`
--
ALTER TABLE `pedidoMesa`
  ADD PRIMARY KEY (`idPedidoMesa`),
  ADD KEY `fk_PedidoMesa_Funcionario1_idx` (`funcionario_idPessoa`);

--
-- Indexes for table `Pedido_has_Produto`
--
ALTER TABLE `Pedido_has_Produto`
  ADD PRIMARY KEY (`Pedido_idPedido`,`Produto_codigo`),
  ADD KEY `fk_Pedido_has_Produto_Produto1_idx` (`Produto_codigo`),
  ADD KEY `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_idPedido`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_pessoa_endereco1_idx` (`endereco_idEndereco`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidoBalcao`
--
ALTER TABLE `pedidoBalcao`
  MODIFY `idPedidoBalcao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidoMesa`
--
ALTER TABLE `pedidoMesa`
  MODIFY `idPedidoMesa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
