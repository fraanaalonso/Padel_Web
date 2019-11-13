

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CLASH_VIEWS/CLASH_SHOWALL.php';




Switch ($_REQUEST['action']){



case 'GENERARCALENDARIO':


if(!$_POST){

	include_once '../Models/CHAMPIONSHIP_MODEL.php';

	$id_campeonato = $_REQUEST['id_campeonato'];
	$championship = new CHAMPIONSHIP_MODEL($id_campeonato,'', '','','','');

	$parejasInscritas = $championship->obtenerParejas($id_campeonato);
	$lista = array();


	new CLASH_SHOWALL($lista, $resultado);
	




}


break;	
			




		

		

}






 ?>