
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
      
    <a href="../Controllers/Post_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



  <table border="1">
  <thead>
  <tr>
    <th>Código</th>
    <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Cuerpo</th>
    <th>Opciones </th>
   

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['id_noticia']."</td>";
      echo "<td>".$fila["titulo"]."</td>";
      echo "<td>".$fila["subtitulo"]."</td>";
      echo "<td>".$fila["cuerpo"]."</td>";
    
    
?>


    <td>
        <a href="../Controllers/Post_Controller.php?action=SHOWCURRENT&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-eye añadir"></span></a>
        <a href="../Controllers/Post_Controller.php?action=EDIT&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Post_Controller.php?action=DELETE&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-trash borrar"></span></a>
      
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