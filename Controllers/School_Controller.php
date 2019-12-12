

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/SCHOOL_VIEWS/SHOWALL_VIEW.php';
include '../Views/SCHOOL_VIEWS/ADD_VIEW.php';
include '../Views/SCHOOL_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/SCHOOL_VIEWS/EDIT_VIEW.php';
include_once '../Views/Message_View.php';





Switch ($_REQUEST['action']){



	case 'ADD':

		if (!$_POST){
					include_once '../Models/SCHOOL_MODEL.php';
					new ADD_VIEW();

				
		
		}
		else{
			 include_once '../Models/SCHOOL_MODEL.php';
			  $modelo= new SCHOOL_MODEL(' ',$_REQUEST['nombre'],$_REQUEST['ubicacion'], $_REQUEST['administrador'], $_REQUEST['capacidad'], $_REQUEST['num_clases']);

			$respuesta = $modelo->ADD();
			new MESSAGE($respuesta,'./School_Controller.php');
					
				}
	 				
				


	break;
			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/SCHOOL_MODEL.php';
					$modelo= new SCHOOL_MODEL($_REQUEST['codigo'],'', '', '','','',);
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/SCHOOL_MODEL.php';
					$modelo = new SCHOOL_MODEL($_REQUEST['codigo'],$_REQUEST['login'], $_REQUEST['ubicacion'],$_REQUEST['login'], $_REQUEST['capacidad'], $_REQUEST['num_clases']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Post_Controller.php');
				}
						
				break;	


		case 'DELETE':
					 include_once '../Models/SCHOOL_MODEL.php';

					$modelo = new SCHOOL_MODEL($_REQUEST['codigo'],'', '', '','','',);
					$respuesta = $modelo->DELETE();
					$all = new SCHOOL_MODEL(' ' ,' ' ,' ', ' ', ' ','');

					
                     $datos = $all->SEARCH();
					$lista = array();

				
					new SHOWALL_VIEW($lista, $datos);
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/SCHOOL_MODEL.php';
			    $modelo = new SCHOOL_MODEL($_REQUEST['codigo'],'','','','','');
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;




	case 'INSCRIBIR':
	if(!$_POST){

	}
	break;



	default:


		if (!$_POST){
					include_once '../Models/SCHOOL_MODEL.php';
					$modelo = new SCHOOL_MODEL(' ' ,' ' ,' ', ' ','','');
				}
				else{
					  include_once '../Models/SCHOOL_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array();

				
				new SHOWALL_VIEW($lista, $datos);



	

		





}







?>