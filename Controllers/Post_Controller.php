

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/POST_VIEWS/SHOWALL_VIEW.php';
include '../Views/POST_VIEWS/ADD_VIEW.php';
include '../Views/POST_VIEWS/SEARCH_VIEW.php';
include '../Views/POST_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/POST_VIEWS/DELETE_VIEW.php';
include '../Views/POST_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



function get_data(){
	$id_noticia = $_REQUEST['id_noticia'];
	$titulo ='';
	$subtitulo = '';
	$cuerpo ='';
	$login = '';
	$action = $_REQUEST['action'];

	$NEW = new POST_MODEL(
		$id_noticia, 
		$titulo,
		$subtitulo,
		$cuerpo,
		$login,
		$action
	);

	return $NEW;
}


Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/POST_MODEL.php';
				  $modelo= new POST_MODEL($_REQUEST['id_noticia'],$_REQUEST['titulo'],$_REQUEST['subtitulo'], $_REQUEST['cuerpo'], $_REQUEST['login']);

					$respuesta = $modelo->ADD();
					new MESSAGE($respuesta,'./Post_Controller.php');
					
				}
				break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/POST_MODEL.php';
					$modelo= new POST_MODEL($_REQUEST['id_noticia'],$_REQUEST['titulo'],$_REQUEST['subtitulo'], $_REQUEST['cuerpo'], $_REQUEST['login']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Código', 'Titulo ', 'Subtitulo ', 'Contenido ', 'Login');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/POST_MODEL.php';
					$modelo= new POST_MODEL($_REQUEST['id_noticia'],'','', '', '');
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include_once '../Models/POST_MODEL.php';
					$modelo = new POST_MODEL($_REQUEST['id_noticia'],$_REQUEST['titulo'],$_REQUEST['subtitulo'], $_REQUEST['cuerpo'], $_REQUEST['login']);

					  $respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Post_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/POST_MODEL.php';
					$modelo= new POST_MODEL($_REQUEST['id_noticia'],'', '', '', '');
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW($valores);
				}

				else{

					 include_once '../Models/POST_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./Post_Controller.php');
				}
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/POST_MODEL.php';
			    $modelo = new POST_MODEL($_REQUEST['id_noticia'],'','', '','');
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:

				if (!$_POST){
					include_once '../Models/POST_MODEL.php';
					$modelo = new POST_MODEL(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../Models/POST_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('  Código  ', '  Titulo  ', '  Subtitulo  ', '  Contenido  ', 'Login' ,'  Opciones  ');

				
				new SHOWALL_VIEW($lista, $datos);

		

}






 ?>