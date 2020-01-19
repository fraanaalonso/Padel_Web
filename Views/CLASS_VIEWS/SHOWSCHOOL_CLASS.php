
<?php 

class SHOWSCHOOL_CLASS
{


  
  function __construct($fila, $resultado)
  {
    $this->mostrarDatos($fila, $resultado);
  }
  
  function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';




  
   

  
?>

<div class="iconos-superiores">
      
    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

 


 <table border="1">
  <thead>
  <tr>

    <th>Descripcion</th>

    <th>Entrenador</th>
    
    <th>Nivel</th>
 

    <th>Tipo</th>
       
 
    <th>Opciones</th>
   

  </tr>

</thead>

<?php

  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      
      echo "<td>".$fila['descripcion']."</td>";
      echo "<td>".$fila["login"]."</td>";  
      echo "<td>".$fila["nivel"]."</td>";  
      echo "<td>".$fila["tipo"]."</td>";  

    
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