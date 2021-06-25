<?php //listarCompetidor.php
include 'menu.php';
include 'conexao.php';

//recuperar o id pelo método GET
$id = $_GET['id'];

//recuperar os dados do banco de dados
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT n.*, d.nome
            FROM notas n 
            INNER JOIN disciplina d ON n.disciplina = d.id 
            WHERE aluno=? 
            ORDER by d.nome";

$query = $pdo->prepare($sql);
$query->execute(array($id));

$sql = $sql = "SELECT a.*, c.nome_c
    FROM aluno a
    INNER JOIN curso c ON a.curso = c.id
    WHERE RA=?";
$quer = $pdo->prepare($sql);
$quer->execute(array($id));
$dados = $quer->fetch(PDO::FETCH_ASSOC);

$nome = $dados['nome_a'];
$nome_c = $dados['nome_c'];
Conexao::desconectar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="CSS/materialize.min.css">
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Boletim Escolar</title>
</head>

<body>
    <div class="container ">
        <div class="row">
            <h3 class="grey-text text-darken-3">
                Boletim Escolar
            </h3>
            <table class="striped striped indigo lighten-4 indigo lighten-5">
                <tr class=" blue darken-4  grey-text text-lighten-3">

                    <th></th>
                    <th class="center" id="center"><?php echo $nome; ?></th>
                    <th class="center" id="center"><?php echo $nome_c; ?></th>
                    <th></th>
                </tr>
                <tr class="blue darken-3  grey-text text-lighten-3">
                    <th class="center" id="center">Disciplina</th>
                    <th class="center" id="center">Nota 1º S.</th>
                    <th class="center" id="center">Nota 2º S.</th>
                    <th class="center" id="center">Media</th>
                </tr>
                <?php

                foreach ($query as $notas) {

                ?>
                    <tr>
                        <td id="center" class="boletim"><?php echo $notas['nome'] ?></td>
                        <td id="center"><?php echo $notas['nota1']; ?></td>
                        <td id="center"><?php echo $notas['nota2']; ?></td>
                        <td id="center"><?php echo $notas['media']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div id="add">
                <a class="light-blue-text text-darken-4" onclick="JavaScript:location.href='listarAluno.php'">Listagem Alunos</a>
            </div>
        </div>
    </div>
</body>

</html>