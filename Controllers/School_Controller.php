

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include_once '../Views/SCHOOL_VIEWS/SHOWALL_VIEW.php';






Switch ($_REQUEST['action']){



	case 'ADD':

		if (!$_POST){
					include_once '../Models/SCHOOL_MODEL.php';
					new ADD_VIEW();

				
				}
		else{
			 include_once '../Models/SCHOOL_MODEL.php';
			  $modelo= new SCHOOL_MODEL(' ',$_REQUEST['titulo'],$_REQUEST['subtitulo'], $_REQUEST['cuerpo'], $_REQUEST['fecha'], $_REQUEST['hora']);

			$respuesta = $modelo->ADD();
			new MESSAGE($respuesta,'./Post_Controller.php');
					
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