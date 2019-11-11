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

<div class="formulario">
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=EDIT"  onsubmit="return validar();">

		 <div class="form-group" >
		  	<input type="text" id="id_reserva" name="id_reserva" class="form-control" readonly value="<?php echo $valores['id_reserva']; ?>"  >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $valores['id_pista']; ?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login" name="login" class="form-control" value="<?php echo $valores['login']; ?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="fecha" id="hora_inicio" name="hora_inicio" class="form-control" value="<?php echo $valores['hora_inicio']; ?>">
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="fecha" name="fecha" class="form-control" value="<?php echo $valores['fecha']; ?>" >
		   </div>

		    <div class="form-group" >
		  	<input type="text" id="precio" name="precio" class="form-control" value="<?php echo $valores['precio']; ?>" >
		   </div>



		   <button type="submit"><span class="lnr lnr-pencil" style="font-size: 35px;"></span></button>
		  

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