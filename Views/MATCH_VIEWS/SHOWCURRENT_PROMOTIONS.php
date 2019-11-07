

<?php 

class SHOWCURRENT_PROMOTIONS
{


	
	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}
	
	function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';




  
   

  
?>


<div class="iconos-superiores">
      
    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Login</th>
    <th>ID Partido</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['login']."</td>";
         echo "<td> <a href=\"../Controllers/Match_Controller.php?action=SHOWCURRENT&id_partido=" . $fila['id_partido'] . "\"> " . $fila['id_partido'] . " </a> </td>";
?>


      <td>
        <a href="../Controllers/Match_Controller.php?action=DELETEMYPROMOTION&login=<?php  echo $fila['login'] ?>&id_partido=<?php  echo $fila['id_partido'] ?>"><span class="lnr lnr-trash borrar"></span></a>
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