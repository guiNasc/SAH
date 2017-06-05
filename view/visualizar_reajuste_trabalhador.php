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
    <link href="../lib/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="../lib/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../lib/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/utils.js"></script>
 
    <script type="text/javascript">

    function pesquisar(){
      document.getElementById('tableBody').innerHTML = "Nenhum registro encontrado.";
      if(validarFormulario()){
        var url = "../controller/TimeRecordControl.php";
        var dtIni = $('#dtIni').val();
        var dtFim = $('#dtFim').val();
        var motive = $('#Justificativa').val();
        var params =  "dtIni="+dtIni+"&dtFim="+dtFim+"&motive="+motive+"&userId=<?php echo $userId?>&metodo=pesquisar";
        var tableBody = "";
        $.post(url, params, function( data ) {
          var json = JSON.parse(data);
          $.each(json, function(a,b){
            tableBody= tableBody +"<tr>"+
                      "<td>"+b.data+"</td>"+
                      "<td>"+b.timeIn+"</td>"+
                      "<td>"+b.timeOut+"</td>"+
                      "<td>"+b.total+"</td>  "+
                      "<td>"+b.motive+"</td>"+
                      "<td><a href='editar_reajuste_trabalhador.php?id="+b.id+"' class='fa fa-edit' title='Editar'></a><button type='button' class='fa fa-window-close' onclick='excluir("+b.id+")' title='Excluir'/></td>"+
                    "</tr>";
          });
          document.getElementById('tableBody').innerHTML = tableBody;
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
                <a class="nav-link" href="inserir_reajuste_trabalhador.php">Inserir</a>
              </li>
            </ul>

      <div class="main_">
        <form>

          <div class="form-inline borderSet_">

            <div class="row paddingB_">
              <label class="col-md-2 label-control">Data Inicial</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this, '##/##/####')" maxlength="10"
              data-mensagem="Preencha a data inicial." id="dtIni">
  
              <label class="label-control">Data Final</label>
              <input type="text" class="form-control validar" onkeypress="mascararCampo(this, '##/##/####')" maxlength="10"
                data-mensagem="Preencha a data final." id="dtFim">            
            </div>
            
            <div class="row">
              <label class="col-md-2 label-control">Justificativa</label>
              <select class="custom-select form-control" id="Justificativa">
                <option selected>Versionamento</option>
                <option>Capacitacao</option>
              </select>  
            </div>
            
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
              <tbody id="tableBody">
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
