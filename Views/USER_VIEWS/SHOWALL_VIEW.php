
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
      
    <a href="../Controllers/User_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

<?php
}
?>
    <a href="../Controllers/User_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/User_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

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
    <th>Foto de Perfil</th>
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
  ?>
  <div class="ventana" id="vent">
    <div id="cerrar"><img src="./img/cancel.png">
  <?php
      echo "<td><a href=\"../img/fotosPerfil/" . $fila["foto"]. "\">". $fila["foto"] . " </a></td>";

  ?>
  </div>
</div>

<script type="text/javascript">
  
  function abrir(){
    document.getElementById("vent").style.display="block";

  }
</script>
  <?php    
      echo "<td>".$fila["rol_id"]."</td>";
    



?>


<?php
if(comprobarPermisos($_SESSION['login'])==1){
?>

      <td>
        <a href="../Controllers/User_Controller.php?action=SHOWCURRENT&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/User_Controller.php?action=EDIT&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/User_Controller.php?action=DELETE&login=<?php  echo $fila['login'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      
      </td>


<?php
}
?>
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