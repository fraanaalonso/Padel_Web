

<?php

/**
* 
*/
class InscribirCampeonatoView
{
	
	function __construct($valores, $datos, $sexo){
		$this->execution($valores,$datos, $sexo);
	}


	function execution($valores, $datos, $sexo){
		include '../Views/HeaderPost.php';
			require_once '../Functions/funciones.php';
?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=REGISTRAR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_campeonato" name="id_campeonato" class="form-control" readonly  value="<?php echo $valores[0] ?>"  placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control" readonly value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="fecha_limite" name="fecha_limite" class="form-control" readonly value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="id_normativa" name="id_normativa" class="form-control" readonly value="<?php echo $valores[3] ?>" placeholder="ID Normativa" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_grupo" name="id_grupo" class="form-control" readonly value="<?php echo $valores[4] ?>" placeholder="ID Grupo" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_categoria" name="id_categoria" class="form-control" readonly value="<?php echo $valores[5] ?>" placeholder="ID Categoria" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login1" name="login1" class="form-control" readonly value="<?php echo $_SESSION['login'] ?>"  placeholder="Login Participante 1" >
		   </div>

		<?php
		if($datos[5] == 1){
		?>


	



	<div class="form-group" id="pais-group">
	<select id="login2" name="login2" class="form-control" required>
			<option>Seleccion Participante</option>

		   

	
		  
		   	<?php 
		   			
		   			while(($user = mysqli_fetch_array($sexo))){	
		   	?>

		   	<?php
		   			if($user['sexo'] == 'Masculino' && $user['login']!=$_SESSION['login']){
		   	


		  		
		  			echo '<option value = "'.$user[0].'">'. $user[0].'</option>';
		  	



		  		}
		  	?>


		  	<?php

			}
			

		?>
		   
		

		
	</select>
	</div>


		

		<?php
	   }elseif($datos[5] == 2){
		?>

			<div class="form-group" id="pais-group">
	<select id="login2" name="login2" class="form-control" required>
			<option>Seleccion Participante</option>

		   

	
		  
		   	<?php 
		   			
		   			while(($user = mysqli_fetch_array($sexo))){	
		   	?>

		   	<?php
		   			if($user['sexo'] == 'Femenino'  && $user['login']!=$_SESSION['login']){
		   	


		  		
		  			echo '<option value = "'.$user[0].'">'. $user[0].'</option>';
		  	



		  		}
		  	?>


		  	<?php

			}
			

		?>
		   
		

		
	</select>
	</div>
		<?php
		}
		elseif($datos[5] == 3){
		?>
			<div class="form-group" id="pais-group">
	<select id="login2" name="login2" class="form-control" required>
			<option>Seleccion Participante</option>

		   

	
		  
		   	<?php 
		   			
		   			while(($user = mysqli_fetch_array($sexo))){	
		   	?>

		   	<?php
		   			
		   	

		   		if($user['login']!=$_SESSION['login']){
		  		
		  			echo '<option value = "'.$user[0].'">'. $user[0].'</option>';
		  			}



		  		
		  	?>


		  	<?php

			}
			

		?>
		   
0
		
	</select>
	</div>

		<?php
			}
		?>


		   <div class="form-group" >
		  	<input type="hidden" id="id_pareja" name="id_pareja" value="<?php echo 0 ?>" class="form-control" >
		   </div>

		   <button type="submit" class="btn btn-light"><span class="lnr lnr-file-add" style="font-size: 35px;"></span></button>
		   <p>
		  
		   </p>
		   <br>
		   <br>
		</form>

			
			
	

</div>




<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>
