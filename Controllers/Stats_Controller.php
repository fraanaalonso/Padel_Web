

<?php

session_start();





if (!isset($_REQUEST['action'])){
	$_REQUEST['action'] = '';
}



include_once '../Views/STATS_VIEWS/SHOwALLSTATS.php';






Switch ($_REQUEST['action']){



	case 'SHOWALL':
	 			
				
				/*
					Datos a mostrar: Usuarios registrados en el sistema, numero de reservas y promociones activas, numero medio de reservas y promociones semanales, número de socios, numero de campeonato activos.


				*/
				include_once '../Models/USER_MODEL.php';
				include_once '../Models/RESERVATION_MODEL.php';
				include_once '../Models/MATCH_MODEL.php';
				include_once '../Models/CHAMPIONSHIP_MODEL.php';

				$usuarios = new User_Modelo('','','','','','','','','','','','');
				$totales = $usuarios->getUsuarios();

				$reservas = new RESERVATION_MODEL('','','','','','');
				$activas = $reservas->getReservas();
				$promedio = $reservas->promedioSemanal();

				$promocion = new MATCH_MODEL('','','','');
				$p_activas = $promocion->getPromociones();

				$championship = new CHAMPIONSHIP_MODEL('','','','');
				$c_activos = $championship->getChampionships();
				$hombres = $usuarios->getHombres();
				$mujeres = $usuarios->getMujeres();



				$stats = array($totales[0], $activas[0], $p_activas[0], $c_activos[0], $p_activas[1], $hombres[0], $mujeres[0], $promedio[0]);

				new SHOWALLSTATS($stats);


	break;



	

		





}







?>