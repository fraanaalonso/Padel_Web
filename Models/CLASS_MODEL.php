
<?php


class CLASS_MODEL
{
	var $id_clase;
	var $ubicacion;
	var $num_pista;
	var $login;
	var $nivel;
	var $bd;
	
	function __construct($id_clase,$ubicacion, $num_pista, $login, $nivel)
	{
		$this->id_clase = $id_clase;
		$this->ubicacion = $ubicacion;
		$this->num_pista = $num_pista;
		$this->login = $login;
		$this->nivel = $nivel;

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_clase <> '')){ 

        $sql = "SELECT * FROM CLASS WHERE (id_clase = '$this->id_clase')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CLASS (
					id_clase,
					ubicacion,
					num_pista,
					login,
					nivel
					) 
						VALUES (
						'$this->id_noticia',
						'$this->titulo',
						'$this->subtitulo',
						'$this->cuerpo',
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




}



function EDIT(){

	$sql = "SELECT * FROM CLASS  WHERE (id_clase = '$this->id_clase') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE CLASS  SET 
				id_clase = '$this->id_clase',
				ubicacion = '$this->ubicacion',
				num_pista = '$this->num_pista',
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



function SEARCH(){

	$sql = "select
					id_clase,
					ubicacion,
					num_pista,
					login,
					nivel
					
					FROM CLASS WHERE

					
						((id_clase LIKE '$this->id_clase') &&
						(ubicacion LIKE'$this->ubicacion') &&
						(num_pista LIKE'$this->num_pista')  &&
						(login LIKE '$this->login') &&  (nivel LIKE '$this->nivel'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM CLASS  WHERE 
		   (id_clase = '$this->id_clase')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM CLASS  WHERE 
		       (id_clase = '$this->id_clase')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM CLASS  WHERE (id_clase = '$this->id_clase')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>

?>