

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
include '../Views/CHAMPIONSHIP_VIEWS/GENERARCALENDARIO_View.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOWGRUPOS_CAMPEONATO.php';
include '../Views/RULE_VIEWS/SHOWRULE.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';

require_once '../Functions/funciones.php';

function get_data(){
	$id_campeonato = $_REQUEST['id_campeonato'];
	$fecha_inicio ='';
	$fecha_limite ='';
	$id_normativa = '' ;
	$action = $_REQUEST['action'];

	$CHAMPIONSHIP = new CHAMPIONSHIP_MODEL(
		$id_campeonato, 
		$fecha_inicio,
		$fecha_limite,
		$id_normativa,
		$action
	);

	return $CHAMPIONSHIP;
}




Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){

		
				 include_once '../Models/RULE_MODEL.php';
				  
	
				  	$aux3 = new RULE_MODEL('','');

				  	$consultaNormativas = $aux3->getDBDatosNormativas();
				  	
					
					new ADD_VIEW($consultaNormativas);
				
				}
				else{

					include_once '../Models/CHAMPIONSHIP_MODEL.php';
				 	$aux = new CHAMPIONSHIP_MODEL('','','','');
				 	$aux2 = new CHAMPIONSHIP_MODEL('','','','');
				 	$aux3 = new CHAMPIONSHIP_MODEL('','','','');
					$modelo= new CHAMPIONSHIP_MODEL(' ',$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa']);
					$respuesta = $modelo->ADD();

					$obj = new CHAMPIONSHIP_MODEL('','','','');
					$dato =$obj->obtenerUltimoCampeonato();

					$masculino= $aux->añadirCategoria($dato[0], 1);
					$femenino=$aux->añadirCategoria($dato[0], 2);
					$mixto=$aux->añadirCategoria($dato[0], 3);

					$nivel1 = $aux2->añadirNiveles($dato[0], 1);
					$nivel2 = $aux2->añadirNiveles($dato[0], 2);	
					$nivel3 = $aux2->añadirNiveles($dato[0], 3);

					$grupo1 = $aux3->generarGruposInscripcion('1','1', $dato[0]);
					$grupo2 = $aux3->generarGruposInscripcion('1','2', $dato[0]);
					$grupo3 = $aux3->generarGruposInscripcion('1','3', $dato[0]);
					$grupo4 = $aux3->generarGruposInscripcion('2','1', $dato[0]);
					$grupo5 = $aux3->generarGruposInscripcion('2','2', $dato[0]);
					$grupo6 = $aux3->generarGruposInscripcion('2','3', $dato[0]);
					$grupo7 = $aux3->generarGruposInscripcion('3','1', $dato[0]);
					$grupo8 = $aux3->generarGruposInscripcion('3','2', $dato[0]);
					$grupo9 = $aux3->generarGruposInscripcion('3','3', $dato[0]);



					new MESSAGE($respuesta,'./Championship_Controller.php');
					
				}
				break;

		case 'GENERARCALENDARIO':

			if(!$_POST){

			include_once '../Models/CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_CATEGORIA_MODEL.php';

			$currentChampinship = new CHAMPIONSHIP_MODEL('','','','');

			$championshipData = $currentChampinship->getDataChampionship($_REQUEST['id_campeonato']);
			$coupleCategoriaNivelData = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], $_REQUEST['nivel'], $_REQUEST['categoria']);

			new GENERARCALENDARIO_View($championshipData, $coupleCategoriaNivelData);



			}

			else{

				
			}





		break;

		case 'GENERARGRUPOS':

		if(!$_POST){
		  
		  $grupo1 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Principiante', 'Masculino');
		  $grupo2 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Intermedio', 'Masculino');
		  $grupo3 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Avanzado', 'Masculino');
		  $grupo4 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Principiante', 'Femenino');
		  $grupo5 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Intermedio', 'Femenino');
		  $grupo6 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Avanzado', 'Femenino');
		  $grupo7 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Principiante', 'Mixto');
		  $grupo8 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Intermedio', 'Mixto');
		  $grupo9 = obtenerGrupoCampeonato($_REQUEST['id_campeonato'], 'Avanzado', 'Mixto');

		  $lista = array();
		  new SHOWGRUPOS_CAMPEONATO($lista, $grupo1, $grupo2, $grupo3, $grupo4, $grupo5, $grupo6, $grupo7, $grupo8, $grupo9);
		}

		break;




		case 'REGISTRAR':


			if(!$_POST){

				include_once '../Models/CHAMPIONSHIP_MODEL.php';
				include_once '../Models/USER_MODEL.php';
				include_once '../Models/GROUP_MODEL.php';
				include_once '../Models/GENDER_MODEL.php';
					$modelo= get_data();
					$modelo2 = new GROUP_MODEL('','');
					$modelo3 = new GENDER_MODEL('','');
					$aux = new User_Modelo('','','','','','','','','','','','');

					$niveles = $modelo2->getDBDatosNivel();
					$categorias = $modelo3->getDBDatosCategorias();
					$valores= $modelo ->RellenaDatos(); 

					new InscribirCampeonatoView($valores,$niveles, $categorias);
			}

			else{

			include_once '../Models/COUPLE_CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_MODEL.php';
			include_once '../Models/USER_MODEL.php';
			include_once '../Models/CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_CATEGORIA_MODEL.php';
			//include_once '../Models/COUPLE_GRUPO_MODEL.php';
			include_once '../Models/COUPLE_NIVEL_MODEL.php';

			$id_pareja = $_POST['id_pareja'];
			$id_campeonato = $_POST['id_campeonato'];
			$capitan = $_POST['login1'];
			$socio = $_POST['login2'];
			$nivelSeleccionado = $_POST['id_nivel'];
			$categoriaSeleccionada = $_POST['id_categoria'];

			$championship = new CHAMPIONSHIP_MODEL($id_campeonato,'','','');
			$currentChamp = $championship->RellenaDatos();

			$user = new User_Modelo($socio,'','',$_REQUEST['password'],'','','','','','','','');

			$respuesta = $user->loginExiste();

			if($respuesta != 'true'){
				new MESSAGE("La contraseña para ".$_REQUEST['login2']." es incorrecta ", "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
			}

			else{

			$getChampionship = new CHAMPIONSHIP_MODEL('','','','');
			$currentGroupSelected = $getChampionship->testNumMaxMembers($id_campeonato, $nivelSeleccionado, $categoriaSeleccionada);

			if($currentChamp == 'true'){

				new MESSAGE('Se ha llegado al número máximo de inscritos', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
			}

			else{

			$user1 = new User_Modelo($capitan, '','','','','','','','','','','');
			$user2 = new User_Modelo($socio, '','','','','','','','','','','');

			$sexoCapitan = $user1->RellenaDatos();
			$sexoSocio = $user2->RellenaDatos();

			if(($sexoCapitan[7] == 'Masculino' && $categoriaSeleccionada == '2') || ($sexoSocio[7] == 'Masculino' && $categoriaSeleccionada == '2') || ($sexoSocio[7]== 'Femenino' && $categoriaSeleccionada=='1') || ($sexoCapitan[7]=='Femenino' && $categoriaSeleccionada=='1')){
				new MESSAGE('Categorias Erróneas', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
			}

			else{

			$pareja = new COUPLE_MODEL($id_pareja, $capitan, $socio);
			$result = $pareja->REGISTRARPAREJA();

			$obj = new COUPLE_MODEL('','','','','');
			$dato = $obj->obtenerUltimoInscrito();
	
			$pareja_campeonato = new COUPLE_CHAMPIONSHIP_MODEL($dato[0],$id_campeonato);
			$result2 = $pareja_campeonato->ADD();


			$pareja_categoria = new COUPLE_CATEGORIA_MODEL($categoriaSeleccionada, $dato[0], $id_campeonato);
			$result3 = $pareja_categoria->ADD();

		
			
			$parejaNivel = new COUPLE_NIVEL_MODEL($nivelSeleccionado, $dato[0], $id_campeonato);
			$result4 = $parejaNivel->ADD();
			

			

			new MESSAGE($result4, './Championship_Controller.php');
		}
		}

		}
		}
			
		break;




		case 'SHOWNORMATIVA':
			 include_once '../Models/RULE_MODEL.php';

			    $modelo = new RULE_MODEL($_REQUEST['id_normativa'], '');
				$valores = $modelo->RellenaDatos();

				new SHOWRULE($valores);


		break;


	

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo= new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'],$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa']);

					
                     $respuesta = $modelo->SEARCH();
					$lista = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {

					include_once '../Models/CHAMPIONSHIP_MODEL.php';
				 	include_once '../Models/RULE_MODEL.php';
					$modelo= get_data();
				  	$aux3 = new RULE_MODEL('','');

					$valores= $modelo ->RellenaDatos();  	

				  	$consultaNormativas = $aux3->getDBDatosNormativas();

					new EDIT_VIEW($valores, $consultaNormativas);
				}

				else{

					 include '../Models/CHAMPIONSHIP_MODEL.php';
					$modelo = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'],$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa']);

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
					$modelo = new CHAMPIONSHIP_MODEL(' ' ,' ' ,' ', ' ');
				}
				else{
					  include_once '../Models/CHAMPIONSHIP_MODEL.php';
				}





				$datos = $modelo->SEARCH();
				$lista = array('Identificador de Pista','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa');

				

				
				new SHOWALL_VIEW($lista, $datos);

		}	

		else{
			new ALERT('No hay campeonatos activos');
		}

		

}






 ?>