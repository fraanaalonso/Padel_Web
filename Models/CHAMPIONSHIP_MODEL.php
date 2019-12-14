<?php

require_once '../Functions/funciones.php';

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

			function getChampionships(){
		$sql = "SELECT COUNT(*) FROM CHAMPIONSHIP";
	$resultado =$this->bd->query($sql);
	$result = $resultado->fetch_array();
	return $result;
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

/*
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

*/


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
					precio
					) 
						VALUES (
						'$this->fecha_inicio',
						'$this->fecha_limite',
						'$this->id_normativa',
						'34.99'
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


if(esSocio($_SESSION['login'])){

	$sql = "select
					id_campeonato, fecha_inicio,fecha_limite,id_normativa, ROUND(precio/1.25) as precio
					
					FROM CHAMPIONSHIP";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}

}

else{




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


		if(esSocio($_SESSION['login'])){

			$sql = "SELECT id_campeonato, fecha_inicio,fecha_limite,id_normativa, ROUND(precio/1.25) FROM CHAMPIONSHIP  WHERE (id_campeonato = '$this->id_campeonato')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}


		}	

		else{
		    $sql = "SELECT * FROM CHAMPIONSHIP  WHERE (id_campeonato = '$this->id_campeonato')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
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


function obtenerGrupis($id_campeonato){
	$sql = "SELECT nivel.nivel, categoria.categoria FROM championship_nivel INNER JOIN NIVEL ON championship_nivel.id_nivel=nivel.id_nivel INNER join championship_categoria on championship_nivel.id_campeonato=championship_categoria.id_campeonato INNER join categoria on championship_categoria.id_categoria=categoria.id_categoria AND championship_nivel.id_campeonato='".$id_campeonato."'";

	 $resultado = $this->bd->query($sql);
	 return $resultado;
}



function combinarParejas($id_campeonato, $grupo){


	$sql = "SELECT couple_grupo.id_pareja FROM couple_grupo INNER JOIN GRUPO ON couple_grupo.id_grupo=grupo.id_grupo AND grupo.id_campeonato='".$id_campeonato."' AND grupo.id_grupo='".$grupo."'";

	$sqlFecha = "SELECT fecha_inicio FROM CHAMPIONSHIP WHERE id_campeonato = '".$id_campeonato."'";
	$resulFecha = $this->bd->query($sqlFecha);
	$fetch_fecha = $resulFecha->fetch_row();
	$fechaComienzo = $fetch_fecha[0];

		$resultado = $this->bd->query($sql);
		//$fila = $resultado->fetch_row();
		
		$gruposSeleccionado;
		$i = 0;

		while($fila = $resultado->fetch_row()){
			$gruposSeleccionado[$i] = $fila[0];
			$i++;
		}


		$longitud = count($gruposSeleccionado);
		$fechas = $fechaComienzo;
		$horas = array('09:00', '10:30', '12:00', '13:30', '17:00', '18:30', '20:00', '21:30');
		$pistas = array('P0', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8');
		
		for($s = 0; $s < ($longitud - 1); $s++){
			for($j = ($s + 1); $j < $longitud; $j++){

				$fechas = date("Y-m-d",strtotime($fechas)+86400);
				$horaSeleccionada =  $horas[array_rand($horas)];
				$pista =  $pistas[array_rand($pistas)];
				$id_pareja1 = $gruposSeleccionado[$s];
				$id_pareja2 = $gruposSeleccionado[$j];

/*
				$seleccion = "SELECT * FROM CLASH WHERE fecha = '".$fecha."' and hora_inicio = '".$hora_inicio."' and id_pista='".$pista."'";
				$result = $this->bd->query($seleccion);
				$filas = $result->num_rows;

*/


				$consulta = "INSERT INTO CLASH (
					id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					resultado,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha,
					tipo,
					id_grupo,
					id_pista
					) 
						VALUES (DEFAULT, '".$id_campeonato."', '".$id_pareja1."', '".$id_pareja2."','0', '0', '0', '".$horaSeleccionada."', '".$fechas."','liga', '".$grupo."', '".$pista."')";

				$this->bd->query($consulta);

				
				

			}
		}

	
		$borrado = "DELETE FROM CLASH where id_campeonato='".$id_campeonato."' and id_grupo ='".$grupo."' and clash.id_pareja1='".$id_pareja1."' and clash.id_pareja2='".$id_pareja2."' and clash.tipo='liga' LIMIT 1 ";
		 $this->bd->query($borrado);


		 if (!($resultado = $this->bd->query($consulta))){
			return 'Error en la inserción'; 
		}
		else{ 

			return 'Enfrentamientos correctamente creados';
		}
}


function cuartosPlayoffs($id_campeonato, $grupo){
 


	$sql = "SELECT ranking.id_pareja as pareja, ranking.p_jugados as jugados, ranking.p_ganados as ganados, ranking.puntos as puntos, nivel.nivel as nivel, categoria.categoria as categoria FROM RANKING INNER JOIN couple_grupo ON couple_grupo.id_pareja=ranking.id_pareja INNER JOIN grupo ON couple_grupo.id_grupo=GRUPO.id_grupo INNER JOIN categoria ON GRUPO.id_categoria=categoria.id_categoria INNER JOIN NIVEL ON grupo.id_nivel=NIVEL.id_nivel and grupo.id_grupo='".$grupo."' and grupo.id_campeonato='".$id_campeonato."' ORDER BY puntos DESC LIMIT 0,8"; //obtenemos las 4 primeras tuplas de la clasificación 


	$sqlFecha = "SELECT clash.fecha from clash where clash.tipo = 'liga' and clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo='".$grupo."' ORDER BY fecha DESC LIMIT 1";
		$resulFecha = $this->bd->query($sqlFecha);
		$fetch_fecha = $resulFecha->fetch_row();
		$fechaComienzo = $fetch_fecha[0];

		$resultado = $this->bd->query($sql);

		$gruposSeleccionado = array();
		$k = 0;

		while($fila = $resultado->fetch_row()){
			$gruposSeleccionado[$k] = $fila[0];
			$k++;


		}	
		
		$fechas = $fechaComienzo;
		$horas = array('09:00', '10:30', '12:00', '13:30', '17:00', '18:30', '20:00', '21:30');
		$pistas = array('P0', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8');
		$array1 = array();
		$array2 = array();

		for($i = 0; $i <= (count($gruposSeleccionado)-1)/2; $i++){
			
		$array1[] = $gruposSeleccionado[$i];
			
		}

		for($j = count($gruposSeleccionado)-1; $j >=4; $j--){
	
		$array2[] = $gruposSeleccionado[$j];
	
	}

	$playoffs = array_combine($array1, $array2);
	
		
		foreach ($playoffs as $key => $value) {
			

				$fechas = date("Y-m-d",strtotime($fechas)+86400);
				$horaSeleccionada =  $horas[array_rand($horas)];
				$pista =  $pistas[array_rand($pistas)];
				$id_pareja1 = $key;
				$id_pareja2 = $value;

				$consulta = "INSERT INTO CLASH (
					id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					resultado,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha,
					tipo,
					id_grupo, 
					id_pista
					) 
					VALUES (DEFAULT, '".$id_campeonato."', '".$id_pareja1."', '".$id_pareja2."','0', '0', '0', '".$horaSeleccionada."', '".$fechas."','cuartos','".$grupo."', '".$pista."')";

				$this->bd->query($consulta);

			
		}
		$borrado = "DELETE FROM CLASH where id_campeonato='".$id_campeonato."' and id_grupo = '".$grupo."' and clash.id_pareja1='".$id_pareja1."' and clash.id_pareja2='".$id_pareja2."' and clash.tipo='cuartos' LIMIT 1 ";
		 $this->bd->query($borrado);

		 if (!($resultado = $this->bd->query($consulta))){
			return 'Error en la inserción'; 
		}
		else{ 

			return 'Fase de Cuartos creada';
		}



}


function semisPlayoffs($id_campeonato, $grupo){

	$sql = "SELECT * from clash where clash.id_campeonato='".$id_campeonato."' and clash.id_grupo = '".$grupo."' and (clash.numSetsPareja1 > clash.numSetsPareja2 || clash.numSetsPareja2 > clash.numSetsPareja1) and clash.tipo = 'cuartos'";
	$resultado = $this->bd->query($sql);
	$sqlFecha = "SELECT clash.fecha from clash where clash.tipo = 'cuartos' and clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo='".$grupo."' ORDER BY fecha DESC LIMIT 1";
	$resulFecha = $this->bd->query($sqlFecha);
	$fetch_fecha = $resulFecha->fetch_row();
	$fechaComienzo = $fetch_fecha[0];
	$fechas = $fechaComienzo;
	$horas = array('09:00', '10:30', '12:00', '13:30', '17:00', '18:30', '20:00', '21:30');
	$pistas = array('P0', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8');
	$id_pareja1 = array();
	$id_pareja2 = array();
	while ($fila = $resultado->fetch_assoc()){
		if($fila['numSetsPareja1'] > $fila['numSetsPareja2']){

				$id_pareja1[] = $fila['id_pareja1'];


		}

		if( $fila['numSetsPareja2'] > $fila['numSetsPareja1']){
				$id_pareja2[] = $fila['id_pareja2'];

		}

	
	}

	if(count($id_pareja1) == count($id_pareja2)){
	$semifinales = array_combine($id_pareja1, $id_pareja2);
	}
	elseif (count($id_pareja1) > count($id_pareja2) and count($id_pareja2) == 1) {
	
	for ($i=0; $i <= count($id_pareja1)-1 ; $i++) { 
		
		$id_pareja2[] = $id_pareja1[$i];
		unset($id_pareja1[$i]);
		break;
	}

	$semifinales = array_combine($id_pareja1, $id_pareja2);
	
	}
	elseif (count($id_pareja1) < count($id_pareja2) and count($id_pareja1) == 1) {
		for ($i=0; $i <= count($id_pareja2)-1 ; $i++) { 
		
		$id_pareja1[] = $id_pareja2[$i];
		unset($id_pareja2[$i]);
		break;
	}

	$semifinales = array_combine($id_pareja1, $id_pareja2);
	}
	elseif (count($id_pareja1) > count($id_pareja2) and count($id_pareja2) == 0) {
		for ($i=0; $i <= (count($id_pareja1)/2) ; $i++) { 
		
		$id_pareja2[] = $id_pareja1[$i];
		unset($id_pareja1[$i]);
	}
	$semifinales = array_combine($id_pareja1, $id_pareja2);
	}
	elseif (count($id_pareja1) < count($id_pareja2) and count($id_pareja1) == 0) {
		for ($i=0; $i <= (count($id_pareja2)/2) ; $i++) { 
		
		$id_pareja1[] = $id_pareja2[$i];
		unset($id_pareja2[$i]);
	}
	$semifinales = array_combine($id_pareja1, $id_pareja2);
	}

	foreach ($semifinales as $key => $value) {
		
		$fechas = date("Y-m-d",strtotime($fechas)+86400);
		$horaSeleccionada =  $horas[array_rand($horas)];
		$pista =  $pistas[array_rand($pistas)];
		$consulta = "INSERT INTO CLASH (
					id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					resultado,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha,
					tipo,
					id_grupo, 
					id_pista
					) 
					VALUES (DEFAULT, '".$id_campeonato."', '".$key."', '".$value."','0', '0', '0', '".$horaSeleccionada."', '".$fechas."','semifinales', '".$grupo."', '".$pista."')";

				$this->bd->query($consulta);
	}

}




function finalPlayoffs($id_campeonato, $grupo){

	$sql = "SELECT * from clash where clash.id_campeonato='".$id_campeonato."' and clash.id_grupo='".$grupo."' and (clash.numSetsPareja1 > clash.numSetsPareja2 || clash.numSetsPareja2 > clash.numSetsPareja1) and clash.tipo = 'semifinales'";
	$resultado = $this->bd->query($sql);
	$sqlFecha = "SELECT clash.fecha from clash where clash.tipo = 'semifinales' and clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo='".$grupo."' ORDER BY fecha DESC LIMIT 1";
	$resulFecha = $this->bd->query($sqlFecha);
	$fetch_fecha = $resulFecha->fetch_row();
	$fechaComienzo = $fetch_fecha[0];
	$fechas = $fechaComienzo;
	$horas = array('09:00', '10:30', '12:00', '13:30', '17:00', '18:30', '20:00', '21:30');
	$pistas = array('P0', 'P1', 'P2', 'P3', 'P4', 'P5', 'P6', 'P7', 'P8');
	$id_pareja1 = array();
	$id_pareja2 = array();

	while ($fila = $resultado->fetch_assoc()){
		if($fila['numSetsPareja1'] > $fila['numSetsPareja2']){

				$id_pareja1[] = $fila['id_pareja1'];


		}

		if( $fila['numSetsPareja2'] > $fila['numSetsPareja1']){
				$id_pareja2[] = $fila['id_pareja2'];

		}

	
	}


	if(count($id_pareja1) == count($id_pareja2)){
	$final = array_combine($id_pareja1, $id_pareja2);
	}
	elseif (count($id_pareja1) > count($id_pareja2)) {
		for ($i=0; $i <= (count($id_pareja1)/2) ; $i++) { 
		
		$id_pareja2[] = $id_pareja1[$i];
		unset($id_pareja1[$i]);
	}
		$final = array_combine($id_pareja1, $id_pareja2);
	}
	elseif (count($id_pareja1) < count($id_pareja2)) {
		for ($i=0; $i <= (count($id_pareja2)/2) ; $i++) { 
		
		$id_pareja1[] = $id_pareja2[$i];
		unset($id_pareja2[$i]);
	}
		$final = array_combine($id_pareja1, $id_pareja2);
	}



	foreach ($final as $key => $value) {
		
		$fechas = date("Y-m-d",strtotime($fechas)+86400);
		$horaSeleccionada =  $horas[array_rand($horas)];
		$pista =  $pistas[array_rand($pistas)];
		$consulta = "INSERT INTO CLASH (
					id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha,
					tipo,
					id_grupo,
					id_pista
					) 
					VALUES (DEFAULT, '".$id_campeonato."', '".$key."', '".$value."', '0', '0', '".$horaSeleccionada."', '".$fechas."','final', '".$grupo."', '".$pista."')";

				$this->bd->query($consulta);
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



function testNumMaxMembers($id_campeonato, $grupo){
	$sql = "SELECT * FROM couple_grupo WHERE id_campeonato='".$id_campeonato."' AND id_grupo='".$grupo."'";


	 $result = $this->bd->query($sql);

	 if($result->num_rows < 12){
	 	return 'true';
	 }

	 else{
	 	return 'false';
	 }
}










}

?>