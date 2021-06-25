<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="IMG/icon.png">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <title>Página de Login - Sistema de Boletim!</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/telalogin.css">
</head>

<body>

  <div class="had-container">
    <div class="parallax"><img src="IMG/img2.jpg"></div>
    <div class="parallax-container logueo">
      <div class="row"><br>
        <div class="col m8 s8 offset-m2 offset-s2 center">
          <div class="form">
            <h4 class="card-user">
              <div class="row login">
                <h4 id="h4">Software de Gestão de Notas Escolares</h4>
                <form action="login.php" method="POST" class="col s12">
                  <div class="row">
                    <div class="input-field col m12 s12">
                      <i class="material-icons iconis prefix ">account_box</i>
                      <input id="icon_prefix" type="text" name="usuario" class="validate" autocomplete="off">
                      <label for="icon_prefix"><b>Usuário: </b> </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col m12 s12">
                      <i class="material-icons iconis prefix">enhanced_encryption</i>
                      <input id="password" type="password" name="senha" class="validate">
                      <label for="password"><b>Senha: </b></label>
                    </div>
                  </div>
                  <div class="row">
                    <button class="btn waves-effect red" type="submit">Acessar</button>
                  </div>
                </form>
              </div>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script async="" src="//www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>

  <!-- jQuery first, then Bootstrap JS. -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script src="mySpxript.js"></script>
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      onOpen: function(el) {
        /* Do Stuff*/ }, // A function to be called when sideNav is opened
      onClose: function(el) {
        /* Do Stuff*/ }, // A function to be called when sideNav is closed
    });
    $('.parallax').parallax();
  });
</script>