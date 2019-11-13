

<?php



/**
* 
*/
class COUPLE_GRUPO_MODEL
{
	var $id_pareja;
	var $id_grupo;
	var $bd;
	
	function __construct($id_pareja,$id_grupo)
	{
		$this->id_pareja = $id_pareja;
		$this->id_grupo = $id_grupo;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}




	function ADD(){

		if (($this->id_grupo <> '') && ($this->id_pareja <> '')){ 

        $sql = "SELECT * FROM COUPLE_GRUPO WHERE (id_grupo = '$this->id_grupo') AND (id_pareja = '$this->id_pareja')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COUPLE_GRUPO (
					id_grupo,
					id_pareja
					) 
						VALUES (
						'$this->id_grupo',
						'$this->id_pareja'
						
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
    else{ 
    	
        return 'Introduzca un valor'; 
	
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
		    $sql = "SELECT * FROM COUPLE_GRUPO  WHERE (id_grupo = '$this->id_grupo') AND (id_pareja = '$this->id_pareja') ";

		    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}













}


?>