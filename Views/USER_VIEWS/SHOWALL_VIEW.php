
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
      
    <a href="../Controllers/User_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>
    <a href="../Controllers/User_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Login    </th>
    <th>Nombre   </th>
    <th>Apellido </th>
    <th>Password </th>
    <th>DNI      </th>
    <th>Email    </th>
    <th>Pais     </th>
    <th>Sexo     </th>
    <th>Telefono </th>
    <th>Fecha    </th>
    <th>Foto     </th>
    <th>Rol del Usuario</th>
    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['login']."</td>";
      echo "<td>".$fila["nombre"]."</td>";
      echo "<td>".$fila["apellido"]."</td>";
      echo "<td>".$fila["password"]."</td>";
      echo "<td>".$fila["dni"]."</td>";
      echo "<td>".$fila["email"]."</td>";
      echo "<td>".$fila["pais"]."</td>";
      echo "<td>".$fila["sexo"]."</td>";
      echo "<td>".$fila["telefono"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
      echo "<td><a href = \"../../img/" . $fila["foto"]. "\">". $fila["foto"] . " </a></td>";
      echo "<td>".$fila["rol_id"]."</td>";
    
?>


      <td>
        <a href="../Controllers/User_Controller.php?action=SHOWCURRENT&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/User_Controller.php?action=EDIT&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/User_Controller.php?action=DELETE&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      
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