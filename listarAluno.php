<?php //listarAluno.php
include 'menu.php';

if (isset($_GET['busca']))
    $busca = $_GET['busca'];
else $busca = '';

include 'conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($busca != '')
    $sql = "Select a.*, c.nome_c
           from aluno a
           inner join curso c on a.curso = c.id
            WHERE nome_a like '%" . $busca .  "%' order by RA";
else  $sql = "Select a.*, c.nome_c
       from aluno a
       inner join curso c on a.curso = c.id
       order by RA";
$listarAluno = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="CSS/materialize.min.css">
    <link rel="stylesheet" href="CSS/style.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Listar Alunos</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3 class="grey-text text-darken-3">
                    Listagem de Alunos
                </h3>
                <div class="row">
                    <div class="input-field">
                        <form action="listarAluno.php" method="GET" id="frmBuscaCompet" class="col s12">
                            <div class="input-field col s12">
                                <input type="text" placeholder="Informe o Nome do Aluno:" class="form-control col s8" id="txtBusca" name="busca">
                                <button class="btn-floating btn-small waves-effect waves-light grey darken-4" type="submit" name="action">
                                    <i class="material-icons">search</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="striped indigo lighten-4 indigo lighten-5 ">
                    <tr class=" blue darken-4  grey-text text-lighten-3">
                        <th class="center" id="center">RA</th>
                        <th class="center" id="center">Nome</th>
                        <th class="center" id="center">Curso</th>
                        <th class="center" id="center">Celular</th>
                        <th colspan="3"></th>
                    </tr>
                    <?php
                    foreach ($listarAluno as $aluno) {
                    ?>
                        <tr>
                            <td id="center"><?php echo $aluno['RA']; ?></td>
                            <td id="center"><?php echo $aluno['nome_a']; ?></td>
                            <td id="center"><?php echo $aluno['nome_c']; ?></td>
                            <td id="center"><?php echo $aluno['celular']; ?></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light grey darken-4" onclick="JavaScript:location.href='Boletim.php?id=' +
                          <?php echo $aluno['RA']; ?>">
                                    <i class="material-icons">view_headline</i></a></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light  orange accent-3" onclick="JavaScript:location.href='frmEdtAluno.php?id=' +
                          <?php echo $aluno['RA']; ?>">
                                    <i class="material-icons">edit</i></a></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript:location.href='frmRmvAluno.php?id=' +
                          <?php echo $aluno['RA']; ?>">
                                    <i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div id="add">
                    <a class="light-blue-text text-darken-4" onclick="JavaScript:location.href='frmInsAluno.php'">Adicionar Aluno</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>