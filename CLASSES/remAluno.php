<?php //remCompetidor.php
    //recuperar campos do formulario usando método post
    $id = trim($_POST['id']);
    $cursoID = $_POST['slcCurso'];

    if (!empty($id)){
        include '../conexao.php';
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM aluno WHERE RA=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($id));

        //atualização da quantidade de vagas disponiveis da tabela do curso
        //primeiro recuperar os dados do curso 
        $sql = "SELECT * FROM curso WHERE id=?;"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($cursoID));
        $curso = $query->fetch(PDO::FETCH_ASSOC); //recupera os dados do curso para

        //calcular nova quantidade de vagas disponivel
         $vagas = $curso['vagas_disp'] + 1; 

         $sql = "UPDATE curso SET vagas_disp=? WHERE id=?"; 
         $query = $pdo->prepare($sql); 
         $query->execute (array($vagas, $cursoID)); 
        Conexao::desconectar();
    }
    else echo "Campo ID vazio...";
    header("location: ../listarAluno.php");
