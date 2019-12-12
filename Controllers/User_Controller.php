
<?php 

session_start(); //solicito trabajar con la session



if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/USER_VIEWS/SHOWALL_VIEW.php';
include '../Views/USER_VIEWS/ADD_VIEW.php';
include '../Views/PAYMENT_VIEWS/PLAN_VIEW.php';
include '../Views/USER_VIEWS/PAY_VIEW.php';
include '../Views/USER_VIEWS/SEARCH_VIEW.php';
include '../Views/USER_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/USER_VIEWS/DELETE_VIEW.php';
include '../Views/USER_VIEWS/EDIT_VIEW.php';
include '../Views/USER_VIEWS/Profile_View.php';
include '../Views/USER_VIEWS/ADD_NOTIFICATION.php';
include '../Views/USER_VIEWS/SHOWMYPLAN.php';
include '../Views/Message_View.php';
require_once '../Functions/funciones.php';


function get_data(){
	
	$login = $_REQUEST['login'];
	$nombre ='';
	$apellido = '';
	$password ='';
	$dni = '';
	$email = '';
	$pais = '';
	$sexo = '';
	$telefono = '';
	$fecha = '';
	$foto = '';
	$rol_id = '';
	$action = $_REQUEST['action'];

	$USER = new User_Modelo(
		$login, 
		$nombre,
		$apellido,
		$password,
		$dni, 
		$email,
		$pais,
		$sexo,
		$telefono,
		$fecha,
		$foto,
		$rol_id,
		$action
	);

	return $USER;
}


