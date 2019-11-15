

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}


require_once '../Functions/funciones.php';
include_once '../Views/CLASH_VIEWS/CLASH_SHOWALL.php';

function get_data(){
	$id_enfrentamiento = $_REQUEST['id_enfrentamiento'];
	$id_campeonato ='';
	$id_pareja1 ='';
	$id_pareja2 = '' ;
	$numSetsPareja1='';
	$numSetsPareja2 ='';
	$hora_inicio ='';
	$fecha = '';
	$action = $_REQUEST['action'];

	$CLASH = new CLASH_MODEL(
		$id_enfrentamiento, 
		$id_campeonato,
		$id_pareja1,
		$id_pareja2,
		$numSetsPareja1,
		$numSetsPareja2,
		$hora_inicio,
		$fecha,
		$action
	);

	return $CLASH;
}




Switch ($_REQUEST['action']){



	case 'ADD':

		if(!$_POST){
			include_once '../Models/CHAMPIONSHIP_MODEL.php';

			$id_campeonato=$_REQUEST['id_campeonato'];
			$nivel = $_REQUEST['nivel'];
			$categoria = $_REQUEST['categoria'];

			
			$data = obtenerGrupoCampeonato($id_campeonato, $nivel, $categoria);
			$datos = $data->fetch_array();

			$obj = array();
			new CLASH_SHOWALL($datos);
		}



	break;



}







?>