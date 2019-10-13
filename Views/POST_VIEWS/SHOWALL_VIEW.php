
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


 <div class="iconos_superiores">
    <a href="../Controllers/Post_Controller.php?action=ADD"><span class="lnr lnr-add "></span></a>
    <a href="../Controllers/Post_Controller.php?action=SEARCH"><span class="lnr lnr-search"></span></a>
    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-eye"></span></a>
</div>

<table>
<tr>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th>
        <img src="../img/user3.png">      
    </th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>

</tr>
</table>
 


  <table border="1">
  <thead>
  <tr>
    <th>Código</th>
    <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Cuerpo</th>
    <th>Autor</th>
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
      echo "<td>".$fila["login"]."</td>";
    
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