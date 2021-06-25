SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE sistema_escola;

USE sistema_escola;

CREATE TABLE `aluno` (
  `RA` int(11) NOT NULL,
  `nome_a` varchar(50) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `celular` varchar(17) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome_c` varchar(50) DEFAULT NULL,
  `qtd_vagas` int(11) DEFAULT NULL,
  `vagas_disp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `professor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `notas` (
  `id` int(11) NOT NULL,
  `curso` int(11) DEFAULT NULL,
  `disciplina` int(11) DEFAULT NULL,
  `aluno` int(11) DEFAULT NULL,
  `nota1` float DEFAULT NULL,
  `nota2` float DEFAULT NULL,
  `media` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome_p` varchar(50) DEFAULT NULL,
  `cpf` char(14) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `celular` char(17) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `endereco` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `n_usuario` char(32) DEFAULT NULL,
  `senha` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuario` (`id`, `n_usuario`, `senha`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

ALTER TABLE `aluno`
  ADD PRIMARY KEY (`RA`),
  ADD KEY `aluno_curso` (`curso`);

ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplina_professor` (`professor`),
  ADD KEY `disciplina_curso` (`curso`);

ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_aluno` (`aluno`),
  ADD KEY `nota_curso` (`curso`),
  ADD KEY `nota_disciplina` (`disciplina`);

ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `aluno`
  MODIFY `RA` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `disciplina_professor` FOREIGN KEY (`professor`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `notas`
  ADD CONSTRAINT `nota_aluno` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`RA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nota_curso` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nota_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;