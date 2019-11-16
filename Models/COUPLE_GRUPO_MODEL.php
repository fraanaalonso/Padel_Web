

<?php



/**
* 
*/
class COUPLE_GRUPO_MODEL
{
	var $id_pareja;
	var $id_grupo;
	var $id_campeonato;
	var $bd;
	
	function __construct($id_pareja,$id_grupo, $id_campeonato)
	{
		$this->id_pareja = $id_pareja;
		$this->id_grupo = $id_grupo;
		$this->id_campeonato = $id_campeonato;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}


	function obtenerUltimoGrupo($categoria, $nivel){
	$sql = "SELECT id_grupo FROM GRUPO WHERE id_categoria = '".$categoria."' AND id_nivel = '".$nivel."'";
	if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
}




	function añadirGrupoPareja($x, $y, $z){


        $sql = "SELECT * FROM COUPLE_GRUPO WHERE (id_grupo = '$this->id_grupo') AND (id_pareja = '$this->id_pareja') AND (id_campeonato = '$this->id_campeonato')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COUPLE_GRUPO (
					id_grupo,
					id_pareja,
					id_campeonato
					) 
						VALUES (
						'".$x."',
						'".$y."',
						'".$z."'
						
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Pareja registrada e inscrita en el campeonato.'; 
				}
				
			}
			else 
				return 'Ya existe en la base de datos'; 
		}
    

	}




	function SEARCH(){

	$sql = "select
					*
					
					FROM COUPLE_GRUPO";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function RellenaDatos()
		{	
		    $sql = "SELECT * FROM COUPLE_GRUPO  WHERE (id_grupo = '$this->id_grupo') AND (id_pareja = '$this->id_pareja') AND (id_campeonato = '$this->id_campeonato')";

		    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}













}


?>