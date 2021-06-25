<?php
    include '../conexao.php';

    $nome = trim($_POST['txtNome']);
    $professorID = trim($_POST['slcProfessor']);
    $cursoID = trim($_POST['slcCurso']);

    if (!empty($nome)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
       //lancamento de nota na tabela notas
        $sql = "INSERT INTO disciplina (nome ,curso, professor) VALUES (?, ?, ?);"; 
        $query = $pdo->prepare($sql); 
        $query->execute(array($nome, $cursoID, $professorID)); 

        Conexao::desconectar();
    }
    header("location: ../listarDisciplina.php");
