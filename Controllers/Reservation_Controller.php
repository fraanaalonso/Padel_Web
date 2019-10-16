

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
include '../Views/RESERVATION_VIEWS/DELETE_VIEW.php';
include '../Views/RESERVATION_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



function get_data(){
	$id_reserva = $_REQUEST['id_reserva'];
	$id_pista ='';
	$login = '';
	$action = $_REQUEST['action'];

	$RESERVATION = new RESERVATION_MODEL(
		$id_reserva, 
		$id_pista,
		$login,
		$action
	);

	return $RESERVATION;
}


Switch ($_REQUEST['action']){

		/*Reservamos una pista*/
		case 'ADD':


			if(!$_POST){

				
				new ADD_VIEW();
			}

			include_once '../Models/RESERVATION_MODEL.php';
				


			$pista = new COURT_MODEL($_REQUEST['id_pista'],'','','','','');
			$pista->ocupadaPista();

			$id_reserva = new COURT_MODEL('','','','','','');
			$id_reserva->generarCodigo(6);

			$reserva = new RESERVATION_MODEL($_REQUEST['id_reserva'], $_REQUEST['id_pista'], $_SESSION['login']);

				$resultado = $reserva->AÑADIRRESERVA();


				new MESSAGE($resultado, '../Controllers/Reservation_Controller.php');

				
							
				break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= new RESERVATION_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['fecha'], $_REQUEST['hora']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Código Reserva', 'Identificador Pista ', 'Login ', 'Fecha de Reserva', 'Hora de Reserva');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= new RESERVATION_MODEL($_REQUEST['id_reserva'],'', '', '');
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/RESERVATION_MODEL.php';
					$modelo = new RESERVATION_MODEL($_REQUEST['id_reserva'],$_REQUEST['id_pista'],$_REQUEST['login'], $_REQUEST['fecha'], $_REQUEST['hora']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Reservation_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/RESERVATION_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW($valores);
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

				if (!$_POST){
					include_once '../Models/RESERVATION_MODEL.php';
					$modelo = new RESERVATION_MODEL(' ' ,' ' ,' ');
				}
				else{
					  include_once '../Models/RESERVATION_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('  Código de Reserva  ', 'Identificador de Pista', '  Login  ');

				
				new SHOWALLL_VIEW($lista, $datos);

		

}






 ?>