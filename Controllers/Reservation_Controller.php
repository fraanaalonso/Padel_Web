

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include_once '../Models/RESERVATION_MODEL.php';
include_once '../Models/COURT_MODEL.php';
include '../Views/COURT_VIEWS/SHOWALL_VIEW.php';
include '../Views/RESERVATION_VIEWS/SHOWALL_VIEW.php';
include '../Views/RESERVATION_VIEWS/ADD_VIEW.php';
include '../Views/RESERVATION_VIEWS/SEARCH_VIEW.php';
include '../Views/RESERVATION_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/RESERVATION_VIEWS/DELETE_VIEW_RESERVATION.php';
include '../Views/RESERVATION_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



function get_data(){
	$id_reserva = $_REQUEST['id_reserva'];
	$id_pista = $_REQUEST['id_pista'];
	$login = '';
	$hora_inicio = '';
	$fecha = '';
	$precio = '';
	$action = $_REQUEST['action'];

	$RESERVATION = new RESERVATION_MODEL(
		$id_reserva, 
		$id_pista,
		$login,
		$hora_inicio,
		$fecha,
		$precio,
		$action
	);

	return $RESERVATION;
}


Switch ($_REQUEST['action']){

		/*Reservamos una pista*/
		case 'RESERVAR':


			if(!$_POST){

				include_once '../Models/COURT_MODEL.php';
				$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','', '');
				$clave = $modelo->RellenaDatos();

				
				new ADD_VIEW($clave);
				
			}

			include_once '../Models/RESERVATION_MODEL.php';
				

			$reserva = new RESERVATION_MODEL(' ', $_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'],$_REQUEST['fecha'], $_REQUEST['precio']);

			$resultado = $reserva->ADD();


			new MESSAGE($resultado, '../Controllers/Reservation_Controller.php');

				
							
				break;



			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= new RESERVATION_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'], $_REQUEST['fecha'], $_REQUEST['precio']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Código Reserva', 'Identificador Pista ', 'Login ', 'Hora de Reserva', 'Fecha de Reserva', 'Precio Pista');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo = new RESERVATION_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'], $_REQUEST['fecha'], $_REQUEST['precio']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Reservation_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW_RESERVATION($valores);
				}

				else{

					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./Reservation_Controller.php');
				}
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/RESERVATION_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:
		 include_once '../Functions/funciones.php';

		 if(!comprobarTabla()){

				if (!$_POST){
					include_once '../Models/RESERVATION_MODEL.php';
					$modelo = new RESERVATION_MODEL(' ' ,' ' ,' ','','','');
				}
				else{
					  include_once '../Models/RESERVATION_MODEL.php';
				}
				

				

				$datos = $modelo->SEARCH();
				$lista = array('  Código de Reserva  ', 'Identificador de Pista', '  Login  ', 'Comienzo Partido','Hora Partido','Fecha del Partido', 'Precio');
				new SHOWALLL_VIEW($lista, $datos);
		}
		else{
					new MESSAGE('No tiene reservas activas', '../Controllers/Court_Controller.php');
				
			}
		

}






 ?>