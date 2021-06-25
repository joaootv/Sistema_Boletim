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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Lançar Média</title>
</head>

<body>
    <?php
    include '../conexao.php';

    $cursoID = trim($_POST['slcCurso']);
    $disciplinaID = trim($_POST['slcDisciplina']);

    $nota1 = $_POST['txtNota1'];
    $nota2 = $_POST['txtNota2'];
    $media = ($nota1 + $nota2) / 2;

    $alunoID = $_POST['slcAluno'];;
    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT *
           FROM aluno
           WHERE RA=?;";
    $query = $pdo->prepare($sql);
    $query->execute(array($alunoID));

    $dados = $query->fetch(PDO::FETCH_ASSOC);

    $id = $dados['curso'];

    $pdo = Conexao::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT *
           FROM disciplina
           WHERE id=?;";
    $query = $pdo->prepare($sql);
    $query->execute(array($disciplinaID));

    $dados1 = $query->fetch(PDO::FETCH_ASSOC);

    $id_c = $dados1['curso'];

    if ($cursoID == $id_c) {
        if ($cursoID == $id) {
            if (!empty($cursoID) && !empty($disciplinaID) && !empty($alunoID) && !empty($nota1) && !empty($nota2)) {

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //lancamento de nota na tabela notas
                $sql = "INSERT INTO notas (curso, disciplina, aluno, nota1, nota2, media) VALUES (?, ?, ?, ?, ?, ?);";
                $query = $pdo->prepare($sql);
                $query->execute(array($cursoID, $disciplinaID, $alunoID, $nota1, $nota2, $media));

                Conexao::desconectar();
                header("location: ../frmLancarMedia.php");
            } else {
                echo "Erro: Há canpos em branco";
            }
        } else {
    ?>
            <div class="container col s12">
                <h2> "Erro: Não foi possivel concluir operação, o aluno não pertence á este curso!"</h2>
                <div id="add">
                    <a id="add" class="light-blue-text text-darken-4" onclick="JavaScript:location.href='../frmLancarMedia.php'">Ajustar</a>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="container col s12">
            <h2> "Erro: Não foi possivel concluir operação, a disciplia não pertence á este curso!"</h2>
            <div id="add">
                <a id="add" class="light-blue-text text-darken-4" onclick="JavaScript:location.href='../frmLancarMedia.php'">Ajustar</a>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>