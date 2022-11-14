-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 02:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prod`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
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
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `nif`, `morada`, `localidade`, `cpostal`, `setor`, `horario`, `estado`, `horas`) VALUES
(4, 'sdasdas', '132145', 'hjkasnjkdhbashdvs', 'asndjkash', '123432', 'dsfsdjkfhsdk', '04:59', 'I', '8th November 2022 02:02:43 PM'),
(5, '636252777818', '543534', 'gfdgfdgdfgfdg', 'dfgdfgfd', '545465', 'dfgfdgfdgdf', '17:06', 'A', '8th November 2022 08:22:59 PM'),
(6, 'André Quintas', '654645', 'ggfdgfdgfd', 'fghfghfg', 'hfghfghfgh', 'fgghhfghfg', '05:06', 'I', '8th November 2022 08:24:36 PM'),
(7, 'André Quintas TEStings', '543534534', 'dsfdsfsdfsd', 'fdsdsfsdfds', 'fdsfsd', 'sdfsdfsdfsd', '15:33', 'A', '8th November 2022 11:06:22 PM'),
(8, 'André Quintas Teste', '543534234', 'dsfdsfsdfsd', 'fdsdsfsdfds', 'fmora', 'sdfnhe', '19:33', 'A', '8th November 2023 11:06:26 PM'),
(9, 'Helena omg dash', '612783', 'casinha', 'location da casinha', '876', 'Trabalhador', '06:56', 'I', '9th November 2022 11:34:02 AM');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int(11) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `horas`) VALUES
(3, '14th November 2022 01:52:30 AM'),
(6, '14th November 2022 01:59:35 AM'),
(4, '14th November 2022 02:00:19 AM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
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
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client`, `product`, `amount`, `week`, `horas`) VALUES
(1, '636252777818652432', '45345', 4, '0056-W05', '8th November 2022 08:27:32 PM'),
(2, 'André Quintas', 'Banana', 5, '2002-W05', '8th November 2022 11:08:17 PM'),
(3, 'André Quintas', 'Banana', 5, '6787-W34', '8th November 2023 11:18:58 PM'),
(4, 'André Quintas', 'Tomatess', 6, '67676-W34', '8th November 2022 11:21:13 PM'),
(5, 'André Quintas', 'Banana', 3, '7889-W45', '8th November 2022 11:26:15 PM'),
(6, 'André Quintas', 'Banana', 5, '6565-W34', '8th November 2022 11:26:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodId` varchar(30) DEFAULT NULL,
  `prodCode` varchar(30) DEFAULT NULL,
  `prodDesc` varchar(300) DEFAULT NULL,
  `Activity` varchar(10) DEFAULT NULL,
  `horas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodId`, `prodCode`, `prodDesc`, `Activity`, `horas`) VALUES
('23423423423', '3127863127', 'sjhgdjhasdasdjasjh', 'I', '8th November 2022 02:39:38 PM'),
('2345351', '45345fd', 'sdfgdfgd45', 'A', '8th November 2023 02:41:15 PM'),
('34545', '43535', '435345sdsdf', 'I', '8th November 2022 02:42:31 PM'),
('543534', 'Banana', 'gfdsjhgds', 'A', '8th November 2022 11:06:43 PM'),
('54353465', 'Tomate', 'gfdsjhgds', 'A', '8th November 2022 11:07:30 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
