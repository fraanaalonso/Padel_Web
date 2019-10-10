<?php
/**
* 
*/
class Register
{
	
	function __construct()
	{
		$this->execute();
	}

	function execute(){

		include 'HeaderPrev.php';
		//include 'MenuLateral.php';

?>
<body class="form_registro">
<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/Register_Controller.php">

		 <div class="form-group" id="login-group">
		  	<input type="text" name="login" class="form-control" placeholder="Login">
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" name="nombre" class="form-control" placeholder="Nombre">
		   </div>

		   <div class="form-group" id="apellidos-group">
		  	<input type="text" name="apellido" class="form-control" placeholder="Apellidos">
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="passwrod" name="passwrod" class="form-control" placeholder="Contraseña">
		   </div>

		   <div class="form-group" id="dni-group">
		  	<input type="text" name="dni" class="form-control" placeholder="DNI">
		   </div>

		   <div class="form-group" id="email-group">
		  	<input type="text" name="email" class="form-control" placeholder="Email">
		   </div>

		   <div class="form-group" id="pais-group">
		  	<input type="text" name="pais" class="form-control" placeholder="Pais">
		   </div>

		   <div class="form-group" id="sexo-group">
		  	<input type="text" name="sexo" class="form-control" placeholder="Sexo">
		   </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" name="telefono" class="form-control" placeholder="Telefono">
		   </div>

		   <div class="form-group" id="fecha-group">
		  	<input type="text" name="fecha" class="form-control" placeholder="Fecha de Nacimiento">
		   </div>

		   <div class="form-group" id="foto-group">
		  	<input type="text" name="foto" class="form-control" placeholder="Foto">
		   </div>


		     <div class="form-group">
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
			      <label class="form-check-label" for="invalidCheck">
			        Acepto los términos y condiciones
			      </label>
			      <div class="invalid-feedback">
			        Debes estar de acuerdo ante de registrarte
			      </div>
			    </div>
			  </div>


		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Registrar</button>
		   <p>
		   	<div class="col-12-forgot">
			<a href="../Controllers/Login_Controller.php">Iniciar Sesión</a>
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


<?php

}
}

?>

