<?php

session_start();
if(empty($_SESSION['logged']) || !$_SESSION['logged'] ){
  header("Location: ../view/index.php");
  die();
}

$mail = $_SESSION['mail'];
$profile = $_SESSION['profile'];
$userId = $_SESSION['userId'];
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
      function salvar(){
        if(validarFormulario()){
          var url = "../controller/TimeRecordControl.php";

          var dtData = $('#dtData').val();
          var hrIni = $('#hrIni').val();
          var hrFim = $('#hrFim').val();
          var motive = $('#Justificativa').val();
          var params =  "data="+dtData+"&hrIni="+hrIni+"&hrFim="+hrFim+"&motive="+motive+"&userId=<?php echo $userId?>&metodo=inserir";
          
          $.post(url, params, function( data ) {
            console.info(data);
          }).fail(function(){
            console.info(data);
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
                <a class="nav-link active" href="#">Inserir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Editar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Visualizar</a>
              </li>
            </ul>

      <div class="main_">
        <form>

          <div class="form-inline borderSet_">
            <div class="row paddingB_">
              <label class="col-md-3 label-control">Data</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this,'##/##/####')"
                data-mensagem="Preencha a data." maxlength="10" id="dtData">
  
              <label class="label-control">Justificativa</label>
              <select class="custom-select form-control" id="Justificativa">
                <option selected>Versionamento</option>
                <option selected>Capacitacao</option>
              </select>
            </div>
            
            <div class="row">
              <label class="col-md-3 label-control">Hora entrada</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this,'##:##')" maxlength="5"
                data-mensagem="Preencha a hora de entrada." id="hrIni">
              <label class="label-control">Hora saída</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this,'##:##')" maxlength="5"
                data-mensagem="Preencha a hora de saída." id="hrFim">  
            </div>
            

            <button class="btn btn-success" type="button" onclick="salvar()">Salvar</button>
          
          </div>

        </form>

      </div>

      <footer class="footer">
        <p>&copy; 2017 iDevs.</p>
      </footer>

    </div> <!-- /container -->

  </body>
</html>
