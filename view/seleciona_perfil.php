<?php

session_start();
if(empty($_SESSION['logged']) || !$_SESSION['logged'] ){
  header("Location: ../view/index.php");
  die();
}

$mail = $_SESSION['mail'];
?>

<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SAH – Sistema de Ajuste de Horas">
    <meta name="author" content="iDevs">
    <link rel="icon" href="../../favicon.ico">

    <title>SAH - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bootstrap-3.3.7-dist/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">SAH – Sistema de Ajuste de Horas</h3>
      </div>

        <div class="alert alert-success" role="alert">
          <strong>Usuário logado: </strong> <?php echo $mail;?>
        </div>
      <div class="main_">
        <form action="../controller/PerfilControl.php" method="POST">

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-md-6 col-form-label">Perfil de usuário</label>
              <select class="custom-select form-control">
                <option selected>Trabalhador</option>
              </select>  
            </div>
          </div>

          <input class="btn btn-success" type="submit" value="Acessar" name="btnAcessar"/>
          
        </form>

      </div>

      <footer class="footer">
        <p>&copy; 2017 iDevs.</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
