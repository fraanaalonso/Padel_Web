

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

		 <div class="form-group">ID Pista
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" pattern="P[0-9]" placeholder="PX" >
		   </div>	

		  <div class="form-group">Descripcion
		  	<input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" >
		   </div> 

		  <div class="form-group">Ubicacion
		  	<input type="text" id="ubica" name="ubicacion" class="form-control" placeholder="Ubicacion" >
		   </div>


		   <div class="form-group" >Precio Reserva
		  	<input type="text" id="precio" name="precio" class="form-control" placeholder="Precio" >
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
