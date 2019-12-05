
<?php
/**
* 
*/
class SHOWFINAL
{
	
	function __construct($fila, $resultado, $campeonato, $grupo)
	{
		$this->execute($fila, $resultado, $campeonato, $grupo);
	}


	function execute($fila, $resultado, $campeonato, $grupo){
		include '../Views/HeaderPost.php';

?>



<div class="iconos-superiores">
   <a href="../Controllers/Championship_Controller.php?action=SEMIS&id_campeonato=<?php echo $campeonato?>&id_grupo=<?php echo $grupo?>"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


	<table border ="1">



		<tr>
			<th>Final</th>
		</tr>


		<tr>
			<th>Fecha</th>
			<th>Hora Comienzo</th>
			<th>ID Campeonato</th>>
			<th>Resultado</th>
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
					<?php	echo $fila['fecha'] ?>
				</td>

				<td cowspan="1">
					<?php	echo $fila['hora_inicio'] ?>
				</td>

				<td cowspan="1">
					<?php	echo $fila['id_campeonato'] ?>
				</td>



				<td cowspan="1">
				<?php	echo $fila['resultado'] ?>
				</td>

				<td cowspan="1">
				<?php
					echo "[";
					echo $fila['id_pareja1'];
					echo "]";
					echo "-";
					echo "<strong>";
					echo $fila['l1p1'];
					echo "/";
					echo $fila['l2p1'];
					echo "</strong>";
				?>
				</td>


				<td cowspan="1">
				<?php 	echo $fila['numSetsPareja1'] ?>
				</td>


				<td cowspan="1">
					<?php echo "[";
					echo $fila['id_pareja2'];
					echo "]";
					echo "-";
					echo "<strong>";
					echo $fila['l1p2'];
					echo "/";
					echo $fila['l2p2'];
					echo "</strong>"; ?>
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



