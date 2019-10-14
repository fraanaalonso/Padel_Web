<?php

class EDIT_VIEW
{
	
	function __construct($valores){
		$this->execution($valores);
	}


	function execution($valores){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/User_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			<div class="col-12 user-img">
				<img src="../img/iconUser.jpg">
				
			</div>
			
		<form class="col-12" method="post" action="../Controllers/User_Controller.php?action=SEARCH"  onsubmit="return validar();">

		 <div class="form-group" id="login-group">
		  	<input type="text" id="login" name="login" class="form-control" readonly value="<?php echo $valores['login']; ?>"  >
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
              <select  id="pais" name ="pais" class="form-control">
              <option  value="<?php echo $valores['pais'];?>" selected>Seleccione el pais</option>
              <option value = 'España' <?php if ($valores['pais'] == 'España') echo 'selected'; ?>>España</option><br>
              <option value = 'Francia' <?php if ($valores['pais'] == 'Francia') echo 'selected'; ?>>Francia</option><br>
              <option value = 'Alemania' <?php if ($valores['pais'] == 'Alemania') echo 'selected'; ?>>Alemania</option><br>
              <option value = 'Italia' <?php if ($valores['pais'] == 'Italia') echo 'selected'; ?>>Italia</option><br>
              <option value = 'Suiza' <?php if ($valores['pais'] == 'Suiza') echo 'selected'; ?>>Suiza</option><br>
              <option value = 'Reino Unido' <?php if ($valores['pais'] == 'Reino Unido') echo 'selected'; ?>>Reino Unido</option><br>
              <option value = 'Belgica' <?php if ($valores['pais'] == 'Belgica') echo 'selected'; ?>>Belgica</option><br>
              <option value = 'Luxemburgo' <?php if ($valores['pais'] == 'Luxemburgo') echo 'selected'; ?>>Luxemburgo</option><br>
              <option value = 'Polonia' <?php if ($valores['pais'] == 'Polonia') echo 'selected'; ?>>Polonia</option><br>
              <option value = 'Rusia' <?php if ($valores['pais'] == 'Rusia') echo 'selected'; ?>>Rusia</option><br>
              <option value = 'EEUU' <?php if ($valores['pais'] == 'EEUU') echo 'selected'; ?>>EEUU</option><br>
              <option value = 'China' <?php if ($valores['pais'] == 'China') echo 'selected'; ?>>China</option><br>
              <option value = 'Canada' <?php if ($valores['pais'] == 'Canada') echo 'selected'; ?>>Canada</option><br>
              <option value = 'Japón' <?php if ($valores['pais'] == 'Japón') echo 'selected'; ?>>Japón</option><br>
              <option value = 'India' <?php if ($valores['pais'] == 'India') echo 'selected'; ?>>India</option><br>
              <option value = 'Brasil' <?php if ($valores['pais'] == 'Brasil') echo 'selected'; ?>>Brasil</option><br>
              <option value = 'Argentina' <?php if ($valores['pais'] == 'Argentina') echo 'selected'; ?>>Argentina</option><br>
              <option value = 'Otro' <?php if ($valores['pais'] == 'Otro') echo 'selected'; ?>>Otro</option><br>
              </select>
              </div>


		     <div class="form-group" id="sexo-group">    
              <select  id="sexo" name ="sexo" class="form-control">
              <option  value="<?php echo $valores['sexo'];?>" selected>Seleccione el sexo</option>
              <option value = 'Hombre' <?php if ($valores['sexo'] == 'Hombre') echo 'selected'; ?>>Hombre</option><br>
              <option value = 'Mujer' <?php if ($valores['sexo'] == 'Mujer') echo 'selected'; ?>>Mujer</option><br>
              </select>
              </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" id="telefono" name="telefono" class="form-control" value="<?php echo $valores['telefono']; ?>">
		   </div>

		   <div class="form-group" id="fecha-group">
		  	<input type="date" id="fecha" name="fecha" class="form-control" value="<?php echo $valores['fecha']; ?>">
		   </div>

		   <div class="form-group" id="foto-group">
		  	<input type="file" id="foto" name="foto" class="form-control" value="<?php echo $valores['foto']; ?>">
		   </div>

		    <div class="form-group" id="telefono-group">
		  	<input type="text" id="rol_id" name="rol_id" class="form-control" value="<?php echo $valores['rol_id']; ?>">
		   </div>



		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Editar</button>
		  

		  <br>
		  <br>
		</form>









			
			
		</div>

		
	</div>

</div>


<?php
include '../Views/Footer.php';
?>


<?php

}
}


?>