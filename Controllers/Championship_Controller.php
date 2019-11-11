

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
include '../Views/CHAMPIONSHIP_VIEWS/SHOW_GENDER.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOW_GROUP.php';
include '../Views/RULE_VIEWS/SHOWRULE.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';

require_once '../Functions/funciones.php';

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




Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){

			
				 include_once '../Models/GENDER_MODEL.php';
				 include_once '../Models/GROUP_MODEL.php';
				 include_once '../Models/RULE_MODEL.php';
				  
				  	$aux1 = new GENDER_MODEL('','');
				  	$aux2 = new GROUP_MODEL('','');
				  	$aux3 = new RULE_MODEL('','');

				  	$consultaNormativas = $aux3->getDBDatosNormativas();
				  	$consultaCategorias = $aux1->getDBDatosCategorias();
				  	$consultaGrupos = $aux2->getDBDatosGrupos();
					
					new ADD_VIEW($consultaNormativas,$consultaCategorias,$consultaGrupos);
				
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
				include_once '../Models/USER_MODEL.php';
					$modelo= get_data();
					$aux = new User_Modelo('','','','','','','','','','','','');
					$toret = new CHAMPIONSHIP_MODEL('','','','','','');
					$valores= $modelo ->RellenaDatos();
					$datos = $toret->getDBDatosCampeonato($valores['id_campeonato']);
					$consulta = $aux->getDBDatosUser();

				

					new InscribirCampeonatoView($valores,$datos, $consulta);
			}

			else{

			include_once '../Models/COUPLE_CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_MODEL.php';

			$id_pareja = $_POST['id_pareja'];
			$id_campeonato = $_POST['id_campeonato'];
			$pareja = new COUPLE_MODEL($id_pareja, $_REQUEST['id_categoria'], $_REQUEST['id_grupo'], $_REQUEST['login1'], $_REQUEST['login2']);
			$result = $pareja->REGISTRARPAREJA();

			$obj = new COUPLE_MODEL('','','','','');
			$dato = $obj->obtenerUltimoInscrito();
	
			$pareja_campeonato = new COUPLE_CHAMPIONSHIP_MODEL($dato[0],$id_campeonato);
			

		
			$result2 = $pareja_campeonato->ADD();
			

		

			

			new MESSAGE($result, './Championship_Controller.php');


		}
			
		break;




		case 'SHOWNORMATIVA':
			 include_once '../Models/RULE_MODEL.php';

			    $modelo = new RULE_MODEL($_REQUEST['id_normativa'], '');
				$valores = $modelo->RellenaDatos();

				new SHOWRULE($valores);


		break;

		case 'SHOWCATEGORIA':
			 include_once '../Models/GENDER_MODEL.php';

			    $modelo = new GENDER_MODEL($_REQUEST['id_categoria'], '');
				$valores = $modelo->RellenaDatos();

				new SHOWGENDER($valores);


		break;

		case 'SHOWGRUPO':
			 include_once '../Models/GROUP_MODEL.php';

			    $modelo = new GROUP_MODEL($_REQUEST['id_grupo'], '');
				$valores = $modelo->RellenaDatos();

				new SHOWGROUP($valores);


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
					include_once '../Models/GENDER_MODEL.php';
				 	include_once '../Models/GROUP_MODEL.php';
				 	include_once '../Models/RULE_MODEL.php';
					$modelo= get_data();
					$aux1 = new GENDER_MODEL('','');
				  	$aux2 = new GROUP_MODEL('','');
				  	$aux3 = new RULE_MODEL('','');

					$valores= $modelo ->RellenaDatos();  	

				  	$consultaNormativas = $aux3->getDBDatosNormativas();
				  	$consultaCategorias = $aux1->getDBDatosCategorias();
				  	$consultaGrupos = $aux2->getDBDatosGrupos();

					new EDIT_VIEW($valores, $consultaNormativas, $consultaGrupos, $consultaCategorias);
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