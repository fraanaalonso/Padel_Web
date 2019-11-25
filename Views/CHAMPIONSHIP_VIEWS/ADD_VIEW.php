

<?php

/**
* 
*/
class ADD_VIEW
{
	
	function __construct($normativa){
		$this->execution($normativa);
	}


	function execution($normativa){
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

		  <div class="form-group">Fecha Límite Inscripción
		  	<input type="date" id="fecha_limite" name="fecha_limite" required class="form-control" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">Fecha Comienzo 
		  	<input type="date" id="fecha_inicio" name="fecha_inicio" required class="form-control" placeholder="Límite de Inscripción" >
		   </div>


<!--
 <input type="checkbox" id="box1">
  <label for="box1">Checkbox 1</label>
-->
		     <strong style="font-size: 22px;">Seleccione Categoría(s)</strong>
		     	<br>
		     	<br>
			  <input type="checkbox" id="box1" value="1" name="id_categoria[]">
			  <label for="box1" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Masculino</strong></label>
		    
		     <br>
		     <br>
			
			   <input type="checkbox" id="box2" value="2" name="id_categoria[]">
			   <label for="box2" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Femenino</strong></label>
		
			<br>
			<br>

	
			  <input type="checkbox" id="box3" value="3" name="id_categoria[]">
			  <label for="box3" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Mixto</strong></label>
			

			<br>
			<br>

		  <strong style="font-size: 22px;">Seleccione Nivel(es)</strong>
		     	<br>
		     	<br>
			  <input type="checkbox" id="box4" value="1" name="id_nivel[]">
			  <label for="box4" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Principiante</strong></label>
		    
		     <br>
		     <br>
			
			   <input type="checkbox" id="box5" value="2" name="id_nivel[]">
			   <label for="box5" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Intermedio</strong></label>
		
			<br>
			<br>

	
			  <input type="checkbox" id="box6" value="3" name="id_nivel[]">
			  <label for="box6" style="margin: 10 100" align="justify""><strong style="font-size: 18px">Avanzado</strong></label>
			

		    <br>
			<br>
			<br>


		   <div class="form-group" >
		  	<select id="id_normativa" name="id_normativa" class="form-control" required>
			<option>Seleccion Normativa</option>

		  
		   	<?php 
		   			
		   			while(($toret = mysqli_fetch_array($normativa))){	
		   	
		   	
		  			echo '<option value = "'.$toret[0].'">'. substr($toret[1],0,250).'</option>';

		  		
		  	
			}
			?>
		   
		

		
	</select>
		  

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
