
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




<div class="resutado">
	<table id="resutados" border ="1">



		<tr>
			<th>Jornada</th>
		</tr>


		<tr>
			<th>Fecha</th>
			<th>Pareja 1</th>
			<th>Resutado</th>
			<th>Pareja 2</th>
		</tr>


<?php

while($fila = mysql_fetch_array($resultado)){
?>

			<tr>
				<td cowspan="1">
					11-10-19
				</td>

				<td cowspan="1">
					<!--Pareja 1-->
				</td>

				<td cowspan="1">
					
				</td>

				<td cowspan="1">
				<!--Pareja 2-->
				</td>

			</tr>



<?php

}
?>



	</table>
	</div>















<?php
include '../Views/Footer.php';

	}
}



?>



