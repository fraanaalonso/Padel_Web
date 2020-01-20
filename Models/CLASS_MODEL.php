
<?php


class CLASS_MODEL
{
	var $id_clase;
	var $descripcion;
	var $login;
	var $nivel;
	var $bd;
	
	function __construct($id_clase, $descripcion, $login, $nivel)
	{
		$this->id_clase = $id_clase;
		$this->descripcion = $descripcion;
		$this->login = $login;
		$this->nivel = $nivel;

		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}


	



	function inscribirClase($usuario, $clase){

		if (($clase <> '') && ($usuario <> '')){ 

        $sql = "SELECT * FROM USER_CLASS WHERE (id_clase = '".$clase."') && (login = '".$usuario."')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO USER_CLASS (
					id_clase,
					login
					) 
						VALUES (
						'".$clase."',
						'".$usuario."'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return "Inscripción en clase '".$clase."' realizada" ; 
				}
				
			}
			else 
				return 'Ya está inscrito en esta clase'; 
		}
    }
    else{ 
    	
        return 'Introduzca un valor'; 
	
	}

	}




	function ADD(){

		if (($this->id_clase <> '')){ 

        $sql = "SELECT * FROM CLASE WHERE (id_clase = '$this->id_clase')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CLASE (
					id_clase,
					descripcion,
					login,
					nivel
					) 
						VALUES (
						'$this->id_clase',
						'$this->descripcion',
						'$this->login',
						'$this->nivel'
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








	function SEARCH()
{ 	
    $sql = "select * from CLASE ";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


} // fin metodo SEARCH


function EDIT(){

	$sql = "SELECT * FROM CLASE  WHERE (id_clase = '$this->id_clase') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE CLASE  SET 
				id_clase = '$this->id_clase',
				descripcion = '$this->descripcion',
				login = '$this->login',
				nivel = '$this->nivel'
				
				WHERE ( id_clase = '$this->id_clase')";

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





function DELETE()
		{	
		   $sql = "SELECT * FROM CLASE  WHERE 
		   (id_clase = '$this->id_clase')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM CLASE  WHERE 
		       (id_clase = '$this->id_clase')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM CLASE  WHERE (id_clase = '$this->id_clase')";

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