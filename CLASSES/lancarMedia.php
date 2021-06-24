<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Lançar Média</title>
</head>
<body>
<?php
    include '../conexao.php';

    $cursoID = trim($_POST['slcCurso']);
    $professorID = trim($_POST['slcProfessor']);
    $disciplinaID = trim($_POST['slcDisciplina']);
    
    $nota1 = $_POST['txtNota1']; 
    $nota2 = $_POST['txtNota2'];  
    $media = ($nota1 + $nota2) / 2;

    $alunoID =$_POST['slcAluno'];;
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT *
           FROM aluno
           WHERE RA=?;"; 
    $query = $pdo->prepare($sql);
    $query->execute(array($alunoID));

    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $id = $dados['curso'];

    if($cursoID == $id){
        if (!empty($cursoID) && !empty($professorID) && !empty($disciplinaID) && !empty($alunoID) && !empty($nota1) && !empty($nota2)){

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        //lancamento de nota na tabela notas
            $sql = "INSERT INTO notas (curso, professor, disciplina, aluno, nota1, nota2, media) VALUES (?, ?, ?, ?, ?, ?, ?);"; 
            $query = $pdo->prepare($sql); 
            $query->execute(array($cursoID, $professorID, $disciplinaID, $alunoID, $nota1, $nota2, $media)); 

            Conexao::desconectar();
            header("location: ../frmLancarMedia.php");
        }else{
            echo "Erro: Há canpos em branco";
        }
    }else{ 
        ?>  
        <div class="container col s12">
        <h7> "Erro: Não foi possivel concluir operação, aluno não cadastrado no curso!"<h3>
        <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='../frmLancarMedia.php'">
                Voltar <i class="material-icons">arrow_back</i>
         </button>           
         </div>
         <?php
    }       
?>
</body>
</html>