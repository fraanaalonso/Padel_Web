

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAMPIONSHIP_VIEWS/SHOWALL_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/ADD_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/SEARCH_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/DELETE_CHAMPIONSHIP_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/EDIT_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/InscribirCampeonatoView.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOW_COUPLE.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';


function get_data(){
	$id_campeonato = $_REQUEST['id_campeonato'];
	$fecha_inicio ='';
	$fecha_limite ='';
	$id_normativa = '' ;
	$id_grupo='';
	$id_categoria='';
	$action = $_REQUEST['action'];

	$CHAMPIONSHIP = new CHAMPIONSHIP_MODEL(
		$id_campeonato, 
		$fecha_inicio,
		$fecha_limite,
		$id_normativa,
		$id_grupo,
		$id_categoria,
		$action
	);

	return $CHAMPIONSHIP;
}


function get_data_couple_championship(){
	include_once '../Models/COUPLE_CHAMPIONSHIP_MODEL.php';
	$id_pareja = '';
	$id_campeonato = '';

	if($_POST){

		if(isset($_POST['id_pareja'])) $id_pareja = $_POST['id_pareja'];
		if(isset($_POST['id_campeonato'])) $id_campeonato = $_POST['id_campeonato'];

		return new COUPLE_CHAMPIONSHIP_MODEL($id_pareja,$id_campeonato);

	} else {

		if(isset($_GET['id_pareja'])) $id_pareja = $_GET['id_pareja'];
		if(isset($_GET['id_campeonato'])) $id_campeonato = $_GET['id_campeonato'];

		return new COUPLE_CHAMPIONSHIP_MODEL($id_pareja,$id_campeonato);

	}
}


Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/CHAMPIONSHIP_MODEL.php';
				  $modelo= new CHAMPIONSHIP_MODEL(' ',$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa'], $_REQUEST['id_grupo'], $_REQUEST['id_categoria']);

					$respuesta = $modelo->ADD();
					new MESSAGE($respuesta,'./Championship_Controller.php');
					
				}
				break;




		case 'REGISTRAR':


			if(!$_POST){

				include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();

				

					new InscribirCampeonatoView($valores);
			}

			include_once '../Models/COUPLE_CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_MODEL.php';

			$pareja = new COUPLE_MODEL(' ', $_REQUEST['id_categoria'], $_REQUEST['id_grupo'], $_REQUEST['login1'], $_REQUEST['login2']);

			$result = $pareja->REGISTRARPAREJA();
			echo $result[0];

			/*
			$modelo = get_data_couple_championship();
			*/

			$porca = new COUPLE_CHAMPIONSHIP_MODEL(' ', $_POST['id_campeonato'] );

			

			$respuesta = $porca->ADD();

			new MESSAGE($respuesta, './Championship_Controller.php?action=SHOWCOUPLES');


			
		break;

		case 'SHOWCOUPLES':


				if (!$_POST){
					include_once '../Models/COUPLE_MODEL.php';
					$modelo = new COUPLE_MODEL(' ' ,' ' ,' ', ' ', ' ','');
				}
				else{
					  include_once '../Models/COUPLE_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('ID Pareja','ID Categoría', 'ID Grupo', 'ID Normativa', 'Login Capitán', 'Login Acompañante');

				
				new SHOWALL_COUPLE($lista, $datos);



		break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo= new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'],$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa'], $_REQUEST['id_grupo'], $_REQUEST['id_categoria']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa', 'ID Grupo');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'],$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa'], $_REQUEST['id_grupo'], $_REQUEST['id_categoria']);

					$respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './Championship_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_CHAMPIONSHIP_VIEW($valores);
				}

				else{

					 include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./Championship_Controller.php');
				}
					
					break;


		case 'SHOWCURRENT':
				 include_once '../Models/CHAMPIONSHIP_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:

		 include_once '../Functions/funciones.php';

		 if(!comprobarTablaCampeonato()){

			

				if (!$_POST){
					include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo = new CHAMPIONSHIP_MODEL(' ' ,' ' ,' ', ' ', ' ',' ');
				}
				else{
					  include_once '../Models/CHAMPIONSHIP_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa', 'ID Grupo');

				
				new SHOWALL_VIEW($lista, $datos);

		}	

		else{
			new ALERT('No hay campeonatos activos');
		}

		

}






 ?>