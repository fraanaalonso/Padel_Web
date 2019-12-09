
<?php



/**
* 
*/
class CLASH_SHOWALL
{
	
	function __construct($fila, $resultado, $campeonato,$grupo)
	{
		$this->execute($fila, $resultado, $campeonato,$grupo);
	}


	function execute($fila, $resultado, $campeonato,$grupo){
		include '../Views/HeaderPost.php';

?>



<div class="iconos-superiores">
   <a href="../Controllers/Championship_Controller.php?action=GENERARGRUPOS&id_campeonato=<?php echo $campeonato?>"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>
   <a href="../Controllers/Championship_Controller.php?action=CUARTOS&id_campeonato=<?php  echo $campeonato ?>&id_grupo=<?php  echo $grupo ?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 35px"></span></a>

</div>


	<table border ="1">



		<tr>
			<th>Liga Regular</th>
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
			<th>Confirmación</th>
			<th>Categoria</th>
			<th>Nivel</th>
			<th>Pista</th>

		<?php
			if(comprobarPermisos($_SESSION['login']) == 1){
		?>
			<th>Opciones</th>

		<?php
			}
		?>
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
					<?php 
					echo "[";
					echo $fila['id_pareja2'];
					echo "]";
					echo "-";
					echo "<strong>";
					echo $fila['l1p2'];
					echo "/";
					echo $fila['l2p2'];
					echo "</strong>";
					?>

				</td>


				<td cowspan="1">
				 <?php

				 echo $fila['numSetsPareja2'];
				 ?>
				</td>

				<td>

				 
				 <a href="../Controllers/Clash_Controller.php?action=CONFIRMACION&id_enfrentamiento=<?php echo $fila['id_enfrentamiento']?>&id_campeonato=<?php echo $fila['id_campeonato']?>&id_pareja1=<?php echo $fila['id_pareja1']?>&id_pareja2=<?php echo $fila['id_pareja2']?>&l1p1=<?php echo $fila['l1p1']?>&l2p1=<?php echo $fila['l2p1']?>&l1p2=<?php echo $fila['l1p2']?>&l2p2=<?php echo $fila['l2p2']?>&tipo=<?php echo $fila['tipo'] ?>&hora_inicio=<?php echo $fila['hora_inicio'] ?>&fecha=<?php echo $fila['fecha'] ?>&id_pista=<?php echo $fila['id_pista'] ?>"><span style="font-size: 35px" class="lnr lnr-thumbs-up editar"></span></a>

				
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

				<td cowspan="1">
				 <?php

				 echo $fila['id_pista'];
				 ?>
				</td>

				<?php
			if(comprobarPermisos($_SESSION['login']) == 1){
				?>


				<td>
					
				 <a href="../Controllers/Clash_Controller.php?action=EDIT&id_enfrentamiento=<?php  echo $fila['id_enfrentamiento'] ?>&id_campeonato=<?php echo $fila['id_campeonato']?>"><span class="lnr lnr-pencil" style="font-size: 20px"></span></a>
				</td>

				<?php
				}
				?>

			</tr>




<?php

}
?>



	</table>
















<?php


	}
}



?>



