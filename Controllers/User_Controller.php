
<?php 

session_start(); //solicito trabajar con la session



if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/USER_VIEWS/SHOWALL_VIEW.php';
include '../Views/USER_VIEWS/ADD_VIEW.php';
include '../Views/USER_VIEWS/SEARCH_VIEW.php';
include '../Views/USER_VIEWS/SHOWCURRENT_VIEW.php';
include '../Views/USER_VIEWS/DELETE_VIEW.php';
include '../Views/USER_VIEWS/EDIT_VIEW.php';
include '../Views/Message_View.php';



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
		$action
	);

	return $USER;
}


Switch ($_REQUEST['action']){

	
		case 'ADD':
				if (!$_POST){
					
					new ADD_VIEW();
				
				}
				else{
				 include_once '../Models/USER_MODEL.php';
				  $modelo= new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'], $_FILES['foto']);

				  /*Proceso para subir la imagen*/

				  $img = substr(strrchr($_FILES['foto']['name'], "."), 1);
				  $ruta = md5(rand() * time()) . ".$img";

				  $origen = $_FILES['foto']['tmp_name'];
				  $dir = "../img/";
				  $uploadfile = $dir . $ruta;

				  	$modelo->fotopersonal = $uploadfile;
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
				   $_REQUEST['fecha'], $_FILES['foto']);

					  $img = substr(strrchr($_FILES['foto']['name'], "."), 1);
					  $ruta = md5(rand() * time()) . ".$img";

					  $origen = $_FILES['foto']['tmp_name'];
					  $dir = "../img/";
					  $uploadfile = $dir . $ruta;

				  	 $modelo->fotopersonal = $uploadfile;
                     $respuesta = $modelo->SEARCH();
					$lista = array('Login ', 'Nombre ', 'Apellido ', 'Password ', 'Dni ','Email ','Pais ','Telefono ','Email ','Pais ','Sexo ', 'Telefono ', 'Fecha ', 'Opciones ');
					new SHOWALL_VIEW($lista, $respuesta);
					
				}
		       break;


			




		case 'EDIT':
				if (!$_POST) {
					 include_once '../Models/USER_MODEL.php';
					$modelo= new User_Modelo($_REQUEST['login'],'','', '', '', '', '', '', '','','');
					$valores= $modelo ->RellenaDatos();
					new EDIT_VIEW($valores);
				}

				else{

					 include_once '../Models/USER_MODEL.php';
					$modelo = new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'], $_REQUEST['password'], $_REQUEST['dni'], $_REQUEST['email'], $_REQUEST['pais'], $_REQUEST['sexo'], $_REQUEST['telefono'],
				   $_REQUEST['fecha'], $_FILES['foto']);

					  $img = substr(strrchr($_FILES['foto']['name'], "."), 1);
					  $ruta = md5(rand() * time()) . ".$img";

					  $origen = $_FILES['foto']['tmp_name'];
					  $dir = "../img/";
					  $uploadfile = $dir . $ruta;

				  	  $modelo->foto = $uploadfile;
					  $respuesta = $modelo->EDIT();
					new MESSAGE($respuesta, './User_Controller.php');
				}
						
				break;	


		case 'DELETE':

				if (!$_POST) {
					 include_once '../Models/USER_MODEL.php';
					$modelo= new User_Modelo($_REQUEST['login'],'', '', '', '', '', '', '', '', '','');
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
			    $modelo = new User_Modelo($_REQUEST['login'],'','', '', '', '', '', '', '', '', '');
				$valores = $modelo->RellenaDatos();

				new SHOWCURRENT_VIEW($valores);


				break;


		 default:

				if (!$_POST){
					include_once '../Models/USER_MODEL.php';
					$modelo = new User_Modelo(' ' ,' ' ,' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');
				}
				else{
					  include_once '../Models/USER_MODEL.php';
				}


				$datos = $modelo->SEARCH();
				$lista = array('  Login  ', '  Nombre  ', '  Apellido  ', '  Password  ', '  Dni  ','  Email  ','  Pais  ','  Sexo  ','  Telefono  ','  Fecha  ','  Foto  ', '  Opciones  ');

				
				new SHOWALL_VIEW($lista, $datos);

		

}






 ?>