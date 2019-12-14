
<?php



/**
* 
*/
class SHOWCONFIRM
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
			<th>Confirmaciones de Asistencia</th>
		</tr>


		<tr>
			<th>ID Enfrentamiento</th>
			<th>Pareja</th>
			<th>Capitán</th>
			<th>Socio</th>>
		</tr>


<?php

while($fila = $resultado->fetch_assoc()){


		
	echo "<tr>";
      echo "<td>".$fila['enfrentamiento']."</td>";
      echo "<td>".$fila["pareja"]."</td>";
      echo "<td>".$fila["capitan"]."</td>";
      echo "<td>".$fila["socio"]."</td>";
     echo "</tr>";





}
?>



	</table>
















<?php


	}
}



?>



