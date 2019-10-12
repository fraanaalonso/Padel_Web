

<?php
include_once '../includes/db.php';



/**
* 
*/
class RANKING_MODEL
{
	var $login;
	var $puntos;
	var $partidos_ganados;
	var $partidos_perdidos;
	var $partidos_jugados;
	var $partidos_empatados;
	var $bd;
	
	function __construct($login,$puntos, $partidos_ganados, $partidos_perdidos, $partidos_jugados, $partidos_empatados)
	{
		$this->login = $login;
		$this->puntos = $puntos;
		$this->partidos_ganados = $partidos_ganados;
		$this->partidos_perdidos = $partidos_perdidos;

		$this->partidos_jugados = $partidos_jugados;

		$this->partidos_empatados = $partidos_empatados;		
		

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->login <> '')){ 

        $sql = "SELECT * FROM RANKING WHERE (login = '$this->login')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO RANKING (
					login,
					puntos,
					partidos_ganados,
					partidos_jugados,
					partidos_perdidos
					) 
						VALUES (
						'$this->login',
						'$this->puntos',
						'$this->partidos_ganados',
						'$this->partidos_perdidos',
						'$this->partidos_jugados',
						'$this->partidos_empatados'

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

	$sql = "SELECT * FROM RANKING  WHERE (login = '$this->login') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE RANKING  SET 
				login = '$this->login',
				puntos = '$this->puntos',
				partidos_ganados = '$this->partidos_ganados',
				partidos_perdidos = '$this->partidos_perdidos',
				partidos_jugados = '$this->partidos_jugados',
				partidos_empatados = '$this->partidos_empatados'
				
				WHERE ( login = '$this->login')";

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
					login,
					puntos,
					partidos_ganados,
					partidos_perdidos,
					partidos_jugados,
					partidos_empatados
					
					FROM RANKING WHERE

					
						((login LIKE '$this->login') &&
						(puntos LIKE'$this->puntos') &&
						(partidos_ganados LIKE'$this->partidos_ganados')  &&
						(partidos_perdidos LIKE '$this->partidos_perdidos') && (partidos_jugados LIKE '$this->partidos_jugados') && (partidos_empatados LIKE '$this->partidos_empatados'))";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM RANKING  WHERE 
		   (login = '$this->login')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM RANKING  WHERE 
		       (login = '$this->login')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM RANKING  WHERE (login = '$this->login')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




?>