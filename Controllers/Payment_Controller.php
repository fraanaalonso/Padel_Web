

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}

include_once '../Models/PAYMENT_MODEL.php';
include_once '../Models/COURT_MODEL.php';
include '../Views/PAYMENT_VIEWS/SHOWALL_PAYMENTS.php';
include '../Views/PAYMENT_VIEWS/ADD_VIEW.php';
include '../Views/Message_View.php';
require_once '../Functions/funciones.php';




Switch ($_REQUEST['action']){

		/*Reservamos una pista*/
		case 'PAY':


			if(!$_POST){

				include_once '../Models/RESERVATION_MODEL.php';
				$modelo = new RESERVATION_MODEL($_REQUEST['id_pista'],'','','','');
				$clave = $modelo->RellenaDatos();

				
				new ADD_VIEW($clave);
				
			}

				
							
				break;



		case 'SHOWMYPAYMENTS':

		if(comprobarPendiente()){

			new MESSAGE('No tiene pagos pendientes', './Match_Controller.php');
		}

		else{



		if (!$_POST){
					include_once '../Models/PAYMENT_MODEL.php';
					$modelo = new PAYMENT_MODEL(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../Models/PAYMENT_MODEL.php';
				}
				

				

				$datos = $modelo->SEARCHPAY();
				$lista = array();
				new SHOWALL_PAYMENTS($lista, $datos);

		}

		break;

			



		

}



