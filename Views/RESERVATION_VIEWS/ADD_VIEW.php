

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

		   <div class="form-group">
		  	<input type="text" id="precio" name="precio" value="<?php echo $clave['precio'] ?>" class="form-control" placeholder="Precio" readonly  >

		  </div>

		  	<div class="form-group" >
		  	<input type="date" id="fecha" name="fecha" class="form-control"  >
		   </div>
		   

<!---
		   <div class="form-group" >
		  	<input type="text" id="hora_inicio" name="hora_inicio" class="form-control"  >
		   </div>

		   <div class="form-group" >
		  	<input type="date" id="fecha" name="fecha" class="form-control"  >
		   </div>
-->

			<!--HORARIO DE SELECCIÓN-->


			<table class="horarios" style="width: 100%; position: sticky; text-align: center;">
				<tr style="background-color: yellow">
					<th>
						<?php echo $clave[0]; ?>
					</th>

				</tr>

			


				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							09:00 / 10:30
					</th>
				</tr>
				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							10:30 / 12:00
					</th>
				</tr>

				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							12:00 / 13:30
					</th>
				</tr>
				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							13:30 / 15:00
					</th>
				</tr>
				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							17:00 / 18:30
					</th> 
				</tr>
				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							18:30 / 20:00
					</th>
				</tr>
				<tr>
					
					<th>
							<input type="checkbox" name="hora_inicio">	
							20:00 / 21:30
					</th>
				</tr>
				<tr>
					<th>
							<input type="checkbox" name="hora_inicio">	
							21:30 / 23:00
					</th>					

				</tr>

				
				
			</table>



		

		   <div style="position: absolute; top: 750px; min-width: 100%; text-align: center;"><button type="submit" class="btn btn-primary">Procesar Pago</button></div>
		   
		</form>

			
			
	

</div>




<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>
