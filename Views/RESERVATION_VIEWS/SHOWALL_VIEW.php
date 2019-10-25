
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
    <a href="../Controllers/Reservation_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>
    <a href="../Controllers/Reservation_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>


    <?php
  }
    ?>
    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Identificador de Reserva</th>
    <th>Identificador de Pista</th>
    <th>Login</th>
    <th>Comienzo del Partido</th>
    <th>Fecha de Reserva</th>


    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
    if($_SESSION['login'] == $fila['login'] || comprobarPermisos($_SESSION['login'] == 1)){
      echo "<tr>";
      echo "<td>".$fila['id_reserva']."</td>";
      echo "<td>".$fila["id_pista"]."</td>";
      echo "<td>".$fila["login"]."</td>";
      echo "<td>".$fila["hora_inicio"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";

}
    
?>


      <td>


        <a href="../Controllers/Reservation_Controller.php?action=SHOWCURRENT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Reservation_Controller.php?action=EDIT&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-pencil editar"></span></a>

        <?php
          if(comprobarPermisos($_SESSION['login']) == 1){
        ?>
        <a href="../Controllers/Reservation_Controller.php?action=DELETE&id_reserva=<?php  echo $fila['id_reserva'] ?>"><span class="lnr lnr-trash borrar"></span></a>
        <?php
          }
        ?>      
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