
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

<div class="iconos-superiores">

<a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

 
</div>

 <table border="1">
  <thead>
  <tr>
     <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
    
      echo "<tr>";

      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
    

?>


       <td>
        <a href="../Controllers/Couple_Controller.php?action=SHOWCURRENT&id_pareja=<?php  echo $fila['id_pareja'] ?>&id_campeonato=<?php  echo $fila['id_campeonato'] ?>"><span class="lnr lnr-eye añadir"></span></a>

<?php
if(comprobarPermisos($_SESSION['login']) == 1 || ($_SESSION['login'] == $fila['login1']) ||($_SESSION['login'] == $fila['login2'])){
?>
        <a href="../Controllers/Couple_Controller.php?action=DELETE&id_pareja=<?php  echo $fila['id_pareja'] ?>&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      
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