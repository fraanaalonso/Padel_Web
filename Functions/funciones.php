<?php






function comprobarTabla(){
	include_once '../includes/db.php';
	$sominhoestabaledo;
 	$sominhoestabaledo = ConectarDB();

	$sql = "SELECT * FROM RESERVATION WHERE (login LIKE '".$_SESSION['login']."')";

	$resultado = $sominhoestabaledo->query($sql);

	if($resultado->num_rows == 0){
		return true;
	}

	else{
		return false;
	}
}


function comprobarTablaCampeonato(){

	include_once '../includes/db.php';
	$sominhoestabaledo;
 	$sominhoestabaledo = ConectarDB();

 	$sql = "SELECT COUNT(*) id_campeonato FROM CHAMPIONSHIP";
 	$result = $sominhoestabaledo->query($sql);
 	$fila = mysqli_fetch_assoc($result);

 	if($fila['id_campeonato'] == 0){
 		return true;
 	}
 	else{
 		return false;
 	}





}


function comprobarTablaNoticias(){

	include_once '../includes/db.php';
	$sominhoestabaledo;
 	$sominhoestabaledo = ConectarDB();

 	$sql = "SELECT COUNT(*) id_noticia FROM NEW";
 	$result = $sominhoestabaledo->query($sql);
 	$fila = mysqli_fetch_assoc($result);

 	if($fila['id_noticia'] == 0){
 		return true;
 	}
 	else{
 		return false;
 	}

 }



function validarHoraReserva($hora_inicio, $id_pista, $fecha){

			include_once '../includes/db.php';
			$bd;
			$bd = ConectarDB();

			$sql = "SELECT id_pista, hora_inicio, fecha  FROM RESERVATION WHERE (hora_inicio = '".$hora_inicio."') AND (id_pista = '".$id_pista."') AND (fecha = '".$fecha."')";
			$result = $bd->query($sql);
			if($result->num_rows == 0){
		return true;
		}

			else{
		return false;
		}
		}








function obtenerFoto($foto){

	include_once'../Models/USER_MODEL.php';

	$getvalue = $_SESSION['login']; // session get


	if ( file_exists("../img/fotosPerfil/$foto") ) {

?>

<?php
	   echo "<img src='../img/fotosPerfil/$foto' text-align:'center' height='350' width='350' style='border-radius: 50%'  /> ";
?>
<?php	

	} else {
	   echo "Sin imagen";
	}
    
  

	

}


function obtenerFotoReducida($foto){

	include_once'../Models/USER_MODEL.php';

	$getvalue = $_SESSION['login']; // session get


	if ( file_exists("../img/fotosPerfil/$foto") ) {

?>

<?php
	   echo "<img src='../img/fotosPerfil/$foto' text-align:'rigt' height='60' width='70' /> ";
?>
<?php	

	} else {
	   echo "Sin imagen";
	}
    
  

	

}



function comprobarNumeroInscritos($id_partido){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM user_game  WHERE (id_partido = '".$id_partido."')";

	$resultado = $bd->query($sql);
	

	if($resultado->num_rows == 4){
		return true;
	}

	else{
		return false;
	}
	
		
		

}



function comprobarLoginInscrito($login){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM user_game  WHERE (login = '".$login."')";

	$resultado = $bd->query($sql);
	

	if($resultado->num_rows == 0)
	{
		return true;
	}

	else{
		return false;
	}
}



function comprobarSexo($login){
	include_once '../Models/USER_MODEL.php';
	$user = new User_Modelo('','','','','','','','','','','','');
	$respuesta = $user->getDBDatos($login);

	
	return $respuesta[7];
}



function categoriaCampeonato($id_campeonato){
	include_once '../Models/CHAMPIONSHIP_MODEL.php';
	$user = new CHAMPIONSHIP_MODEL('','','','','','');
	$respuesta = $user->getDBDatosCampeonato($id_campeonato);

	
	return $respuesta[5];
}



function esInscrito($login1, $login2, $id_campeonato){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT t.login1, t.login2, t.id_campeonato FROM ( SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja) t WHERE (t.login1 = '".$login1."' || t.login2 = '".$login2."') && t.id_campeonato = '".$id_campeonato."'";


	$resultado = $bd->query($sql);
	
	if($resultado->num_rows == 0)
	{
		return false;
	}

	else{
		return true;
	}


}


function consultarPromocion(){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();
	$sql = "SELECT G.id_partido, R.hora_inicio, R.fecha FROM game G, reservation R where G.hora_inicio = R.hora_inicio AND G.fecha=R.fecha";

	
	if (!($resultado = $bd->query($sql))){
		return 'No existe en la base de datos'; 
	}

    else{ 

	$result = $resultado->fetch_array();
		return $result;
	}

}


?>