

<?php

/**
* 
*/
class InscribirCampeonatoView
{
	
	function __construct($valores, $niveles, $categorias){
		$this->execution($valores, $niveles, $categorias);
	}


	function execution($valores, $niveles, $categorias){
		include '../Views/HeaderPost.php';
			require_once '../Functions/funciones.php';
?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			
			
		<form class="col-12" method="post" action="../Controllers/Championship_Controller.php?action=REGISTRAR" onsubmit="return validar();">

		 <div class="form-group">Campeonato Seleccionado
		  	<input type="text" id="id_campeonato" name="id_campeonato" class="form-control" readonly  value="<?php echo $valores[0] ?>"  placeholder="Identificador Campeonato" >
		   </div>	

		  <div class="form-group">Fecha Comienzo
		  	<input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control" readonly value="<?php echo $valores[1] ?>" placeholder="Inicio del Campeonato" >
		   </div> 

		  <div class="form-group">Límite de Inscripcion
		  	<input type="text" id="fecha_limite" name="fecha_limite" class="form-control" readonly value="<?php echo $valores[2] ?>" placeholder="Límite de Inscripción" >
		   </div>


		   <div class="form-group" >Normativa Campeonato
		  	<input type="text" id="id_normativa" name="id_normativa" class="form-control" readonly value="<?php echo $valores[3] ?>" placeholder="ID Normativa" >
		   </div>


		   <div class="form-group" >Login Capitán
		  	<input type="text" id="login1" name="login1" class="form-control" readonly value="<?php echo $_SESSION['login'] ?>"  placeholder="Login Participante 1" >
		   </div>

<div class="form-group">Seleccione Nivel
<select id="id_nivel" name="id_nivel" class="form-control" required="">

<?php
while ($nivel = mysqli_fetch_array($niveles)){

		  
echo '<option value = "'.$nivel[0].'">'.$nivel[1].'</option>';

}
?>
</select>
</div>


<div class="form-group">Seleccione Categoria
<select id="id_categoria" name="id_categoria" class="form-control" required="">

<?php
while ($categoria = mysqli_fetch_array($categorias)){

		  
echo '<option value = "'.$categoria[0].'">'.$categoria[1].'</option>';

}
?>
</select>
</div>	   


			<div class="form-group" >Login Acompañante
		  	<input type="text" id="login2" name="login2" class="form-control" placeholder="Login Participante 2" >
		   </div>

		

			<div class="form-group" >
				<input type="password" id="password" name="password" class="form-control"  placeholder="Password Login Acompañante" >
		    </div>

		


		   <div class="form-group" >
		  	<input type="hidden" id="id_pareja" name="id_pareja" value="<?php echo 0 ?>" class="form-control" >
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
