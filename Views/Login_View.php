<?php


		include 'HeaderPrev.php';
		//include 'Menu.php';

?>
<div class="modal-dialog text-center">
	<div class="col-sm-8 main-section">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="get">
		  <div class="form-group" id="user-group">
		  	<input type="text" class="form-control" placeholder="Nombre">
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="passwrod" class="form-control" placeholder="Contraeña">
		   </div>

		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
		</form>

		<div class="col-12 forgot">
			<a href="#">¿Recordar Contraseña?</a>
		</div>
		<div class="col-12-forgot">
			<a href="Register_View.php">¿No tienes cuenta?</a>
		</div>

			
			
		</div>

		
	</div>

</div>



<?php
include 'Footer.php';
?>

