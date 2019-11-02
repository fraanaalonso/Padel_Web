
<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAT_VIEW/SHOWALL_VIEW.php';
include '../Views/CHAT_VIEW/SHOW_CURRENT.php';
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
				  include_once '../Models/USER_MODEL.php';
				  $modelo= new CHAT_MODEL(' ',$_REQUEST['login'], $_REQUEST['mensaje'],$_REQUEST['fecha_mensaje'], $_REQUEST['hora_mensaje']);

					$respuesta = $modelo->ADD();
					$modelo2= new CHAT_MODEL('','','','','');

					
                     $respuesta2 = $modelo2->SEARCH();

                     $obj = new User_Modelo($_SESSION['login'],'','', '', '', '', '', '', '','','','');
					$respuesta2 = $modelo2->SEARCH();
					$valor = $obj->RellenaDatos();
					$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');
					new SHOWALL_VIEW($lista, $respuesta2, $valor);
					
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
					 include_once '../Models/USER_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					$modelo2= new CHAT_MODEL('','','','','');

					
                     $respuesta2 = $modelo2->SEARCH();

                     $obj = new User_Modelo($_SESSION['login'],'','', '', '', '', '', '', '','','','');
					$respuesta2 = $modelo2->SEARCH();
					$valor = $obj->RellenaDatos();
					$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');
					new SHOWALL_VIEW($lista, $respuesta2, $valor);
					
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

				include_once '../Models/USER_MODEL.php';
				$obj = new User_Modelo($_SESSION['login'],'','', '', '', '', '', '', '','','','');
				$datos = $all->SEARCH();
				$valor = $obj->RellenaDatos();
				$lista = array('ID Chat','Login', 'Mensaje', 'Fecha', 'Hora');

				
				new SHOWALL_VIEW($lista, $datos, $valor);

		

		

}






 ?>