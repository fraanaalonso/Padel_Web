

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}




include_once '../Views/Message_View.php';
require_once '../Functions/funciones.php';
include '../Views/CLASS_VIEWS/SHOWALLMYCLASS_VIEW.php';



Switch ($_REQUEST['action']){







	case 'INSCRIBIR':

	include_once '../Models/USER_MODEL.php';
	include_once '../Models/CLASS_MODEL.php';


	$usuario = new User_Modelo($_SESSION['login'] , '','','','','','','','','','','');
	$clase = new CLASS_MODEL($_REQUEST['id_clase'], '','','');


	$user = $usuario->RellenaDatos();
	$class = $clase->RellenaDatos();

	$respuesta = $clase->inscribirClase($user[0], $class[0], $_REQUEST['codigo']);

	new MESSAGE($respuesta, '../Controllers/School_Controller.php');

	break;


	case 'SHOW_CLASS':

				include_once '../Models/SCHOOL_MODEL.php';

				$modelo = new SCHOOL_MODEL($_REQUEST['codigo'], '','','','','');
				$datos = $modelo->SHOWMYCLASSES();
				$lista = array();

				
				new SHOWALLMYCLASS_VIEW($lista, $datos);

	break;



		





}







?>