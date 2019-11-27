
<?php 

class SHOWALL_PAYMENTS
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
    <th>Login    </th>
    <th>Estado   </th>
    <th>Cantidad </th>
    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
    if($_SESSION['login'] == $fila['login'] || comprobarPermisos($fila['login'] == 1)){
      echo "<tr>";
      echo "<td>".$fila['login']."</td>";
      echo "<td>".$fila["concepto"]."</td>";
      echo "<td>".$fila["precio"]."</td>";
      echo "<td>".$fila["estado"]."</td>";



?>
<td>  
<a href="../Controllers/Match_Controller.php?action=EDIT&id_pago<?php  echo $fila['id_pago'] ?>"><span class="lnr lnr-cart borrar"></span></a>
</td>
<?php



      echo "</tr>";
    
    }

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