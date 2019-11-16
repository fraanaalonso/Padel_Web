
<?php





class CLASH_MODEL
{

	var $id_enfrentamiento;
	var $id_campeonato;
	var $id_pareja1;
	var $id_pareja2;
	var $numSetsPareja1;
	var $numSetsPareja2;
	var $hora_inicio;
	var $fecha;
	var $id_categoria;
	var $id_nivel;



	function __construct($id_enfrentamiento, $id_campeonato, $id_pareja1, $id_pareja2, $numSetsPareja1, $numSetsPareja2, $hora_inicio, $fecha, $id_categoria, $id_nivel){

		$this->id_enfrentamiento = $id_enfrentamiento;
		$this->id_campeonato = $id_campeonato;
		$this->id_pareja1 = $id_pareja1;
		$this->id_pareja2 = $id_pareja2;
		$this->numSetsPareja1 = $numSetsPareja1;
		$this->numSetsPareja2 = $numSetsPareja2;
		$this->hora_inicio = $hora_inicio;
		$this->fecha = $fecha;
		$this->id_categoria = $id_categoria;
		$this->id_nivel = $id_nivel;



		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}


	function SEARCHCLASHBYCATNIV($id_campeonato, $id_nivel, $id_categoria){

		$sql = "SELECT * FROM CLASH WHERE clash.id_campeonato = '".$id_campeonato."' and clash.nivel = '".$id_nivel."' and clash.categoria = '".$id_categoria."'";

		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}

	}


	



	function ADD(){



        $sql = "SELECT * FROM CLASH WHERE (id_enfrentamiento = '$this->id_enfrentamiento')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CLASH (
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
						VALUES (
						'$this->id_enfrentamiento',
						'$this->id_campeonato',
						'$this->id_pareja1',
						'$this->id_pareja2',
						'$this->numSetsPareja1',
						'$this->numSetsPareja2',
						'$this->hora_inicio',
						'$this->fecha',
						'$this->id_categoria',
						'$this->id_nivel'
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



	function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento') && (id_campeonato = '$this->id_campeonato') ";
    // se ejecuta la query
    $result = $this->bd->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    
    if ($result->num_rows == 1)
    	
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
    	
		$sql = "UPDATE CLASH  SET 
						

					id_enfrentamiento = '$this->id_enfrentamiento',
					id_campeonato = '$this->id_campeonato',
					id_pareja1 = '$this->id_pareja1',
					id_pareja2 = '$this->id_pareja2',
					numSetsPareja1 = '$this->numSetsPareja1',
					numSetsPareja2 = '$this->numSetsPareja2',
					hora_inicio = '$this->hora_inicio',
					fecha = '$this->fecha',
					categoria = '$this->id_categoria',
					nivel = '$this->id_nivel'
				WHERE ( id_enfrentamiento = '$this->id_enfrentamiento') && (id_campeonato = '$this->id_campeonato') ";


		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->bd->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ // si no hay problemas con la modificación se indica que se ha modificado
			return 'Modificado correctamente';
		}
    }

    else{ // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	
    	return 'No existe en la base de datos';
    }
}






	function SEARCH()
{ 	// construimos la sentencia de busqueda con LIKE y los atributos de la entidad
    $sql = "select * from CLASH ";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


} // fin metodo SEARCH



	function BUSCAR()
{ 	// construimos la sentencia de busqueda con LIKE y los atributos de la entidad
    $sql = "select id_enfrentamiento,
					id_campeonato,
					id_pareja1,
					id_pareja2,
					numSetsPareja1,
					numSetsPareja2,
					hora_inicio,
					fecha from CLASH WHERE

   					((id_enfrentamiento LIKE '%$this->id_enfrentamiento%') &&
   					(id_campeonato LIKE '%$this->id_campeonato%') &&
   					(id_pareja1 LIKE '%$this->id_pareja1%') &&
   					(id_pareja2 LIKE '%$this->id_pareja2%') &&
   					(numSetsPareja1 LIKE '%$this->numSetsPareja1%') &&
    				(numSetsPareja2 LIKE '%$this->numSetsPareja2%') &&
    				(hora_inicio LIKE '%$this->hora_inicio%') &&
	 				(fecha LIKE '%$this->fecha%'))";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


} // fin metodo SEARCH





function obtenerClasificacionGrupo($id_campeonato, $categoria, $nivel){

	$sql = "SELECT ranking.id_pareja as pareja,  ranking.p_jugados as jugados, ranking.p_ganados as ganados, ranking.puntos as puntos, nivel.nivel as nivel, categoria.categoria as categoria, championship_couple.id_campeonato as campeonato FROM ranking INNER JOIN championship_couple ON championship_couple.id_pareja=ranking.id_pareja AND championship_couple.id_campeonato='".$id_campeonato."' INNER JOIN couple_categoria ON couple_categoria.id_pareja=ranking.id_pareja INNER JOIN categoria ON categoria.id_categoria=couple_categoria.id_categoria AND categoria.categoria='".$categoria."' INNER JOIN couple_nivel ON couple_nivel.id_pareja=ranking.id_pareja INNER JOIN NIVEL ON nivel.id_nivel=couple_nivel.id_nivel AND nivel.nivel='".$nivel."'";



    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}



}





		

	

		function RellenaDatos()
		{	// se construye la sentencia de busqueda de la tupla
		    $sql = "SELECT * FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento') &&  (id_campeonato = '$this->id_campeonato')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; // 
			}
		    else{ // si existe se devuelve la tupla resultado
				$result = $resultado->fetch_array();
				return $result;
			}
		} 



}


?>