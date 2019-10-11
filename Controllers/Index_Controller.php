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
	include '../Views/USER_Index.php';
	new Index();
}

?>