Switch ($_REQUEST['action']){


		case 'EMAIL':

			new ADD_NOTIFICATION();
		break;

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/USER_MODEL.php';
				  $modelo= new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'],$_FILES['foto']['name'], $_REQUEST['rol_id']);




					$nombre_foto = $_FILES['foto']['name'];
					$archivo = $_FILES['foto']['tmp_name'];
					$tipo_imagen = $_FILES['foto']['type'];
					$tamanho_imagen = $_FILES['foto']['size'];
					$ruta = "../img/fotosPerfil";

					if($tamanho_imagen<=3000000 )
					{

					if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif")

					{

					$ruta =$ruta."/".$nombre_foto; //img/nombre.jpg

					move_uploaded_file($archivo, $ruta);
					}
					else{
						echo "Sólo se puede subir imágenes jpg/jpeg/gif/png";
					}


					}

					


					else {
						echo "El tamaño es demasiado grande";
					}

	
					$respuesta = $modelo->ADD();
					new MESSAGE($respuesta,'./User_Controller.php');
					
				}
				break;

			  




		case 'SEARCH':
				if(!$_POST){

					new SEARCH_VIEW();
				}

				else{
					 include_once '../Models/USER_MODEL.php';
					$modelo= new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'], $_REQUEST['foto'],  $_REQUEST['rol_id']);

                     $respuesta = $modelo->BUSCAR();
					$lista = array('Login ', 'Nombre ', 'Apellido ', 'Password ', 'Dni ','Email ','Pais ','Telefono ','Email ','Pais ','Sexo ', 'Telefono ', 'Fecha', 'Foto de Perfil', 'Rol del Usuario', 'Opciones ');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/USER_MODEL.php';
					$modelo= new User_Modelo($_REQUEST['login'],'','', '', '', '', '', '', '','','','');
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include_once '../Models/USER_MODEL.php';
					$modelo = new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'],$_FILES['foto']['name'], $_REQUEST['rol_id']);

					$nombre_foto = $_FILES['foto']['name'];
					$archivo = $_FILES['foto']['tmp_name'];
					$ruta = "../img/fotosPerfil";


					$ruta =$ruta."/".$nombre_foto; //img/nombre.jpg

					move_uploaded_file($archivo, $ruta);

					  $respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './User_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/USER_MODEL.php';
					$modelo= get_data();
					$valores= $modelo ->RellenaDatos();
					new DELETE_VIEW($valores);
				}

				else{

					 include_once '../Models/USER_MODEL.php';
					$modelo =get_data();
					$respuesta = $modelo->DELETE();
					new MESSAGE($respuesta,'./User_Controller.php');
				}
					
			break;


		case 'SHOWCURRENT':

				 include_once '../Models/USER_MODEL.php';
			    $modelo = new User_Modelo($_REQUEST['login'],'','', '', '', '', '', '', '', '','','','');
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;



		case 'SHOWPROFILE':
		
		if(!$_POST){
		include_once '../Models/USER_MODEL.php';

		 $modelo = new User_Modelo($_REQUEST['login'],'','', '', '', '', '', '', '', '','','','');
		 $valores = $modelo->RellenaDatos();

		 new Profile_View($valores);
		}
		else{
		 include_once '../Models/USER_MODEL.php';
					$modelo = new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'],$_FILES['foto']['name'], $_REQUEST['rol_id']);

					$nombre_foto = $_FILES['foto']['name'];
					$archivo = $_FILES['foto']['tmp_name'];
					$ruta = "../img/fotosPerfil";


					$ruta =$ruta."/".$nombre_foto; //img/nombre.jpg

					move_uploaded_file($archivo, $ruta);

					  $respuesta = $modelo->EDIT();
			new MESSAGE($respuesta, './Post_Controller.php');

		}

		break;

		case 'PLAN':

		if(esSocio($_SESSION['login'])){
			 include_once '../Models/USER_MODEL.php';
			$userPlan = new User_Modelo($_SESSION['login'],'','','','','','','','','','','');
			$datos = $userPlan->obtenerPlan();
			$array = array();

			new SHOWMYPLAN($array, $datos);


		}

		else{

		

		if(!$_POST){

			include_once '../Models/PLAN_MODEL.php';
			$plan = new PLAN_MODEL('','','','');
			$currentPlans = $plan->SEARCH();
			$lista = array();
			new Plan_View($lista, $currentPlans);
		}
	}

		

		break;

		case 'SOCIO':
		 include_once '../Models/USER_MODEL.php';

		$modelo = new User_Modelo($_SESSION['login'], '','','','','','','','','','','');
		$indice = '1';
		$result = $modelo->modificarSocio($indice);
		$fecha = $_REQUEST['fecha'];
		$currentPlan = $_REQUEST['plan'];
		if($currentPlan == '1'){
			$fechaFinal = date("Y-m-d",strtotime($fecha)+(86400*31));
			$insercion = $modelo->ADD_SOCIO($currentPlan, $fechaFinal);
		}
		elseif($currentPlan == '2'){
			$fechaFinal = date("Y-m-d", strtotime($fecha)+(86400*90));
			$insercion = $modelo->ADD_SOCIO($currentPlan, $fechaFinal);
		}
		elseif($currentPlan == '3'){
			$fechaFinal = date("Y-m-d", strtotime($fecha)+(86400*180));
			$insercion = $modelo->ADD_SOCIO($currentPlan, $fechaFinal);
		}
		elseif($currentPlan == '4'){
			$fechaFinal = date("Y-m-d", strtotime($fecha)+(86400*365));
			$insercion = $modelo->ADD_SOCIO($currentPlan, $fechaFinal);
		}


		new MESSAGE($insercion, '../Controllers/User_Controller.php?action=PLAN');

		break;


		case 'PAY':
		include_once '../Models/PLAN_MODEL.php';
		$planSeleccionado = new PLAN_MODEL($_REQUEST['id_plan'],'','','');
		$respuesta = $planSeleccionado->RellenaDatos();
		new ADD_PAY($respuesta);

		break;

		case 'DELETE_PLAN':



			 include_once '../Models/USER_MODEL.php';
			 $tipo = $_REQUEST['tipo'];
			 $login = $_REQUEST['login'];
			$modelo =new User_Modelo($login, '','','','','','','','','','','');
			$respuesta = $modelo->DELETE_PLAN($tipo);
			$indice = '0';
			$respuesta = $modelo->modificarSocio($indice);
			new MESSAGE('La inscripción como socio ha concluído','./User_Controller.php?action=PLAN');
		


		break;


		 default:


				if (!$_POST){
					include_once '../Models/USER_MODEL.php';
					$modelo = new User_Modelo(' ' ,' ' ,' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '');
				}
				else{
					  include_once '../Models/USER_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('  Login  ', '  Nombre  ', '  Apellido  ', '  Password  ', '  Dni  ','  Email  ','  Pais  ','  Sexo  ','  Telefono  ','  Fecha  ', 'Foto de Perfil', 'Rol del Usuario', '  Opciones  ');

				
				new SHOWALL_VIEW($lista, $datos);
			
			

}






 ?>