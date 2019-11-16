

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







function getRanking($id_campeonato, $categoria, $nivel){

	$sql = "SELECT PA.id_pareja as pareja  FROM couple_categoria PC, championship_categoria CC, categoria CA, nivel NA, couple PA, couple_nivel N WHERE CC.id_campeonato = '".$id_campeonato."' AND CC.id_categoria = PC.id_categoria AND PC.id_campeonato = '".$id_campeonato."' AND N.id_campeonato='".$id_campeonato."' AND PC.id_categoria = CA.id_categoria and NA.id_nivel=N.id_nivel AND PC.id_pareja = PA.id_pareja and N.id_pareja=PA.id_pareja AND NA.nivel='".$nivel."' and CA.categoria= '".$categoria."' ORDER BY PA.id_pareja";


	  if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}




}




?>