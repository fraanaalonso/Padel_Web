
<?php 

class SHOWSCHOOL_CLASS
{


  
  function __construct($fila, $resultado, $codigo)
  {
    $this->mostrarDatos($fila, $resultado, $codigo);
  }
  
  function mostrarDatos($fila, $resultado, $codigo){
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

        <a href="../Controllers/Class_Controller.php?action=INSCRIBIR&id_clase=<?php  echo $fila['id_clase'] ?>&codigo=<?php echo $codigo?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 20px"></span></a>
             
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