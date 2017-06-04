<?php

session_start();
if(empty($_SESSION['logged']) || !$_SESSION['logged'] ){
  header("Location: ../view/index.php");
  die();
}

$mail = $_SESSION['mail'];
$profile = $_SESSION['profile'];
?>
<!DOCTYPE html>
<html lang="br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SAH – Sistema de Ajuste de Horas">
    <meta name="author" content="iDevs">
    <link rel="icon" href="../img/favicon/favicon.ico">

    <title>SAH - Ajuste de Horas</title>

    <!-- Bootstrap core CSS -->
    <link href="../lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/bootstrap-3.3.7-dist/css/jumbotron-narrow.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="../lib/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="../js/utils.js"></script>
 
<script type="text/javascript">
  
function pesquisar(){
  if(validarFormulario()){
    $.post("teste.php", "campo1=dadoEmCasa", function( data ) {
      console.log(data);
    });
  }
}
</script>


  </head>

  <body>

    <div class="container">
      <div class="header clearfix">
        <h3 class="text-muted">SAH – Sistema de Ajuste de Horas</h3>
      </div>

        <div class="alert alert-success" role="alert">
          <strong>Usuário logado: </strong> <?php echo $mail?>
          <strong>Perfil: </strong> <?php echo $profile?>
        </div>

            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#">Visualizar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Inserir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Editar</a>
              </li>
              
            </ul>

      <div class="main_">
        <form>

          <div class="form-inline borderSet_">

            <div class="row paddingB_">
              <label class="col-md-2 label-control">Data Inicial</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this, '##/##/####')" maxlength="10"
              data-mensagem="Preencha a data inicial.">
  
              <label class="label-control">Data Final</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this, '##/##/####')" maxlength="10"
                data-mensagem="Preencha a data final.">            
            </div>
            
            <div class="row">
              <label class="col-md-2 label-control">Justificativa</label>
              <select class="custom-select form-control">
                <option selected>Versionamento</option>
                <option>Capacitação</option>
              </select>  
            </div>
            

            <!-- <button class="btn btn-success" type="submit" onclick="validarFormulario()">Pesquisar</button>
           -->
           <button class="btn btn-success" type="button" onclick="pesquisar()">Pesquisar</button>
          
          </div>


          <div class="customTable_">
            <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Data</th>
      <th>Entrada</th>
      <th>Saída</th>
      <th>Total horas</th>
      <th>Justificativa</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>21/02/2017</td>
      <td>08:30</td>
      <td>12:30</td>
      <td>4</td>  
      <td>Versionamento</td>
      <td>X</td>
    </tr>
    <tr>
      <td>21/02/2017</td>
      <td>08:30</td>
      <td>12:30</td>
      <td>4</td>
      <td>Versionamento</td>
      <td>X</td>
    </tr>
    <tr>
      <td>21/02/2017</td>
      <td>08:30</td>
      <td>12:30</td>
      <td>4</td>
      <td>Versionamento</td>
      <td>X</td>
    </tr>
  </tbody>
</table>
          </div>

          
        </form>

      </div>

      <footer class="footer">
        <p>&copy; 2017 iDevs.</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
