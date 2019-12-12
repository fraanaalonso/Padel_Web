
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


<?php
if(comprobarPermisos($_SESSION['login'])==1){
?>
<div class="iconos-superiores">
      
    <a href="../Controllers/School_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

<?php
}
?>
    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

 


 <table border="1">
  <thead>
  <tr>

    <th>Nombre Escuela</th>
    <th>Ubicacion</th>
    <th>Capacidad Escuela</th>
    <th>Número de Clases</th>
    <th>Opciones</th>
   

  </tr>

</thead>

<?php

  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      
      echo "<td>".$fila['nombre']."</td>";
      echo "<td>".$fila["ubicacion"]."</td>";  
      echo "<td>".$fila["capacidad"]."</td>";  
      echo "<td>".$fila["num_clases"]."</td>";  

    
?>






      <td>
         <a href="../Controllers/School_Controller.php?action=INSCRIBIR&codigo=<?php  echo $fila['codigo'] ?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 20px"></span></a>
         <a href="../Controllers/School_Controller.php?action=EDIT&codigo=<?php  echo $fila['codigo'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/School_Controller.php?action=DELETE&codigo=<?php  echo $fila['codigo'] ?>"><span class="lnr lnr-trash borrar"></span></a>
        <a href="../Controllers/School_Controller.php?action=SHOWCURRENT&codigo=<?php  echo $fila['codigo'] ?>"><span class="lnr lnr-eye añadir"></span></a>
            
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