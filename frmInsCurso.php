<?php
include 'menu.php';
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

    <title>Inserir Curso</title>
</head>

<body>

    <h3 class="grey-text text-darken-3">Abrir Novo Curso</h3>
    <div class="container  indigo lighten-5 ">
        <div class="row">
            <form action="CLASSES/insCurso.php" method="POST" id="frmInsCurso" class="col s12">
                <div class="input-field col s8">
                    <label for="lblNome">Informe o Nome do Curso: </label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" autocomplete="off">
                </div>
                <div class="input-field col s8">
                    <label for="lblNome">Informe a quantidade maxima de vagas: </label>
                    <input type="number" class="form-control" id="txtVagas" name="txtVagas">
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