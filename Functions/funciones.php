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
	$sql = "SELECT G.id_partido, R.hora_inicio, R.fecha FROM game G, reservation R where G.hora_inicio = R.hora_inicio AND G.fecha=R.fecha AND G.id_pista=R.id_pista";

	
	if (!($resultado = $bd->query($sql))){
		return 'No existe en la base de datos'; 
	}

    else{ 

	$result = $resultado->fetch_array();
		return $result;
	}

}


function cerrarPromocion($id_pista, $fecha, $hora){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT G.id_pista, G.hora_inicio, G.fecha, U.id_partido from game G, user_game U WHERE G.id_pista = '".$id_pista."' AND G.id_partido = u.id_partido AND G.fecha='".$fecha."' AND G.hora_inicio = '".$hora."'";


	$resultado = $bd->query($sql);
	
	if($resultado->num_rows == 4)
	{
		return true;
	}

	else{
		return false;
	}


}


function checkDeadLine($primera, $segunda)
 {
  $valoresPrimera = explode ("-", $primera);   
  $valoresSegunda = explode ("-", $segunda); 

  $diaPrimera    = $valoresPrimera[2];  
  $mesPrimera  = $valoresPrimera[1];  
  $anyoPrimera   = $valoresPrimera[0]; 

  $diaSegunda   = $valoresSegunda[2];  
  $mesSegunda = $valoresSegunda[1];  
  $anyoSegunda  = $valoresSegunda[0];

  $diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
  $diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     

  if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)){
    return 0;
  }elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)){
    return 0;
  }else{
    return  $diasPrimeraJuliano - $diasSegundaJuliano;
  } 

}



function getNumReservas($login){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT login FROM RESERVATION WHERE login = '".$login."'";

	$resultado = $bd->query($sql);

	if($resultado->num_rows == 5){
		return false;
	}
	else{
		return true;
	}
}




function maxCouplesAllowed($id_campeonato){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql= "SELECT A.id_pareja, A.login1, A.login2, B.id_campeonato FROM COUPLE A INNER JOIN (SELECT id_pareja, id_campeonato FROM championship_couple GROUP BY id_pareja, id_campeonato) B ON B.id_pareja = A.id_pareja AND B.id_campeonato = '".$id_campeonato."'";



	$resultado = $bd->query($sql);

	if($resultado->num_rows == 12){
		return false;
	}
	else{
		return true;
	}


}




function obtenerGrupoCampeonato($id_campeonato, $nivel, $categoria){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();


	$sql = "SELECT categoria.categoria, nivel.nivel, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2 FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_nivel ON couple_nivel.id_pareja=couple_categoria.id_pareja INNER JOIN categoria on categoria.id_categoria=couple_categoria.id_categoria INNER JOIN nivel on nivel.id_nivel=couple_nivel.id_nivel and couple_categoria.id_campeonato='".$id_campeonato."' and categoria.categoria='".$categoria."' AND nivel.nivel='".$nivel."'";


		 if (!($resultado = $bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}



function getGruposDes($id_campeonato, $nivel, $categoria){

include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

$sql = "SELECT categoria.categoria, nivel.nivel, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2 FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_nivel ON couple_nivel.id_pareja=couple_categoria.id_pareja INNER JOIN categoria on categoria.id_categoria=couple_categoria.id_categoria INNER JOIN nivel on nivel.id_nivel=couple_nivel.id_nivel and couple_categoria.id_campeonato='".$id_campeonato."' and categoria.categoria='".$categoria."' AND nivel.nivel='".$nivel."' ORDER BY couple_categoria.id_pareja DESC";

	 if (!($resultado = $bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
	

 }



function getGruposAsc($id_campeonato, $nivel, $categoria){


	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

$sql= "SELECT categoria.categoria, nivel.nivel, couple_categoria.id_pareja, couple_categoria.id_campeonato, COUPLE.login1, COUPLE.login2 FROM couple_categoria INNER JOIN couple ON couple.id_pareja=couple_categoria.id_pareja INNER JOIN couple_nivel ON couple_nivel.id_pareja=couple_categoria.id_pareja INNER JOIN categoria on categoria.id_categoria=couple_categoria.id_categoria INNER JOIN nivel on nivel.id_nivel=couple_nivel.id_nivel and couple_categoria.id_campeonato='".$id_campeonato."' and categoria.categoria='".$categoria."' AND nivel.nivel='".$nivel."' ORDER BY couple_categoria.id_pareja ASC";

	 if (!($resultado = $bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}

}

function comprobarSiExisteGrupo($categoria, $nivel, $campeonato){

		include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM GRUPO WHERE id_categoria='".$categoria."' and id_nivel='".$nivel."' and id_campeonato='".$campeonato."'";

	$resultado = $bd->query($sql);

	if($resultado->num_rows == 1){
		return false;
	}
	else{
		return true;
	}
}


function comprobarSiExisteEnfrentamiento($id_campeonato, $id_nivel, $id_categoria){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql= "SELECT clash.id_campeonato, clash.categoria, clash.nivel FROM CLASH WHERE clash.id_campeonato = '".$id_campeonato."' and clash.nivel = '".$id_nivel."' and clash.categoria = '".$id_categoria."'";



	$resultado = $bd->query($sql);

	if($resultado->num_rows != 0){
		return true;
	}
	else{
		return false;
	}


}


function inscritoEnPromocion($login, $id_partido){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM user_game WHERE login='".$login."' and id_partido='".$id_partido."'";

	$resultado = $bd->query($sql);
	

	if($resultado->num_rows == 1){
		return true;
	}
	else{
		return false;
	}




}








?>