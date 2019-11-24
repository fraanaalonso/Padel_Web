<?php

/**
* 
*/
class GENDER_MODEL
{
	var $id_categoria;
	var $categoria;
	var $bd;
	
	function __construct($id_categoria,$categoria)
	{
		$this->id_categoria = $id_categoria;
		$this->categoria = $categoria;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}









function RellenaDatos()
		{	
		    $sql = "SELECT * FROM categoria  WHERE (id_categoria = '$this->id_categoria')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}



function getDBDatosCategorias($id_campeonato){
	$sql = "SELECT championship_categoria.id_categoria, categoria.categoria FROM championship_categoria INNER JOIN categoria ON championship_categoria.id_categoria=categoria.id_categoria AND championship_categoria.id_campeonato='".$id_campeonato."'";
	 $resultado = $this->bd->query($sql);
	 return $resultado;
}



}

?>