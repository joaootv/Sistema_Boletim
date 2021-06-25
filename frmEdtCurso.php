<?php //frmEdtCompetidor.php

include 'menu.php';
include 'conexao.php';


//recuperar o id pelo método GET
$id = $_GET['id'];

//recuperar os dados do banco de dados
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM curso WHERE id=?;";
$query = $pdo->prepare($sql);
$query->execute(array($id));

$dados = $query->fetch(PDO::FETCH_ASSOC);

//atribui dados em variaveis
$nome = $dados['nome_c'];
$vagas = $dados['qtd_vagas'];
$vagas_d = $dados['vagas_disp'];
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

    <title>Editar Cursos</title>
</head>

<body>

    <h3 class="grey-text text-darken-3">Alterar Dados do Curso</h3>
    <div class="container  indigo lighten-5 ">
        <div class="row">
            <form action="CLASSES/edtCurso.php" method="POST" id="frmEdtCurso" class="col s12">
                <div class="input-field col s8">
                    <label for="lblID">
                        <b>ID: </b><?php echo $id; ?>
                    </label>
                    <br><input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblNome">Informe o Nome do Curso: </label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $nome ?>">
                </div>
                <div class="input-field col s4">
                    <label for="lblQtd">
                        <b>Limite Vagas: </b><?php echo $vagas; ?>
                    </label>
                    <input type="hidden" class="form-control" id="txtVagas" name="txtVagas" value="<?php echo $vagas ?>">
                </div>
                <div class="input-field col s4">
                    <label for="lblQtd">
                        <b>Quantidade Disponivel de Vagas: </b><?php echo $vagas_d; ?>
                    </label>
                    <input type="hidden" class="form-control" id="txtVagasDisp" name="txtVagas" value="<?php echo $vagas_d ?>">
                </div>
                <br>
                <div class="input-field col s8">
                    <button class="btn waves-effect waves-light red" type="submit" name="btnGravar">
                        Gravar <i class="material-icons">send</i>
                    </button>
                    <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">
                        Limpar <i class="material-icons">brush</i>
                    </button>
                    <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarCurso.php'">
                        Voltar <i class="material-icons">arrow_back</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>