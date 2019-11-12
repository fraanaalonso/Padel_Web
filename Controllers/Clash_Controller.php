

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CLASH_VIEWS/SHOWCLASHES.php';




Switch ($_REQUEST['action']){



case 'GENERARCALENDARIO':


if(!$_POST){

	$id_campeonato = $_REQUEST['id_campeonato'];
	$championship = new CHAMPIONSHIP_MODEL($id_campeonato, '', '','','','');

	$parejasInscritas = $championship->obtenerParejas($id_campeonato);
	



}


break;	
			




		

		

}






 ?>