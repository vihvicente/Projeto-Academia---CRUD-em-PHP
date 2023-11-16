-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2022 às 17:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `academia`
--

CREATE TABLE `academia` (
  `dia` varchar(50) NOT NULL,
  `notificacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `academia`
--

INSERT INTO `academia` (`dia`, `notificacao`) VALUES
('sabado', 'vazio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` int(11) NOT NULL,
  `CPF` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matricula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`nome`, `endereco`, `telefone`, `CPF`, `email`, `matricula`) VALUES
('amanda', 'rua amanda', 98989, 0, 'amandaamanda', 12345);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `nome` varchar(50) NOT NULL,
  `video` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`nome`, `video`, `marca`) VALUES
('leg press', 'asas', 'aaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrutor`
--

CREATE TABLE `instrutor` (
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `CPF` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prontuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `instrutor`
--

INSERT INTO `instrutor` (`nome`, `endereco`, `telefone`, `CPF`, `email`, `prontuario`) VALUES
('aaaa', 'asasas', 909, 43434, 'sasasas', 12345);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensalidade`
--

CREATE TABLE `mensalidade` (
  `CPF` int(11) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `plano` varchar(50) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensalidade`
--

INSERT INTO `mensalidade` (`CPF`, `pagamento`, `plano`, `preco`) VALUES
(12345, 'dinheiro', 'anual', 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `secretaria`
--

CREATE TABLE `secretaria` (
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `CPF` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `turno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `secretaria`
--

INSERT INTO `secretaria` (`nome`, `endereco`, `telefone`, `CPF`, `email`, `turno`) VALUES
('amanda', 'cdfcsf', 111, 123456, 'vcdds', 'manha');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
