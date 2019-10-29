

<?php

/**
* 
*/
class InscribirCampeonatoView
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
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=REGISTRAR" onsubmit="return validar();">

		 <div class="form-group">
		  	<input type="hidden" id="id_campeonato" name="id_campeonato" class="form-control" readonly  value="<?php echo $valores[0] ?>"  placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">
		  	<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control" readonly value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">
		  	<input type="text" id="fecha_limite" name="fecha_limite" class="form-control" readonly value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >
		  	<input type="text" id="id_normativa" name="id_normativa" class="form-control" readonly value="<?php echo $valores[3] ?>" placeholder="ID Normativa" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_grupo" name="id_grupo" class="form-control" readonly value="<?php echo $valores[4] ?>" placeholder="ID Grupo" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="id_categoria" name="id_categoria" class="form-control" readonly value="<?php echo $valores[5] ?>" placeholder="ID Categoria" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login1" name="login1" class="form-control"  placeholder="Login Participante 1" >
		   </div>

		   <div class="form-group" >
		  	<input type="text" id="login2" name="login2" class="form-control"  placeholder="Login Participante 2" >
		   </div>
		

		   <div class="form-group" >
		  	<input type="hidden" id="id_pareja" name="id_pareja" class="form-control"   placeholder="Login Participante 2" >
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
