<?php

/**
* 
*/
class Login
{
	
	function __construct()
	{
		$this->execute();
	}

	function execute(){

		include 'HeaderPrev.php';


?>
<body class="form_login">
<div class="modal-dialog text-center">
	<div class="col-sm-12 main-section">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/Login_Controller.php">

		  <div class="form-group" id="user-group">
		  	<input type="text" name="login" class="form-control" placeholder="Login">
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="passwrod" name="password" class="form-control" placeholder="Contraseña">
		   </div>

		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
		</form>

		<div class="col-12 forgot">
			<a href="#">¿Recordar Contraseña?</a>
		</div>
		<div class="col-12-forgot">
			<a href="../Controllers/Register_Controller.php">¿No tienes cuenta?</a>
		</div>

			
			
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

