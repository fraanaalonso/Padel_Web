
<?php



/**
* 
*/
class COUPLE_NIVEL_MODEL
{
	var $id_nivel;
	var $id_pareja;
	var $id_campeonato;
	var $bd;
	
	function __construct($id_nivel, $id_pareja,$id_campeonato)
	{
		$this->id_nivel = $id_nivel;
		$this->id_pareja = $id_pareja;
		$this->id_campeonato = $id_campeonato;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}




	function ADD(){

		if (($this->id_pareja <> '') && ($this->id_nivel <> '') && ($this->id_campeonato <> '')){ 

        $sql = "SELECT * FROM COUPLE_NIVEL WHERE (id_nivel = '$this->id_nivel') AND (id_pareja = '$this->id_pareja') AND (id_campeonato = '$this->id_campeonato')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COUPLE_NIVEL (
					id_nivel,
					id_pareja,
					id_campeonato
					) 
						VALUES (
						'$this->id_nivel',
						'$this->id_pareja',
						'$this->id_campeonato'
						
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
					
					FROM COUPLE_NIVEL";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function RellenaDatos()
		{	
		    $sql = "SELECT * FROM COUPLE_NIVEL  WHERE (id_campeonato = '$this->id_nivel') AND (id_campeonato = '$this->id_pareja') AND (id_campeonato = '$this->id_campeonato')";

		    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}












}


?>