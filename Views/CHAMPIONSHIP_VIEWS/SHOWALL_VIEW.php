
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
      
    <a href="../Controllers/Championship_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>
    <a href="../Controllers/Championship_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Identificador Campeonato</th>
    <th>Fecha Inicio</th>
    <th>Fecha Límite</th>
    <th>ID Normativa</th>
    <th>ID Grupo</th>
    <th>ID Categoría</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['id_campeonato']."</td>";
      echo "<td>".$fila["fecha_inicio"]."</td>";
      echo "<td>".$fila["fecha_limite"]."</td>";
     echo "<td> <a href=\"../Controllers/Championship_Controller.php?action=SHOWNORMATIVA&id_normativa=" . $fila['id_normativa'] . "\"> " . $fila['id_normativa'] . " </a> </td>";
      echo "<td> <a href=\"../Controllers/Championship_Controller.php?action=SHOWGRUPO&id_grupo=" . $fila['id_grupo'] . "\"> " . $fila['id_grupo'] . " </a> </td>";
     echo "<td> <a href=\"../Controllers/Championship_Controller.php?action=SHOWCATEGORIA&id_categoria=" . $fila['id_categoria'] . "\"> " . $fila['id_categoria'] . " </a> </td>";
?>


      <td>
        <a href="../Controllers/Championship_Controller.php?action=SHOWCURRENT&id_campeonato=<?php  echo $fila['id_campeonato'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Championship_Controller.php?action=EDIT&id_campeonato=<?php  echo $fila['id_campeonato'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Championship_Controller.php?action=DELETE&id_campeonato=<?php  echo $fila['id_campeonato'] ?>"><span class="lnr lnr-trash borrar"></span></a>
        <a href="../Controllers/Championship_Controller.php?action=REGISTRAR&id_campeonato=<?php  echo $fila['id_campeonato'] ?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 20px"></span></a>
      
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