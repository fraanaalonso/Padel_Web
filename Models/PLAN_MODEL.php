<?php

/**
* 
*/
class PLAN_MODEL
{
	
	var $id_plan;
	var $tipo;
	var $precio;
	var $bd;
	
	function __construct($id_plan,$tipo, $precio)
	{
		$this->id_plan = $id_plan;
		$this->tipo = $tipo;
		$this->precio = $precio;
		


		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}



	function getPlan(){
		 $sql = "SELECT * FROM PLAN  WHERE (id_plan = '$this->id_plan')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; // 
			}
		    else{ // si existe se devuelve la tupla resultado
				$result = $resultado->fetch_array();
				return $result;
			}
	}


	function SEARCH(){
		$sql = "SELECT * FROM PLAN";

		if (!($resultado = $this->bd->query($sql))){
				return 'Error en conculta de la base de datos'; // 
			}

		else{
			return $resultado;
		}



	}


		function RellenaDatos()
		{	// se construye la sentencia de busqueda de la tupla
		    $sql = "SELECT * FROM PLAN  WHERE (id_plan = '$this->id_plan')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; // 
			}
		    else{ // si existe se devuelve la tupla resultado
				$result = $resultado->fetch_array();
				return $result;
			}
		} // fin del metodo RellenaDatos()

}

?>