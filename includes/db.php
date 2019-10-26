

<?php



/**
* 
*/



	function ConectarDB()
	{

	    $bd = new mysqli("localhost", "root", "root", "abp46"); //maquina, user, pass, bd
		// si hay error en la conexión se muestra el mensaje de error
		if ($bd->connect_errno) {
			echo "Fallo al conectar a MySQL";
		}
		// la función devuelve el manejador
		return $bd;
}





?>