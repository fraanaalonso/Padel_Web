

<?php
include_once '../includes/db.php';



/**
* 
*/
class MATCH_MODEL
{
	var $id_partido;
	var $fecha;
	var $hora;
	var $id_pista;
	var $bd;
	
	function __construct($id_partido,$fecha, $hora, $id_pista)
	{
		$this->id_partido = $id_partido;
		$this->fecha = $fecha;
		$this->hora = $hora;
		$this->id_pista = $id_pista;

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_partido <> '')){ 

        $sql = "SELECT * FROM MATCH WHERE (id_partido = '$this->id_partido')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO MATCH (
					
					fecha,
					hora,
					id_pista
					) 
						VALUES (
						
						'$this->fecha',
						'$this->hora',
						'$this->id_pista'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
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




}



function EDIT(){

	$sql = "SELECT * FROM MATCH  WHERE (id_partido = '$this->id_partido') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE MATCH  SET 
				id_partido = '$this->id_partido',
				fecha = '$this->fecha',
				hora = '$this->hora',
				id_pista = '$this->id_pista'
				
				WHERE ( id_partido = '$this->id_partido')";

        if (!($resultado = $this->bd->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ 

			return 'Modificado correctamente';
		}
    }

    else{ 
    	
    	return 'No existe en la base de datos';
    }

}



function SEARCH(){

	$sql = "select
					id_partido,
					fecha,
					hora,
					id_pista
					
					FROM MATCH WHERE

					
						((id_partido LIKE '$this->id_partido') &&
						(fecha LIKE'$this->fecha') &&
						(hora LIKE'$this->hora')  &&
						(id_pista LIKE '$this->id_pista'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM MATCH  WHERE 
		   (id_partido = '$this->id_partido')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM MATCH  WHERE 
		       (id_partido = '$this->id_partido')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM MATCH  WHERE (id_partido = '$this->id_partido')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>