<?php

include_once '../includes/db.php';





/**
* 
*/
class CHAMPIONSHIP_MODEL
{
	var $id_campeonato;
	var $plazo;
	var $categoria;
	var $genero;
	var $duracion;
	var $bd;
	
	function __construct($id_campeonato,$plazo, $categoria, $genero, $duracion)
	{
		$this->id_campeonato = $id_campeonato;
		$this->plazo = $plazo;
		$this->categoria = $categoria;
		$this->genero = $genero;
		$this->duracion = $duracion;

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_campeonato <> '')){ 

        $sql = "SELECT * FROM CHAMPIONSHIP WHERE (id_campeonato = '$this->id_campeonato')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CHAMPIONSHIP (
					id_campeonato,
					plazo,
					categoria,
					genero,
					duracion
					) 
						VALUES (
						'$this->id_noticia',
						'$this->titulo',
						'$this->subtitulo',
						'$this->cuerpo',
						'$this->duracion'
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

	$sql = "SELECT * FROM CHAMPIONSHIP  WHERE (id_campeonato = '$this->id_campeonato') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE CHAMPIONSHIP  SET 
				id_campeonato = '$this->id_campeonato',
				plazo = '$this->plazo',
				categoria = '$this->categoria',
				genero = '$this->genero',
				duracion = '$this->duracion'
				
				WHERE ( id_campeonato = '$this->id_campeonato')";

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
					id_campeonato,
					plazo,
					categoria,
					genero,
					duracion
					
					FROM CHAMPIONSHIP WHERE

					
						((id_campeonato LIKE '$this->id_campeonato') &&
						(plazo LIKE'$this->plazo') &&
						(categoria LIKE'$this->categoria')  &&
						(genero LIKE '$this->genero') &&  (duracion LIKE '$this->duracion'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM CHAMPIONSHIP  WHERE 
		   (id_campeonato = '$this->id_campeonato')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM CHAMPIONSHIP  WHERE 
		       (id_campeonato = '$this->id_campeonato')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM CHAMPIONSHIP  WHERE (id_campeonato = '$this->id_campeonato')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>