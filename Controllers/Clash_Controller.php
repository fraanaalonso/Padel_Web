

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}


require_once '../Functions/funciones.php';
include_once '../Views/CLASH_VIEWS/CLASH_SHOWALL.php';
include_once '../Views/CLASH_VIEWS/EDIT_VIEW.php';
include_once '../Views/Message_View.php';
include_once '../Views/CLASH_VIEWS/SHOWRANKING.php';
//include_once '../Views/CLASH_VIEWS/SHOWCURRENT.php';

function get_data(){
	$id_enfrentamiento = $_REQUEST['id_enfrentamiento'];
	$id_campeonato = $_REQUEST['id_campeonato'];
	$id_pareja1 ='';
	$id_pareja2 = '' ;
	$resultado = '';
	$numSetsPareja1='';
	$numSetsPareja2 ='';
	$hora_inicio ='';
	$fecha = '';
	$tipo ='';
	$id_grupo ='';
	$action = $_REQUEST['action'];

	$CLASH = new CLASH_MODEL(
		$id_enfrentamiento, 
		$id_campeonato,
		$id_pareja1,
		$id_pareja2,
		$resultado,
		$numSetsPareja1,
		$numSetsPareja2,
		$hora_inicio,
		$fecha,
		$tipo,
		$id_grupo,
		$action
	);

	return $CLASH;
}




Switch ($_REQUEST['action']){



	case 'EDIT':

		if (!$_POST) {
					 include_once '../Models/CLASH_MODEL.php';
					 include_once '../Models/RANKING_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					include '../Models/CLASH_MODEL.php';
					include_once '../Models/RANKING_MODEL.php';
					$x= get_data();
					$valores= $x->RellenaDatos();

					 
					$modelo = new CLASH_MODEL($_REQUEST['id_enfrentamiento'],$_REQUEST['id_campeonato'], $_REQUEST['id_pareja1'],$_REQUEST['id_pareja2'], $_REQUEST['resultado'], $_REQUEST['numSetsPareja1'], $_REQUEST['numSetsPareja2'], $_REQUEST['hora_inicio'], $_REQUEST['fecha'], $_REQUEST['tipo'], $_REQUEST['id_grupo']);

					$respuesta = $modelo->EDIT();

					if($_REQUEST['tipo'] == 'liga'){

					if($_REQUEST['numSetsPareja1'] > $_REQUEST['numSetsPareja2']){
						include_once '../Models/RANKING_MODEL.php';
						$ranking = new RANKING_MODEL('','','','');
						$pareja = $ranking->modificarResultado($_REQUEST['id_pareja1'], $_REQUEST['id_pareja2']);


					}

					elseif ($_REQUEST['numSetsPareja2'] > $_REQUEST['numSetsPareja1']) {
						include_once '../Models/RANKING_MODEL.php';
						$ranking = new RANKING_MODEL('','','','');
						$pareja = $ranking->modificarResultado($_REQUEST['id_pareja2'], $_REQUEST['id_pareja1']);
					}

					else{
						include_once '../Models/RANKING_MODEL.php';
						$ranking = new RANKING_MODEL('','','','');
						$pareja = $ranking->establecerEmpate($_REQUEST['id_pareja2'], $_REQUEST['id_pareja1']);
					}
					new MESSAGE($respuesta, "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

				}

				elseif ($_REQUEST['tipo'] == 'cuartos') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=CUARTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");
				}
				elseif ($_REQUEST['tipo'] == 'semifinales') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=SEMIS&id_campeonato=$valores[1]&id_grupo=$valores[10]");
				}
				elseif ($_REQUEST['tipo'] == 'final') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=FINAL&id_campeonato=$valores[1]&id_grupo=$valores[10]");
				}


					
				}
		break;



		case 'SHOWRANKING':

					 include_once '../Models/CLASH_MODEL.php';
					$modelo= new CLASH_MODEL('','','','','','','','','','','');
					$valores= $modelo ->obtenerClasificacionGrupo($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
					$miembros = array();
					new SHOWRANKING($miembros, $valores, $_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
			


		break;


		case 'CONFIRMACION':
		
		include_once '../Models/CLASH_MODEL.php';
		include_once '../Models/RESERVATION_MODEL.php';

		$x= get_data();
		$valores= $x->RellenaDatos();
/*
		$id_enfrentamiento = $_POST['id_enfrentamiento'];
		$fecha = $_POST['fecha'];
		$hora = $_POST['hora_inicio'];
		$confirmacion = $_POST['confirmacion'];
		$l1p1 = $_POST['l1p1'];
		$l2p1 = $_POST['l2p1'];
		$l1p2 = $_POST['l1p2'];
		$l2p2 = $_POST['l2p2'];


		if($confirmacion == 'no' and ($_SESSION['login'] == $l1p1 || $_SESSION['login'] == $l2p1) and ($_SESSION['login'] == $l1p2 || $_SESSION['login'] == $l2p2)){

			/*Borrado de reserva y enfrentamiento*/


		
/*
		else{
			new MESSAGE('No tiene permisos para realizar esta acción', "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&categoria=$valores[9]&nivel=$valores[10]");
		}*/


		new MESSAGE('Aún no lo he hecho Delamaister/Somozape', "./Championship_Controller.php");

		break;

		





}







?>