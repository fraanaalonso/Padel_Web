

<?php

/**
* 
*/
class EDIT_VIEW
{
	
	function __construct($valores, $normativa, $grupo, $categoria){
		$this->execution($valores, $normativa, $grupo, $categoria);
	}


	function execution($valores, $normativa, $grupo, $categoria){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=EDIT" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="text" id="id_campeonato" name="id_campeonato" class="form-control" readonly value="<?php echo $valores[0] ?>" placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control" value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="date" id="fecha_limite" name="fecha_limite" required class="form-control" value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		      <div class="form-group" >
		  	<select id="id_normativa" name="id_normativa" class="form-control" required>
			<option>Seleccion Normativa</option>

		   	<?php 
		   			
		   			while(($toret = mysqli_fetch_array($normativa))){	

		   			
		   			$selected = 'selected';
		   			
		   	
		   	
		  			echo '<option value = "'.$toret[0].'" '.$selected.'>'. $toret[1].'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		   </div>

		   <div class="form-group" >
		  	<select id="id_categoria" name="id_categoria" class="form-control" required>
			<option>Selecciona Categoria</option>

		  
		   	<?php 
		   			
		   			while(($toret2 = mysqli_fetch_array($categoria))){	
		   			$selected = 'selected';
		   	
		  			echo '<option value = "'.$toret2[0].'" '.$selected.'>'. $toret2[1].'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		   </div>

		   <div class="form-group" >
		  	<select id="id_grupo" name="id_grupo" class="form-control" required>
			<option>Selecciona Grupo</option>

		  
		   	<?php 
		   			
		   			while(($toret3 = mysqli_fetch_array($grupo))){	
		   	
		   			$selected = 'selected';
		  			echo '<option value = "'.$toret3[0].'"  '.$selected.'>'. $toret3[1] .'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		   </div>
		
		

		   <button type="submit" class="btn btn-light"><span class="lnr lnr-pencil" style="font-size: 35px;"></span></button>
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
