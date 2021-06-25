<?php //listarProfessor.php
include 'menu.php';

if (isset($_GET['busca']))
    $busca = $_GET['busca'];
else $busca = '';

include 'conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($busca != '')
    $sql = "Select * from professor
             WHERE nome_p like '%" . $busca .  "%' order by id";
else  $sql = "Select * from professor
                 order by id";
$listarProfessores = $pdo->query($sql);
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

    <title>Listar Professor</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3 class="grey-text text-darken-3">
                    Listagem de Professores
                </h3>
                <div class="row">
                    <div class="input-field">
                        <form action="listarProfessor.php" method="GET" id="frmBuscaCompet" class="col s12">
                            <div class="input-field col s12">
                                <input type="text" placeholder="Informe o Nome do Professor:" class="form-control col s8" id="txtBusca" name="busca">
                                <button class="btn-floating btn-small waves-effect waves-light grey darken-4" type="submit" name="action">
                                    <i class="material-icons">search</i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="striped striped indigo lighten-4 indigo lighten-5 ">
                    <tr class=" blue darken-4  grey-text text-lighten-3">
                        <th class="center" id="center">Cód.</th>
                        <th class="center" id="center">Nome</th>
                        <th class="center" id="center">Celular</th>
                        <th colspan="2"></th>
                    </tr>
                    <?php
                    foreach ($listarProfessores as $prof) {
                    ?>
                        <tr>
                            <td id="center"><?php echo $prof['id']; ?></td>
                            <td id="center"><?php echo $prof['nome_p']; ?></td>
                            <td id="center"><?php echo $prof['celular']; ?></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light orange" onclick="JavaScript:location.href='frmEdtProfessor.php?id=' +
                          <?php echo $prof['id']; ?>">
                                    <i class="material-icons">edit</i></a></td>
                            <td> <a class="btn-floating btn-small waves-effect waves-light red" onclick="JavaScript:location.href='frmRmvProf.php?id=' +
                          <?php echo $prof['id']; ?>">
                                    <i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <div id="add">
                    <a class="light-blue-text text-darken-4" onclick="JavaScript:location.href='frmInsProf.php'">Adicionar Professor</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mCPF(cpf) {
            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            return cpf
        }
    </script>
</body>

</html>