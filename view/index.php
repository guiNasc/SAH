
<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SAH – Sistema de Ajuste de Horas">
    <meta name="author" content="iDevs">
    <link rel="icon" href="../img/favicon/favicon.ico">

    <title>SAH - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bootstrap-3.3.7-dist/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="../js/utils.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">SAH – Sistema de Ajuste de Horas</h3>
      </div>

      <div class="main_">
        <form action="../controller/LoginControl.php" method="POST" >

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-md-2 col-form-label">Email</label>
              <input type="text" class="form-control validar" data-mensagem="Preencha o campo email." name="email">  
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label class="col-md-2 col-form-label">Senha</label>
              <input type="password" class="form-control validar" data-mensagem="Preencha o campo senha." name="senha">  
            </div>
          </div>

          <input class="btn btn-success" type="submit" name="btnLogin" value="Entrar"/>

          <div class="row">
            <a href="#">Ainda não sou cadastrado</a>
          </div>
          <div class="row">  
            <a href="#">Esqueceu sua senha?</a>  
          </div>
          
        </form>

      </div>

      <footer class="footer">
        <p>&copy; 2017 iDevs.</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
