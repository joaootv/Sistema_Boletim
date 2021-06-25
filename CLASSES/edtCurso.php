<?php
//abrir a conexao
    include '../conexao.php';

    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']);
    $vagas = trim($_POST['txtVagas']);

    if (!empty($nome) && !empty($vagas)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE curso SET nome_c=?, qtd_vagas=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $vagas, $id));
        
        Conexao::desconectar();
    }
    else echo "Campo Nome ou Vagas são vazios...";
    header("location: ../listarCurso.php");
