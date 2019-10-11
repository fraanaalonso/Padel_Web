
<?php

session_start();

include '../Functions/Autenticacion.php';


if (!autenticado()){
	header('Location:../Controllers/Login_Controller.php');
}

else{
	header('Location:../Controllers/Index_Controller.php');
}

?>