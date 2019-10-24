

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

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=EDIT" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="text" id="id_campeonato" name="id_campeonato" class="form-control" readonly value="<?php echo $valores[0] ?>" placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="fecha_inicio" name="fecha_inicio" required class="form-control" value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="fecha_limite" name="fecha_limite" required class="form-control" value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="id_normativa" name="id_normativa" required class="form-control" value="<?php echo $valores[3] ?>" placeholder="ID NOrmativa" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_grupo" name="id_grupo" required class="form-control" value="<?php echo $valores[4] ?>" placeholder="ID Grupo" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_categoria" name="id_categoria" required  class="form-control" value="<?php echo $valores[5] ?>" placeholder="ID Categoria" >
		   </div>
		
		

		   <button type="submit" class="btn btn-light"><span class="lnr lnr-file-add" style="font-size: 35px;"></span></button>
		   <p>
		  
		   </p>
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
