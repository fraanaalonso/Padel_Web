

<?php


class COURT_MODEL
{
	var $id_pista;
	var $ubicacion;
	var $num_pista;
	var $terreno;
	var $dimension;
	var $bd;
	
	function __construct($id_pista,$ubicacion, $num_pista, $terreno, $dimension)
	{
		$this->id_pista = $id_pista;
		$this->ubicacion = $ubicacion;
		$this->num_pista = $num_pista;
		$this->terreno = $terreno;
		$this->dimension = $dimension;

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_pista <> '')){ 

        $sql = "SELECT * FROM COURT WHERE (id_pista = '$this->id_pista')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COURT (
					id_pista,
					ubicacion,
					num_pista,
					terreno,
					dimension
					) 
						VALUES (
						'$this->id_noticia',
						'$this->titulo',
						'$this->subtitulo',
						'$this->cuerpo',
						'$this->dimension'
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

	$sql = "SELECT * FROM COURT  WHERE (id_pista = '$this->id_pista') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE COURT  SET 
				id_pista = '$this->id_pista',
				ubicacion = '$this->ubicacion',
				num_pista = '$this->num_pista',
				terreno = '$this->terreno',
				dimension = '$this->dimension'
				
				WHERE ( id_pista = '$this->id_pista')";

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
					id_pista,
					ubicacion,
					num_pista,
					terreno,
					dimension
					
					FROM COURT WHERE

					
						((id_pista LIKE '$this->id_pista') &&
						(ubicacion LIKE'$this->ubicacion') &&
						(num_pista LIKE'$this->num_pista')  &&
						(terreno LIKE '$this->terreno') &&  (dimension LIKE '$this->dimension'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM COURT  WHERE 
		   (id_pista = '$this->id_pista')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM COURT  WHERE 
		       (id_pista = '$this->id_pista')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM COURT  WHERE (id_pista = '$this->id_pista')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>
