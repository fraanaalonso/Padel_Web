

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


<div class="iconos-superiores">

    <a href="../Controllers/User_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>




	<div class="formulario" >
		
			<div class="col-12 user-img" style="text-align: center;">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form  method="post" action="../Controllers/User_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group" id="login-group">
		  	<input type="text" id="login" name="login" class="form-control" placeholder="Login" required>
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
		   </div>

		   <div class="form-group" id="apellidos-group">
		  	<input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos" required>
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
		   </div>

		   <div class="form-group" id="dni-group">
		  	<input type="text" id="dni" name="dni" class="form-control" placeholder="DNI" required>
		   </div>

		   <div class="form-group" id="email-group">
		  	<input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
		   </div>

		   <div class="form-group" id="pais-group">
		  	<select name="pais" id="pais" class="form-control" required>

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
		   	<select name="sexo" id="sexo" class="form-control" required>

		   		<option>Hombre</option>

		   		<option>Mujer</option>

		   	</select>
		   </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" id="telefono" name="telefono" class="form-control" placeholder="Telefono" required>
		   </div>

		   <div class="form-group" id="fecha-group">
		  	<input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha de Nacimiento" required>
		   </div>

		

		 <div class="form-group">
		   <input type="hidden" name="rol_id" value="2" required>
		</div>

		

		  <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt" style="text-align: center;"></i><span class="lnr lnr-file-add" style="font-size: 35px;"></span></button>
		   <p>
		  
		   </p>
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
