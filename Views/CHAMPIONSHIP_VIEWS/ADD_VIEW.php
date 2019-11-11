

<?php

/**
* 
*/
class ADD_VIEW
{
	
	function __construct($normativa, $categoria, $grupo){
		$this->execution($normativa, $categoria, $grupo);
	}


	function execution($normativa, $categoria, $grupo ){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_campeonato" name="id_campeonato" class="form-control" placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="date" id="fecha_limite" name="fecha_limite" required class="form-control" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >
		  	<select id="id_normativa" name="id_normativa" class="form-control" required>
			<option>Seleccion Normativa</option>

		  
		   	<?php 
		   			
		   			while(($toret = mysqli_fetch_array($normativa))){	
		   	
		   	
		  			echo '<option value = "'.$toret[0].'">'. $toret[1].'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		   </div>

		   <div class="form-group" >
		  	<select id="id_categoria" name="id_categoria" class="form-control" required>
			<option>Selecciona Categoria</option>

		  
		   	<?php 
		   			
		   			while(($toret2 = mysqli_fetch_array($categoria))){	
		   	
		   	
		  			echo '<option value = "'.$toret2[0].'">'. $toret2[1].'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		   </div>

		   <div class="form-group" >
		  	<select id="id_grupo" name="id_grupo" class="form-control" required>
			<option>Selecciona Grupo</option>

		  
		   	<?php 
		   			
		   			while(($toret3 = mysqli_fetch_array($grupo))){	
		   	
		   	
		  			echo '<option value = "'.$toret3[0].'">'. $toret3[1] .'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
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
