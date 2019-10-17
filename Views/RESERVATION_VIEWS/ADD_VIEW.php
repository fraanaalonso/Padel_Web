

<?php

/**
* 
*/
include_once '../Models/RESERVATION_MODEL.php';

class ADD_VIEW

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
			
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_reserva" name="id_reserva" value="" class="form-control"  >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $_REQUEST['id_pista']?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" readonly value="<?php echo $_SESSION['login']; ?>">
		   </div>




		

		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Reservar</button>
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
