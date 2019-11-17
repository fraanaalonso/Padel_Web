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
	var $bd;
	
	function __construct($id_campeonato,$fecha_inicio, $fecha_limite, $id_normativa)
	{
		$this->id_campeonato = $id_campeonato;
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_limite = $fecha_limite;
		$this->id_normativa = $id_normativa;


		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}



	function añadirCategoria($id_campeonato, $id_categoria){
		$sql = "INSERT INTO CHAMPIONSHIP_CATEGORIA (
					id_campeonato,
					id_categoria
					) 
						VALUES (
						'".$id_campeonato."',
						'".$id_categoria."'
						)";

		if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}


	}


	function añadirNiveles($id_campeonato, $id_nivel){
		$sql = "INSERT INTO CHAMPIONSHIP_NIVEL (
					id_campeonato,
					id_nivel
					) 
						VALUES (
						'".$id_campeonato."',
						'".$id_nivel."'
						)";

		if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}
	}


	function generarGruposInscripcion($id_categoria, $id_nivel, $id_campeonato){

		$sql = "INSERT INTO grupo (
					id_grupo,
					id_categoria,
					id_nivel,
					id_campeonato
					) 
						VALUES (
						DEFAULT,
						'".$id_categoria."',
						'".$id_nivel."',
						'".$id_campeonato."'
						)";

		if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}
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
					id_normativa
					) 
						VALUES (
						'$this->fecha_inicio',
						'$this->fecha_limite',
						'$this->id_normativa'
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
				id_normativa = '$this->id_normativa'
				
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
				$delinha['id_normativa'],];
	}
	}



function combinarParejas($id_campeonato, $nivel, $categoria){


	$sql = "SELECT PA.id_pareja, PA.login1, PA.login2, n.id_campeonato, CA.categoria, NA.nivel FROM couple_categoria PC, championship_categoria CC, categoria CA, nivel NA, couple PA, couple_nivel N WHERE CC.id_campeonato = '".$id_campeonato."' AND CC.id_categoria = PC.id_categoria AND PC.id_campeonato = '".$id_campeonato."' AND N.id_campeonato='".$id_campeonato."' AND PC.id_categoria = CA.id_categoria and NA.id_nivel=N.id_nivel AND PC.id_pareja = PA.id_pareja and N.id_pareja=PA.id_pareja AND NA.nivel='".$nivel."' and CA.categoria= '".$categoria."' ORDER BY PA.id_pareja";

	$sqlFecha = "SELECT fecha_inicio FROM CHAMPIONSHIP WHERE id_campeonato = '".$id_campeonato."'";
	$resulFecha = $this->bd->query($sqlFecha);
	$fetch_fecha = $resulFecha->fetch_row();
	$fechaComienzo = $fetch_fecha[0];

		$resultado = $this->bd->query($sql);
		$fila = $resultado->fetch_row();
		
		$gruposSeleccionado;
		$i = 0;

		while($fila = $resultado->fetch_row()){
			$gruposSeleccionado[$i] = $fila[0];
			$i++;
		}

		$longitud = count($gruposSeleccionado);
		$fechas = $fechaComienzo;
		$horas = array('09:00', '10:30', '12:00', '13:30', '17:00', '18:30', '20:00', '21:30');
		
		for($i = 0; $i < ($longitud - 1); $i++){
			for($j = ($i + 1); $j < $longitud; $j++){

				$fechas = date("Y-m-d",strtotime($fechas)+86400);
				$horaSeleccionada =  $horas[array_rand($horas)];
				$id_pareja1 = $gruposSeleccionado[$i];
				$id_pareja2 = $gruposSeleccionado[$j];

				$consulta = "INSERT INTO CLASH (
					id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha,
					categoria,
					nivel
					) 
						VALUES (DEFAULT, '".$id_campeonato."', '".$id_pareja1."', '".$id_pareja2."', '0', '0', '".$horaSeleccionada."', '".$fechas."', '".$categoria."', '".$nivel."')";

				$this->bd->query($consulta);

			}
		}

		 if (!($resultado = $this->bd->query($consulta))){
			return 'Error en la inserción'; 
		}
		else{ 

			return 'Enfrentamientos correctamente creados';
		}
}











function obtenerUltimoCampeonato(){
	$sql = "SELECT id_campeonato FROM CHAMPIONSHIP ORDER BY id_campeonato DESC LIMIT 1";
	if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
}
	



function obtenerParejas($id_campeonato){

	$sql = "SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."'";

	if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




function getDataChampionship($id_campeonato){
	$sql = "SELECT * FROM CHAMPIONSHIP WHERE id_campeonato = '".$id_campeonato."'";
		$resultado = $this->bd->query($sql);
		if($resultado->num_rows > 0) return $resultado->fetch_array();
		else return false;
}



function testNumMaxMembers($id_campeonato, $nivel, $categoria){
	$sql = "SELECT categoria.categoria, nivel.nivel, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2 FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_nivel ON couple_nivel.id_pareja=couple_categoria.id_pareja INNER JOIN categoria on categoria.id_categoria=couple_categoria.id_categoria INNER JOIN nivel on nivel.id_nivel=couple_nivel.id_nivel and couple_categoria.id_campeonato='".$id_campeonato."' and categoria.id_categoria='".$categoria."' AND nivel.id_nivel='".$nivel."'";


	 $result = $this->bd->query($sql);

	 if($result->num_rows == 12){
	 	return true;
	 }

	 else{
	 	return false;
	 }
}








}

?>