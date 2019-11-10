

<?php

/**
* 
*/

//include_once '../Functions/funciones.php';

class ADD_VIEW

{

	
	function __construct($clave){
		$this->execution($clave);
	}


	function execution($clave){
		include '../Views/HeaderPost.php';
		require_once '../Functions/funciones.php';
		
	

?>


<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=SHOWSCHEDULE" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_reserva" name="id_reserva"  readonly class="form-control"  >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $clave[0]?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" readonly value="<?php echo $_SESSION['login']; ?>">
		   </div>

		   <div class="form-group">
		  	<input type="text" id="precio" name="precio" value="<?php echo $clave['precio'] ?>" class="form-control" placeholder="Precio" readonly  >

		  </div>

		  	<div class="form-group" >
		  	<input type="date"  id="fecha" name="fecha" required class="form-control"  >
		   </div>
		   
			



		

		   <div style="position: absolute; top: 250px; min-width: 100%; text-align: center;"><button type="submit" class="btn btn-primary">Consultar Horarios</button></div>
		   
		</form>

			
			
	

</div>




<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>
