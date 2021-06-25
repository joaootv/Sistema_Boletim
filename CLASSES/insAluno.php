<?php
    include '../conexao.php';

    $nome = $_POST['txtNome']; 
    $cursoID = $_POST['slcCurso'];
    $idade = $_POST['txtIdade'];
    $celular = $_POST['txtCelular']; 
    $cidade = $_POST['txtCidade'];
    $bairro = $_POST['txtBairro'];
    $endereco = $_POST['txtEndereco']; 

    if (!empty($nome) && !empty($cursoID) && !empty($idade) && !empty($celular) && !empty($cidade) && !empty($bairro) && !empty($endereco)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //lancamento de montaria na tabela montaria
        $sql = "INSERT INTO aluno (nome_a, curso, idade, celular, cidade, bairro, endereco) VALUES (?, ?, ?, ?, ?, ?, ?);"; 
        $query = $pdo->prepare($sql); 
        $query->execute(array($nome, $cursoID, $idade, $celular, $cidade, $bairro, $endereco)); 

        
        //atualização da quantidade de vagas disponiveis da tabela do curso
        //primeiro recuperar os dados do curso 
        $sql = "SELECT * FROM curso WHERE id=?;"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($cursoID));
        $curso = $query->fetch(PDO::FETCH_ASSOC); //recupera os dados do curso para

        //calcular nova quantidade de vagas disponivel
         $vagas = $curso['vagas_disp'] - 1; 

         $sql = "UPDATE curso SET vagas_disp=? WHERE id=?"; 
         $query = $pdo->prepare($sql); 
         $query->execute (array($vagas, $cursoID)); 
    
        Conexao::desconectar();
    }
    header("location: ../listarAluno.php");
