

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/SCHOOL_VIEWS/SHOWALL_VIEW.php';
include '../Views/SCHOOL_VIEWS/ADD_VIEW.php';
include_once '../Views/Message_View.php';





Switch ($_REQUEST['action']){



	case 'ADD':

		if (!$_POST){
					include_once '../Models/SCHOOL_MODEL.php';
					new ADD_VIEW();

				
		
		}
		else{
			 include_once '../Models/SCHOOL_MODEL.php';
			  $modelo= new SCHOOL_MODEL(' ',$_REQUEST['nombre'],$_REQUEST['ubicacion'], $_REQUEST['administrador']);

			$respuesta = $modelo->ADD();
			new MESSAGE($respuesta,'./School_Controller.php');
					
				}
	 				
				


	break;

	case 'INSCRIBIR':
	if(!$_POST){

	}
	break;



	default:


		if (!$_POST){
					include_once '../Models/SCHOOL_MODEL.php';
					$modelo = new SCHOOL_MODEL(' ' ,' ' ,' ', ' ');
				}
				else{
					  include_once '../Models/SCHOOL_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array();

				
				new SHOWALL_VIEW($lista, $datos);



	

		





}







?>