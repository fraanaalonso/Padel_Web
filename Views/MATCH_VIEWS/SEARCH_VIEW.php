

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

    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Match_Controller.php?action=SEARCH">

		 <div class="form-group">
		  	<input type="hidden" id="id_partido" name="id_partido" class="form-control" placeholder="Identificador Partido" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" placeholder="Identificador Pista" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="hora_inicio" name="hora_inicio" class="form-control" placeholder="Inicio del Partido" >
		   </div>


		  

		   <div class="form-group" >
		  	<input type="text" id="fecha" name="fecha" class="form-control" placeholder="Fecha" >
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
