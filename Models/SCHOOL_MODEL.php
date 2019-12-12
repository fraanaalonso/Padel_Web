

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
	var $capacidad;
	var $num_clases;
	var $bd;
	
	function __construct($codigo, $nombre, $ubicacion, $login, $capacidad, $num_clases)
	{
		$this->codigo = $codigo;
		$this->login = $login;
		$this->ubicacion = $ubicacion;
		$this->nombre = $nombre;
		$this->capacidad = $capacidad;
		$this->num_clases = $num_clases;
		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}

		



function ADD(){



        $sql = "SELECT * FROM SCHOOL WHERE (codigo = '$this->codigo')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO SCHOOL (
					nombre,
					ubicacion,
					administrador,
					capacidad,
					num_clases
					) 
						VALUES (
						'$this->nombre',
						'$this->ubicacion',
						'$this->login', 
						'$this->capacidad',
						'$this->num_clases'
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










function EDIT(){

	$sql = "SELECT * FROM SCHOOL  WHERE (codigo = '$this->codigo') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE SCHOOL  SET 
				codigo = '$this->codigo',
				nombre = '$this->nombre',
				ubicacion = '$this->ubicacion',
				administrador = '$this->login',
				capacidad = '$this->capacidad',
				num_clases = '$this->num_clases'
				
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