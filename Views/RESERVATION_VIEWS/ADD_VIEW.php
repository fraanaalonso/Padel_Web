

<?php

/**
* 
*/
include_once '../Models/RESERVATION_MODEL.php';

class ADD_VIEW

{

	
	function __construct($clave){
		$this->execution($clave);
	}


	function execution($clave){
		include '../Views/HeaderPost.php';
		
	

?>


<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=RESERVAR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_reserva" name="id_reserva"  readonly class="form-control"  >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $clave[0]?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" readonly value="<?php echo $_SESSION['login']; ?>">
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="hora_inicio" name="hora_inicio" class="form-control"  >
		   </div>

		   <div class="form-group" >
		  	<input type="date" id="fecha" name="fecha" class="form-control"  >
		   </div>




		

		   <button type="submit" class="btn btn-primary">Reservar</button>
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
