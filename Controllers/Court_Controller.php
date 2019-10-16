

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
	$ubicacion ='';
	$num_pista = '';
	$terreno ='';
	$precio = '' ;
	$estado='';
	$action = $_REQUEST['action'];

	$COURT = new COURT_MODEL(
		$id_pista, 
		$ubicacion,
		$num_pista,
		$terreno,
		$precio,
		$estado,
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
				  $modelo= new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['ubicacion'],$_REQUEST['num_pista'], $_REQUEST['terreno'], $_REQUEST['precio'], $_REQUEST['estado']);

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
					$modelo= new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['ubicacion'],$_REQUEST['num_pista'], $_REQUEST['terreno'], $_REQUEST['dimension']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador de Pista', 'Ubicacion ', 'Numero de Pista ', 'Terreno', 'Dimensiones');
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
					$modelo = new COURT_MODEL($_REQUEST['id_pista'],$_REQUEST['ubicacion'],$_REQUEST['num_pista'], $_REQUEST['terreno'], $_REQUEST['precio'], $_REQUEST['estado']);

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
					$modelo =get_data();
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
					$modelo = new COURT_MODEL(' ' ,' ' ,' ', ' ', ' ','');
				}
				else{
					  include_once '../Models/COURT_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('Identificador de Pista', 'Ubicacion ', 'Numero de Pista ', 'Terreno', 'Precio', 'Estado', 'Opciones');

				
				new SHOWALL_VIEW($lista, $datos);

		

}






 ?>