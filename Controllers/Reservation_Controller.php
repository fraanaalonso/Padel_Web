

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
include '../Views/RESERVATION_VIEWS/SHOWSCHEDULE.php';
include '../Views/RESERVATION_VIEWS/SEARCH_VIEW.php';
include '../Views/RESERVATION_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/RESERVATION_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';
include '../Views/PAYMENT_VIEWS/ADD_VIEW.php';
require_once '../Functions/funciones.php';


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
		case 'INSERTAR':


			if(!$_POST){

				include_once '../Models/COURT_MODEL.php';
				$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','', '');
				$clave = $modelo->RellenaDatos();

				
				new ADD_VIEW($clave);
				
			}		
				break;

		case 'RESERVAR':

		if (!isset($_REQUEST['hora_inicio'])){
		$_REQUEST['hora_inicio'] = '';
		}



		if($_REQUEST['hora_inicio'] != ""){
			include_once '../Models/PAYMENT_MODEL.php';

			/*

			include_once '../Models/RESERVATION_MODEL.php';
			
			$reserva = new RESERVATION_MODEL(' ', $_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'],$_REQUEST['fecha'], $_REQUEST['precio']);

			$resultado = $reserva->ADD();


			$promoCoincidentes = consultarPromocion();

			include_once '../Models/MATCH_MODEL.php';
			$borrado = new MATCH_MODEL($promoCoincidentes[0], '','','');
			$respuesta = $borrado->DELETE();
	    */

			$id_pista = $_REQUEST['id_pista'];
			$login = $_REQUEST['login'];
			$hora_inicio = $_REQUEST['hora_inicio'];
			$fecha = $_REQUEST['fecha'];
			$precio = $_REQUEST['precio'];


			new ADD_PAY($id_pista, $login, $hora_inicio, $fecha, $precio);
		}else{

			include_once '../Models/COURT_MODEL.php';
				$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','', '');
				$clave = $modelo->RellenaDatos();


			new MESSAGE("Debe seleccionar una hora", "../Controllers/Reservation_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}
		break;

		case 'PAY':

		include_once '../Models/RESERVATION_MODEL.php';
		include_once '../Models/PAYMENT_MODEL.php';
			
			$reserva = new RESERVATION_MODEL(' ', $_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'],$_REQUEST['fecha'], $_REQUEST['precio']);
			$pay = new PAYMENT_MODEL('','Reserva', $_SESSION['login']);

			$pago = $pay->añadirPago();
			$resultado = $reserva->ADD();


			$promoCoincidentes = consultarPromocion();

			include_once '../Models/MATCH_MODEL.php';
			$borrado = new MATCH_MODEL($promoCoincidentes[0], '','','');
			$respuesta = $borrado->DELETE();

			new MESSAGE($pay, '../Controllers/Reservation_Controller.php');


		break;


		
		case 'SHOWSCHEDULE':


		include_once '../Models/COURT_MODEL.php';
		$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','', '');
		$clave = $modelo->RellenaDatos();
		$fechaSeleccionada = $_POST['fecha'];
		

		$currentDate = strtotime(date("Y-m-d", time()));

		if ($currentDate > strtotime($fechaSeleccionada)){
			new MESSAGE("La fecha seleccionada corresponde a un día ya transcurrido","../Controllers/Reservation_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}
		
		elseif(checkDeadLine($fechaSeleccionada, date("Y-m-d")) > 7){
			new MESSAGE("Se permiten reservas con un rango máximo de 7 días a partir de la fecha actual", "../Controllers/Reservation_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}
		else{

		new SHOWSCHEDULE($clave, $fechaSeleccionada);
		}


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

				include_once '../Models/RESERVATION_MODEL.php';
				$modelo = get_data();
					$respuesta = $modelo->DELETE();
					$all = new RESERVATION_MODEL(' ' ,' ' ,' ', ' ', ' ','');

					
                     $datos = $all->SEARCH();
					$lista =  array('  Código de Reserva  ', 'Identificador de Pista', '  Login  ', 'Comienzo Partido','Hora Partido','Fecha del Partido', 'Precio', 'Opciones');

				
					new SHOWALLl_VIEW($lista, $datos);
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