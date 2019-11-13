<?php





/**
* 
*/
class COUPLE_MODEL
{
	var $id_pareja;
	var $login1;
	var $login2;
	var $bd;
	
	function __construct($id_pareja, $login1, $login2)
	{
		$this->id_pareja = $id_pareja;
		$this->login1 = $login1;
		$this->login2 = $login2;


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}




	function REGISTRARPAREJA(){

		if (($this->id_pareja <> '')){ 

        $sql = "SELECT * FROM COUPLE WHERE (id_pareja = '$this->id_pareja')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COUPLE (

					login1,
					login2
					) 
						VALUES (
						
						'$this->login1',
						'$this->login2'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Pareja registrada con éxito'; 
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


	


	function SEARCH(){

	$sql = "select
					*
					
					FROM COUPLE";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}

function SEARCHCURRENTCOUPLES($id_campeonato){


	 $sql = "SELECT t.* FROM ( SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."' ) t";


	  if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}



function SEARCHMYCHAMPIONSHIPS(){


	 $sql = "SELECT couple_categoria.id_categoria, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2, couple_grupo.id_grupo FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_grupo ON couple_grupo.id_pareja=couple_categoria.id_pareja AND couple_categoria.id_campeonato='1' AND (couple.login1='".$_SESSION['login']."' || couple.login2='".$_SESSION['login']."')";




	  if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}



function RellenaDatos($id_campeonato)
		{	
			/*
		    $sql = "SELECT t.* FROM ( SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."' AND B.id_pareja = '$this->id_pareja' ) t";
	*/
	$sql = "SELECT couple_categoria.id_categoria, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2, couple_grupo.id_grupo FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_grupo ON couple_grupo.id_pareja=couple_categoria.id_pareja AND couple_categoria.id_campeonato='".$id_campeonato."'";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}



function obtenerUltimoInscrito(){
	$sql = "SELECT id_pareja FROM COUPLE ORDER BY id_pareja DESC LIMIT 1";
	if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
}




function joinCouples($id_campeonato){
	/*$sql= "SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."'";*/

	$sql = "SELECT couple_categoria.id_categoria, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2, couple_grupo.id_grupo FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_grupo ON couple_grupo.id_pareja=couple_categoria.id_pareja AND couple_categoria.id_campeonato='".$id_campeonato."'";


	  if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}







function DELETE()
		{	
		   $sql = "SELECT * FROM COUPLE  WHERE 
		   (id_pareja = '$this->id_pareja')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM COUPLE  WHERE 
		       (id_pareja = '$this->id_pareja')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 




}


?>