

<?php



/**
* 
*/
class COUPLE_CHAMPIONSHIP_MODEL
{
	var $id_pareja;
	var $id_campeonato;
	var $bd;
	
	function __construct($id_pareja,$id_campeonato)
	{
		$this->id_pareja = $id_pareja;
		$this->id_campeonato = $id_campeonato;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}




	function ADD(){

		if (($this->id_pareja <> '')){ 

        $sql = "SELECT * FROM CHAMPIONSHIP_COUPLE WHERE (id_pareja = '$this->id_pareja') AND (id_campeonato = '$this->id_campeonato')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CHAMPIONSHIP_COUPLE (
					id_pareja,
					id_campeonato,
					) 
						VALUES (
						'$this->id_pareja',
						'$this->id_campeonato'
						
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Pareja registrada con éxito'; 
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
					
					FROM COUPLE";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function RellenaDatos()
		{	
		    $sql = "SELECT * FROM COUPLE  WHERE (id_pareja = '$this->id_pareja')";

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