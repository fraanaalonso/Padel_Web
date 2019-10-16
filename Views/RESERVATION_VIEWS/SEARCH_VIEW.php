<?php





/**
* 
*/
class SEARCH_VIEW
{
	
	function __construct(){
		$this->execution();
	}


	function execution(){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=SEARCH">

		 <div class="form-group">
		  	<input type="text" id="id_reserva" name="id_reserva" class="form-control" placeholder="Identificador de Reserva" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" placeholder="Identificador de Pista" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" placeholder="Login" >
		   </div>

		   <div class="form-group" >
		  	<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha de Reserva" >
		   </div>

		   <div class="form-group">
		  	<input type="text" id="hora" name="hora" class="form-control" placeholder="Hora de Reserva" >
		   </div>



		   <div class="form-group" >
		  	<input type="text" id="Tiempo" name="Tiempo" class="form-control" placeholder="Tiempo de Reserva" >
		   </div>


		

		   <button type="submit"><span class="lnr lnr-magnifier" style="font-size: 35px;"></span> </button>
		   <p>
		  
		   </p>
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