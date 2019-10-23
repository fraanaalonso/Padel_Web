
<?php

/**
* 
*/
class ADD_VIEW
{
	
	function __construct($valor){
		$this->execution($valor);
	}




	function execution($valor){


		include '../Views/HeaderPost.php';
		
?>

<div class="iconos-superiores">

    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



	
		<div class="formulario">
			<br>
			<br>
			
		<form  method="post" action="../Controllers/Post_Controller.php?action=ADD" onsubmit="return validar();">

			<br>
			<br>

		 	<div class="form-group" id="id_noticia-group">
		  	<input type="hidden"  id="id_noticia" name="id_noticia" class="form-control" value="<?php echo 0?>" required>
		   </div>	

		   <div class="form-group" id="titulo-group">
		  	<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" required>
		   </div>	

		  <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Subtitulo" required >
		   </div>

		   <div class="form-group" id="cuerpo-group">
		  	
		  	<textarea name="cuerpo" id="cuerpo" rows="25" cols="155" maxlength="1000" placeholder="Escribe aquí una entrada" style="resize: none; max-width: 1000px;" required></textarea>
		   </div>




		  <button type="submit" class="btn btn-light"><i></i><span class="lnr lnr-file-add" style="font-size: 35px; text-align: center;"></span></button>
		  

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