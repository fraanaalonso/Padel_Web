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

			$sql = "SELECT hora_inicio, id_pista, fecha FROM RESERVATION WHERE (hora_inicio = '".$hora_inicio."') AND (id_pista = '".$id_pista."' AND (fecha = '".$fecha."'))";
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


	if ( file_exists("../img/$foto") ) {

?>

<?php
	   echo "<img src='../img/$foto' height='250' width='250' /> ";
?>
<?php	

	} else {
	   // possibly display a placeholder image?
	}
    
  

	

}




?>