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
<body class="form_login" style="background-image: url(https://mir-s3-cdn-cf.behance.net/project_modules/1400/d4b56564984937.5ae47441bb155.jpg);">
<div class="modal-dialog text-center" style="top: 100px;">
	<div class="col-sm-12 main-section">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/Login_Controller.php" onsubmit="return validar();">

		  <div class="form-group" id="user-group">
		  	<input type="text" id="login" name="login" class="form-control" placeholder="Login" required>
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
		   </div>

		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Ingresar</button>
		</form>

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

