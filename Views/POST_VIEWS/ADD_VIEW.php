
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

    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			
		<form class="col-12" method="post" action="../Controllers/Post_Controller.php?action=ADD" onsubmit="return validar();">

			<br>
			<br>

		 <div class="form-group" id="login-group">

		 	<div class="form-group" id="apellidos-group">
		  	<input type="text" id="id_noticia" name="id_noticia" class="form-control" placeholder="Código" >
		   </div>

		  	<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" >
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Subtitulo" >
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="text" id="cuerpo" name="cuerpo" class="form-control" placeholder="Escriba Aquí..." >
		   </div>




		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Publicar</button>
		  

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