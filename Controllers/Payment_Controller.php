

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include_once '../Models/PAYMENT_MODEL.php';
include_once '../Models/COURT_MODEL.php';
include '../Views/COURT_VIEWS/SHOWALL_VIEW.php';
include '../Views/PAYMENT_VIEWS/SHOWALL_VIEW.php';
include '../Views/PAYMENT_VIEWS/ADD_VIEW.php';
include '../Views/PAYMENT_VIEWS/SEARCH_VIEW.php';
include '../Views/PAYMENT_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/PAYMENT_VIEWS/DELETE_VIEW.php';
include '../Views/PAYMENT_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



function get_data(){
	$id_reserva = $_REQUEST['id_reserva'];
	$id_pista ='';
	$login = '';
	$hora_inicio = '';
	$fecha = '';
	$action = $_REQUEST['action'];

	$DELAMAISTER = new PAYMENT_MODEL(
		$id_reserva, 
		$id_pista,
		$login,
		$hora_inicio,
		$fecha,
		$action
	);

	return $DELAMAISTER;
}


Switch ($_REQUEST['action']){

		/*Reservamos una pista*/
		case 'PAY':


			if(!$_POST){

				include_once '../Models/RESERVATION_MODEL.php';
				$modelo = new RESERVATION_MODEL($_REQUEST['id_pista'],'','','','');
				$clave = $modelo->RellenaDatos();

				
				new ADD_VIEW($clave);
				
			}

			include_once '../Models/PAYMENT_MODEL.php';
				

			$reserva = new PAYMENT_MODEL(' ', $_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'],$_REQUEST['fecha']);

			$resultado = $reserva->ADD();


			new MESSAGE($resultado, '../Controllers/DELAMAISTER_Controller.php');

				
							
				break;



			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/PAYMENT_MODEL.php';
					$modelo= new PAYMENT_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'], $_REQUEST['fecha']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Código Reserva', 'Identificador Pista ', 'Login ', 'Fecha de Reserva', 'Hora de Reserva');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/PAYMENT_MODEL.php';
					$modelo= new PAYMENT_MODEL($_REQUEST['id_reserva'],'', '', '','');
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include_once '../Models/PAYMENT_MODEL.php';
					$modelo = new PAYMENT_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['hora_inicio'], $_REQUEST['fecha']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './DELAMAISTER_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/PAYMENT_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW_DELAMAISTER($valores);
				}

				else{

					 include_once '../Models/PAYMENT_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./DELAMAISTER_Controller.php');
				}
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/PAYMENT_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:
		 include_once '../Functions/funciones.php';

		 if(!comprobarTabla()){

				if (!$_POST){
					include_once '../Models/PAYMENT_MODEL.php';
					$modelo = new PAYMENT_MODEL(' ' ,' ' ,' ','','');
				}
				else{
					  include_once '../Models/PAYMENT_MODEL.php';
				}
				

				

				$datos = $modelo->SEARCH();
				$lista = array('  Código de Reserva  ', 'Identificador de Pista', '  Login  ', 'Comienzo Partido', 'Fecha del Partido');
				new SHOWALLL_VIEW($lista, $datos);
		}
		else{
					new MESSAGE('No tiene reservas activas', '../Controllers/Court_Controller.php');
				
			}
		

}



