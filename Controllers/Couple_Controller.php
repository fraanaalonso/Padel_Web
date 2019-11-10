

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include '../Views/CHAMPIONSHIP_VIEWS/SHOWCURRENT_COUPLE.php';

include '../Views/CHAMPIONSHIP_VIEWS/SHOW_COUPLE.php';



function get_data(){
	$id_pareja = $_REQUEST['id_pareja'];
	$id_categoria ='';
	$id_grupo ='';
	$login1 = '' ;
	$login2='';
	$action = $_REQUEST['action'];

	$COURT = new COUPLE_MODEL(
		$id_pareja, 
		$id_categoria,
		$id_grupo,
		$login1,
		$login2,
		$action
	);

	return $COURT;
}


Switch ($_REQUEST['action']){

	
			


		case 'SHOWCURRENT':
				 include_once '../Models/COUPLE_MODEL.php';
			    $modelo = get_data();
				$valores = $modelo->RellenaDatos($_REQUEST['id_campeonato']);

				new SHOWCURRENT_COUPLE($valores);


				break;



		case 'SHOWCOUPLES':


				if (!$_POST){
					include_once '../Models/COUPLE_MODEL.php';
					$modelo = new COUPLE_MODEL(' ' ,'','','','');
				}
				else{
					  include_once '../Models/COUPLE_MODEL.php';
				}

				$datos = $modelo->joinCouples($_REQUEST['id_campeonato']);
				$lista = array();

				
				new SHOWALL_COUPLE($lista, $datos);



		break;

		case 'DELETE':
					 include_once '../Models/COUPLE_MODEL.php';

					$modelo = get_data();
					$respuesta = $modelo->DELETE();
					$all = new COUPLE_MODEL(' ' ,' ' ,' ', ' ', ' ');


					
                    $datos = $all->SEARCHCURRENTCOUPLES($_REQUEST['id_campeonato']);
					$lista = array();

				
					new SHOWALL_COUPLE($lista, $datos);
					break;



		case 'SHOWMYCHAMPIONSHIPS':


				if (!$_POST){
					include_once '../Models/COUPLE_MODEL.php';
					$modelo = new COUPLE_MODEL(' ' ,'','','','');
				}
				else{
					  include_once '../Models/COUPLE_MODEL.php';
				}

				$datos = $modelo->SEARCHMYCHAMPIONSHIPS();
				$lista = array();

				
				new SHOWALL_COUPLE($lista, $datos);

		break;


		

		

}






 ?>