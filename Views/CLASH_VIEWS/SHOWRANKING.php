
<?php



/**
* 
*/
class SHOWRANKING
{
	
	function __construct($fila, $resultado, $campeonato, $categoria, $nivel)
	{
		$this->execute($fila, $resultado, $campeonato, $categoria, $nivel);
	}


	function execute($fila, $resultado, $campeonato, $categoria, $nivel){
		include '../Views/HeaderPost.php';

?>



<div class="iconos-superiores">
   <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


	<table border="1">

		
	<tr>
			<th id="equipo">Puesto</th>
			<th id="equipo" >
		ID Pareja
			</th>
			<th>
		PJ
			</th>
		<th id="ganar">	
		G
		</th>
		
			<th>
		Pts</th>
		<th>
			Opciones
		</th>
	</tr>


<?php
$i=1;
while($fila = $resultado->fetch_assoc()){

?>



				
		<tr>
		<td id="puesto"cowspan="1"><?php echo $i ?></td>
		<td id="equipo" cowspan="1"><?php	echo $fila['pareja']; ?></td>
		<td cowspan="1"><?php	echo $fila['jugados']; ?></td>
		<td id="ganar"cowspan="1"><?php echo $fila['ganados'];?></td>
		<td id="perder"cowspan="1"><?php echo $fila['puntos']; ?></td>
		<td>
			 <a href="../Controllers/Ranking_Controller.php?action=SHOWCURRENT&id_pareja=<?php  echo $fila['id_pareja'] ?>"><span class="lnr lnr-eye añadir"></span></a>
		</td>
		</tr>

		

<?php

$i++;
}
?>



	</table>
















<?php
include '../Views/Footer.php';

	}
}



?>



