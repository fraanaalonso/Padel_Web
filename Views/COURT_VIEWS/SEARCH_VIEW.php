<?php



class SEARCH_VIEW
{
	
	function __construct(){
		$this->execution();
	}


	function execution(){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Court_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			
			
		<form class="col-12" method="post" action="../Controllers/Court_Controller.php?action=SEARCH" >

		 <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" placeholder="Identificador de Pista" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="ubica" name="ubicacion" class="form-control" placeholder="Ubicacion" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="num_pista" name="num_pista" class="form-control" placeholder="Número de Pista" >
		   </div>

		    <div class="form-group" >
		   	<select name="terreno" id="terreno"  class="form-control">

		   		<option>Sintética</option>

		   		<option>Hierba</option>

		   	</select>
		   </div>

		   <div class="form-group">
		  	<input type="text" id="dimension" name="dimension" class="form-control" placeholder="Dimension" >
		   </div>


		
		

		   <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-magnifier" style="font-size: 35px;"></span></button>
		   <p>
		  
		   </p>
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