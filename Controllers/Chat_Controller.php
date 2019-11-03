
<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAT_VIEW/SHOWALL_VIEW.php';
include '../Views/Message_View.php';

function get_data(){
	$id_chat = $_REQUEST['id_chat'];
	$login ='';
	$mensaje ='';
	$fecha_mensaje = '' ;
	$hora_mensaje='';
	$action = $_REQUEST['action'];

	$CHAT = new CHAT_MODEL(
		$id_chat, 
		$login,
		$mensaje,
		$fecha_mensaje,
		$hora_mensaje,
		$action
	);

	return $CHAT;
}





Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/CHAT_MODEL.php';
				 
				  $modelo= new CHAT_MODEL(' ',$_REQUEST['login'], $_REQUEST['mensaje'],$_REQUEST['fecha_mensaje'], $_REQUEST['hora_mensaje']);

					$respuesta = $modelo->ADD();
					$all= new CHAT_MODEL('','','','','');

					
                     $datos = $all->SEARCH();
					$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');

				
				new SHOWALL_VIEW($lista, $datos);
					
				}
				break;
			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/CHAT_MODEL.php';
					$modelo= new CHAT_MODEL($_REQUEST['id_chat'],$_REQUEST['login'], $_REQUEST['mensaje'],$_REQUEST['fecha_mensaje'], $_REQUEST['hora_mensaje']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa', 'ID Grupo');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			






		case 'DELETE':

					 include_once '../Models/CHAT_MODEL.php';
					
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					$all= new CHAT_MODEL('','','','','');

					
                     $datos = $all->SEARCH();
					$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');

				
					new SHOWALL_VIEW($lista, $datos);
					
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/CHAT_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:

				if (!$_POST){
					include_once '../Models/CHAT_MODEL.php';
					$all = new CHAT_MODEL(' ' ,' ' ,' ', ' ', ' ');
				}
				else{
					  include_once '../Models/CHAT_MODEL.php';
					   
						

				}

				$datos = $all->SEARCH();
				$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');

				
				new SHOWALL_VIEW($lista, $datos);

		

		

}






 ?>