<?php

/**
* 
*/
class GROUP_MODEL
{
	var $id_grupo;
	var $grupo;
	var $bd;
	
	function __construct($id_grupo,$grupo)
	{
		$this->id_grupo = $id_grupo;
		$this->grupo = $grupo;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}









function RellenaDatos()
		{	
		    $sql = "SELECT * FROM GRUPO  WHERE (id_grupo = '$this->id_grupo')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}



function getDBDatosNivel($id_campeonato){
   $sql = "SELECT championship_nivel.id_nivel, nivel.nivel FROM championship_nivel INNER JOIN NIVEL ON championship_nivel.id_nivel=nivel.id_nivel AND championship_nivel.id_campeonato='".$id_campeonato."'";
	 $resultado = $this->bd->query($sql);
	 return $resultado;
}





}

?>