<?php



/**
 * 
 */
class Profile_View 
{
	
	function __construct($datos_usuario)
	{
		$this->execute($datos_usuario);
	}

	function execute($datos_usuario){
		include '../Views/HeaderPost.php';
		require_once('../Functions/funciones.php');

?>

<div  style="text-align: center; position: absolute; top: 80px; left: 90px; width: 100%; height: 40%">

<?php
 obtenerFoto($datos_usuario['foto']);

?>

</div>


<div style="position: absolute;
	top: 450px;
	left: 250px;
	width: 80%;
	margin: 0 auto;
	resize: none
	border: black 2px solid;">

 <strong style="font-size: 20px;">Mis Datos</strong>
 <br>
 <br>
<form method="post"  class="edicion" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Login</label>
     <input type="text" id="login" name="login" required class="form-control" readonly value="<?php echo $datos_usuario['login']; ?>"  >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
     <input type="password" id="password" name="password" required class="form-control" value="<?php echo $datos_usuario['password']; ?>" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
     <input type="text" id="nombre" name="nombre" required class="form-control" value="<?php echo $datos_usuario['nombre']; ?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
     <input type="text" id="apellido" name="apellido" required class="form-control" value="<?php echo $datos_usuario['apellido']; ?>" >
    </div>
  </div>

 
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">DNI</label>
    <input type="text" id="dni" name="dni" required class="form-control" value="<?php echo $datos_usuario['dni']; ?>" >
  </div>

   <div class="form-group col-md-6">
    <label for="inputAddress">Fecha de Nacimiento</label>
    <input type="date" id="fecha" name="fecha" required class="form-control" value="<?php echo $datos_usuario['fecha']; ?>" >
  </div>
 </div>

<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress2">Telefono </label>
    <input type="text" id="telefono" name="telefono" required class="form-control" value="<?php echo $datos_usuario['telefono']; ?>" >
  </div>


  <div class="form-group col-md-6">
    <label for="inputAddress2">Email </label>
    <input type="text" id="email" name="email" required class="form-control" value="<?php echo $datos_usuario['email']; ?>" >
  </div>
</div>  

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Sexo</label>
       <select  id="sexo" name ="sexo" required class="form-control" >
              <option  value="<?php echo $datos_usuario['sexo'];?>" selected>Seleccione el sexo</option>
              <option value = 'Masculino' <?php if ($datos_usuario['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option><br>
              <option value = 'Femenino' <?php if ($datos_usuario['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option><br>
        </select>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Pais</label>
     <select  id="pais" name ="pais" required class="form-control" >
              <option  value="<?php echo $datos_usuario['pais'];?>" selected>Seleccione el pais</option>
              <option value = 'España' <?php if ($datos_usuario['pais'] == 'España') echo 'selected'; ?>>España</option><br>
              <option value = 'Francia' <?php if ($datos_usuario['pais'] == 'Francia') echo 'selected'; ?>>Francia</option><br>
              <option value = 'Alemania' <?php if ($datos_usuario['pais'] == 'Alemania') echo 'selected'; ?>>Alemania</option><br>
              <option value = 'Italia' <?php if ($datos_usuario['pais'] == 'Italia') echo 'selected'; ?>>Italia</option><br>
              <option value = 'Suiza' <?php if ($datos_usuario['pais'] == 'Suiza') echo 'selected'; ?>>Suiza</option><br>
              <option value = 'Reino Unido' <?php if ($datos_usuario['pais'] == 'Reino Unido') echo 'selected'; ?>>Reino Unido</option><br>
              <option value = 'Belgica' <?php if ($datos_usuario['pais'] == 'Belgica') echo 'selected'; ?>>Belgica</option><br>
              <option value = 'Luxemburgo' <?php if ($datos_usuario['pais'] == 'Luxemburgo') echo 'selected'; ?>>Luxemburgo</option><br>
              <option value = 'Polonia' <?php if ($datos_usuario['pais'] == 'Polonia') echo 'selected'; ?>>Polonia</option><br>
              <option value = 'Rusia' <?php if ($datos_usuario['pais'] == 'Rusia') echo 'selected'; ?>>Rusia</option><br>
              <option value = 'EEUU' <?php if ($datos_usuario['pais'] == 'EEUU') echo 'selected'; ?>>EEUU</option><br>
              <option value = 'China' <?php if ($datos_usuario['pais'] == 'China') echo 'selected'; ?>>China</option><br>
              <option value = 'Canada' <?php if ($datos_usuario['pais'] == 'Canada') echo 'selected'; ?>>Canada</option><br>
              <option value = 'Japón' <?php if ($datos_usuario['pais'] == 'Japón') echo 'selected'; ?>>Japón</option><br>
              <option value = 'India' <?php if ($datos_usuario['pais'] == 'India') echo 'selected'; ?>>India</option><br>
              <option value = 'Brasil' <?php if ($datos_usuario['pais'] == 'Brasil') echo 'selected'; ?>>Brasil</option><br>
              <option value = 'Argentina' <?php if ($datos_usuario['pais'] == 'Argentina') echo 'selected'; ?>>Argentina</option><br>
              <option value = 'Otro' <?php if ($datos_usuario['pais'] == 'Otro') echo 'selected'; ?>>Otro</option><br>
          </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Foto Perfil</label>
     <input type="file" id="foto" name="foto" class="form-control" required value="<?php echo $datos_usuario['foto']; ?>" >
    </div>
  </div>

   <div class="form-group col-md-2">
     <input type="hidden" id="rol_id" name="rol_id" class="form-control" required value="<?php echo $datos_usuario['rol_id']; ?>" >
    </div>
  </div>


<div class="form-group col-md-12" style="top: 150px; text-align: center;">
  <button type="text"  class="btn btn-primary" >Volver</button>
 </div>
</form>

</div>






























<?php
include '../Views/Footer.php';
}
}
?>