<?php //frmRmvCompetidor.php
include 'menu.php';

//recuperar o id pelo método GET
$id = trim($_GET['id']);

//recuperar os dados do banco de dados
include 'conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "Select *
    from disciplina 
     WHERE id=?;";
$query = $pdo->prepare($sql);
$query->execute(array($id));

$dados = $query->fetch(PDO::FETCH_ASSOC);

//atribui dados em variaveis
$nome = $dados['nome'];

$cursoID = $dados['curso'];
$sql = "Select *
    from curso 
    WHERE id=?;";
$query = $pdo->prepare($sql);
$query->execute(array($cursoID));

$dados1 = $query->fetch(PDO::FETCH_ASSOC);
$cursoN = $dados1['nome_c'];

$profID = $dados['professor'];
$sql = "Select *
    from professor 
    WHERE id=?;";
$query = $pdo->prepare($sql);
$query->execute(array($profID));

$dados2 = $query->fetch(PDO::FETCH_ASSOC);
$profN = $dados2['nome_p'];

$dados = $query->fetch(PDO::FETCH_ASSOC);
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

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="CSS/materialize01.min.css">

    <title>Removeção Disciplina</title>
</head>

<body>
    <h3 class="grey-text text-darken-3">Remover Disciplina</h3>
    <div class="container  indigo lighten-5">
        <form action="CLASSES/remDisc.php" method="POST" id='frmRmvDisc' class="col s12">
            <div class="row">
                <div class="col s10">
                    <label for="lblId">
                        <h4>
                            <blockquote>ID: <?php echo $id ?></blockquote>
                        </h4>
                    </label>
                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                    <label for="lblNome">
                        <h4>Disciplina: <?php echo $nome ?> </h4><label>
                            <label for="lblNome">
                                <h4>Professor: <?php echo $profN ?> </h4><label>
                                    <label for="lblVagas">
                                        <h4>Curso: <?php echo $cursoN ?> </h4><label>
                </div>
            </div>
            <div class="input-field col s8">
                <button class="btn waves-effect waves-light red" type="submit" name="btnRemover">
                    Remover <i class="material-icons">delete</i>
                </button>

                <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarDisciplina.php'">
                    Voltar <i class="material-icons">arrow_back</i>
                </button>
            </div>
            <br />
        </form>
    </div>
</body>

</html>