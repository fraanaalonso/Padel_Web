<?php


session_start();
if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../Views/Login_View.php';
	$login = new Login();
}
else{

	include '../includes/db.php';

	include_once '../Models/USER_MODEL.php';
	$usuario = new User_Modelo($_REQUEST['login'],'','',$_REQUEST['password'], '','','','','','','');
	$respuesta = $usuario->loginExiste();

	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		header('Location: ../Views/PaginaPrincipal.php');
	}
	else{
		header('Location: ./Login_Controller.php');
	}

}



?>