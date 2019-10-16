<?php

class EDIT_VIEW
{
	
	function __construct($valores){
		$this->execution($valores);
	}


	function execution($valores){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=EDIT"  onsubmit="return validar();">

		 <div class="form-group" >
		  	<input type="text" id="id_reserva" name="id_reserva" class="form-control" readonly value="<?php echo $valores['id_reserva']; ?>"  >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" value="<?php echo $valores['id_pista']; ?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" value="<?php echo $valores['login']; ?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="fecha" id="fecha" name="fecha" class="form-control" value="<?php echo $valores['fecha']; ?>">
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="hora" name="hora" class="form-control" value="<?php echo $valores['hora']; ?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="number" id="tiempo_maximo" name="tiempo_maximo" class="form-control" value="<?php echo $valores['tiempo_maximo']; ?>" >
		   </div>



		   <button type="submit"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-pencil" style="font-size: 35px;"></span></button>
		  

		  <br>
		  <br>
		</form>









			
			
		</div>

		
	</div>

</div>


<?php
include '../Views/Footer.php';
?>


<?php

}
}


?>