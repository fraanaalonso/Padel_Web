<?php



	$servidor = "localhost";
	$nombreusuario = "root";
	$password = "root";



	$conexion = new mysqli($servidor, $nombreusuario, $password);

	if($conexion -> connect_error){
		die("Conexión Fallida: " . $conexion-> connect_error);

	}


	echo "Conexión Exitosa";
?>