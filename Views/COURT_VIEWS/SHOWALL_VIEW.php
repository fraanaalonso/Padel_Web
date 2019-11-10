
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


<div class="iconos-superiores">

  <?php
  if(comprobarPermisos($_SESSION['login'])==1){
      
  ?>
      
    <a href="../Controllers/Court_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

<?php
}
?>
    <a href="../Controllers/Court_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Court_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
   <?php
   if(comprobarPermisos($_SESSION['login']) == 1){
   ?> 
    <th>Identificador de Pista</th>

    <?php
      }
    ?>
    <th>Descripcion</th>
    <th>Ubicación</th>
    <th>Precio</th>
    <th>Estado</th>
    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      if(comprobarPermisos($_SESSION['login']) == 1){
      echo "<td>".$fila['id_pista']."</td>";
    }
      echo "<td>".$fila["descripcion"]."</td>";
      echo "<td>".$fila["ubicacion"]."</td>";
      echo "<td>".$fila["precio"]."</td>";
      echo "<td>".$fila["estado"]."</td>";
    
?>


      <td>
        <a href="../Controllers/Court_Controller.php?action=SHOWCURRENT&id_pista=<?php  echo $fila['id_pista'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <?php
          if(comprobarPermisos($_SESSION['login'])==1){
        ?>
        <a href="../Controllers/Court_Controller.php?action=EDIT&id_pista=<?php  echo $fila['id_pista'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Court_Controller.php?action=DELETE&id_pista=<?php  echo $fila['id_pista'] ?>"><span class="lnr lnr-trash borrar"></span></a>
     <?php   
      }

      ?>
        <a href="../Controllers/Reservation_Controller.php?action=INSERTAR&id_pista=<?php  echo $fila['id_pista'] ?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 20px"></span></a>
        <a href="../Controllers/Match_Controller.php?action=PROMOCIONAR&id_pista=<?php  echo $fila['id_pista'] ?>"><span class="lnr lnr-plus-circle" style="font-size: 20px"></span></a>
        
      
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