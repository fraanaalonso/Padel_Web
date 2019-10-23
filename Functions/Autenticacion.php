<?php






function comprobarPermisos($login){
	include_once '../Models/USER_MODEL.php';
	$user = new User_Modelo('','','','','','','','','','','');
	$respuesta = $user->getDBDatos($login);

	
	return $respuesta[10];
}


function autenticado(){
	if(isset($_SESSION['login'])){
		return true;
	}else{
		return false;
	}
}





?>
