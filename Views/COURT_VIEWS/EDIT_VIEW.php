<?php

class EDIT_VIEW
{
	
	function __construct($valores){
		$this->execution($valores);
	}


	function execution($valores){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Court_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



<div class="modal-dialog text-center">
	<div class="col-sm-15 main-section2">
		<div class="modal-content">
			
			
	<form class="col-12" method="post" action="../Controllers/Court_Controller.php?action=EDIT" >

		 <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $valores['id_pista'];?>" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="ubica" name="ubicacion" class="form-control" value="<?php echo $valores['ubicacion'];?>">
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="num_pista" name="num_pista" class="form-control" value="<?php echo $valores['num_pista'];?>" >
		   </div>

		    <div class="form-group" >
		   	<select name="terreno" id="terreno"  class="form-control">

		   	  <option  value="<?php echo $valores['terreno'];?>" selected>Seleccione terreno</option>
              <option value = 'Hierba' <?php if ($valores['terreno'] == 'Hierba') echo 'selected'; ?>>Hierba</option><br>
              <option value = 'Sintetico' <?php if ($valores['terreno'] == 'Sintetico') echo 'selected'; ?>>Sintetico</option><br>

		   	</select>
		   </div>


		    <div class="form-group">
		  	<input type="text" id="precio" name="precio" class="form-control" value="<?php echo $valores['precio'];?>" placeholder="Precio" >
		   </div>


		   <div class="form-group">
		  	<input type="text" id="estado" name="estado" class="form-control" value="<?php echo $valores['estado'];?>" placeholder="Estado" >
		   </div>

		   <button type="submit" class="btn btn-light"><i class="fas fa-sign-in-alt"></i><span class="lnr lnr-pencil" style="font-size: 35px;"></span></button>
		  

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