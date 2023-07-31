-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2023 às 02:35
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
-- Banco de dados: `adote_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nome_pet` varchar(255) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagem_pet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `crud`
--

INSERT INTO `crud` (`id`, `nome`, `nome_pet`, `celular`, `email`, `especie`, `descricao`, `id_usuario`, `imagem_pet`) VALUES
(1, 'Gustavo', 'Elvis', 2147483647, 'gustavo@gmail.com', 'Labrador', 'Preto e gordo', 2, 'Elvis.jpg'),
(2, 'Gustavo', 'Sei la', 2147483647, 'gustavo@gmail.com', 'Cachorro', 'sei la mano tnc', 2, 'seila.jpg'),
(3, 'Gustavo', 'Pedro', 2147483647, 'gustavo@gmail.com', 'Pedro', 'Pedro', 2, 'PEdro.jpg'),
(4, 'Gustavo', 'Nazista', 2147483647, 'gustavo@gmail.com', 'Alemão', 'Rammstain', 2, 'nazista.jpg'),
(5, 'Gustavo', 'hotdog', 2147483647, 'gustavo@gmail.com', 'Vina', 'comer comer', 2, 'hotdog.jpg'),
(6, 'Gustavo', 'Cleber', 2147483647, 'gustavo@gmail.com', 'Cleber', 'Estranho', 2, 'CLeber.jpg'),
(7, 'earuiger', 'retyer', 33453245, 'gdfgz@gmail.com', 'ertert', 'tyyyy', 2, 'images.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numero_de_telefone` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `nome_completo`, `email`, `numero_de_telefone`, `endereco`, `senha`) VALUES
(1, 'paulo', 'paulo@gmail.com', 21312, 'paulo', '$2y$10$NjGp7DcCPiQ7uG6vhzaeVOAkBeF9QX5x91ZxgrLvnzB/8LtcaLs8O'),
(2, 'Gustavo', 'gustavo@gmail.com', 2147483647, 'Rua Sei la', '$2y$10$3Z0bu1KefBX4lopIVTwMAuji0XU5NKnrDKU3aX3tBMKxHhoRaHg96');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_pet` (`id_usuario`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `crud`
--
ALTER TABLE `crud`
  ADD CONSTRAINT `fk_usuario_pet` FOREIGN KEY (`id_usuario`) REFERENCES `dados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
