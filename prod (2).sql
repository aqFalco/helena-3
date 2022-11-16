-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2022 às 11:59
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prod`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nif` varchar(20) DEFAULT NULL,
  `morada` varchar(50) DEFAULT NULL,
  `localidade` varchar(50) DEFAULT NULL,
  `cpostal` varchar(10) DEFAULT NULL,
  `setor` varchar(30) DEFAULT NULL,
  `horario` varchar(10) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `nif`, `morada`, `localidade`, `cpostal`, `setor`, `horario`, `estado`, `horas`) VALUES
(4, 'sdasdas', '132145', 'hjkasnjkdhbashdvs', 'asndjkash', '123432', 'dsfsdjkfhsdk', '04:59', 'I', '8th November 2022 02:02:43 PM'),
(5, '636252777818', '543534', 'gfdgfdgdfgfdg', 'dfgdfgfd', '545465', 'dfgfdgfdgdf', '17:06', 'A', '8th November 2022 08:22:59 PM'),
(6, 'André Quintas', '654645', 'ggfdgfdgfd', 'fghfghfg', 'hfghfghfgh', 'fgghhfghfg', '05:06', 'I', '8th November 2022 08:24:36 PM'),
(7, 'André Quintas TEStings', '543534534', 'dsfdsfsdfsd', 'fdsdsfsdfds', 'fdsfsd', 'sdfsdfsdfsd', '15:33', 'A', '8th November 2022 11:06:22 PM'),
(8, 'André Quintas Teste', '543534234', 'dsfdsfsdfsd', 'fdsdsfsdfds', 'fmora', 'sdfnhe', '19:33', 'I', '8th November 2023 11:06:26 PM'),
(9, 'Helena omg dash', '612783', 'casinha', 'location da casinha', '876', 'Trabalhador', '06:56', 'I', '9th November 2022 11:34:02 AM'),
(10, 'teste client', '123126433', 'aadreere', 'lcoaacalco', 'postali', 'Teste', '23:11', 'I', '16th November 2022 10:57:24 AM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ordered`
--

INSERT INTO `ordered` (`id`, `horas`) VALUES
(3, '14th November 2022 01:52:30 AM'),
(6, '14th November 2022 01:59:35 AM'),
(4, '14th November 2022 02:00:19 AM'),
(2, '14th November 2022 03:03:08 PM'),
(2, '14th November 2022 03:05:24 PM'),
(4, '14th November 2022 02:06:17 PM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client` varchar(50) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `amount` int(10) UNSIGNED DEFAULT NULL,
  `week` varchar(10) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `client`, `product`, `amount`, `week`, `horas`) VALUES
(1, '636252777818652432', '45345', 4, '0056-W05', '8th November 2022 08:27:32 PM'),
(13, 'André Quintas TEStings', 'Tomate crazy', 4, '3232-W23', '16th November 2022 10:37:21 AM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `prodId` varchar(30) DEFAULT NULL,
  `prodCode` varchar(30) DEFAULT NULL,
  `prodDesc` varchar(300) DEFAULT NULL,
  `Activity` varchar(10) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`prodId`, `prodCode`, `prodDesc`, `Activity`, `horas`) VALUES
('23423423423', '3127863127', 'sjhgdjhasdasdjasjh', 'I', '8th November 2022 02:39:38 PM'),
('2345351', '45345fd', 'sdfgdfgd45', 'A', '8th November 2023 02:41:15 PM'),
('34545', '43535', '435345sdsdf', 'I', '8th November 2022 02:42:31 PM'),
('543534', 'Banana', 'gfdsjhgds', 'A', '8th November 2022 11:06:43 PM'),
('54353465', 'Tomate', 'gfdsjhgds', 'A', '8th November 2022 11:07:30 PM'),
('23423423', 'Batata', 'description testeinginsgnidn', 'A', '16th November 2022 10:57:52 AM');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
