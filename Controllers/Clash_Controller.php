

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
include_once '../Views/CLASH_VIEWS/SHOWCONFIRM.php';

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


		case 'SHOWCONFIRM':

			include_once '../Models/CLASH_MODEL.php';
			$grupo = $_REQUEST['id_grupo'];
			$campeonato = $_REQUEST['id_campeonato'];
			$modelo = new CLASH_MODEL('',$campeonato,'','','','','','','','',$grupo);
			$confirmaciones = $modelo->showConfirms();
			$lista = array();
			new SHOWCONFIRM($lista, $confirmaciones);
		break;


		case 'CONFIRMACION':
		
		include_once '../Models/CLASH_MODEL.php';
		include_once '../Models/RESERVATION_MODEL.php';
		$x = get_data();
		$valores= $x->RellenaDatos();

		$id_enfrentamiento = $_REQUEST['id_enfrentamiento'];
		$id_campeonato = $_REQUEST['id_campeonato'];
		$id_pareja1 = $_REQUEST['id_pareja1'];
		$id_pareja2 = $_REQUEST['id_pareja2'];
		$l1p1 = $_REQUEST['l1p1'];
		$l2p1 = $_REQUEST['l2p1'];
		$l1p2 = $_REQUEST['l1p2'];
		$l2p2 = $_REQUEST['l2p2'];
		$tipo = $_REQUEST['tipo'];
		$hora = $_REQUEST['hora_inicio'];
		$fecha = $_REQUEST['fecha'];
		$pista = $_REQUEST['id_pista'];


		$confirmacion = new CLASH_MODEL('','','','','','','','','','','');
		$reserva = new CLASH_MODEL($id_enfrentamiento,'',$id_pareja1,$id_pareja2,'','','','','','','');
		


		if($_SESSION['login'] == $l1p1 || $_SESSION['login'] == $l2p1){


		$respuesta = $confirmacion->addConfirm($id_pareja1, $id_enfrentamiento);

		if($respuesta != 'Su asistencia ya ha sido confirmada'){
		$result = $reserva->reservarPista();

		if($result == 'true'){
			$insert = new RESERVATION_MODEL('0',$pista, $l1p1,$hora, $fecha,'0');
			$resp = $insert->ADD();

			
		}
		}

		if($tipo == 'liga'){

		new MESSAGE($respuesta, "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif($tipo == 'cuartos'){
			new MESSAGE($respuesta, "./Championship_Controller.php?action=CUARTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif ($tipo == 'semifinales') {
			new MESSAGE($respuesta, "./Championship_Controller.php?action=SEMIS&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}

		elseif ($tipo == 'final') {
			new MESSAGE($respuesta, "./Championship_Controller.php?action=FINAL&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}


		}


		elseif($_SESSION['login'] == $l1p2 || $_SESSION['login'] == $l2p2){

			$respuesta = $confirmacion->addConfirm($id_pareja2, $id_enfrentamiento);
			if($respuesta != 'Su asistencia ya ha sido confirmada'){
			$result = $reserva->reservarPista();

			if($result == 'true'){
			$insert = new RESERVATION_MODEL(' ',$pista, $l1p2, $hora, $fecha,'0');
			$resp = $insert->ADD();


			 } 

			}
			

			if($tipo == 'liga'){

		new MESSAGE($respuesta, "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif($tipo == 'cuartos'){
			new MESSAGE($respuesta, "./Championship_Controller.php?action=CUARTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif ($tipo == 'semifinales') {
			new MESSAGE($respuesta, "./Championship_Controller.php?action=SEMIS&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}

		elseif ($tipo == 'final') {
			new MESSAGE($respuesta, "./Championship_Controller.php?action=FINAL&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}
		
		}

		else{
			if($tipo == 'liga'){

		new MESSAGE('NO AUTORIZADO', "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif($tipo == 'cuartos'){
			new MESSAGE('NO AUTORIZADO', "./Championship_Controller.php?action=CUARTOS&id_campeonato=$valores[1]&id_grupo=$valores[10]");

		}
		elseif ($tipo == 'semifinales') {
			new MESSAGE('NO AUTORIZADO', "./Championship_Controller.php?action=SEMIS&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}

		elseif ($tipo == 'final') {
			new MESSAGE('NO AUTORIZADO', "./Championship_Controller.php?action=FINAL&id_campeonato=$valores[1]&id_grupo=$valores[10]");
			
		}
		}

	

		

		break;

		





}







?>