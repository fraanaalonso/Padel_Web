<?php

/**
* 
*/
class RULE_MODEL
{
	var $id_normativa;
	var $bases;
	var $bd;
	
	function __construct($id_normativa,$bases)
	{
		$this->id_normativa = $id_normativa;
		$this->bases = $bases;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}









function RellenaDatos()
		{	
		    $sql = "SELECT * FROM RULE  WHERE (id_normativa = '$this->id_normativa')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}













}


?>