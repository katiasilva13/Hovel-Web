-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Nov-2020 às 20:45
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hovel_v1teste`
--
CREATE DATABASE IF NOT EXISTS `hovel_v1teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hovel_v1teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
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
(18, '0000-00-00 00:00:00', 1, 36),
(17, '0000-00-00 00:00:00', 1, 35),
(19, '0000-00-00 00:00:00', 1, 37),
(20, '0000-00-00 00:00:00', 1, 38),
(21, '0000-00-00 00:00:00', 5, 39),
(22, '0000-00-00 00:00:00', 5, 40),
(23, '0000-00-00 00:00:00', 5, 41),
(34, '0000-00-00 00:00:00', 1, 52),
(33, NULL, 1, 51),
(32, NULL, 1, 50),
(31, '0000-00-00 00:00:00', 5, 49);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
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
-- Estrutura da tabela `pedidobalcao`
--

DROP TABLE IF EXISTS `pedidobalcao`;
CREATE TABLE `pedidobalcao` (
  `idPedidoBalcao` int(11) NOT NULL,
  `senha` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidomesa`
--

DROP TABLE IF EXISTS `pedidomesa`;
CREATE TABLE `pedidomesa` (
  `idPedidoMesa` int(11) NOT NULL,
  `quantidadePessoa` int(11) DEFAULT NULL,
  `numeroMesa` int(11) DEFAULT NULL,
  `funcionario_idPessoa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_has_produto`
--

DROP TABLE IF EXISTS `pedido_has_produto`;
CREATE TABLE `pedido_has_produto` (
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

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) NOT NULL,
  `endereco_idEndereco` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `cpf`, `nome`, `telefone`, `email`, `senha`, `endereco_idEndereco`, `usuario`) VALUES
(1, '4294967295', 'aparato futurista', NULL, 'aparato@futurista.com', '1234', 0, 'aparatoFuturista'),
(38, '4294967295', 'aparato futurista 12', NULL, 'aparato@futurista12.com', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'aparatoFuturista12'),
(37, '12345678900', 'SÓ VAMO', '44999999999', 'aparato@futurista12.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'aparatoFuturista12'),
(52, '4294967295', 'teste', '0', 'teste@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'teste1234'),
(51, '4294967295', 'teste', NULL, 'rtrtrtrt@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'teste'),
(50, '4294967295', 'teste abs', NULL, 'teste@teste.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 'testeABS'),
(49, '12345678900', 'Kátia Marina Silva', '44988468345', 'ktiax13@gmail.com', '14434226728b5d55f7715f50c5bfeac3', 0, 'developer04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(20) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `quantidade`, `preco`) VALUES
(1, 'Alface', 35, 1.5),
(2, 'Azeite de Oliva', 12, 21.5),
(5, 'Cenoura Marca C', 40, 21.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE `venda` (
  `idVenda` int(11) NOT NULL,
  `tipoPagamento` int(11) NOT NULL,
  `valorTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `tipoPagamento`, `valorTotal`) VALUES
(0, 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `fk_Funcionario_cargo1_idx` (`cargo_idcargo`),
  ADD KEY `fk_Funcionario_pessoa1_idx` (`pessoa_idpessoa`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_Pedido_PedidoMesa1_idx` (`PedidoMesa_idPedidoMesa`),
  ADD KEY `fk_Pedido_pedidoBalcao1_idx` (`pedidoBalcao_idpedidoBalcao`);

--
-- Índices para tabela `pedidobalcao`
--
ALTER TABLE `pedidobalcao`
  ADD PRIMARY KEY (`idPedidoBalcao`);

--
-- Índices para tabela `pedidomesa`
--
ALTER TABLE `pedidomesa`
  ADD PRIMARY KEY (`idPedidoMesa`),
  ADD KEY `fk_PedidoMesa_Funcionario1_idx` (`funcionario_idPessoa`);

--
-- Índices para tabela `pedido_has_produto`
--
ALTER TABLE `pedido_has_produto`
  ADD PRIMARY KEY (`Pedido_idPedido`,`Produto_codigo`),
  ADD KEY `fk_Pedido_has_Produto_Produto1_idx` (`Produto_codigo`),
  ADD KEY `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_idPedido`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_pessoa_endereco1_idx` (`endereco_idEndereco`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidobalcao`
--
ALTER TABLE `pedidobalcao`
  MODIFY `idPedidoBalcao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidomesa`
--
ALTER TABLE `pedidomesa`
  MODIFY `idPedidoMesa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
