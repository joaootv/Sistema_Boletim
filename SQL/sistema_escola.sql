create database sistema_escola;

use sistema_escola;

create table usuario(
    id int AUTO_INCREMENT PRIMARY key,
	n_usuario char(32),
    senha char(32)
);

create table professor(
    id int AUTO_INCREMENT PRIMARY key,
    nome_p varchar(50),
    cpf char(14),
    idade int,
    celular char(17),
    cidade varchar(50),
    bairro varchar(50),
    endereco varchar(80),
);

create table curso(
  	id int AUTO_INCREMENT PRIMARY key,
  	nome_c varchar(50),
    qtd_vagas int, 
    vagas_disp int
);

create table disciplina(
    id int AUTO_INCREMENT PRIMARY key,
    nome varchar(50),
    curso int,
    professor int
);

create table aluno(
    RA int AUTO_INCREMENT PRIMARY key,
    nome varchar(50),
    curso int,
    idade int,
    celular varchar(17),
    cidade varchar(50),
    bairro varchar(50),
    endereco varchar(80)
);

create table notas(
    id int AUTO_INCREMENT PRIMARY key,
    curso int,
    professor int,
    disciplina int,
    aluno int,
    nota1 float,
    nota2 float,
    media float
);

ALTER TABLE `aluno` ADD CONSTRAINT `aluno_curso` 
FOREIGN KEY (`curso`) REFERENCES `curso`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `disciplina` ADD CONSTRAINT `disciplina_professor`
FOREIGN KEY (`professor`) REFERENCES `professor`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `disciplina` ADD CONSTRAINT `disciplina_curso` 
FOREIGN KEY (`curso`) REFERENCES `curso`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `notas` ADD CONSTRAINT `nota_aluno` 
FOREIGN KEY (`aluno`) REFERENCES `aluno`(`RA`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `notas` ADD CONSTRAINT `nota_curso` 
FOREIGN KEY (`curso`) REFERENCES `curso`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `notas` ADD CONSTRAINT `nota_disciplina` 
FOREIGN KEY (`disciplina`) REFERENCES `disciplina`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 

ALTER TABLE `notas` ADD CONSTRAINT `nota_professor` 
FOREIGN KEY (`professor`) REFERENCES `professor`(`id`) 
ON DELETE NO ACTION ON UPDATE NO ACTION; 