-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Dez-2020 às 17:31
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `neusamoda_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `id_afect` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(10) UNSIGNED NOT NULL,
  `vlr` decimal(7,2) NOT NULL,
  `data` datetime NOT NULL,
  `obs` text DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL COMMENT '0-> entrada\n1->saida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `dsc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `dsc`) VALUES
(001, 'Categoria 1', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(40) NOT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fone` bigint(14) DEFAULT NULL,
  `celular` bigint(14) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `dataRegistro` date NOT NULL,
  `dsc` text DEFAULT NULL,
  `credito` decimal(7,2) DEFAULT NULL,
  `tam` varchar(10) DEFAULT NULL,
  `medida` int(11) DEFAULT NULL,
  `refer` varchar(45) DEFAULT NULL,
  `filiacao` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `logradouro` varchar(60) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `pai` varchar(35) DEFAULT NULL,
  `mae` varchar(35) DEFAULT NULL,
  `filho` varchar(35) DEFAULT NULL,
  `avo` varchar(35) DEFAULT NULL,
  `irmao` varchar(35) DEFAULT NULL,
  `outros` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `apelido`, `cpf`, `dataNascimento`, `email`, `fone`, `celular`, `rg`, `dataRegistro`, `dsc`, `credito`, `tam`, `medida`, `refer`, `filiacao`, `cargo`, `uf`, `cidade`, `logradouro`, `bairro`, `complemento`, `cep`, `pai`, `mae`, `filho`, `avo`, `irmao`, `outros`) VALUES
(00001, 'Neusa Aparecida Truchinski', 'Neusinha', '63086956968', '1964-12-10', 'nuesatru@gmail.com', 4734258911, 47999880342, '2195912', '2020-12-22', '', '0.00', 'GG', 44, 'Neusa Moda', '', 'Empresária', 'SC', 'Joinville', 'Rua Dona Elza Meinert', 'Costa e Silva', 'até 1178/1179', '89218-650', 'José Truchinski', 'Ivanilde L Truchinski', 'João P', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data` datetime NOT NULL,
  `dsc` text NOT NULL,
  `usuarios_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `tel` bigint(14) DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `tel`, `obs`) VALUES
(1, 'Fornecedor1 ', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `vlr` decimal(7,2) NOT NULL,
  `data` date NOT NULL,
  `obs` text DEFAULT NULL,
  `vendas_id` int(10) UNSIGNED NOT NULL,
  `frmPgto` tinyint(1) DEFAULT NULL COMMENT 'O->dinheiro\n1-> cartao de crédito\n2->cartão de débito\n3->cheque\n4->crediario\n5->Depósito/transferência'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `vlrVenda` decimal(7,2) UNSIGNED NOT NULL,
  `dsc` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0 - ATIVO\n1 - INATIVO',
  `cor` varchar(30) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `dataCompra` date DEFAULT NULL,
  `dataVenda` date DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `estilo` varchar(45) DEFAULT NULL,
  `imagem` blob DEFAULT NULL,
  `tam` char(4) DEFAULT NULL,
  `vlrPago` decimal(7,2) DEFAULT NULL,
  `colecao` varchar(45) DEFAULT NULL,
  `code` varchar(13) DEFAULT NULL,
  `categorias_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `fornecedores_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` tinyint(4) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `senha` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permissao` tinyint(1) NOT NULL COMMENT '0->vendedor\n1->adm',
  `ativo` tinyint(1) NOT NULL COMMENT '0 - ATIVO\n1 - INATIVO',
  `dataAtiv` date DEFAULT NULL,
  `dataDes` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `obs` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `permissao`, `ativo`, `dataAtiv`, `dataDes`, `cpf`, `obs`) VALUES
(1, 'joao', '123', '', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `vlrTotal` decimal(7,2) NOT NULL,
  `data` datetime NOT NULL,
  `dsc` decimal(7,2) DEFAULT NULL,
  `metPgto` int(11) DEFAULT NULL COMMENT '0->a vista\n1->parcelado',
  `frmPgto` smallint(6) DEFAULT NULL COMMENT 'O->dinheiro\n1-> cartao de crédito\n2->cartão de débito\n3->cheque\n4->crediario\n5->Depósito/Transferência',
  `vlrPago` decimal(7,2) DEFAULT NULL COMMENT 'valor quitado (caso parcelado)',
  `qtdeParc` tinyint(4) DEFAULT NULL COMMENT 'quantidade de parcelas',
  `clientes_id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `produtos` text DEFAULT NULL,
  `usuarios_id` tinyint(4) NOT NULL,
  `bandeira` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_despesas_usuarios1_idx` (`usuarios_id`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagamentos_vendas1_idx` (`vendas_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categorias_idx` (`categorias_id`),
  ADD KEY `fk_produtos_fornecedores1_idx` (`fornecedores_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendas_clientes1_idx` (`clientes_id`),
  ADD KEY `fk_vendas_usuarios1_idx` (`usuarios_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `despesas`
--
ALTER TABLE `despesas`
  ADD CONSTRAINT `fk_despesas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_vendas1` FOREIGN KEY (`vendas_id`) REFERENCES `vendas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos_fornecedores1` FOREIGN KEY (`fornecedores_id`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
