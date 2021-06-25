<?php
//abrir a conexao
    include '../conexao.php';

    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    
    $cursoID = $_POST['slcCurso'];
    $professorID = $_POST['slcProfessor'];

    if (!empty($nome)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE disciplina SET nome=?, curso=?, professor=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $cursoID, $professorID, $id)); 
        Conexao::desconectar();
    }
    else echo "Campo Nome ou Vagas são vazios...";
    header("location: ../listarDisciplina.php");
