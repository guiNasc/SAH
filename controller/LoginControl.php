<?php
include_once "../dao/LoginDAO.php";

if( isset($_POST['btnLogin'])){

	$dao = new LoginDAO;

	$form_mail = $_POST['email'];
	$form_pass = $_POST['senha'];

	$result = $dao->buscar($form_mail,$form_pass);
	if(empty($result)){
		header("Location: ../view/index.php");	
	}else{
		session_start();
		$_SESSION['logged'] = true;
		$_SESSION['mail'] = $result->getMail();
		$_SESSION['profile'] = $result->getProfile();
		header("Location: ../view/seleciona_perfil.php");
	} 
}


?>