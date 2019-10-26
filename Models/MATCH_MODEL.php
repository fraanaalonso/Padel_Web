

<?php
include_once '../includes/db.php';



/**
* 
*/
class MATCH_MODEL
{
	var $id_partido;
	var $id_pista;
	var $hora_inicio;
	var $hora_fin;
	var $fecha;
	var $bd;
	
	function __construct($id_partido, $id_pista, $hora_inicio, $hora_fin, $fecha)
	{
		$this->id_partido = $id_partido;
		$this->fecha = $fecha;
		$this->hora_inicio = $hora_inicio;
		$this->hora_fin = $hora_fin;
		$this->id_pista = $id_pista;

		$this->bd = ConectarDB();
	}


	function inscribirPromocion($x){
		include_once '../Models/USER_MODEL.php';

			if (($this->id_partido <> '')){ 

        $sql = "SELECT game.id_partido, user.login FROM game,user WHERE (game.id_partido = '$this->id_partido' AND user.login = '$this->login')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO user_game (
					
					game.id_partido,
					user.login
					) 
						VALUES (
						
						'$this->id_partido',
						'$this->".$x."'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Se ha inscrito a la promoción'; 
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




	function añadirPromocion(){

		if (($this->id_partido <> '')){ 

        $sql = "SELECT * FROM game WHERE (id_partido = '$this->id_partido')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO game (
					
					id_pista,
					hora_inicio,
					hora_fin,
					fecha
					) 
						VALUES (
						
						'$this->id_pista',
						'$this->hora_inicio',
						'$this->hora_fin',
						'$this->fecha'
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

	$sql = "SELECT * FROM game  WHERE (id_partido = '$this->id_partido') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE game  SET 
				id_partido = '$this->id_partido',
				id_pista = '$this->id_pista',
				hora_inicio = '$this->hora_inicio',
				hora_fin = '$this->hora_fin',
				fecha = '$this->fecha
				
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
					*
					
					FROM game";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM game  WHERE 
		   (id_partido = '$this->id_partido')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM game  WHERE 
		       (id_partido = '$this->id_partido')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM game  WHERE (id_partido = '$this->id_partido')";

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