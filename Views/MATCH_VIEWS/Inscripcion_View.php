
<?php

class Inscripcion_View
{
	
	function __construct($valor){
		$this->execution($valor);
	}


	function execution($valor){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Match_Controller.php?action=INSCRIBIR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="text" id="id_partido" readonly name="id_partido" value="<?php echo $valor[0] ?>"  class="form-control" placeholder="Login" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="login" name="login" readonly value="<?php echo $_SESSION['login']?>" class="form-control" placeholder="Login" >
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
