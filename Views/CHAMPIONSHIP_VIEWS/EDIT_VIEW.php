

<?php

/**
* 
*/
class EDIT_VIEW
{
	
	function __construct($valores, $normativa){
		$this->execution($valores, $normativa);
	}


	function execution($valores, $normativa){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=EDIT" onsubmit="return validar();">

		 <div class="form-group">Campeonato
		  	<input type="text" id="id_campeonato" name="id_campeonato" class="form-control" readonly value="<?php echo $valores[0] ?>" placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">Fecha de Comienzo
		  	<input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control" value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">Fecha Límite
		  	<input type="date" id="fecha_limite" name="fecha_limite" required class="form-control" value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		      <div class="form-group" >Normativa
		  	<select id="id_normativa" name="id_normativa" class="form-control" required>
			<option>Seleccion Normativa</option>

		   	<?php 
		   			
		   			while(($toret = mysqli_fetch_array($normativa))){	

		   			
		   			$selected = 'selected';
		   			
		   	
		   	
		  			echo '<option value = "'.$toret[0].'" '.$selected.'>'. $toret[1].'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		  
		   
		
		

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
