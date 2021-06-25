<?php
//abrir a conexao
    include '../conexao.php';

    //recuperar campos do formulario usando método post
    $nome = trim($_POST['txtNome']);
    $vagas = trim($_POST['txtVagas']);
    $disp = $vagas;

    if (!empty($nome) && !empty($vagas)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO curso (nome_c, qtd_vagas, vagas_disp) VALUES (?, ?, ?);";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome,$vagas,$disp));
        Conexao::desconectar();
    }
    else echo "Campo Nome ou Vagas são vazios...";
    header("location: ../listarCurso.php");
