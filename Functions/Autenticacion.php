<?php
function autenticado(){
	if(isset($_SESSION['login'])){
		return true;
	}else{
		return false;
	}
}



function esAdmin(){	
	
	include_once '../Models/USER_MODEL.php';
	$modelo= new USER_Modelo('','','','','','','','','','',$_REQUEST['rol_id']);
	$valor= $modelo ->RellenaDatos();
	

	if($valor[10] == 1){
		return true;
	}

	else{
		return false;
	}

	
}





?>
