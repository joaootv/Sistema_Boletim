<?php
    include '../conexao.php';

    $nome = $_POST['txtNome']; 
    $cpf = $_POST['txtCpf'];
    $idade = trim($_POST['txtIdade']);
    $celular = $_POST['txtCelular']; 
    $cidade = $_POST['txtCidade'];
    $bairro = $_POST['txtBairro'];
    $endereco = $_POST['txtEndereco']; 

    if (!empty($nome) && !empty($cpf) && !empty($idade) && !empty($celular) && !empty($cidade) && !empty($bairro) && !empty($endereco)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO professor (nome_p, cpf, idade, celular, cidade, bairro, endereco) VALUES (?, ?, ?, ?, ?, ?,?);"; 
        $query = $pdo->prepare($sql); 
        $query->execute(array($nome, $cpf, $idade, $celular, $cidade, $bairro, $endereco)); 
    
        Conexao::desconectar();
    }
    header("location: ../listarProfessor.php");
