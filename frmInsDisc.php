<?php
include 'menu.php';
include 'conexao.php';

$pdo = Conexao::conectar();

$sql = "Select * from professor order by nome_p ";
$listaProfessor = $pdo->query($sql);

$sql = "Select * from curso order by nome_c ";
$listaCursos = $pdo->query($sql);

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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="CSS/materialize01.min.css">
    <title>Inserir Disciplina</title>
</head>

<body>
    <h3 class="grey-text text-darken-3">
        Cadastrar Disciplina
    </h3>
    <div class="container indigo lighten-5 ">
        <div class="row">
            <form action="CLASSES/insDisc.php" method="POST" id="frmInsDisciplina" class="col s12">
                <div class="input-field col s8">
                    <label for="lblNome">Informe o Nome da Disciplina: </label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" autocomplete="off">
                </div>
                <div class="input-field col s8">
                    <select id="slcCurso" name="slcCurso">
                        <option value="" disabled selected>Escolha o Curso</option>
                        <?php
                        foreach ($listaCursos as $curso) { ?>
                            <option value=<?php echo $curso['id'] ?>><?php echo $curso['nome_c']; ?></option>
                        <?php }; ?>
                    </select>
                    <label for="lblCurso">Escolha o Curso: </label>
                </div>
                <div class="input-field col s8">
                    <select id="slcProfessor" name="slcProfessor">
                        <option value="" disabled selected>Escolha o Professor</option>
                        <?php
                        foreach ($listaProfessor as $prof) { ?>
                            <option value=<?php echo $prof['id'] ?>><?php echo $prof['nome_p'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="lblProfessor">Escolha o Professor: </label>
                </div>
                <div class="col s12">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light red" type="submit" name="btnGravar">
                            Gravar <i class="material-icons">send</i>
                        </button>
                        <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">
                            Limpar <i class="material-icons">brush</i>
                        </button>
                        <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarDisciplina.php'">
                            Voltar <i class="material-icons">arrow_back</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>