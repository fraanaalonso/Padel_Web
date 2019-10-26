

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/MATCH_VIEWS/SHOWALL_VIEW.php';
include '../Views/MATCH_VIEWS/ADD_VIEW.php';
include '../Views/MATCH_VIEWS/SEARCH_VIEW.php';
include '../Views/MATCH_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/MATCH_VIEWS/DELETE_MATCH_VIEW.php';
include '../Views/MATCH_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';
include '../Views/MATCH_VIEWS/Inscripcion_View.php';

function get_data(){
	$id_partido = $_REQUEST['id_partido'];
	$id_pista ='';
	$hora_inicio ='';
	$hora_fin = '' ;
	$fecha='';
	$action = $_REQUEST['action'];

	$CHAMPIONSHIP = new MATCH_MODEL(
		$id_partido, 
		$id_pista,
		$hora_inicio,
		$hora_fin,
		$fecha,
		$action
	);

	return $CHAMPIONSHIP;
}


Switch ($_REQUEST['action']){

	
		case 'PROMOCIONAR':
				if (!$_POST){
					include_once '../Models/COURT_MODEL.php';
					$clave = $_REQUEST['id_pista'];

					
					new ADD_VIEW($clave);
				
				}
				else{
				 include_once '../Models/MATCH_MODEL.php';
				  $modelo= new MATCH_MODEL(' ',$_REQUEST['id_pista'], $_REQUEST['hora_inicio'],$_REQUEST['hora_fin'], $_REQUEST['fecha']);

					$respuesta = $modelo->añadirPromocion();
					new MESSAGE($respuesta,'./Match_Controller.php');
					
				}
				break;

		case 'INSCRIBIR':
			
			if(!$_POST){
				include_once '../Models/MATCH_MODEL.php';
				$clave = get_data();
				$respuesta = $clave->RellenaDatos();

				new Inscripcion_View($respuesta);


			}

			include_once '../Models/MATCH_MODEL.php';
			include_once '../Models/USER_MODEL.php';
			$modelo = new MATCH_MODEL($_REQUEST['id_partido'],'', '','','');
			$usuario = new USER_Modelo($_REQUEST['login'],'','','','','','','','','','','');

			$respuesta = $modelo->inscribirPromocion($usuario);

			new MESSAGE($respuesta, './Match_Controller.php?actionSHOWMYPROMOTIONS');



		break;		

		case 'SHOWMYPROMOTIONS':

		if (!$_POST){
					include_once '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../Models/MATCH_MODEL.php';
				}


				$datos = $modelo->SEARCHMYPROMOTIONS();
				$lista = array('ID Partido','Login');

				
				new SHOWCURRENTS_PROMOTIONS($lista, $datos);


		break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= new MATCH_MODEL($_REQUEST['id_partido'],$_REQUEST['id_pista'], $_REQUEST['hora_inicio'],$_REQUEST['hora_fin'], $_REQUEST['fecha']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador Partido','Identificador de Pista', 'Hora Inicio', 'Hora Fin', 'Fecha Promoción');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL($_REQUEST['id_partido'],$_REQUEST['id_pista'], $_REQUEST['hora_inicio'],$_REQUEST['hora_fin'], $_REQUEST['fecha']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Match_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_MATCH_VIEW($valores);
				}

				else{

					 include_once '../Models/MATCH_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./Match_Controller.php');
				}
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/MATCH_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:

		 //include_once '../Functions/funciones.php';

		

				if (!$_POST){
					include_once '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../Models/MATCH_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('Identificador Partido','Identificador de Pista', 'Hora Inicio', 'Hora Fin', 'Fecha Promoción');

				
				new SHOWALL_VIEW($lista, $datos);

		

		

}






 ?>