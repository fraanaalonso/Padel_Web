
<?php 

class SHOWALLL_VIEW
{


	
	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}
	
	function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';




  
   

  
?>


<div class="iconos-superiores">
     
     <?php 
      if(comprobarPermisos($_SESSION['login']) == 1){
     ?>
    <a href="../Controllers/Reservation_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>


    <?php
  }
    ?>
    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>

<?php 
if(comprobarPermisos($_SESSION['login']) == 1){
?>   
    <th>Identificador de Reserva</th>
    <th>Identificador de Pista</th>
<?php

}
?>
    <th>Login</th>
    <th>Comienzo del Partido</th>
    <th>Fecha de Reserva</th>
    <th>Precio Pista</th>


    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
 if( comprobarPermisos($_SESSION['login'] == 1)){
  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      
      echo "<td>".$fila['id_reserva']."</td>";
      echo "<td>".$fila["id_pista"]."</td>";
    
      echo "<td>".$fila["login"]."</td>";
      echo "<td>".$fila["hora_inicio"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
      echo "<td>".$fila["precio"]."</td>";

    
?>






      <td>


        <a href="../Controllers/Reservation_Controller.php?action=SHOWCURRENT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Reservation_Controller.php?action=EDIT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Reservation_Controller.php?action=DELETE&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-trash borrar"></span></a>
            
      </td>


<?php



      echo "</tr>";
    

     }
   }

else{

  
      while ($fila = $resultado->fetch_assoc())
  {

    
     
      echo "<tr>";

     
      
      if(comprobarPermisos($_SESSION['login']) == 1)
      {
      echo "<td>".$fila['id_reserva']."</td>";
      echo "<td>".$fila["id_pista"]."</td>";
      }

      if($_SESSION['login'] == $fila['login'] || comprobarPermisos($_SESSION['login']) == 1){
      echo "<td>".$fila["login"]."</td>";
      echo "<td>".$fila["hora_inicio"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
      echo "<td>".$fila["precio"]."</td>";
    
?>
   <td>


        <a href="../Controllers/Reservation_Controller.php?action=SHOWCURRENT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Reservation_Controller.php?action=EDIT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Reservation_Controller.php?action=DELETE&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-trash borrar"></span></a>
            
      </td>
<?php

}
?>

      <?php

      echo "</tr>";
    

    }
  }
      ?>





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