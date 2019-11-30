

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
	$categoria = '';
	$nivel='';
	$tipo ='';
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
		$categoria,
		$nivel,
		$tipo,
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
					$valores= $x ->RellenaDatos();

					 
					$modelo = new CLASH_MODEL($_REQUEST['id_enfrentamiento'],$_REQUEST['id_campeonato'], $_REQUEST['id_pareja1'],$_REQUEST['id_pareja2'], $_REQUEST['resultado'], $_REQUEST['numSetsPareja1'], $_REQUEST['numSetsPareja2'], $_REQUEST['hora_inicio'], $_REQUEST['fecha'], $_REQUEST['categoria'], $_REQUEST['nivel'], $_REQUEST['tipo']);

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
					new MESSAGE($respuesta, "./Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$valores[1]&categoria=$valores[9]&nivel=$valores[10]");

				}

				elseif ($_REQUEST['tipo'] == 'cuartos') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=CUARTOS&id_campeonato=$valores[1]&categoria=$valores[9]&nivel=$valores[10]");
				}
				elseif ($_REQUEST['tipo'] == 'semifinales') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=SEMIS&id_campeonato=$valores[1]&categoria=$valores[9]&nivel=$valores[10]");
				}
				elseif ($_REQUEST['tipo'] == 'final') {
					new MESSAGE($respuesta, "./Championship_Controller.php?action=FINAL&id_campeonato=$valores[1]&categoria=$valores[9]&nivel=$valores[10]");
				}


					
				}
		break;



		case 'SHOWRANKING':

					 include_once '../Models/CLASH_MODEL.php';
					$modelo= new CLASH_MODEL('','','','','','','','','','','','');
					$valores= $modelo ->obtenerClasificacionGrupo($_REQUEST['id_campeonato'], $_REQUEST['categoria'], $_REQUEST['nivel']);
					$miembros = array();
					new SHOWRANKING($miembros, $valores, $_REQUEST['id_campeonato'], $_REQUEST['categoria'], $_REQUEST['nivel']);
			


		break;

		





}







?>