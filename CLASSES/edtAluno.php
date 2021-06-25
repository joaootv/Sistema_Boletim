<?php
//abrir a conexao
    include '../conexao.php';

    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);
    $nome = trim($_POST['txtNome']); 
    $cursoID = $_POST['slcCurso'];
    $Ant = $_POST['txtC'];
    $idade = trim($_POST['txtIdade']);
    $celular = $_POST['txtCelular']; 
    $cidade = $_POST['txtCidade'];
    $bairro = $_POST['txtBairro'];
    $endereco = trim($_POST['txtEndereco']); 

    if (!empty($nome) && !empty($idade) && !empty($celular) && !empty($cidade) && !empty($bairro) && !empty($endereco)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE aluno SET nome_a=?, curso=?, idade=?, celular=?, cidade=?, bairro=?, endereco=? WHERE RA=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($nome, $cursoID, $idade, $celular, $cidade, $bairro, $endereco, $id)); 

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

         //atualização da quantidade de vagas disponiveis da tabela do curso
        //primeiro recuperar os dados do curso 
        $sql = "SELECT * FROM curso WHERE id=?;"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($Ant));
        $Antigo = $query->fetch(PDO::FETCH_ASSOC); //recupera os dados do curso para

        //calcular nova quantidade de vagas disponivel
         $vagas0 = $Antigo['vagas_disp'] + 1; 

         $sql = "UPDATE curso SET vagas_disp=? WHERE id=?"; 
         $query = $pdo->prepare($sql); 
         $query->execute (array($vagas0, $Ant)); 

        Conexao::desconectar();
    }
    else echo "Campo Nome ou Vagas são vazios...";
    header("location: ../listarAluno.php");
