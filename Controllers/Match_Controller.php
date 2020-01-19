

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}


require_once '../Functions/funciones.php';

include '../Views/MATCH_VIEWS/SHOWALL_VIEW.php';
include '../Views/MATCH_VIEWS/ADD_VIEW.php';
include '../Views/MATCH_VIEWS/SEARCH_VIEW.php';
include '../Views/MATCH_VIEWS/ADD_PAY.php';
include '../Views/MATCH_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/MATCH_VIEWS/DELETE_MATCH_VIEW.php';
include '../Views/MATCH_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';
include '../Views/MATCH_VIEWS/Inscripcion_View.php';
include '../Views/MATCH_VIEWS/SHOWCURRENT_PROMOTIONS.php';
include '../Views/MATCH_VIEWS/SHOWINSCRITOS.php';
include '../Views/MATCH_VIEWS/SCHEDULEPROMOTION.php';

function get_data(){
	$id_partido = $_REQUEST['id_partido'];
	$id_pista ='';
	$hora_inicio ='';
	$fecha='';
	$action = $_REQUEST['action'];

	$MATCH = new MATCH_MODEL(
		$id_partido, 
		$id_pista,
		$hora_inicio,
		$fecha,
		$action
	);

	return $MATCH;
}


Switch ($_REQUEST['action']){

	
		case 'INSERTAR':
				

				if(!$_POST){

				include_once '../Models/COURT_MODEL.php';
				$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','');
				$clave = $modelo->RellenaDatos();

				
				new ADD_VIEW($clave);
				
			}
			
				
				break;


		case 'PROMOCIONAR':


		if (!isset($_REQUEST['hora_inicio'])){
		$_REQUEST['hora_inicio'] = '';
		}



		if($_REQUEST['hora_inicio'] != ""){

			include_once '../Models/MATCH_MODEL.php';
			$game = new MATCH_MODEL(' ', $_REQUEST['id_pista'],$_REQUEST['hora_inicio'],$_REQUEST['fecha']);
			$resultado = $game->añadirPromocion();
			

			


			new MESSAGE($resultado, '../Controllers/Match_Controller.php');
		}else{

			include_once '../Models/COURT_MODEL.php';
				$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','');
				$clave = $modelo->RellenaDatos();


			new MESSAGE("Debe seleccionar una hora", "../Controllers/Match_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}

		break;


		case 'SHOWSCHEDULE':

		include_once '../Models/COURT_MODEL.php';
		$modelo = new COURT_MODEL($_REQUEST['id_pista'],'','','','');
		$clave = $modelo->RellenaDatos();
		$fechaSeleccionada = $_POST['fecha'];

		$currentDate = strtotime(date("Y-m-d", time()));
		

		if ($currentDate > strtotime($fechaSeleccionada)){
			new MESSAGE("La fecha seleccionada corresponde a un día ya transcurrido","../Controllers/Match_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}
		
		elseif(checkDeadLine($fechaSeleccionada, date("Y-m-d")) > 7){
			new MESSAGE("Se permiten reservas con un rango máximo de 7 días a partir de la fecha actual", "../Controllers/Match_Controller.php?action=INSERTAR&id_pista=$clave[0]");
		}
		else{

		new SCHEDULEPROMOTION($clave, $fechaSeleccionada);
		}

		break;

		case 'INSCRIBIR':


	
			
			if(!$_POST){
				include_once '../Models/MATCH_MODEL.php';
				$clave = get_data();
				$respuesta = $clave->RellenaDatos();

				new Inscripcion_View($respuesta);


			}
			else{

			include_once '../Models/MATCH_MODEL.php';
			include_once '../Models/USER_MODEL.php';
			include_once '../Models/COURT_MODEL.php';
			include_once '../Models/PAYMENT_MODEL.php';
			$id_partido = $_POST['id_partido'];
			$modelo = new MATCH_MODEL($id_partido,'','','');

			if(inscritoEnPromocion($_SESSION['login'], $id_partido)){

				new MESSAGE('Ya está inscrito en la promoción seleccionada. No puede volver a inscribirse', "../Controllers/Match_Controller.php");
			}
			
			else{

			$respuesta = $modelo->inscribirPromocion($_SESSION['login']);

			if(comprobarNumeroInscritos($id_partido)){
				$pago = new PAYMENT_MODEL('',"Promocion partido".$id_partido."", '5.5', 'Pendiente', $_SESSION['login']);
				$insert = $pago->añadirPago();
			}



			new MESSAGE($respuesta, './Match_Controller.php?action=SHOWMYPROMOTIONS');
		
		}
		}


	


		break;		

		case 'SHOWMYPROMOTIONS':

		if (!$_POST){
					include_once '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL(' ' ,' ' ,' ', ' ');
				}
				else{
					  include_once '../Models/MATCH_MODEL.php';
				}


				$datos = $modelo->SEARCHMYPROMOTIONS();
				$lista = array('ID Partido','Login');

				
				new SHOWCURRENT_PROMOTIONS($lista, $datos);


		break;


		case 'SHOWINSCRITOS':

			 include '../Models/MATCH_MODEL.php';
					$modelo = get_data();

					

					$respuesta = $modelo->SEARCHINSCRITOS();

					new SHOWINSCRITOS($respuesta);


		break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= new MATCH_MODEL($_REQUEST['id_partido'],$_REQUEST['id_pista'], $_REQUEST['hora_inicio'], $_REQUEST['fecha']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador Partido','Identificador de Pista', 'Hora Inicio', 'Fecha Promoción');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL($_REQUEST['id_partido'],$_REQUEST['id_pista'], $_REQUEST['hora_inicio'], $_REQUEST['fecha']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Match_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/MATCH_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_MATCH_VIEW($valores);
				}

				else{

					 include_once '../Models/MATCH_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./Match_Controller.php');
				}
					
					break;

		case 'TRAMITE':

		include_once '../Models/PAYMENT_MODEL.php';

		
		$idpago = $_REQUEST['id_pago'];
		new ADD_PAY($idpago);
		break;


		case 'PAY':
		include_once '../Models/PAYMENT_MODEL.php';

		$idpago = $_REQUEST['id_pago'];

		$pago = new PAYMENT_MODEL($idpago,'','','','');
		$insert = $pago->changeStatus();

			
		new MESSAGE($insert, './Match_Controller.php');


		break;


		case 'DELETEMYPROMOTION':

					 include_once '../Models/USER_GAME_MODEL.php';
					 include_once '../Models/MATCH_MODEL.php';

					$modelo = new USER_GAME_MODEL($_REQUEST['login'], $_REQUEST['id_partido']);
					$respuesta = $modelo->DELETEMYPROMOTION();
					$all = new MATCH_MODEL(' ' ,' ' ,' ', ' ', ' ');

					
                     $datos = $all->SEARCHMYPROMOTIONS();
					$lista = array('ID Partido','Login');

				
					new SHOWCURRENT_PROMOTIONS($lista, $datos);
					
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/MATCH_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:



				if (!$_POST){
					include_once '../Models/MATCH_MODEL.php';
					$modelo = new MATCH_MODEL(' ' ,' ' ,' ', ' ');
				}
				else{
					  include_once '../Models/MATCH_MODEL.php';
					  
				}

				$resul = $modelo->SEARCH();
				$arreglo = array('Identificador Partido','Identificador de Pista', 'Hora Inicio', 'Fecha Promoción');
				
				new SHOWALL_VIEW($arreglo, $resul);

		

		

}






 ?>