

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

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=ADD" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_campeonato" name="id_campeonato" class="form-control" placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="fecha_limite" name="fecha_limite" class="form-control" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="id_normativa" name="id_normativa" class="form-control" placeholder="ID NOrmativa" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_grupo" name="id_grupo" class="form-control" placeholder="ID Grupo" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_categoria" name="id_categoria" class="form-control" placeholder="ID Categoria" >
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
