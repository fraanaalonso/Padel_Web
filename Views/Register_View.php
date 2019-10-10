<?php


		include 'HeaderPrev.php';
		//include 'MenuLateral.php';

?>
<body class="form_registro">
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

		   <div class="form-group" id="dni-group">
		  	<input type="text" class="form-control" placeholder="DNI">
		   </div>

		   <div class="form-group" id="email-group">
		  	<input type="text" class="form-control" placeholder="Email">
		   </div>

		   <div class="form-group" id="pais-group">
		  	<input type="text" class="form-control" placeholder="Pais">
		   </div>

		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Registrar</button>
		   <p>
		   	<div class="col-12-forgot">
			<a href="Login_View.php">Iniciar Sesión</a>
		</div>
		   </p>
		</form>

			
			
		</div>

		
	</div>

</div>


</body>
<?php
include 'Footer.php';
?>

