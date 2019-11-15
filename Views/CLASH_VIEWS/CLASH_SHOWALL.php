
<?php



/**
* 
*/
class CLASH_SHOWALL
{
	
	function __construct($fila, $resultado)
	{
		$this->execute($fila, $resultado);
	}


	function execute($fila, $resultado){
		include '../Views/HeaderPost.php';

?>




	<table border ="1">



		<tr>
			<th>Jornada</th>
		</tr>


		<tr>
			<th>Fecha</th>
			<th>ID Campeonato</th>>
			<th>ID Enfrentamiento</th>
			<th>Pareja 1</th>
			<th>Num Sets Pareja1</th>
			<th>Pareja 2</th>
			<th>Num Sets Pareja2</th>
			<th>ID Categoria</th>
			<th>ID Nivel</th>
			<th>Opciones</th>
		</tr>


<?php

while($fila = $resultado->fetch_assoc()){
?>

			<tr>
				<td cowspan="1">
					11-10-19
				</td>

				<td cowspan="1">
					<?php	echo $fila['id_campeonato'] ?>
				</td>



				<td cowspan="1">
				<?php	echo $fila['id_enfrentamiento'] ?>
				</td>

				<td cowspan="1">
				<?php
					echo $fila['id_pareja1']
				?>
				</td>


				<td cowspan="1">
				<?php 	echo $fila['numSetsPareja1'] ?>
				</td>


				<td cowspan="1">
					<?php echo $fila['id_pareja2'] ?>
				</td>


				<td cowspan="1">
				 <?php

				 echo $fila['numSetsPareja2'];
				 ?>
				</td>

				<td cowspan="1">
				 <?php

				 echo $fila['categoria'];
				 ?>
				</td>

				<td cowspan="1">
				 <?php

				 echo $fila['nivel'];
				 ?>
				</td>


				<td>
					
				 <a href="../Controllers/Clash_Controller.php?action=EDIT&id_enfrentamiento=<?php  echo $fila['id_enfrentamiento'] ?>&id_campeonato=<?php echo $fila['id_campeonato']?>"><span class="lnr lnr-pencil" style="font-size: 20px"></span></a>
				</td>

			</tr>




<?php

}
?>



	</table>
















<?php
include '../Views/Footer.php';

	}
}



?>



