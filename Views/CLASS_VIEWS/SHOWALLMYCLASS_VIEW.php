
<?php 

class SHOWALLMYCLASS_VIEW
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
   <td>
    <strong>Mis Clases</strong>
  </td>
   </thead>
  <thead>
 
  <tr>

    <th>Login</th>
    <th>Centro</th>
    <th>Clase</th>
   

  </tr>

</thead>

<?php

  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      
      echo "<td>".$fila['login']."</td>";
      echo "<td>".$fila["nombre"]."</td>";  
      echo "<td>".$fila["titulo"]."</td>";   

    
?>








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