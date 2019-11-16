<?php





/**
* 
*/
class SEARCH_VIEW
{
	
	function __construct(){
		$this->execution();
	}


	function execution(){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



		<div class="formulario">
			<br>
			<br>
			
		<form  method="post" action="../Controllers/Post_Controller.php?action=SEARCH">

			<br>
			<br>

		 	<div class="form-group" id="titulo-group">
		  	<input type="hidden" id="id_noticia" name="id_noticia" class="form-control" placeholder="ID Noticia" >
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

		   <div class="form-group" id="subtitulo-group">
		  	<input type="hidden" id="fecha" name="fecha" class="form-control" placeholder="Fecha"   >
		   </div>

		   <div class="form-group" id="subtitulo-group">
		  	<input type="hidden" id="hora" name="hora" class="form-control" placeholder="Hora"   >
		   </div>




		  <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-magnifier" style="font-size: 35px;"></span></button>
		  

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