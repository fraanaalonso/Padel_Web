


<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAMPIONSHIP_VIEWS/SHOWALL_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/ADD_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/SEARCH_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/PAY_CHAMPIONSHIP.php';
include '../Views/CLASH_VIEWS/SHOWCUARTOS.php';
include '../Views/CLASH_VIEWS/SHOWSEMIS.php';
include '../Views/CLASH_VIEWS/SHOWFINAL.php';
include '../Views/CHAMPIONSHIP_VIEWS/DELETE_CHAMPIONSHIP_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/EDIT_VIEW.php';
include '../Views/CHAMPIONSHIP_VIEWS/InscribirCampeonatoView.php';
include '../Views/CHAMPIONSHIP_VIEWS/SHOWGRUPOS_CAMPEONATO.php';
include '../Views/RULE_VIEWS/SHOWRULE.php';
include '../Views/Message_View.php';
include '../Views/ALERT.php';
include '../Views/CLASH_VIEWS/CLASH_SHOWALL.php';
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
					$modelo= new CHAMPIONSHIP_MODEL(' ',$_REQUEST['fecha_inicio'], $_REQUEST['fecha_limite'],$_REQUEST['id_normativa']);
					$currentDate = strtotime(date("Y-m-d", time()));

					if(checkDeadLine($_REQUEST['fecha_limite'], $_REQUEST['fecha_inicio']) >= 0){
						new MESSAGE('Rango de fechas erróneo', './Championship_Controller.php');
					}

					else{

					if($currentDate > strtotime($_REQUEST['fecha_inicio']) || $currentDate > strtotime($_REQUEST['fecha_limite'])){
						new MESSAGE('Ha seleccionado días ya transcurridos', './Championship_Controller.php');
					}

					else{

				

					$respuesta = $modelo->ADD();

					$obj = new CHAMPIONSHIP_MODEL('','','','');
					$dato =$obj->obtenerUltimoCampeonato();


					while (list($key, $value) = each($_POST['id_categoria'])) {
						$var= $aux->añadirCategoria($dato[0], $value);
					}

					while (list($key, $value) = each($_POST['id_nivel'])) {
						$var= $aux->añadirNiveles($dato[0], $value);
					}

/*

					$categorias = $_POST['id_categoria'];
					$niveles  = $_POST['id_nivel'];

					for($i = 0; $i < count($categorias); $i++){
						for($j = 0; $j < count($niveles); $j++){
							$categoria = $categorias[$i];
							$nivel = $niveles[$j];

							$var = $aux2->generarGruposInscripcion($categoria, $nivel, $dato[0]);
						}
					}

					

*/

					new MESSAGE($respuesta,'./Championship_Controller.php');
				}

				

				}
				}
					
				
				break;

		case 'GENERARCALENDARIO':

			include_once '../Models/CLASH_MODEL.php';
			include_once '../Models/CHAMPIONSHIP_MODEL.php';
			include_once '../Models/RANKING_MODEL.php';

			$camp = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'], '','','','');
			$volver = $camp->RellenaDatos();

			if(!$_POST){

				if(!comprobarSiExistenEnfrentamiento($_REQUEST['id_campeonato'], $_REQUEST['id_grupo'], 'liga')){

				$currChampionship = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'], '','','','');
				$respuesta = $currChampionship->combinarParejas($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);

				$ranking = new RANKING_MODEL('','','','');
				$regRanking = new RANKING_MODEL('','','','');
				$result = $ranking->getRanking($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
				$fila = array();


				while($fila = $result->fetch_assoc()){
					$regRanking->anhadirRanking($fila['pareja']);
				}



				new MESSAGE($respuesta, "../Controllers/Championship_Controller.php?action=GENERARGRUPOS&id_campeonato=$volver[0]");
			}
			else{
				new MESSAGE('El Calendario ya ha sido generado previamente', "../Controllers/Championship_Controller.php?action=GENERARGRUPOS&id_campeonato=$volver[0]" );
			}

			}

			break;

	case 'CUARTOS':

	$grupo = $_REQUEST['id_grupo'];

	include_once '../Models/CLASH_MODEL.php';
	include_once '../Models/CHAMPIONSHIP_MODEL.php';
	$camp = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'], '','','','');
	$volver = $camp->RellenaDatos();

	$fase = new CLASH_MODEL('', $_REQUEST['id_campeonato'], '','','','','','','','liga', $_REQUEST['id_grupo']);
	$objeto = $fase->accesoPlayoffs();

	if ($objeto == 'false') {

	if(!comprobarSiExistenEnfrentamiento($_REQUEST['id_campeonato'], $_REQUEST['id_grupo'], 'cuartos')){

	$champ = new CHAMPIONSHIP_MODEL('','','','');
	$octavos = $champ->cuartosPlayoffs($_REQUEST['id_campeonato'], $_REQUEST['id_grupo'] );
	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHCUARTOS($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWCUARTOS($datos, $resultado, $_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	}
	else{

	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHCUARTOS($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWCUARTOS($datos, $resultado, $_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	}
	}
	else{
		new MESSAGE('La Fase de Liga Regular no ha terminado todavía.', "../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=$volver[0]&id_grupo=$grupo");
	}

	break;


	case 'SEMIS':

	include_once '../Models/CLASH_MODEL.php';
	include_once '../Models/CHAMPIONSHIP_MODEL.php';

	$grupo = $_REQUEST['id_grupo'];

	$camp = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'], '','','','');
	$volver = $camp->RellenaDatos();

	$fase = new CLASH_MODEL('', $_REQUEST['id_campeonato'], '','','','','','','','cuartos', $_REQUEST['id_grupo']);
	$objeto = $fase->accesoPlayoffs();

	if ($objeto == 'false') {

	if(!comprobarSiExistenEnfrentamiento($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo'], 'semifinales')){

	$champ = new CHAMPIONSHIP_MODEL('','','','');
	$cuartos = $champ->semisPlayoffs($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHSEMIS($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWSEMIS($datos, $resultado,  $_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	}
	else{

	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHSEMIS($_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWSEMIS($datos, $resultado,  $_REQUEST['id_campeonato'],  $_REQUEST['id_grupo']);
	}

	}
	else{
		new MESSAGE('La Fase de Cuartos no ha terminado todavía', "../Controllers/Championship_Controller.php?action=CUARTOS&id_campeonato=$volver[0]&id_grupo=$grupo");
	}
		
	break;

	case 'FINAL':

	include_once '../Models/CLASH_MODEL.php';
	include_once '../Models/CHAMPIONSHIP_MODEL.php';

	$grupo = $_REQUEST['id_grupo'];

	$camp = new CHAMPIONSHIP_MODEL($_REQUEST['id_campeonato'], '','','','');
	$volver = $camp->RellenaDatos();

	$fase = new CLASH_MODEL('', $_REQUEST['id_campeonato'], '','','','','','','','semifinales', $_REQUEST['id_grupo'] );
	$objeto = $fase->accesoPlayoffs();

	if ($objeto == 'false') {



	if(!comprobarSiExistenEnfrentamiento($_REQUEST['id_campeonato'], $_REQUEST['id_grupo'], 'final')){

	$champ = new CHAMPIONSHIP_MODEL('','','','');
	$cuartos = $champ->finalPlayoffs($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHFINAL($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWFINAL($datos, $resultado,  $_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	}
	else{

	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHFINAL($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	$datos = array();


	new SHOWFINAL($datos, $resultado,  $_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	}
	}
	else{
		new MESSAGE('La Fase de Semifinales no ha terminado todavía', "../Controllers/Championship_Controller.php?action=SEMIS&id_campeonato=$volver[0]&id_grupo=$grupo");
	}



	break;


	case 'SHOWENFRENTAMIENTOS':
	include_once '../Models/CLASH_MODEL.php';

	$modelo = new CLASH_MODEL('','','','','','','','','','','','');
	$resultado = $modelo->SEARCHCLASHBYCATNIV($_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);
	$datos = array();


	new CLASH_SHOWALL($datos, $resultado, $_REQUEST['id_campeonato'], $_REQUEST['id_grupo']);

	break;

	case 'GENERARGRUPOS':

	if(!$_POST){

	  
	  $grupo1 = obtenerGrupoCampeonato($_REQUEST['id_campeonato']);
	

	  $lista = array();
	  new SHOWGRUPOS_CAMPEONATO($lista, $grupo1);
	}

	break;

	case 'PAY':


			$id_campeonato = $_REQUEST['id_campeonato'];
			$fecha_inicio = $_REQUEST['fecha_inicio'];
			$fecha_limite = $_REQUEST['fecha_limite'];
			$id_normativa = $_REQUEST['id_normativa'];
			$id_nivel = $_REQUEST['id_nivel'];
			$id_categoria = $_REQUEST['id_categoria'];
			$login2 = $_REQUEST['login2'];
			$login1 = $_REQUEST['login1'];
			$password = $_REQUEST['password'];

			$datos = array($id_campeonato,$fecha_inicio, $fecha_limite, $id_normativa, $id_nivel, $id_categoria, $login2, $login1, $password);


			new PAY_CHAMPIONSHIP($datos);

		

	break;




		case 'REGISTRAR':


			if(!$_POST){

				include_once '../Models/CHAMPIONSHIP_MODEL.php';
				include_once '../Models/USER_MODEL.php';
				include_once '../Models/GROUP_MODEL.php';
				include_once '../Models/GENDER_MODEL.php';
					$modelo= get_data();
					$modelo2 = new GROUP_MODEL('','','','');
					$modelo3 = new GENDER_MODEL('','');
					$aux = new User_Modelo('','','','','','','','','','','','');

					
					$valores= $modelo->RellenaDatos(); 
					$niveles = $modelo2->getDBDatosNivel($valores[0]);
					$categorias = $modelo3->getDBDatosCategorias($valores[0]);

					new InscribirCampeonatoView($valores,$niveles, $categorias);
			}

			else{

			include_once '../Models/COUPLE_CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_MODEL.php';
			include_once '../Models/USER_MODEL.php';
			include_once '../Models/CHAMPIONSHIP_MODEL.php';
			include_once '../Models/COUPLE_CATEGORIA_MODEL.php';
			include_once '../Models/COUPLE_GRUPO_MODEL.php';
			include_once '../Models/COUPLE_NIVEL_MODEL.php';
			include_once '../Models/GROUP_MODEL.php';
			include_once '../Models/PAYMENT_MODEL.php';

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

		

			$user1 = new User_Modelo($capitan, '','','','','','','','','','','');
			$user2 = new User_Modelo($socio, '','','','','','','','','','','');

			$sexoCapitan = $user1->RellenaDatos();
			$sexoSocio = $user2->RellenaDatos();

			if(($sexoCapitan[7] == 'Masculino' && $categoriaSeleccionada == '2') || ($sexoSocio[7] == 'Masculino' && $categoriaSeleccionada == '2') || ($sexoSocio[7]== 'Femenino' && $categoriaSeleccionada=='1') || ($sexoCapitan[7]=='Femenino' && $categoriaSeleccionada=='1')){
				new MESSAGE('Categorias Erróneas', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
			}

			else{

			if(esInscrito($capitan, $socio, $id_campeonato)){
				new MESSAGE('Uno de los usuarios ya está inscrito en el campeonato', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
			}
			else{

				if(($sexoCapitan[7] == 'Masculino' && $sexoSocio[7] == 'Masculino' && $categoriaSeleccionada=='3') || ($sexoCapitan[7] == 'Femenino' && $sexoSocio[7] == 'Femenino' && $categoriaSeleccionada=='3')){
					new MESSAGE('Para la categoría Mixta los sexos de los participantes deben ser opuestos', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]" );
				}
				else{

				if($socio == $_SESSION['login']){
					new MESSAGE('Emparejamiento incorrecto', "./Championship_Controller.php?action=REGISTRAR&id_campeonato=$currentChamp[0]");
				}
				else{
			$aux3 = new CHAMPIONSHIP_MODEL('','','','');

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

			$nuevo = new GROUP_MODEL('',$categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);
			$nuevo2 = new GROUP_MODEL('',$categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);
			$existe = $nuevo->siExiste();
			$currGroup = $nuevo2->currentGroup();

			if($existe == 'true'){

			$grupo = new GROUP_MODEL(' ', $categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);
			$resp = $grupo->ADD();

			$lastGroup = obtenerGrupo($categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);

			$parejaGrupo = new COUPLE_GRUPO_MODEL($dato[0], $lastGroup[0], $id_campeonato);
			$result5 = $parejaGrupo->ADD();

			}

			else{

			$getChampionship = new CHAMPIONSHIP_MODEL('','','','');
			$currentGroupSelected = $getChampionship->testNumMaxMembers($id_campeonato, $currGroup[0]);


			
			if($currentGroupSelected =='true'){
			$grupo = ultimoGrupo($categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);

			$parejaGrupo = new COUPLE_GRUPO_MODEL($dato[0], $grupo[0], $id_campeonato);
			$result5 = $parejaGrupo->ADD();
			}

			else{
			$grupo = new GROUP_MODEL(' ', $categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);
			$resp = $grupo->ADD();

			$lastGroup = ultimoGrupo($categoriaSeleccionada, $nivelSeleccionado, $id_campeonato);

			$parejaGrupo = new COUPLE_GRUPO_MODEL($dato[0], $lastGroup[0], $id_campeonato);
			$result5 = $parejaGrupo->ADD();
			}


			}



				

			$pago = new PAYMENT_MODEL('','Campeonato', '34.99', 'Pagado', $_SESSION['login']);

			$resultado = $pago->añadirPago();



			new MESSAGE($result5, './Championship_Controller.php');
		}
		}
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
					$lista = array('Identificador de Campeonato','Inicio Campeonato', 'Límite de Inscripción', 'ID Normativa');
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






 ?>