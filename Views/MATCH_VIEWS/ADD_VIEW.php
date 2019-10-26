

<?php

/**
* 
*/
class ADD_VIEW
{
	
	function __construct($clave){
		$this->execution($clave);
	}


	function execution($clave){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Match_Controller.php?action=PROMOCIONAR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_partido" name="id_partido"  class="form-control" placeholder="Identificador Partido" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" value="<?php echo $clave ?>" class="form-control" placeholder="Identificador Pista" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="hora_inicio" name="hora_inicio" class="form-control" placeholder="Inicio del Partido" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="hora_fin" name="hora_fin" class="form-control" placeholder="Hora Fin" >
		   </div>

		   <div class="form-group" >
		  	<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha" >
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
