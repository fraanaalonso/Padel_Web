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

<div class="iconos-superiores">

    <a href="../Controllers/Login_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

<div class="modal-dialog text-center">
	<div class="col-sm-28 main-section">
		<div class="modal-content">
			<div class="col-17 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/Register_Controller.php" onsubmit="return validar();">

		 <div class="form-group" id="login-group">
		  	<input type="text" id="login" name="login" class="form-control" placeholder="Login" >
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" >
		   </div>

		   <div class="form-group" id="apellidos-group">
		  	<input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos" >
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" >
		   </div>

		   <div class="form-group" id="dni-group">
		  	<input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" >
		   </div>

		   <div class="form-group" id="email-group">
		  	<input type="email" id="email" name="email" class="form-control" placeholder="Email" >
		   </div>

		   <div class="form-group" id="pais-group">
		  	<select name="pais" id="pais" class="form-control" >

		   		<option>España</option>

		   		<option>Francia</option>

		   		<option>Alemania</option>

		   		<option>Italia</option>

		   		<option>Suiza</option>

		   		<option>Reino Unido</option>

		   		<option>Bélgica</option>

		   		<option>Luxemburgo</option>

		   		<option>Polonia</option>

		   		<option>Rusia</option>

		   		<option>EEUU</option>

		   		<option>China</option>

		   		<option>Canada</option>

		   		<option>Japón</option>

		   		<option>India</option>

		   		<option>Brasil</option>

		   		<option>Argentina</option>

		   		<option>Otro</option>

		   	</select>
		   </div>

		   <div class="form-group" id="sexo-group">
		   	<select name="sexo" id="sexo" class="form-control">

		   		<option>Hombre</option>

		   		<option>Mujer</option>

		   	</select>
		   </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono">
		   </div>

		   <div class="form-group" id="fecha-group">
		  	<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha de Nacimiento">
		   </div>

		 <div class="photo">
		  	
		  <label for="foto">Foto Personal</label>

		  	<div class="prevPhoto">
		  		<span class="delPhoto notBlock"></span>
		  		<label for="foto"></label>
		  	</div>
		  	<div class="upimg">
		  		<input type="file" name="foto" id="foto">
		  	</div>
		  	
		  </div>

		 <div class="form-group">
		   <input type="hidden" name="rol_id" value="2">
		</div>

		   <div id="form-alert">


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


<?php
include 'Footer.php';
?>


<?php

}
}

?>

