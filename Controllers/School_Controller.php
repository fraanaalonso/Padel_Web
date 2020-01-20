

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/SCHOOL_VIEWS/SHOWALL_VIEW.php';
include '../Views/SCHOOL_VIEWS/ADD_VIEW.php';
include '../Views/SCHOOL_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/SCHOOL_VIEWS/EDIT_VIEW.php';
include '../Views/SCHOOL_VIEWS/INSCRIP_ESCUELA_VIEW.php';
include '../Views/CLASS_VIEWS/SHOW_CLASES.php';
include '../Views/CLASS_VIEWS/SHOWSCHOOL_CLASS.php';
include_once '../Views/Message_View.php';
require_once '../Functions/funciones.php';




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



	if(!inscritoEscuela($_SESSION['login'], $_REQUEST['codigo'])){
	if(!$_POST){
		include_once '../Models/SCHOOL_MODEL.php';
		include_once '../Models/USER_MODEL.php';

		$escuela = new SCHOOL_MODEL($_REQUEST['codigo'],'','','','','');
		$valores = $escuela->RellenaDatos();

		$usuario = new User_Modelo($_SESSION['login'],'','', '', '', '', '', '', '','','','');
		$user = $usuario->RellenaDatos();


		new INSCRIP_ESCUELA_VIEW($valores, $user);

	}

	else{
		include_once '../Models/USER_SCHOOL.php';
		include_once '../Models/SCHOOL_MODEL.php';
		$inscripcion = new USER_SCHOOL($_REQUEST['codigo'], $_REQUEST['login']);
		$inscritos = new USER_SCHOOL($_REQUEST['codigo'], '');
		$escuela = new SCHOOL_MODEL($_REQUEST['codigo'],'','','','','');
		$valores = $escuela->RellenaDatos(); //De aquí saco la capacidad de la escuela

		$numero_inscritos = $inscritos->numMembers($valores[4]);

		if($numero_inscritos){

			new MESSAGE('Plazas Cubiertas', './School_Controller.php');
		}

		else{
		$respuesta = $inscripcion->inscribirEscuela();

		new MESSAGE($respuesta, './School_Controller.php');

	}

	}

}else{
	include_once '../Models/SCHOOL_MODEL.php';

	$clases = new SCHOOL_MODEL($_REQUEST['codigo'],'','','','','');
	$resultado = $clases->mostrarClases();
	$lista = array();

	new SHOWSCHOOL_CLASS($lista, $resultado);

}


	break;


	case 'ADDCLASE':

	

	if(!$_POST){
		$codigo = $_REQUEST['codigo'];

		include_once '../Models/CLASS_MODEL.php';

		$modelo = new CLASS_MODEL(' ' ,' ' ,' ', ' ');

		$datos = $modelo->SEARCH();
		$lista = array();

		new SHOW_CLASES($lista, $datos, $codigo);

	}

	else{
		include_once '../Models/SCHOOL_MODEL.php';

		$obj = new SCHOOL_MODEL($_REQUEST['codigo'],'','','','','');
		$aux = new SCHOOL_MODEL('','','','','','');
		$dato =$obj->RellenaDatos();


		while (list($key, $value) = each($_POST['id_clase'])) {
		$var= $aux->añadirClase($dato[0], $value);
		}

		new MESSAGE($var, '../Controllers/School_Controller.php');

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