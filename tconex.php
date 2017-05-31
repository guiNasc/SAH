<?php

include("config/config_bd.inc.php");
		

   $dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass); 

   if (!$dbh) { die('Não foi possível conectar: ' . mysql_error());  }else{ echo "that was it!";} 

?>