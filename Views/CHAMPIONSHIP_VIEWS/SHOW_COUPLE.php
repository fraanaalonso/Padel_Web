
<?php 

class SHOWALL_COUPLE
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
     <th>ID  Pareja</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";


      echo "<td>".$fila["id_pareja"]."</td>";
    


?>


       <td>
        <a href="../Controllers/Championship_Controller.php?action=SHOWCURRENT&id_pareja=<?php  echo $fila['id_pareja'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Championship_Controller.php?action=EDIT&id_pareja=<?php  echo $fila['id_pareja'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Championship_Controller.php?action=DELETE&id_pareja=<?php  echo $fila['id_pareja'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      
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