

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}


require_once '../Functions/funciones.php';
include_once '../Views/CLASH_VIEWS/CLASH_SHOWALL.php';
include_once '../Views/CLASH_VIEWS/EDIT_VIEW.php';
include_once '../Views/Message_View.php';

function get_data(){
	$id_enfrentamiento = $_REQUEST['id_enfrentamiento'];
	$id_campeonato = $_REQUEST['id_campeonato'];
	$id_pareja1 ='';
	$id_pareja2 = '' ;
	$numSetsPareja1='';
	$numSetsPareja2 ='';
	$hora_inicio ='';
	$fecha = '';
	$categoria = '';
	$nivel='';
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
		$categoria,
		$nivel,
		$action
	);

	return $CLASH;
}




Switch ($_REQUEST['action']){



	case 'EDIT':

		if (!$_POST) {
					 include_once '../Models/CLASH_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					include '../Models/CLASH_MODEL.php';
					$x= get_data();
					$valores= $x ->RellenaDatos();

					 
					$modelo = new CLASH_MODEL($_REQUEST['id_enfrentamiento'],$_REQUEST['id_campeonato'], $_REQUEST['id_pareja1'],$_REQUEST['id_pareja2'], $_REQUEST['numSetsPareja1'], $_REQUEST['numSetsPareja2'], $_REQUEST['hora_inicio'], $_REQUEST['fecha'], $_REQUEST['categoria'], $_REQUEST['nivel']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, "./Championship_Controller.php?action=GENERARCALENDARIO&id_enfrentamiento=$valores[0]&id_campeonato=$valores[1]&categoria=$valores[8]&nivel=$valores[9]");
				}



	break;



}







?>