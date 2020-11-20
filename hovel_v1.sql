-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2020 às 00:18
-- Versão do servidor: 8.0.22
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hovel_v1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int NOT NULL,
  `nomeCargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int NOT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` int DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idPessoa` int NOT NULL,
  `horario` datetime DEFAULT NULL,
  `endereco_idendereco` int NOT NULL,
  `cargo_idcargo` int NOT NULL,
  `pessoa_idpessoa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int NOT NULL,
  `status` int DEFAULT NULL,
  `valorTotal` decimal(10,0) DEFAULT NULL,
  `tipoPagamento` varchar(20) DEFAULT NULL,
  `pedidoBalcao_idpedidoBalcao` int DEFAULT NULL,
  `PedidoMesa_idPedidoMesa` int DEFAULT NULL,
  `Funcionario_idPessoa` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidobalcao`
--

CREATE TABLE `pedidobalcao` (
  `idpedidoBalcao` int NOT NULL,
  `senha` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidomesa`
--

CREATE TABLE `pedidomesa` (
  `idPedidoMesa` int NOT NULL,
  `quantidadePessoa` int DEFAULT NULL,
  `numeroMesa` int DEFAULT NULL,
  `Funcionario_idPessoa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_has_produto`
--

CREATE TABLE `pedido_has_produto` (
  `Pedido_idPedido` int NOT NULL,
  `idProduto` int NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `dataPedido` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idpessoa` int NOT NULL,
  `cpf` int UNSIGNED DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `telefone` int DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int NOT NULL,
  `nomeProduto` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `quantidade` int NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `quantidade`, `preco`) VALUES
(14, 'X-tudo', 22, 22.35),
(19, 'x-salada', 2, 8.9),
(21, 'x-egg', 22, 50);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_Funcionario_endereco1_idx` (`endereco_idendereco`),
  ADD KEY `fk_Funcionario_cargo1_idx` (`cargo_idcargo`),
  ADD KEY `fk_Funcionario_pessoa1_idx` (`pessoa_idpessoa`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_Pedido_pedidoBalcao1_idx` (`pedidoBalcao_idpedidoBalcao`),
  ADD KEY `fk_Pedido_PedidoMesa1_idx` (`PedidoMesa_idPedidoMesa`),
  ADD KEY `fk_Pedido_Funcionario1_idx` (`Funcionario_idPessoa`);

--
-- Índices para tabela `pedidobalcao`
--
ALTER TABLE `pedidobalcao`
  ADD PRIMARY KEY (`idpedidoBalcao`);

--
-- Índices para tabela `pedidomesa`
--
ALTER TABLE `pedidomesa`
  ADD PRIMARY KEY (`idPedidoMesa`),
  ADD KEY `fk_PedidoMesa_Funcionario1_idx` (`Funcionario_idPessoa`);

--
-- Índices para tabela `pedido_has_produto`
--
ALTER TABLE `pedido_has_produto`
  ADD PRIMARY KEY (`Pedido_idPedido`,`idProduto`),
  ADD KEY `fk_Pedido_has_Produto_Produto1_idx` (`idProduto`),
  ADD KEY `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_idPedido`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idpessoa`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_Funcionario_cargo1` FOREIGN KEY (`cargo_idcargo`) REFERENCES `mydb`.`cargo` (`idcargo`),
  ADD CONSTRAINT `fk_Funcionario_endereco1` FOREIGN KEY (`endereco_idendereco`) REFERENCES `mydb`.`endereco` (`idendereco`),
  ADD CONSTRAINT `fk_Funcionario_pessoa1` FOREIGN KEY (`pessoa_idpessoa`) REFERENCES `mydb`.`pessoa` (`idpessoa`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Funcionario1` FOREIGN KEY (`Funcionario_idPessoa`) REFERENCES `mydb`.`funcionario` (`idPessoa`),
  ADD CONSTRAINT `fk_Pedido_pedidoBalcao1` FOREIGN KEY (`pedidoBalcao_idpedidoBalcao`) REFERENCES `mydb`.`pedidobalcao` (`idpedidoBalcao`),
  ADD CONSTRAINT `fk_Pedido_PedidoMesa1` FOREIGN KEY (`PedidoMesa_idPedidoMesa`) REFERENCES `mydb`.`pedidomesa` (`idPedidoMesa`);

--
-- Limitadores para a tabela `pedidomesa`
--
ALTER TABLE `pedidomesa`
  ADD CONSTRAINT `fk_PedidoMesa_Funcionario1` FOREIGN KEY (`Funcionario_idPessoa`) REFERENCES `mydb`.`funcionario` (`idPessoa`);

--
-- Limitadores para a tabela `pedido_has_produto`
--
ALTER TABLE `pedido_has_produto`
  ADD CONSTRAINT `fk_Pedido_has_Produto_Pedido1` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `mydb`.`pedido` (`idPedido`),
  ADD CONSTRAINT `fk_Pedido_has_Produto_Produto1` FOREIGN KEY (`idProduto`) REFERENCES `mydb`.`produto` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
