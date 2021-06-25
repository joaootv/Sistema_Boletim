<?php //frmEdtCompetidor.php

include 'menu.php';
include 'conexao.php';


//recuperar o id pelo método GET
$id = $_GET['id'];

//recuperar os dados do banco de dados
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT *
            FROM aluno
            WHERE RA=?;";
$query = $pdo->prepare($sql);
$query->execute(array($id));

$dados = $query->fetch(PDO::FETCH_ASSOC);

$sql = "Select * from curso order by nome_c ";
$listaCursos = $pdo->query($sql);

$nome = $dados['nome_a'];
$idade = $dados['idade'];
$celular = $dados['celular'];
$cidade = $dados['cidade'];
$bairro = $dados['bairro'];
$end = $dados['endereco'];

$cursoID = $dados['curso'];
$sql = "Select *
     from curso 
      WHERE id=?;";
$query = $pdo->prepare($sql);
$query->execute(array($cursoID));

$dados1 = $query->fetch(PDO::FETCH_ASSOC);
$cursoN = $dados1['nome_c'];

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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- Inclusão do jQuery-->
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <!-- Inclusão do Plugin jQuery Validation-->
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="CSS/materialize01.min.css">

    <title>Editar Aluno</title>
</head>

<body>

    <h3 class="grey-text text-darken-3">Alterar Dados do Aluno</h3>
    <div class="container  indigo lighten-5 ">
        <div class="row">
            <form action="CLASSES/edtAluno.php" method="POST" id="formulario" class="col s12">
                <div class="input-field col s8">
                    <label for="lblID">
                        <b>RA: </b><?php echo $id; ?>
                    </label>
                    <br><input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblNome">Nome do Aluno: </label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $nome ?>">
                </div>
                <div>
                    <input type="hidden" id="txtC" name="txtC" value="<?php echo $cursoID; ?>">
                </div>
                <div class="input-field col s8">
                    <select id="slcCurso" name="slcCurso">
                        <option value="<?php echo $cursoID ?>"><?php echo $cursoN ?></option>
                        <?php
                        foreach ($listaCursos as $curso) { ?>
                            <option value=<?php echo $curso['id'] ?>><?php echo $curso['nome_c'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="lblCurso">Curso: </label>
                </div>
                <div class="input-field col s8">
                    <label for="lblIdade">Idade: </label>
                    <input type="text" class="form-control" id="txtIdade" name="txtIdade" value="<?php echo $idade ?>">
                </div>
                <div class="input-field col s8">
                    <label for="txtCelular">Celular: </label>
                    <input type="tel" class="form-control" required="required" maxlength="15" id="txtCelular" name="txtCelular" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" placeholder="Ex: (00) 00000-0000" value="<?php echo $celular ?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblCidade">Cidade: </label>
                    <input type="text" class="form-control" id="txtCidade" name="txtCidade" value="<?php echo $cidade ?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblBairro">Bairro: </label>
                    <input type="text" class="form-control" id="txtBairro" name="txtBairro" value="<?php echo $bairro ?>">
                </div>
                <div class="input-field col s8">
                    <label for="lblEndereco">Endereço: </label>
                    <input type="text" class="form-control" id="txtEndereco" name="txtEndereco" value="<?php echo $end ?>">
                </div>
                <br>
                <div class="input-field col s8">
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

<script src="validaFone.js"></script>

<script type="text/javascript">
    $("#txtCelular").bind('input propertychange', function() {

        var texto = $(this).val();

        texto = texto.replace(/[^\d]/g, '');

        if (texto.length > 0) {
            texto = "(" + texto;

            if (texto.length > 3) {
                texto = [texto.slice(0, 3), ") ", texto.slice(3)].join('');
            }
            if (texto.length > 12) {
                if (texto.length > 13)
                    texto = [texto.slice(0, 10), "-", texto.slice(10)].join('');
                else
                    texto = [texto.slice(0, 9), "-", texto.slice(9)].join('');
            }
            if (texto.length > 15)
                texto = texto.substr(0, 15);
        }
        $(this).val(texto);
    })
</script>