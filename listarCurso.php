<?php //listarCompetidor.php
include 'menu.php';

if (isset($_GET['busca']))
    $busca = $_GET['busca'];
else $busca = '';

include 'conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($busca != '')
    $sql = "Select * from curso
             WHERE nome_c like '%" . $busca .  "%' order by id";
else  $sql = "Select * from curso
                 order by id";
$listarCurso = $pdo->query($sql);
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

    <title>Listar Cursos</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3 class="grey-text text-darken-3">
                    Listagem de Cursos
                </h3>
                <div class="row">
                    <div class="input-field">
                        <form action="listarCurso.php" method="GET" id="frmBuscaCompet" class="col s12">
                            <div class="input-field col s12">
                                <input type="text" placeholder="Informe o Nome do Curso:" class="form-control col s8" id="txtBusca" name="busca">
                                <button class="btn-floating btn-small waves-effect waves-light grey darken-4" type="submit" name="action">
                                    <i class="material-icons">search</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="striped striped indigo lighten-4 indigo lighten-5 ">
                    <tr class=" blue darken-4  grey-text text-lighten-3">
                        <th class="center" id="center">Código</th>
                        <th class="center" id="center">Nome do Curso</th>
                        <th class="center">Qtd. Vagas</th>
                        <th class="center">Vagas Disponiveis</th>
                        <th colspan="2"></th>
                    </tr>
                    <?php
                    foreach ($listarCurso as $cursos) {
                    ?>
                        <tr>
                            <td id="center"><?php echo $cursos['id']; ?></td>
                            <td id="center"><?php echo $cursos['nome_c']; ?></td>
                            <td id="center"><?php echo $cursos['qtd_vagas']; ?></td>
                            <td id="center"><?php echo $cursos['vagas_disp']; ?></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtCurso.php?id=' +
                          <?php echo $cursos['id']; ?>">
                                    <i class="material-icons">edit</i></a></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript:location.href='frmRmvCurso.php?id=' +
                          <?php echo $cursos['id']; ?>">
                                    <i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div id="add">
                    <a id="add" class="light-blue-text text-darken-4" onclick="JavaScript:location.href='frmInsCurso.php'">Adicionar Curso</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>