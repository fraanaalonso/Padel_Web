
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
    <th>ID  Pareja </th>
     <th>Categoria</th>
    <th>Grupo</th>
    <th>Login Capitán</th>
    <th>Acompañante</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
    if($_SESSION['login'] == $fila['login1'] || $_SESSION['login'] == $fila['login2']){

      echo "<tr>";


      echo "<td>".$fila['id_pareja']."</td>";
      echo "<td>".$fila["id_categoria"]."</td>";
      echo "<td>".$fila["id_grupo"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
    


?>


      <td>
       
      
      </td>

<?php



      echo "</tr>";
    }

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