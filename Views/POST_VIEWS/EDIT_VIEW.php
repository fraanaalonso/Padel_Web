<?php





/**
* 
*/
class EDIT_VIEW
{
	
	function __construct($valores){
		$this->execution($valores);
	}


	function execution($valores){
		include '../Views/HeaderPost.php';

?>


<body class="form_registro">
<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/User_Controller.php?action=SEARCH" onsubmit="return validar();">

		 <div class="form-group" id="login-group">
		  	<input type="text" id="login" name="login" class="form-control" value="<?php echo $valores['login']; ?>" >
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $valores['nombre']; ?>" >
		   </div>

		   <div class="form-group" id="apellidos-group">
		  	<input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $valores['apellido']; ?>" >
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="password" id="password" name="password" class="form-control" value="<?php echo $valores['password']; ?>">
		   </div>

		   <div class="form-group" id="dni-group">
		  	<input type="text" id="dni" name="dni" class="form-control" value="<?php echo $valores['dni']; ?>" >
		   </div>

		   <div class="form-group" id="email-group">
		  	<input type="email" id="email" name="email" class="form-control" value="<?php echo $valores['email']; ?>" >
		   </div>

		   <div class="form-group" id="pais-group">
		  	<select name="pais" id="pais" class="form-control">

		   		<option value="value="<?php echo $valores['pais']; ?>""></option>

		   	</select>
		   </div>

		   <div class="form-group" id="sexo-group">
		   	<select name="sexo" id="sexo" class="form-control">

		   		<option value="<?php echo $valores['sexo']; ?>"></option>

		   		

		   	</select>
		   </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" id="telefono" name="telefono" class="form-control" value="value="<?php echo $valores['telefono']; ?>"">
		   </div>

		   <div class="form-group" id="fecha-group">
		  	<input type="date" id="fecha" name="fecha" class="form-control" value="value="<?php echo $valores['fecha']; ?>"">
		   </div>

		   <div class="form-group" id="foto-group">
		  	<input type="file" id="foto" name="foto" class="form-control" value="value="<?php echo $valores['foto']; ?>"">
		   </div>


		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Editar</button>
		  
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