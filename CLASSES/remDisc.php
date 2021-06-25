<?php //remCompetidor.php
    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);

    if (!empty($id)){
        include '../conexao.php';
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM disciplina WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id));
        Conexao::desconectar();
    }
    else echo "Campo ID vazio...";
    header("location: ../listarDisciplina.php");
