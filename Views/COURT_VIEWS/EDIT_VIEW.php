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



<div class="formulario">
			
			
	<form class="col-12" method="post" action="../Controllers/Court_Controller.php?action=EDIT" >

		 <div class="form-group">
		  	<input type="text" id="id_pista" name="id_pista" class="form-control" readonly value="<?php echo $valores['id_pista'];?>" >
		   </div>

		   <div class="form-group">
		  	<input type="text" id="descripcion" name="descripcion" class="form-control" readonly value="<?php echo $valores['descripcion'];?>" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="ubica" name="ubicacion" class="form-control" value="<?php echo $valores['ubicacion'];?>">
		   </div>



		    <div class="form-group">
		  	<input type="text" id="precio" name="precio" class="form-control" value="<?php echo $valores['precio'];?>" placeholder="Precio" >
		   </div>


		

		   <button type="submit" class="btn btn-light"><span class="lnr lnr-pencil" style="font-size: 35px;"></span></button>
		  

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