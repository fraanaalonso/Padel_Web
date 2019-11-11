<?php
//session
session_start();

include '../Functions/Autenticacion.php';

if (!autenticado()){
	header('Location: ./Login_Controller.php');
}

else{

	header('Location: ./Post_Controller.php');
		
}

?>