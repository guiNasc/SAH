<?php
include_once "../dao/TimeRecordDAO.php";

	$dao = new TimeRecordDAO;	
	
	//var_dump($_POST);

	$dtIni = $_POST['dtIni'];
	$dtFim = $_POST['dtFim'];
	$motive = $_POST['motive'];
	$userId = $_POST['userId'];


	$result = $dao->buscar($dtIni,$dtFim,$motive,$userId);

 	//echo $dtIni." - ".$dtFim." - ".$motive." - ".$userId;
 	echo json_encode($result);
?>