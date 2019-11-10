<?php



/**
 * 
 */
 class SHOWSCHEDULE{

	function __construct($clave, $fecha){
		$this->execute($clave, $fecha);
	}

	function execute($clave, $fecha){

	include '../Views/HeaderPost.php';	

?>



<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php?action=INSERTAR&id_pista=<?php echo $clave[0]?>"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>
	

	<div class="formulario">
		
		<div class="form-group" >Día Seleccionado
		  	<input type="text" style="width: 80%;" readonly id="fecha" name="fecha" value="<?php echo $fecha ?>" class="form-control"  >
		</div>	
		<form class="col-12" method="post" action="../Controllers/Reservation_Controller.php?action=RESERVAR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_reserva" name="id_reserva"  readonly class="form-control"  >
		   </div>	

		  <div class="form-group">
		  	<input type="hidden" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $clave[0]?>" >
		   </div>

		   <div class="form-group" >
		  	<input type="hidden" id="login" name="login" class="form-control" readonly value="<?php echo $_SESSION['login']; ?>">
		   </div>

		   <div class="form-group">
		  	<input type="hidden" id="precio" name="precio" value="<?php echo $clave['precio'] ?>" class="form-control" placeholder="Precio" readonly  >

		  </div>

		  	<div class="form-group" >
		  	<input type="hidden"  id="fecha" name="fecha" value="<?php echo $fecha ?>" class="form-control"  >
		   </div>

				
		  	

		  	<table  style=" top: 0; text-align: center; width: 80%;" >
				<tr style="background-color: yellow">
					<th>
						<?php echo $clave[0]; ?>
					</th>

				</tr>

			

				<?php
					if(validarHoraReserva("09:00", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th >
							<input type="checkbox"  name="hora_inicio" value="09:00">	
							<strong>09:00 / 10:30</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>09:00 / 10:30</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("10:30", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="10:30">	
							<strong>10:30 / 12:00</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>10:30 / 12:00</strong>
					</th>
				</tr>

				<?php
					}
				?>

				<?php
					if(validarHoraReserva("12:00", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="12:00">	
							<strong>12:00 / 13:30<strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>12:00 / 13:30</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("13:30", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="13:30">	
							<strong>13:30 / 15:00<strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>13:30 / 15:00</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("17:00", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="17:00">	
							<strong>17:00 / 18:30</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>17:00 / 18:30</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("18:30", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="18:30">	
							<strong>18:30 / 20:00</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>18:30 / 20:00</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("20:00", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="20:00">	
							<strong>20:00 / 21:30</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>20:00 / 21:30</strong>
					</th>
				</tr>

				<?php
					}
				?>
				<?php
					if(validarHoraReserva("21:30", $clave[0], $fecha)){
				?>
				<tr style="background-color: #6EFF33">
					<th>
							<input type="checkbox" name="hora_inicio" value="21:30">	
							<strong>21:30 / 23:00</strong>
					</th>
				</tr>
				<?php
				}
				else{
				?>
				<tr style="background-color: #FA3434">
					<th>
							<strong>21:30/23:00</strong>
					</th>
				</tr>

				<?php
					}
				?>

				
				
			</table>

		     
		   
			



		

		   <div style="position: absolute; top: 550px; min-width: 100%; text-align: center;"><button type="submit" class="btn btn-primary"  style="font-size: 20px;">Reservar Pista</button></div>
		   
		</form>

			
			
	

</div>











<?php
		include '../Views/Footer.php';

	}
}


?>