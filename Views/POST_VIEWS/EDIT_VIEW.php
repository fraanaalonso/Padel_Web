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

    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



		<div class="formulario">
			<br>
			<br>
			
		<form  method="post" action="../Controllers/Post_Controller.php?action=EDIT" onsubmit="return validar();">

			<br>
			<br>

			<div class="form-group" id="titulo-group">
		  	<input type="text" id="id_noticia" name="id_noticia" class="form-control" readonly required value="<?php echo $valores[0]?>"  >
		   </div>	
		 	

		   <div class="form-group" id="titulo-group">
		  	<input type="text" id="titulo" name="titulo" class="form-control" required value="<?php echo $valores[1]?>" >
		   </div>	

		  <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="subtitulo" name="subtitulo" class="form-control" required value="<?php echo $valores[2]?>" >
		   </div>

		   <div class="form-group" id="cuerpo-group">
		  	
		  	<textarea name="cuerpo" id="cuerpo" required rows="25" cols="165"><?php echo $valores['cuerpo']?></textarea>
		   </div>

		   <div class="form-group" id="subtitulo-group">
		  	<input type="hidden" id="fecha" name="fecha" class="form-control" placeholder="Fecha" value="<?php echo date("d/m/Y", time())?>" required >
		   </div>

		   <div class="form-group" id="subtitulo-group">
		  	<input type="hidden" id="hora" name="hora" class="form-control" placeholder="Hora" value="<?php echo date('G:i');?>" required >
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