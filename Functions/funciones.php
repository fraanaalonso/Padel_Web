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


	function comprobarPendiente(){

	include_once '../includes/db.php';
	$sominhoestabaledo;
 	$sominhoestabaledo = ConectarDB();

		$sql = "SELECT * FROM PAYMENT WHERE estado = 'Pendiente' and login = '".$_SESSION['login']."'";
		$resultado =  $sominhoestabaledo->query($sql);

		if($resultado->num_rows != 0){
			return false;

		}

		else{
			return true;
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


function esSocio($login){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM USER WHERE login = '".$login."' and socio = '1'";

	$result = $bd->query($sql);

	if($result->num_rows == 1){
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

	$sql = "SELECT COUPLE.login1, COUPLE.login2, championship_couple.id_campeonato FROM COUPLE INNER JOIN championship_couple ON COUPLE.id_pareja=championship_couple.id_pareja AND (COUPLE.login1='".$login1."' || couple.login2='".$login2."' || COUPLE.login1='".$login2."' || couple.login2='".$login1."') and championship_couple.id_campeonato='".$id_campeonato."'";


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

function consultarPromo(){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();
	$sql = "SELECT G.id_partido, R.hora_inicio, R.fecha FROM game G, reservation R where G.hora_inicio = R.hora_inicio AND G.fecha=R.fecha AND G.id_pista=R.id_pista";

	
	if (!($resultado = $bd->query($sql))){
		return false;
	}

    else{ 

	return true;
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




function obtenerGrupoCampeonato($id_campeonato){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();


	$sql = "SELECT couple_grupo.id_pareja as pareja, couple.login1 as capitan, couple.login2 as socio, couple_grupo.id_grupo as grupo, couple_grupo.id_campeonato, categoria.categoria as categoria, nivel.nivel as nivel FROM couple_grupo INNER JOIN GRUPO ON couple_grupo.id_grupo=grupo.id_grupo INNER JOIN categoria ON grupo.id_categoria=categoria.id_categoria INNER JOIN niveL ON grupo.id_nivel=nivel.id_nivel inner join couple on couple_grupo.id_pareja=couple.id_pareja and couple_grupo.id_campeonato='".$id_campeonato."' ORDER by grupo asc";


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

function obtenerGrupo($categoria, $nivel, $campeonato){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT GRUPO.id_grupo FROM GRUPO INNER JOIN championship_categoria ON grupo.id_categoria=championship_categoria.id_categoria and grupo.id_campeonato=championship_categoria.id_campeonato INNER JOIN championship_nivel ON grupo.id_nivel=championship_nivel.id_nivel and grupo.id_campeonato=championship_nivel.id_campeonato AND championship_nivel.id_nivel='".$nivel."' AND championship_categoria.id_categoria='".$categoria."' AND grupo.id_campeonato='".$campeonato."'";


	if (!($resultado = $bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}




}

function ultimoGrupo($categoria, $nivel, $campeonato){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT GRUPO.id_grupo FROM GRUPO INNER JOIN championship_categoria ON grupo.id_categoria=championship_categoria.id_categoria and grupo.id_campeonato=championship_categoria.id_campeonato INNER JOIN championship_nivel ON grupo.id_nivel=championship_nivel.id_nivel and grupo.id_campeonato=championship_nivel.id_campeonato AND championship_nivel.id_nivel='".$nivel."' AND championship_categoria.id_categoria='".$categoria."' AND grupo.id_campeonato='".$campeonato."' order by id_grupo desc LIMIT 1";


	if (!($resultado = $bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}




}



function inscritoEscuela($login, $codigo){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT * FROM USER_SCHOOL WHERE login = '".$login."' and codigo = '".$codigo."' ";
	$result = $bd->query($sql);

	if ($result->num_rows == 1){
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


function comprobarSiExistenEnfrentamiento($campeonato, $grupo, $tipo){
	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT id_campeonato, id_grupo from clash where id_grupo = '".$grupo."' and id_campeonato='".$campeonato."' and tipo = '".$tipo."'";

	$resultado = $bd->query($sql);

	if($resultado->num_rows > 0){
		return true;
	}
	else{
		return false;
	}

}




function mostrarGrupo($id_campeonato, $id_categoria, $id_nivel){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();


	$sql = "SELECT championship_nivel.id_nivel, championship_categoria.id_categoria FROM championship_nivel INNER JOIN championship_categoria on championship_nivel.id_campeonato=championship_categoria.id_campeonato and championship_categoria.id_campeonato='".$id_campeonato."' and championship_nivel.id_nivel='".$id_nivel."' and championship_categoria.id_categoria='".$id_categoria."'";


	$resultado = $bd->query($sql);

	if($resultado->num_rows > 0){
		return true;
	}
	else{
		return false;
	}
}



function minInscritos($campeonato,$grupo){

	include_once '../includes/db.php';
	$bd;
	$bd = ConectarDB();

	$sql = "SELECT couple_grupo.id_grupo FROM couple_grupo WHERE couple_grupo.id_grupo='".$grupo."' and couple_grupo.id_campeonato='".$campeonato."'";


	$resultado = $bd->query($sql);

	if($resultado->num_rows < 8){
		return false;
	}
	else{
		return true;
	}
}






?>