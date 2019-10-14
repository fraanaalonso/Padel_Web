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

    <a href="../Controllers/User_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section3">
		<div class="modal-content">
			
			
		<form class="col-12" method="post" action="../Controllers/Post_Controller.php?action=EDIT" onsubmit="return validar();">

			<br>
			<br>
		 <div class="form-group" id="login-group">
		  	<input type="text" id="id_noticia" name="id_noticia" class="form-control" readonly value="<?php echo $valores['id_noticia']; ?>">
		   </div>	

		  <div class="form-group" id="user-group">
		  	<input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $valores['titulo']; ?>" >
		   </div>

		   <div class="form-group" id="apellidos-group">
		  	<input type="text" id="subtitulo" name="subtitulo" class="form-control" value="<?php echo $valores['subtitulo']; ?>" >
		   </div>

		   <div class="form-group" id="contrasena-group">
		  	<input type="text" id="cuerpo" name="cuerpo" class="form-control" value="<?php echo $valores['cuerpo']; ?>">
		   </div>


		   <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Editar Publicación</button>
		 
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