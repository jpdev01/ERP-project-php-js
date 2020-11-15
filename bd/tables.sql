-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2020 às 14:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

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
-- Estrutura da tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(10) UNSIGNED NOT NULL,
  `vlr` decimal(7,2) NOT NULL,
  `data` datetime NOT NULL,
  `obs` text DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL COMMENT '0-> entrada\n1->saida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `caixa`
--

INSERT INTO `caixa` (`id`, `vlr`, `data`, `obs`, `tipo`) VALUES
(1, '200.00', '2020-09-08 16:29:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0),
(2, '200.00', '2020-09-08 16:41:00', 'Venda efetuada para jp', 0),
(3, '200.00', '2020-09-08 16:43:00', 'Venda efetuada para jp', 0),
(4, '200.00', '2020-09-08 16:44:00', 'Venda efetuada para jp', 0),
(5, '400.00', '2020-09-08 16:47:00', 'Venda efetuada para jp', 0),
(6, '800.00', '2020-09-08 22:51:00', 'Venda efetuada para jp', 0),
(7, '800.00', '2020-09-09 21:33:00', 'Venda efetuada para jp', 0),
(8, '400.00', '2020-09-07 21:35:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0),
(9, '400.00', '2020-09-03 21:36:00', 'Venda efetuada para jp', 0),
(10, '400.00', '2020-09-09 21:37:00', 'Venda efetuada para jp', 0),
(11, '400.00', '2020-09-10 11:20:00', 'Venda efetuada para jp', 0),
(12, '2.00', '2020-09-10 11:21:00', NULL, 0),
(13, '200.00', '2020-09-10 11:54:00', 'Venda efetuada para Neusa oTruchinski', 0),
(14, '200.00', '2020-09-10 11:55:00', 'Venda efetuada para jp', 0),
(15, '20.00', '2020-09-10 13:37:00', 'Venda efetuada para jp', 0),
(16, '400.00', '2020-09-10 14:42:00', 'Venda efetuada para jp', 0),
(17, '400.00', '2020-09-10 14:44:00', 'Venda efetuada para jp', 0),
(18, '20.00', '2020-09-10 14:47:00', 'Venda efetuada para Jean capote', 0),
(19, '50.00', '2020-09-08 14:47:00', 'Venda efetuada para Jean capote', 0),
(20, '10.00', '2020-09-10 14:50:00', NULL, 0),
(21, '400.00', '2020-09-15 18:14:00', 'Venda efetuada para ana istela', 0),
(22, '400.00', '2020-09-15 18:14:00', 'Venda efetuada para ana istela', 0),
(23, '200.00', '2020-09-16 14:47:00', 'Venda efetuada para ana istela', 0),
(24, '200.00', '2020-09-16 14:47:00', 'Venda efetuada para ana istela', 0),
(25, '200.00', '2020-09-16 14:47:00', 'Venda efetuada para ana istela', 0),
(26, '200.00', '2020-09-16 14:48:00', 'Venda efetuada para ana istela', 0),
(27, '200.00', '2020-09-16 14:48:00', 'Venda efetuada para ana istela', 0),
(28, '200.00', '2020-09-16 14:48:00', 'Venda efetuada para ana istela', 0),
(29, '200.00', '2020-09-16 14:48:00', 'Venda efetuada para ana istela', 0),
(30, '200.00', '2020-09-16 14:48:00', 'Venda efetuada para ana istela', 0),
(31, '200.00', '2020-09-16 14:49:00', 'Venda efetuada para ana istela', 0),
(32, '200.00', '2020-09-16 14:49:00', 'Venda efetuada para ana istela', 0),
(33, '2800.00', '2020-09-16 21:48:00', 'Venda efetuada para ana istela', 0),
(34, '2000.00', '2020-09-17 16:04:00', 'Venda efetuada para ', 0),
(35, '2000.00', '2020-09-17 16:05:00', 'Venda efetuada para ', 0),
(36, '2000.00', '2020-09-17 16:08:00', 'Venda efetuada para jp', 0),
(37, '16000.00', '2020-09-17 17:43:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0),
(38, '2000.00', '2020-09-19 14:24:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0),
(39, '4000.00', '2020-09-19 21:30:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0),
(40, '2000.00', '2020-09-19 23:13:00', 'Venda efetuada para Neusa Aparecida Truchinski', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `dsc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `dsc`) VALUES
(001, 'calças', ''),
(002, 'camisas', ''),
(003, 'categoria3', ''),
(004, 'categoria teste', ''),
(005, 'blusas de lã', ''),
(006, 'teste', ''),
(007, 'teste', ''),
(008, 'very', ''),
(009, 'very', ''),
(010, 'gsyuga', ''),
(011, 'gsyuga', '');

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
  `end` text DEFAULT NULL,
  `dataRegistro` date NOT NULL,
  `dsc` text DEFAULT NULL,
  `credito` tinyint(1) DEFAULT NULL COMMENT '0 <- quite\n1 <- devedor',
  `tam` varchar(10) DEFAULT NULL,
  `medida` int(11) DEFAULT NULL,
  `refer` varchar(45) DEFAULT NULL,
  `filiacao` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `apelido`, `cpf`, `dataNascimento`, `email`, `fone`, `celular`, `rg`, `end`, `dataRegistro`, `dsc`, `credito`, `tam`, `medida`, `refer`, `filiacao`, `cargo`) VALUES
(00001, 'Neusa Aparecida Truchinski', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00002, 'jp', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00003, 'Neusa oTruchinski', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00004, 'Paulo Roberto Truchinski', '', '', '1964-10-20', 'prt.onroad@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:11:\"Rua Uberaba\";s:11:\"complemento\";s:0:\"\";s:6:\"bairro\";s:7:\"Grajaú\";s:9:\"municipio\";s:14:\"Rio de Janeiro\";s:2:\"uf\";s:2:\"RJ\";s:3:\"cep\";s:9:\"20561-240\";}', '2020-09-10', '', NULL, 'P', 0, '', '', ''),
(00005, 'Jean capote', '', '', '2020-09-11', '', 0, 0, '', 'a:6:{s:10:\"logradouro\";s:24:\"Rua Arno Waldemar Dohler\";s:11:\"complemento\";s:11:\"lado ímpar\";s:6:\"bairro\";s:21:\"Zona Industrial Norte\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:8:\"89219510\";}', '2020-09-10', '', NULL, '', 0, '', '', ''),
(00006, 'qwww', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00007, 'Neusa Aparecida Truchinskiwsdsd', '', '', '2020-09-15', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00008, 'carlos', '', '', '2020-09-15', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00009, 'clovis', '', '', '2020-09-15', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', 0, '', '', ''),
(00010, 'ana istela', '', '', '2020-09-15', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"AC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-08', '', NULL, '', NULL, '', '', ''),
(00011, 'asssa', 'as', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-13', '', NULL, '', 0, '', '', ''),
(00012, 'Ulisses', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-15', '', NULL, '', 0, '', '', ''),
(00013, 'renata', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:23:\"Rua Otto Pfuetzenreuter\";s:11:\"complemento\";s:12:\"até 581/582\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:10:\"89219-200/\";}', '2020-09-15', '', NULL, '', 0, '', '', ''),
(00014, 'qwqw', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-16', '', NULL, '', 0, '', '', ''),
(00015, 'teste', '', '', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-16', '', NULL, '', 0, '', '', ''),
(00016, 'teste++', '', '', '0000-00-00', 'lshdsgid@gmail.com', 23039029, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-16', '', NULL, '', 0, '', '', ''),
(00017, 'Cliente criado para teste', '', '63086956968', '0000-00-00', 'jptruchinski@gmail.com', 47988937474, 0, '', 'a:6:{s:10:\"logradouro\";s:21:\"Rua Dona Elza Meinert\";s:11:\"complemento\";s:14:\"até 1178/1179\";s:6:\"bairro\";s:13:\"Costa e Silva\";s:9:\"municipio\";s:9:\"Joinville\";s:2:\"uf\";s:2:\"SC\";s:3:\"cep\";s:9:\"89218-650\";}', '2020-09-17', '', NULL, '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `delivery`
--

CREATE TABLE `delivery` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` datetime NOT NULL,
  `clientes_id` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `produtos` text DEFAULT NULL,
  `usuarios_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `tel` bigint(14) DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome`, `tel`, `obs`) VALUES
(1, 'monnari', 0, ''),
(2, 'brix', 0, NULL),
(3, 'Vin Diesel', 4734250261, NULL),
(4, 'nike', 34258911, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `vlr`, `data`, `obs`, `vendas_id`, `frmPgto`) VALUES
(1, '380.00', '2020-09-10', '', 15, NULL),
(2, '370.00', '2020-09-10', '', 19, NULL),
(3, '10.00', '2020-09-10', '', 19, NULL),
(4, '10.00', '2020-09-14', '', 20, NULL),
(5, '10.00', '2020-09-14', '', 20, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `vlrVenda` decimal(7,2) UNSIGNED NOT NULL,
  `dsc` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0 - ATIVO\n1 - INATIVO\n2- INATIVO POR TROCA',
  `cor` varchar(30) DEFAULT NULL,
  `genero` tinyint(1) DEFAULT NULL COMMENT '0-> fem\n1-> masc\n2-> unissex',
  `dataCompra` date DEFAULT NULL,
  `dataVenda` date DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `estilo` varchar(45) DEFAULT NULL,
  `imagem` text DEFAULT NULL,
  `tam` char(4) DEFAULT NULL,
  `vlrPago` decimal(7,2) DEFAULT NULL,
  `colecao` varchar(45) DEFAULT NULL,
  `code` varchar(13) NOT NULL,
  `categorias_id` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `fornecedores_id` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `vlrVenda`, `dsc`, `status`, `cor`, `genero`, `dataCompra`, `dataVenda`, `qtde`, `estilo`, `imagem`, `tam`, `vlrPago`, `colecao`, `code`, `categorias_id`, `fornecedores_id`) VALUES
(1, 'product1', '2000.00', NULL, 0, 'Amarelo', 0, '0000-00-00', NULL, 195, NULL, NULL, 'P', '0.00', NULL, '1', 005, 1),
(2, 'product2', '200.00', NULL, 0, 'Amarelo', 0, '0000-00-00', NULL, 0, NULL, NULL, 'P', '0.00', NULL, '2', 005, 1),
(3, 'product3', '400.00', NULL, 0, 'Amarelo', 0, '0000-00-00', NULL, 0, NULL, NULL, 'P', '0.00', NULL, '3', 005, 1),
(4, 'product4', '200.00', NULL, 1, 'Bordô', 0, '2020-09-09', NULL, 0, NULL, NULL, 'P', NULL, NULL, '4', 001, 2),
(5, 'product5', '200.00', NULL, 1, 'Amarelo', 0, '0000-00-00', NULL, 0, NULL, NULL, 'P', '0.00', NULL, '5', 003, 1),
(6, 'product6', '200.00', NULL, 1, '...', 0, '2020-09-10', NULL, 0, NULL, NULL, 'P', NULL, NULL, '6', 004, 2),
(7, 'product7', '200.00', NULL, 1, 'Amarelo', 0, '0000-00-00', NULL, 0, NULL, NULL, 'P', '0.00', NULL, '7', 004, 3),
(8, 'calça jogger', '200.00', NULL, 1, 'Bege', 0, '2020-09-10', NULL, 0, NULL, NULL, 'P', NULL, NULL, '12345678', 005, 2),
(9, 'este', '200.00', NULL, 0, '...', 0, '2020-09-10', NULL, 1, NULL, NULL, 'P', NULL, NULL, '1323233', 005, 4),
(10, 'produto', '200.00', NULL, 1, '...', 0, '2020-09-13', NULL, 0, NULL, NULL, 'P', NULL, NULL, '9', 005, 2),
(11, 'produto10', '200.00', NULL, 0, 'Bordô', 0, '2020-09-13', NULL, 1, NULL, NULL, 'P', NULL, NULL, '13', 005, 2),
(12, 'ppp', '2.00', NULL, 0, '...', 0, '2020-09-13', NULL, 1, NULL, NULL, 'P', NULL, NULL, '19', 005, 2),
(13, 'saaasas', '2221.00', NULL, 0, '...', 0, '2020-09-13', NULL, 1, NULL, NULL, 'P', NULL, NULL, '1221', 005, 2),
(14, 'lalala editado', '2233.00', NULL, 0, 'Amarelo', 0, '0000-00-00', NULL, 1, NULL, NULL, 'P', '0.00', NULL, '2323', 005, 4),
(15, 'wwe', '20.00', NULL, 0, '...', 0, '2020-09-15', NULL, 1, NULL, NULL, 'P', NULL, NULL, '32323', 005, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `email`, `permissao`, `ativo`, `dataAtiv`, `dataDes`, `cpf`, `obs`) VALUES
(1, 'joao', '123', '', 1, 0, '0000-00-00', '2020-09-10', '', NULL);

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
  `usuarios_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `vlrTotal`, `data`, `dsc`, `metPgto`, `frmPgto`, `vlrPago`, `qtdeParc`, `clientes_id`, `produtos`, `usuarios_id`) VALUES
(1, '200.00', '2020-09-08 16:29:00', '0.00', 0, 0, '200.00', 1, 00001, 'a:1:{i:0;s:1:\"2\";}', 1),
(2, '200.00', '2020-09-08 16:41:00', '0.00', 0, 0, '200.00', 1, 00002, 'a:1:{i:0;s:1:\"2\";}', 1),
(3, '200.00', '2020-09-08 16:43:00', '0.00', 0, 0, '200.00', 1, 00002, 'a:1:{i:0;s:1:\"2\";}', 1),
(4, '200.00', '2020-09-08 16:44:00', '0.00', 0, 0, '200.00', 1, 00002, 'a:1:{i:0;s:1:\"2\";}', 1),
(5, '400.00', '2020-09-08 16:47:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(6, '800.00', '2020-09-08 22:51:00', '0.00', 0, 0, '800.00', 1, 00002, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"3\";}', 1),
(7, '800.00', '2020-09-09 21:33:00', '0.00', 0, 0, '800.00', 1, 00002, 'a:2:{i:0;s:1:\"3\";i:1;s:1:\"3\";}', 1),
(8, '400.00', '2020-09-07 21:35:00', '0.00', 0, 0, '400.00', 1, 00001, 'a:1:{i:0;s:1:\"3\";}', 1),
(9, '400.00', '2020-09-03 21:36:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(10, '400.00', '2020-09-09 21:37:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(11, '400.00', '2020-09-09 21:37:00', '0.00', 0, 1, '400.00', 1, 00001, 'a:1:{i:0;s:1:\"3\";}', 1),
(12, '400.00', '2020-09-10 11:20:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(13, '200.00', '2020-09-10 11:54:00', '0.00', 0, 0, '200.00', 1, 00003, 'a:1:{i:0;s:1:\"5\";}', 1),
(14, '200.00', '2020-09-10 11:55:00', '0.00', 0, 0, '200.00', 1, 00002, 'a:1:{i:0;s:1:\"5\";}', 1),
(15, '400.00', '2020-09-10 13:37:00', '0.00', 1, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(16, '400.00', '2020-09-10 14:31:00', '0.00', 0, 5, '400.00', 1, 00004, 'a:1:{i:0;s:1:\"3\";}', 1),
(17, '400.00', '2020-09-10 14:42:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:2:{i:6;s:8:\"12345678\";i:7;s:8:\"12345678\";}', 1),
(18, '400.00', '2020-09-10 14:44:00', '0.00', 0, 0, '400.00', 1, 00002, 'a:1:{i:0;s:1:\"3\";}', 1),
(19, '400.00', '2020-09-10 14:47:00', '0.00', 1, 0, '400.00', 1, 00005, 'a:1:{i:0;s:1:\"3\";}', 1),
(20, '400.00', '2020-09-08 14:47:00', '0.00', 1, 0, '70.00', 2, 00005, 'a:1:{i:0;s:1:\"3\";}', 1),
(21, '400.00', '2020-09-15 18:14:00', '0.00', 0, 0, '400.00', 1, 00010, 'a:2:{i:34;s:1:\"7\";i:35;s:1:\"7\";}', 1),
(22, '400.00', '2020-09-15 18:14:00', '0.00', 0, 0, '400.00', 1, 00010, 'a:2:{i:34;s:1:\"7\";i:35;s:1:\"7\";}', 1),
(23, '200.00', '2020-09-16 14:47:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:5;s:1:\"4\";}', 1),
(24, '200.00', '2020-09-16 14:47:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(25, '200.00', '2020-09-16 14:47:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(26, '200.00', '2020-09-16 14:48:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(27, '200.00', '2020-09-16 14:48:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(28, '200.00', '2020-09-16 14:48:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(29, '200.00', '2020-09-16 14:48:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(30, '200.00', '2020-09-16 14:48:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(31, '200.00', '2020-09-16 14:49:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(32, '200.00', '2020-09-16 14:49:00', '0.00', 0, 0, '200.00', 1, 00010, 'a:1:{i:0;s:1:\"4\";}', 1),
(33, '2800.00', '2020-09-16 21:48:00', '0.00', 0, 0, '2800.00', 1, 00010, 'a:14:{i:7;s:1:\"4\";i:8;s:1:\"4\";i:9;s:1:\"4\";i:17;s:1:\"5\";i:18;s:1:\"5\";i:19;s:1:\"5\";i:20;s:1:\"5\";i:21;s:1:\"5\";i:22;s:1:\"5\";i:23;s:1:\"5\";i:24;s:1:\"5\";i:28;s:1:\"6\";i:32;s:1:\"7\";i:33;s:1:\"7\";}', 1),
(34, '2000.00', '2020-09-17 16:04:00', '0.00', 0, 0, '2000.00', 1, 00001, 'a:1:{i:11;s:1:\"1\";}', 1),
(35, '2000.00', '2020-09-17 16:05:00', '0.00', 0, 0, '2000.00', 1, 00001, 'a:1:{i:0;s:1:\"1\";}', 1),
(36, '2000.00', '2020-09-17 16:08:00', '0.00', 0, 0, '2000.00', 1, 00002, 'a:1:{i:0;s:1:\"1\";}', 1),
(37, '16000.00', '2020-09-17 17:43:00', '0.00', 0, 0, '16000.00', 1, 00001, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:1:\"1\";}', 1),
(38, '2000.00', '2020-09-19 14:24:00', '0.00', 0, 0, '2000.00', 1, 00001, 'a:1:{i:0;s:1:\"1\";}', 1),
(39, '4000.00', '2020-09-19 21:30:00', '0.00', 0, 0, '4000.00', 1, 00001, 'a:2:{i:5;s:1:\"1\";i:6;s:1:\"1\";}', 1),
(40, '2000.00', '2020-09-19 23:13:00', '0.00', 0, 0, '2000.00', 1, 00001, 'a:1:{i:0;s:1:\"1\";}', 1);

--
-- Índices para tabelas despejadas
--

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
-- Índices para tabela `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendas_clientes1_idx` (`clientes_id`),
  ADD KEY `fk_vendas_usuarios1_idx` (`usuarios_id`);

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
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_vendas_clientes10` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_usuarios10` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
