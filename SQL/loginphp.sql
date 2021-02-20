-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Fev-2021 às 21:25
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loginphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `email`, `idade`, `senha`) VALUES
(2, 'Adriel', 'admin', 'a.@a.com', 16, '$2y$10$TwdhicDPfSAj67h8iMTk..R.g879q3zO4R0iKAwRttm3QGdNHp2Fy'),
(11, 'a', 'a', 'a.@a.com', 1, '$2y$10$0nOLAbNk4Wi34fTWKPlgEu3iK8yzsm7haM5QyVgBhoAGmuX0pgRAm'),
(7, 'renato', 'renatinho', 're@gmail.com', 65, '$2y$10$quGTbgYcJtl224SpuKrV..0d6V1oqzf5sFlibPkXwcpUiGc5Tt2aG'),
(12, 'a', 'a', 'a.@a.com', 1, '$2y$10$CqtMiylVSfl65lu/8Mf9xu5bDeBrkgv/QJXV2o9chOMg/KYD6yxAu'),
(13, 'a', 'a', 'a.@a.com', 1, '$2y$10$JKilAQeKqjWqGSCLQL4TU.zGmYRY2mBCI8UgmZAL3w6gd7q/wygrq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
