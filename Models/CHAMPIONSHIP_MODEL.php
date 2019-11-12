<?php







/**
* 
*/
class CHAMPIONSHIP_MODEL
{
	var $id_campeonato;
	var $fecha_inicio;
	var $fecha_limite;
	var $id_normativa;
	var $id_grupo;
	var $id_categoria;
	var $bd;
	
	function __construct($id_campeonato,$fecha_inicio, $fecha_limite, $id_normativa, $id_grupo, $id_categoria)
	{
		$this->id_campeonato = $id_campeonato;
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_limite = $fecha_limite;
		$this->id_normativa = $id_normativa;
		$this->id_grupo = $id_grupo;
		$this->id_categoria = $id_categoria;


		include_once '../includes/db.php';
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
					fecha_inicio,
					fecha_limite,
					id_normativa,
					id_grupo,
					id_categoria
					) 
						VALUES (
						'$this->fecha_inicio',
						'$this->fecha_limite',
						'$this->id_normativa',
						'$this->id_grupo',
						'$this->id_categoria'
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

	$sql = "SELECT * FROM CHAMPIONSHIP  WHERE (id_campeonato = '$this->id_campeonato') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE CHAMPIONSHIP  SET 
				id_campeonato = '$this->id_campeonato',
				fecha_inicio = '$this->fecha_inicio',
				fecha_limite = '$this->fecha_limite',
				id_normativa = '$this->id_normativa',
				id_grupo = '$this->id_grupo',
				id_categoria = '$this->id_categoria'
				
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
					*
					
					FROM CHAMPIONSHIP";

   
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



function getDBDatosCampeonato($id_campeonato){

		

		$sql = "SELECT * FROM CHAMPIONSHIP WHERE id_campeonato = '".$id_campeonato."'";

	if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}

	else{
		$sominho = $this->bd->query($sql);
		$delinha = mysqli_fetch_assoc($sominho);

		return [$delinha['id_campeonato'],
				$delinha['fecha_inicio'],
				$delinha['fecha_limite'],
				$delinha['id_normativa'],
				$delinha['id_grupo'],
				$delinha['id_categoria'],];
	}
	}



	



function obtenerParejas($id_campeonato){

	$sql = "SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."'";

	if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}


}

	


}

?>