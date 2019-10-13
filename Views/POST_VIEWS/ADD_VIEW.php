
<?php


/**
* 
*/
class ADD_VIEW
{
	
	function __construct(){
		$this->execution();
	}


	function execution(){
		include '../Views/HeaderPost.php';

?>


<body class="form_registro">
<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section">
		<div class="modal-content">
			
		<form class="col-12" method="post" action="../Controllers/User_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group" id="login-group">

		 	<div class="form-group" id="apellidos-group">
		  	<input type="text" id="apellido" name="apellido" class="form-control" placeholder="Código" >
		   </div>

		  	<input type="text" id="login" name="login" class="form-control" placeholder="Titulo" >
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Subtitulo" >
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="text" id="password" name="password" class="form-control" placeholder="Escriba Aquí..." >
		   </div>


		     <div class="form-group">
			    <div class="form-check">
			      <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
			      <label class="form-check-label" for="invalidCheck">
			        Acepto los términos y condiciones
			      </label>
			      <div class="invalid-feedback">
			        Debes estar de acuerdo ante de registrarte
			      </div>
			    </div>
			  </div>


		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Añadir</button>
		  
		</form>

			
			
		</div>

		
	</div>

</div>


</body>
<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>