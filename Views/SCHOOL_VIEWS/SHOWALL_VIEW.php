
<?php 

class SHOWALL_VIEW
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

    <th>Nombre Escuela</th>
    <th>Ubicacion</th>
    <th>Opciones</th>
   

  </tr>

</thead>

<?php

  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      
      echo "<td>".$fila['nombre']."</td>";
      echo "<td>".$fila["ubicacion"]."</td>";  

    
?>






      <td>

            
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