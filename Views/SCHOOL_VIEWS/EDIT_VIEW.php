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

<div class="iconos-superiores">

    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



		<div class="formulario">
			<br>
			<br>
			
		<form  method="post" action="../Controllers/School_Controller.php?action=EDIT" onsubmit="return validar();">

			<br>
			<br>

			 <div class="form-group" id="titulo-group">
		  	<input type="hidden" id="codigo" name="codigo" class="form-control" readonly required value="<?php echo $valores[0]?>" >
		   </div>

			<div class="form-group" id="titulo-group">
		  	<input type="text" id="login" name="login" class="form-control" readonly required value="<?php echo $valores[3]?>"  >
		   </div>	
		 	

		   <div class="form-group" id="titulo-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" required value="<?php echo $valores[1]?>" >
		   </div>	

		  <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="ubic" name="ubicacion" class="form-control" required value="<?php echo $valores[2]?>" >
		   </div>

		   <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="capacidad" name="capacidad" class="form-control" placeholder="capacidad" value="<?php echo $valores[4] ?>" required >
		   </div>

		   <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="num_clases" name="num_clases" class="form-control" placeholder="num_clases" value="<?php echo $valores[5]?>" required >
		   </div>



		  <button type="submit" class="btn btn-light"><span class="lnr lnr-pencil" style="font-size: 35px; text-align: center;"></span></button>
		  

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