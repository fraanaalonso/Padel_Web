

<?php
include_once '../includes/db.php';



/**
* 
*/
class ACADEMY_MODEL
{
	var $nif;
	var $ubicacion;
	var $num_pistas;
	var $calle;
	var $bd;
	
	function __construct($nif,$ubicacion, $num_pistas, $calle)
	{
		$this->nif = $nif;
		$this->ubicacion = $ubicacion;
		$this->num_pistas = $num_pistas;
		$this->calle = $calle;

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->nif <> '')){ 

        $sql = "SELECT * FROM ACADEMY WHERE (nif = '$this->nif')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO ACADEMY (
					nif,
					ubicacion,
					num_pistas,
					calle
					) 
						VALUES (
						'$this->nif',
						'$this->ubicacion',
						'$this->num_pistas',
						'$this->calle'
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

	$sql = "SELECT * FROM ACADEMY  WHERE (nif = '$this->nif') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE ACADEMY  SET 
				nif = '$this->nif',
				ubicacion = '$this->ubicacion',
				num_pistas = '$this->num_pistas',
				calle = '$this->calle'
				
				WHERE ( nif = '$this->nif')";

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
					nif,
					ubicacion,
					num_pistas,
					calle
					
					FROM ACADEMY WHERE

					
						((nif LIKE '$this->nif') &&
						(ubicacion LIKE'$this->ubicacion') &&
						(num_pistas LIKE'$this->num_pistas')  &&
						(calle LIKE '$this->calle'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM ACADEMY  WHERE 
		   (nif = '$this->nif')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM ACADEMY  WHERE 
		       (nif = '$this->nif')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM ACADEMY  WHERE (nif = '$this->nif')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>