

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include_once '../Views/RANKING_VIEWS/SHOWCURRENT.php';

function get_data_ranking(){
	$id_pareja = $_REQUEST['id_pareja'];
	$p_jugados = '';
	$p_ganados ='';
	$puntos = '' ;
	$action = $_REQUEST['action'];

	$RANKING = new RANKING_MODEL(
		$id_pareja, 
		$p_jugados,
		$p_ganados,
		$puntos,
		$action
	);

	return $RANKING;
}




Switch ($_REQUEST['action']){



	case 'SHOWCURRENT':
	 			include_once '../Models/RANKING_MODEL.php';
			    $modelo = get_data_ranking();
				$valores = $modelo->RellenaDatos();
				new SHOWCURRENT_VIEW($valores);
	break;



	

		





}







?>