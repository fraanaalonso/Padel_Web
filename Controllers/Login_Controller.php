<?php


session_start();

include_once '../Functions/Autenticacion.php';
if(autenticado()){
	header('Location: ../Views/PaginaPrincipal.php');
}

if(!isset($_REQUEST['login']) && !(isset($_REQUEST['password']))){
	include '../Views/Login_View.php';
	$login = new Login();
}
else{

	include '../includes/db.php';

	include_once '../Models/USER_MODEL.php';
	$usuario = new User_Modelo($_REQUEST['login'],'','',$_REQUEST['password'], '','','','','','','','');
	$respuesta = $usuario->loginExiste();

	if ($respuesta == 'true'){
		session_start();
		$_SESSION['login'] = $_REQUEST['login'];
		
		header('Location: ../Views/PaginaPrincipal.php');
	}
	else{
		include_once '../Views/Message_View.php';
		new MESSAGE($respuesta, './Login_Controller.php');
	}

}



?>