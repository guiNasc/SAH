<?php
include_once "../dao/TimeRecordDAO.php";

	$dao = new TimeRecordDAO;	
	
	$metodo = $_POST['metodo'];

	if($metodo == "pesquisar"){
		$dtIni = $_POST['dtIni'];
		$dtFim = $_POST['dtFim'];
		$motive = $_POST['motive'];
		$userId = $_POST['userId'];


		$result = $dao->buscar($dtIni,$dtFim,$motive,$userId);

	 	echo json_encode($result);	
	}

	if($metodo == "inserir"){
		 $data 		= $_POST['data'];
         $hrIni 	= $_POST['hrIni'];
         $hrFim 	= $_POST['hrFim'];
         $userId 	= $_POST['userId'];
         $motive 	= $_POST['motive'];

         $result = $dao->inserir($data,$hrIni,$hrFim,$userId,$motive);
         echo $result;
	}

	if($metodo == "editar"){
		 $data 		= $_POST['data'];
         $hrIni 	= $_POST['hrIni'];
         $hrFim 	= $_POST['hrFim'];
         $userId 	= $_POST['userId'];
         $motive 	= $_POST['motive'];
         $recordId 	= $_POST['recordId'];

         $result = $dao->editar($data,$hrIni,$hrFim,$userId,$motive,$recordId);
         echo $result;
	}
	
?>