
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

    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/School_Controller.php?action=ADD">
	

		  <div class="form-group">
		  	<input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Nombre Escuela" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="ubi" name="ubicacion" class="form-control" required  placeholder="Ubicación" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="administrador" name="administrador" readonly required value="<?php echo $_SESSION['login'] ?>"  class="form-control" placeholder="Administrador" >
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
