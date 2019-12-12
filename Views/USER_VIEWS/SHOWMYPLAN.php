
<?php 

class SHOWMYPLAN
{


	
	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}
	
	function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';




  
   

  
?>




 


 <table border="1">
  <thead>
  <tr>
   
    <th>Plan Actual</th>
    <th>Login</th>
    <th>Fecha de Caducacion</th>
    <th>Precio Pagado</th>
    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";


      echo "<td>".$fila['tipo']."</td>";    
      echo "<td>".$fila["login"]."</td>";
      echo "<td>".$fila["caducacion"]."</td>";
      echo "<td>".$fila["precio"]."</td>";
    
?>


      <td>
      <a href="../Controllers/User_Controller.php?action=DELETE_PLAN&tipo=<?php  echo $fila['tipo'] ?>&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      </td>

<?php



      echo "</tr>";

     }


 
   
?>


  </table>



 
<div>
<?php
include '../Views/Footer.php';

?>
</div>
<?php

  } 
}


?>