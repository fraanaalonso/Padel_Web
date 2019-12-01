

<?php
include_once '../includes/db.php';



/**
* 
*/
class RANKING_MODEL
{
	var $id_pareja;
	var $p_jugados;
	var $p_ganados;
	var $puntos;
	var $bd;
	
	function __construct($id_pareja,$p_jugados, $p_ganados, $puntos)
	{
		$this->id_pareja = $id_pareja;
		$this->p_jugados = $p_jugados;
		$this->p_ganados = $p_ganados;
		$this->puntos = $puntos;

		$this->bd = ConectarDB();
	}




	function anhadirRanking($pareja){


     	

				$sql = "INSERT INTO RANKING (
					id_pareja,
					p_jugados,
					p_ganados,
					puntos
					) 
						VALUES (
						'".$pareja."',
						'0',
						'0',
						'0'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}
				
		
   

	}








function EDIT(){

	$sql = "SELECT * FROM RANKING  WHERE (id_pareja = '$this->id_pareja') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE RANKING  SET 
				id_pareja = '$this->id_pareja',
				p_jugados = '$this->p_jugados',
				p_ganados = '$this->p_ganados',
				puntos = '$this->puntos'
				
				WHERE ( id_pareja = '$this->id_pareja')";

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







function getRanking($id_campeonato, $grupo){

	$sql = "SELECT couple_grupo.id_pareja as pareja FROM couple_grupo INNER JOIN GRUPO ON couple_grupo.id_grupo=grupo.id_grupo AND grupo.id_campeonato='".$id_campeonato."' AND grupo.id_grupo='".$grupo."'";


	  if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}







function modificarResultado($id_pareja, $id_pareja2){


		
    	
		$sql = "UPDATE RANKING SET puntos = puntos + 3 WHERE id_pareja='".$id_pareja."'";
		$sql1 = "UPDATE RANKING SET p_ganados = p_ganados + 1 WHERE id_pareja='".$id_pareja."'";
		$sql2 = "UPDATE RANKING SET p_jugados = p_jugados + 1 WHERE id_pareja='".$id_pareja."'";
		$sql3 = "UPDATE RANKING SET p_jugados = p_jugados + 1 WHERE id_pareja='".$id_pareja2."'";

		$this->bd->query($sql1);
		$this->bd->query($sql2);
		$this->bd->query($sql3);


        if (!($resultado = $this->bd->query($sql))){
			return 'Error en la modificación'; 
		}
		else{


			return 'Modificado correctamente';
		}
    


}


function establecerEmpate($id_pareja1, $id_pareja2){


	$sql1 = "UPDATE RANKING SET puntos = puntos + 1 WHERE id_pareja='".$id_pareja1."'";
	$sql2 = "UPDATE RANKING SET puntos = puntos + 1 WHERE id_pareja='".$id_pareja2."'";
	$sql3 = "UPDATE RANKING SET p_jugados = p_jugados + 1 WHERE id_pareja='".$id_pareja."'";
	$sql4 = "UPDATE RANKING SET p_jugados = p_jugados + 1 WHERE id_pareja='".$id_pareja2."'";


	$this->bd->query($sql3);
	$this->bd->query($sql4);
    $resultado = $this->bd->query($sql1);
    $result = $this->bd->query($sql2);
		


}



function RellenaDatos(){

	 $sql = "SELECT * FROM RANKING  WHERE (id_pareja = '$this->id_pareja')";

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