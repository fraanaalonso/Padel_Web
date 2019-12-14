
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
	var $tipo;
	var $grupo;



	function __construct($id_enfrentamiento, $id_campeonato, $id_pareja1, $id_pareja2, $resultado, $numSetsPareja1, $numSetsPareja2, $hora_inicio, $fecha, $tipo, $grupo){

		$this->id_enfrentamiento = $id_enfrentamiento;
		$this->id_campeonato = $id_campeonato;
		$this->id_pareja1 = $id_pareja1;
		$this->id_pareja2 = $id_pareja2;
		$this->resultado = $resultado;
		$this->numSetsPareja1 = $numSetsPareja1;
		$this->numSetsPareja2 = $numSetsPareja2;
		$this->hora_inicio = $hora_inicio;
		$this->fecha = $fecha;
		$this->tipo = $tipo;
		$this->grupo = $grupo;


		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}


	function SEARCHCLASHBYCATNIV($id_campeonato, $grupo){

		$sql = "SELECT *, C.login1 as l1p1, C.login2 as l2p1, D.login1 as l1p2, D.login2 as l2p2, categoria.categoria, nivel.nivel FROM CLASH inner join couple C on C.id_pareja=clash.id_pareja1 inner join couple D on D.id_pareja=clash.id_pareja2 inner join grupo on clash.id_grupo=grupo.id_grupo inner join categoria on grupo.id_categoria=categoria.id_categoria INNER join nivel on grupo.id_nivel=nivel.id_nivel WHERE clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo = '".$grupo."' and clash.tipo = 'liga'";

		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}

	}


	function SEARCHCUARTOS($id_campeonato, $grupo){

		$sql = "SELECT *, C.login1 as l1p1, C.login2 as l2p1, D.login1 as l1p2, D.login2 as l2p2, categoria.categoria, nivel.nivel FROM CLASH inner join couple C on C.id_pareja=clash.id_pareja1 inner join couple D on D.id_pareja=clash.id_pareja2 inner join grupo on clash.id_grupo=grupo.id_grupo inner join categoria on grupo.id_categoria=categoria.id_categoria INNER join nivel on grupo.id_nivel=nivel.id_nivel WHERE clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo = '".$grupo."' and clash.tipo = 'cuartos'";

		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


	}


	function SEARCHSEMIS($id_campeonato, $grupo){

		$sql = "SELECT *, C.login1 as l1p1, C.login2 as l2p1, D.login1 as l1p2, D.login2 as l2p2, categoria.categoria, nivel.nivel FROM CLASH inner join couple C on C.id_pareja=clash.id_pareja1 inner join couple D on D.id_pareja=clash.id_pareja2 inner join grupo on clash.id_grupo=grupo.id_grupo inner join categoria on grupo.id_categoria=categoria.id_categoria INNER join nivel on grupo.id_nivel=nivel.id_nivel WHERE clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo = '".$grupo."' and clash.tipo = 'semifinales'";

		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}



	}


	

function SEARCHFINAL($id_campeonato, $grupo){

		$sql = "SELECT *, C.login1 as l1p1, C.login2 as l2p1, D.login1 as l1p2, D.login2 as l2p2, categoria.categoria, nivel.nivel FROM CLASH inner join couple C on C.id_pareja=clash.id_pareja1 inner join couple D on D.id_pareja=clash.id_pareja2 inner join grupo on clash.id_grupo=grupo.id_grupo inner join categoria on grupo.id_categoria=categoria.id_categoria INNER join nivel on grupo.id_nivel=nivel.id_nivel WHERE clash.id_campeonato = '".$id_campeonato."' and clash.id_grupo = '".$grupo."' and clash.tipo = 'final'";

		 // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
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
					resultado = '$this->resultado',
					numSetsPareja1 = '$this->numSetsPareja1',
					numSetsPareja2 = '$this->numSetsPareja2',
					hora_inicio = '$this->hora_inicio',
					fecha = '$this->fecha',
					tipo = '$this->tipo',
					id_grupo = '$this->grupo'

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









function obtenerClasificacionGrupo($id_campeonato, $grupo){

	$sql = "SELECT ranking.id_pareja as pareja, couple.login1 as capitan, couple.login2 as socio, ranking.p_jugados as jugados, ranking.p_ganados as ganados, ranking.puntos as puntos, nivel.nivel as nivel, categoria.categoria as categoria FROM RANKING INNER JOIN couple_grupo ON couple_grupo.id_pareja=ranking.id_pareja INNER JOIN grupo ON couple_grupo.id_grupo=GRUPO.id_grupo INNER JOIN categoria ON GRUPO.id_categoria=categoria.id_categoria INNER JOIN NIVEL ON grupo.id_nivel=NIVEL.id_nivel inner join couple on couple.id_pareja=ranking.id_pareja and grupo.id_grupo='".$grupo."' and grupo.id_campeonato='".$id_campeonato."' ORDER BY puntos DESC";



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



function accesoPlayoffs(){
	$sql = "SELECT * FROM CLASH WHERE CLASH.numSetsPareja1 = 0 and CLASH.numSetsPareja2 = 0 and CLASH.tipo='$this->tipo' and CLASH.id_grupo='$this->grupo' and CLASH.id_campeonato='$this->id_campeonato'";

	$resultado = $this->bd->query($sql);

	if($resultado->num_rows >= 1){
		return 'true';
	}
	else{
		return 'false';
	}

	
}


function addConfirm($id_pareja, $id_enfrentamiento){
	$sql = "INSERT INTO clash_confirm (
					id_enfrentamiento,
					id_pareja
					) 
						VALUES (
						'".$id_enfrentamiento."',
						'".$id_pareja."'
						)";
	$resultado = $this->bd->query($sql);

	if($resultado){
		return 'Se ha confirmado su asistencia';
	}
	else{
		return 'Su asistencia ya ha sido confirmada';
	}

}

function showConfirms(){
	$consulta = "SELECT CLASH_CONFIRM.id_pareja as pareja, CLASH_CONFIRM.id_enfrentamiento as enfrentamiento, couple.login1 as capitan, couple.login2 as socio from clash_confirm inner join couple on couple.id_pareja=clash_confirm.id_pareja inner join clash on clash.id_enfrentamiento=clash_confirm.id_enfrentamiento and clash.id_campeonato='$this->id_campeonato' and clash.id_grupo = '$this->grupo'";

	$resultado = $this->bd->query($consulta);
	return $resultado;
}

function reservarPista(){

	$sql = "SELECT * FROM clash_confirm WHERE (id_pareja = '$this->id_pareja1' or id_pareja = '$this->id_pareja2') and id_enfrentamiento = '$this->id_enfrentamiento'";

	$resultado = $this->bd->query($sql);

	if($resultado->num_rows == 2){
		return 'true';
	}
	else{
		return 'false';
	}
}

}


?>