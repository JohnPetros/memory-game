-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.byetcluster.com
-- Tempo de geração: 30/12/2022 às 21:52
-- Versão do servidor: 10.3.27-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_33286143_memory_game`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `card`
--

INSERT INTO `card` (`id`, `path`, `id_user`) VALUES
(308, 'files/63af73a5c9477.png', 52),
(309, 'files/63af73a5c9be1.png', 52),
(310, 'files/63af73a5ca001.png', 52),
(311, 'files/63af73a5ca41b.png', 52),
(312, 'files/63af73a5ca7ec.png', 52),
(335, 'files/63af7e6f6c8dd.png', 52);

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `avatar` varchar(150) NOT NULL,
  `moves` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `avatar`, `moves`, `time`) VALUES
(32, 'joaozinho', 'joaopedro.nc@outlook.com', '316cfd861f0a9a7ebcfbf01b2375c6733374180a', 'avatar-3', 15, '00:10:10'),
(42, 'Ronaldo1234', 'rosangelaborgesbacha@hotmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'avatar-5', 7, '00:01:27'),
(52, 'John Petros', 'joaopedro.cds@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'avatar-4', 20, '00:00:10'),
(71, 'Wiggy Diggy Jed', 'ramos@teste.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'avatar-1', 22, '00:00:14');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `path` (`path`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
