<?php
session_start();
if (!isset($_SESSION['usuario']))
  Header("location:index.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="IMG/icon.png">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

  <title>Sistema de Boletim Escolar</title>
</head>

<body>
  <nav class="light-blue darken-4">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo left"><img id="img" src="IMG/img1.png" width="112"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down" id="margen">
        <li><a href="frmLancarMedia.php">Lançar Boletim</a></li>
        <li><a href="listarAluno.php">Alunos</a></li>
        <li><a href="listarProfessor.php">Professores</a></li>
        <li><a href="listarCurso.php">Cursos</a></li>
        <li><a href="listarDisciplina.php">Disciplinas</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>

    </div>
  </nav>
</body>

</html>