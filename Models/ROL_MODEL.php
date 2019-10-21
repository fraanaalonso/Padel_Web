<?php



class ROL_MODEL
{
	var $id_rol;
	var $rol;

	
	
	function __construct($id_rol,$rol)
	{
		$this->id_rol = $id_rol;
		$this->rol = $rol;
	


		include_once '../includes/db.php';

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_rol <> '')){ 

        $sql = "SELECT * FROM ROL WHERE (id_rol = '$this->id_rol')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO ROL (
					id_rol,
					rol,
		
					) 
						VALUES (
						'$this->id_rol',
						'$this->rol'
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








function EDIT(){

	$sql = "SELECT * FROM ROL  WHERE (id_rol = '$this->id_rol') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE ROL  SET 
				id_rol = '$this->id_rol',
				rol = '$this->rol'
				
				WHERE ( id_rol = '$this->id_rol')";

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
					id_rol,
					rol
		
					
					FROM ROL";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM ROL  WHERE 
		   (id_rol = '$this->id_rol')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM ROL  WHERE 
		       (id_rol = '$this->id_rol')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM ROL  WHERE (id_rol = '$this->id_rol')";

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