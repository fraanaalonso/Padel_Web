

<?php



/**
* 
*/



	function ConectarDB()
	{

	    $mysqli = new mysqli("localhost", "root", "root", "padelweb"); //maquina, user, pass, bd
		// si hay error en la conexión se muestra el mensaje de error
		if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL";
		}
		// la función devuelve el manejador
		return $mysqli;
}





?>