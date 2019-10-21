<?php
//session
session_start();
//incluir funcion autenticacion
include '../Functions/Autenticacion.php';
//si no esta autenticado
if (!autenticado()){
	header('Location: ../index.php');
}
//esta autenticado
else{

	header('Location: ./Post_Controller.php');
		
}

?>