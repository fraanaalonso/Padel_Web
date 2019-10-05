<?php

function autenticado(){
	if(isset($_SESSION['login'])){//Si existe, existe
		return true;
	}else{//Si no existe, no existe
		return false;
	}
}

?>
