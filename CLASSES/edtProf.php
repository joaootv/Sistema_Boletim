<?php
//abrir a conexao
    include '../conexao.php';

    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);
    $nome = $_POST['txtNome']; 
    $cpf = trim($_POST['txtCpf']);
    $idade = trim($_POST['txtIdade']);
    $celular = $_POST['txtCelular']; 
    $cidade = $_POST['txtCidade'];
    $bairro = $_POST['txtBairro'];
    $endereco = $_POST['txtEndereco'];

    if (!empty($nome) && !empty($cpf) && !empty($idade) && !empty($celular) && !empty($cidade) && !empty($bairro) && !empty($endereco)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE professor SET nome_p=?, cpf=?, idade=?, celular=?, cidade=?, bairro=?, endereco=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $cpf, $idade, $celular, $cidade, $bairro, $endereco, $id)); 
        Conexao::desconectar();
    }
    else echo "Campo Nome ou Vagas são vazios...";
    header("location: ../listarProfessor.php");
