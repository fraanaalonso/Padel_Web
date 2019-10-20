
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



	<div class="col-sm-15 main-section3">
		<div class="formulario">
			<br>
			<br>
			
		<form class="col-20" method="post" action="../Controllers/Post_Controller.php?action=ADD" onsubmit="return validar();">

			<br>
			<br>

		 	<div class="form-group" id="id_noticia-group">
		  	<input type="hidden"  id="id_noticia" name="id_noticia" class="form-control" value="<?php echo 0?>" >
		   </div>	

		   <div class="form-group" id="titulo-group">
		  	<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" >
		   </div>	

		  <div class="form-group" id="subtitulo-group">
		  	<input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Subtitulo" >
		   </div>

		   <div class="form-group" id="cuerpo-group">
		  	
		  	<textarea name="cuerpo" id="cuerpo" rows="25" cols="165" maxlength="1000" placeholder="Escribe aquí una entrada"></textarea>
		   </div>




		  <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-file-add" style="font-size: 35px; text-align: center;"></span></button>
		  

		  <br>
		  <br>
		</form>

			<div>
		

		
	</div>




<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>