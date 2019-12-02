<?php

/**
* 
*/
class GROUP_MODEL
{
	var $id_grupo;
	var $id_categoria;
	var $id_nivel;
	var $id_campeonato;
	var $bd;
	
	function __construct($id_grupo,$id_categoria, $id_nivel, $id_campeonato)
	{
		$this->id_grupo = $id_grupo;
		$this->id_categoria = $id_categoria;
		$this->id_nivel = $id_nivel;
		$this->id_campeonato = $id_campeonato;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}





function ADD(){

		
				$sql = "INSERT INTO GRUPO (
					id_categoria,
					id_nivel,
					id_campeonato
					) 
						VALUES (

						'$this->id_categoria',
						'$this->id_nivel',
						'$this->id_campeonato'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}
			
    
    

	}


function siExiste(){
	$sql = "SELECT id_grupo from grupo where id_categoria='$this->id_categoria' and id_nivel='$this->id_nivel' and id_campeonato='$this->id_campeonato'";

	$resultado = $this->bd->query($sql);

	if($resultado->num_rows == 0){
		return 'true';
	}
	else{
		return 'false';
	}
}


function currentGroup(){
	$sql = "SELECT id_grupo from grupo where id_categoria='$this->id_categoria' and id_nivel='$this->id_nivel' and id_campeonato='$this->id_campeonato' order by id_grupo desc limit 1";

	$resultado = $this->bd->query($sql);

	$result = $resultado->fetch_array();
	return $result;
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