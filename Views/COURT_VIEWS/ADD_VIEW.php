

<?php

/**
* 
*/
class ADD_VIEW
{
	
	function __construct(){
		$this->execution();
	}


	function execution(){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Court_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Court_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" placeholder="Identificador de Pista" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ubicacion" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="ubica" name="ubicacion" class="form-control" placeholder="Ubicacion" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="precio" name="precio" class="form-control" placeholder="Precio" >
		   </div>

		    <div class="form-group" >
		   	<select name="estado" id="estado"  class="form-control">

		   		<option>1</option>

		   		<option>2</option>

		   	</select>
		   </div>

		
		

		   <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-file-add" style="font-size: 35px;"></span></button>
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
