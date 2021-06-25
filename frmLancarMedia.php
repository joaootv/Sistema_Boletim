<?php
include 'menu.php';
include 'conexao.php';

$pdo = Conexao::conectar();

$sql = "Select * from curso order by nome_c ";
$listaCursos = $pdo->query($sql);

$sql = "Select * from disciplina order by nome ";
$listaDisciplina = $pdo->query($sql);

$sql = "Select * from aluno order by nome_a ";
$listaAlunos = $pdo->query($sql);

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
    <title>Lançar Média</title>
</head>

<body>
    <h3 class="grey-text text-darken-3">
        Lançar Notas
    </h3>
    <div class="container  indigo lighten-5 ">
        <div class="row">
            <form action="CLASSES/lancarMedia.php" method="POST" id="frmLancarMedia" class="col s12">
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
                    <select id="slcDisciplina" name="slcDisciplina">
                        <option value="" disabled selected>Escolha a Disciplina</option>
                        <?php
                        foreach ($listaDisciplina as $disci) { ?>
                            <option value=<?php echo $disci['id'] ?>><?php echo $disci['nome'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="lblDisciplina">Escolha a Disciplina: </label>
                </div>
                <div class="input-field col s8">
                    <select id="slcAluno" name="slcAluno">
                        <option value="" disabled selected>Escolha o Aluno</option>
                        <?php
                        foreach ($listaAlunos as $aluno) { ?>
                            <option value=<?php echo $aluno['RA'] ?>><?php echo $aluno['nome_a'] ?></option>
                        <?php } ?>

                    </select>
                    <label for="lblAluno">Escolha o Aluno: </label>
                </div>
                <div class="col s12">
                    <div class="input-field col s3">
                        <label for="lblNota1">Informe a Nota do 1º semestre: </label>
                        <input type="text" class="form-control" id="txtNota1" name="txtNota1" onblur="calcular()" autocomplete="off">
                    </div>
                    <div class="input-field col s3">
                        <label for="lblNota2">Informe a Nota do 2º semestre: </label>
                        <input type="text" class="form-control" id="txtNota2" name="txtNota2" onblur="calcular()" autocomplete="off">
                    </div>
                    <div class="input-field col s3">
                        <label for="LblMedia"><b>Média: </b>
                            <label id="total"></label>
                        </label>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light red" type="submit" name="btnGravar">
                            Gravar <i class="material-icons">send</i>
                        </button>
                        <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">
                            Limpar <i class="material-icons">brush</i>
                        </button>
                        <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar" onclick="JavaScript:location.href='listarAluno.php'">
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
    function calcular() {
        var nota1 = parseFloat(document.getElementById('txtNota1').value, 10.00);
        var nota2 = parseFloat(document.getElementById('txtNota2').value, 10.00);
        var media = (nota1 + nota2) / 2;
        if (isNaN(media))
            media = 0;
        document.getElementById("total").innerHTML = media.toFixed(2);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>