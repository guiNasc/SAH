<?php
include_once "../dao/LoginDAO.php";

if( isset($_POST['btnLogin'])){

	$dao = new LoginDAO;

	$form_mail = $_POST['email'];
	$form_pass = $_POST['senha'];

	$mail = $dao->buscar($form_mail,$form_pass);

	if(empty($mail)){
		header("Location: ../view/index.html");	
	}else{
		session_start();
		$_SESSION['logged'] = true;
		$_SESSION['mail'] = $mail;
		header("Location: ../view/seleciona_perfil.php");
	} 
}


?>