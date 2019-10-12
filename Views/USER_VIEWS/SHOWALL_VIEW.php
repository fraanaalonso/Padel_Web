
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

<body>

 

<div class="tabla1">
  <table>
  
  <tr>
    <th>Login</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Password</th>
    <th>DNI</th>
    <th>Email</th>
    <th>Pais</th>
    <th>Sexo</th>
    <th>Telefono</th>
    <th>Fecha</th>
    <th>Foto</th>
    <th>Opciones</th>
   

  </tr>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila["login"]."</td>";
      echo "<td>".$fila["nombre"]."</td>";
      echo "<td>".$fila["apellido"]."</td>";
      echo "<td>".$fila["password"]."</td>";
      echo "<td>".$fila["dni"]."</td>";
      echo "<td>".$fila["email"]."</td>";
      echo "<td>".$fila["pais"]."</td>";
      echo "<td>".$fila["sexo"]."</td>";
      echo "<td>".$fila["telefono"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
      echo "<td><a href = \"../Files/" . $fila["foto"]. "\">". $fila["foto"] . " </a></td>";
    
?>
      <td>
      
      </td>

<?php



      echo "</tr>";

     }


 
   
?>


  </table>

</div>
<body>


 
<div>
<?php
include '../Views/Footer.php';

?>
</div>
<?php

  } 
}


?>