
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



	function __construct($id_enfrentamiento, $id_campeonato, $id_pareja1, $id_pareja2, $numSetsPareja1, $numSetsPareja2, $hora_inicio, $fecha){

		$this->id_enfrentamiento = $id_enfrentamiento;
		$this->id_campeonato = $id_campeonato;
		$this->id_pareja1 = $id_pareja1;
		$this->id_pareja2 = $id_pareja2;
		$this->numSetsPareja1 = $numSetsPareja1;
		$this->numSetsPareja2 = $numSetsPareja2;
		$this->hora_inicio = $hora_inicio;
		$this->fecha = $fecha;



		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}


	



	function ADD(){


		if (($this->id_enfrentamiento <> '')){ 

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
					fecha
					) 
						VALUES (
						'$this->id_enfrentamiento',
						'$this->id_campeonato',
						'$this->id_pareja1',
						'$this->id_pareja2',
						'$this->numSetsPareja1',
						'$this->numSetsPareja2',
						'$this->hora_inicio',
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



	function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento') ";
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
					fecha = '$this->fecha'
				
				WHERE ( id_enfrentamiento = '$this->id_enfrentamiento')";


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







		

		function DELETE()
		{	
		    $sql = "SELECT * FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento') ";
		    // se ejecuta la query
		    $result = $this->bd->query($sql);
		    // si existe una tupla con ese valor de clave
		    if ($result->num_rows == 1)
		    {
		    	// se construye la sentencia sql de borrado
		        $sql = "DELETE FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento')";
		        // se ejecuta la query
		        $this->bd->query($sql);
		        // se devuelve el mensaje de borrado correcto
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 

	

		function RellenaDatos()
		{	// se construye la sentencia de busqueda de la tupla
		    $sql = "SELECT * FROM CLASH  WHERE (id_enfrentamiento = '$this->id_enfrentamiento')";
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