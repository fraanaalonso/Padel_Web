

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAMPIONSHIP_VIEWS/SHOWCURRENT_COUPLE.php';




function get_data(){
	$id_pareja = $_REQUEST['id_pareja'];
	$id_categoria ='';
	$id_grupo ='';
	$login1 = '' ;
	$login2='';
	$action = $_REQUEST['action'];

	$COURT = new COUPLE_MODEL(
		$id_pareja, 
		$id_categoria,
		$id_grupo,
		$login1,
		$login2,
		$action
	);

	return $COURT;
}


Switch ($_REQUEST['action']){

	
			


		case 'SHOWCURRENT':
				 include_once '../Models/COUPLE_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_COUPLE($valores);


				break;


		

		

}






 ?>