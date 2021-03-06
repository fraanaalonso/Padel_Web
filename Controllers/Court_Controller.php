

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/COURT_VIEWS/SHOWALL_VIEW.php';
include '../Views/COURT_VIEWS/ADD_VIEW.php';
include '../Views/COURT_VIEWS/SEARCH_VIEW.php';
include '../Views/COURT_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/COURT_VIEWS/DELETE_VIEW.php';
include '../Views/COURT_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



function get_data(){
	$id_pista = $_REQUEST['id_pista'];
	$descripcion ='';
	$ubicacion ='';
	$precio = '' ;
	$action = $_REQUEST['action'];

	$COURT = new COURT_MODEL(
		$id_pista, 
		$descripcion,
		$ubicacion,
		$precio,
		$action
	);

	return $COURT;
}


Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/COURT_MODEL.php';
				  $modelo= new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['descripcion'], $_REQUEST['ubicacion'],$_REQUEST['precio']);

					$respuesta = $modelo->ADD();
					new MESSAGE($respuesta,'./Court_Controller.php');
					
				}
				break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/COURT_MODEL.php';
					$modelo= new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['descripcion'], $_REQUEST['ubicacion'],$_REQUEST['precio']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador de Pista','Descripcion', 'Ubicacion ', 'Precio', 'Estado');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/COURT_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/COURT_MODEL.php';
					$modelo = new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['descripcion'], $_REQUEST['ubicacion'],$_REQUEST['precio']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Court_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/COURT_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW($valores);
				}

				else{

					 include_once '../Models/COURT_MODEL.php';
					  include_once '../Models/RESERVATION_MODEL.php';
					$modelo =get_data();
					$valores= $modelo ->RellenaDatos();
					/*
					$reservas = $modelo->getAllReservations();

					$pistas_assoc = $modelo->getPistas();
					while ($resp = $pistas_assoc->fetch_array()){
						$array [] = $resp['id_pista'];
					}

					$num_pistas = count($array);
					$fetch = $reservas->fetch_array();
					$j = 0;
					while(count($fetch) != 0){


					for ($i = 0; $i < $num_pistas - 1; $i++){

					while ($actual = $reservas->fetch_assoc()){

					$currentReserva = new RESERVATION_MODEL($actual[0],$array[$i], $actual[3] ,$actual[2],$actual[1],$actual[4]);
					$confirmacion = $currentReserva->getReservation();

					if ($confirmacion) {
						$currentReserva->ADD();
						
					}
					}
					}

					unset($fetch[$j]);
					$j++;
					}
					*/
					$respuesta = $modelo->DELETE();



					
				new MESSAGE($respuesta,'./Court_Controller.php');
				
			}
					
					
				
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/COURT_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


		break;


		 default:

				if (!$_POST){
					include_once '../Models/COURT_MODEL.php';
					$modelo = new COURT_MODEL(' ' ,' ' ,' ', ' ');
				}
				else{
					  include_once '../Models/COURT_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array();

				
				new SHOWALL_VIEW($lista, $datos);

		

}






 ?>