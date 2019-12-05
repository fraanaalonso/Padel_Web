

<?php
include_once '../includes/db.php';



/**
* 
*/
class SCHOOL_MODEL
{
	var $codigo;
	var $nombre;
	var $ubicacion;
	var $login;
	var $bd;
	
	function __construct($codigo, $nombre, $ubicacion, $login)
	{
		$this->codigo = $codigo;
		$this->login = $login;
		$this->ubicacion = $ubicacion;
		$this->nombre = $nombre;

		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}

		



function ADD(){

		if (($this->codigo <> '')){ 

        $sql = "SELECT * FROM SCHOOL WHERE (codigo = '$this->codigo')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO SCHOOL (
					codigo,
					nombre,
					ubicacion,
					administrador
					) 
						VALUES (
						'$this->codigo',
						'$this->nombre',
						'$this->ubicacion',
						'$this->login'
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

	$sql = "SELECT * FROM SCHOOL  WHERE (codigo = '$this->codigo') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE SCHOOL  SET 
				codigo = '$this->codigo',
				nombre = '$this->nombre',
				ubicacion = '$this->ubicacion',
				administrador = '$this->login
				
				WHERE ( codigo = '$this->codigo')";

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
					*
					
					FROM SCHOOL";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM SCHOOL  WHERE 
		   (codigo = '$this->codigo')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM SCHOOL  WHERE 
		       (codigo = '$this->codigo')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM SCHOOL  WHERE (codigo = '$this->codigo')";

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