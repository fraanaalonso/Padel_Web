
<?php 

class SHOWALL_VIEW
{


	
	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}
	
	function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';
    require_once '../Functions/funciones.php';



  
   

  
?>


<div class="iconos-superiores">


      
   
    <a href="../Controllers/Match_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Match_Controller.php?action=SHOWMYPROMOTIONS"><span class="lnr lnr-list" style="font-size: 35px"></span></a>
    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Identificador Partido</th>
    <th>Identificador de Pista</th>
    <th>Hora Inicio</th>
    <th>Hora Fin</th>
    <th>Fecha</th>
    <th>Opciones</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = $resultado->fetch_assoc())
  {
      echo "<tr>";
      echo "<td>".$fila['id_partido']."</td>";
      echo "<td>".$fila["id_pista"]."</td>";
      echo "<td>".$fila["hora_inicio"]."</td>";
      echo "<td>".$fila["hora_fin"]."</td>";
      echo "<td>".$fila["fecha"]."</td>";
?>


      <td>
        <a href="../Controllers/Match_Controller.php?action=SHOWCURRENT&id_partido=<?php  echo $fila['id_partido'] ?>"><span class="lnr lnr-eye añadir"></span></a>
<?php
  if(comprobarPermisos($_SESSION['login']) == 1){
?>
        <a href="../Controllers/Match_Controller.php?action=EDIT&id_partido=<?php  echo $fila['id_partido'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Match_Controller.php?action=DELETE&id_partido=<?php  echo $fila['id_partido'] ?>"><span class="lnr lnr-trash borrar"></span></a>

<?php

}
?>

        <?php

        if(!comprobarNumeroInscritos($fila['id_partido'])){

        ?>
        <a href="../Controllers/Match_Controller.php?action=INSCRIBIR&id_partido=<?php echo $fila['id_partido']?>"><span class="lnr lnr-chevron-right-circle" style="font-size: 20px"></span></a>

<?php

      }

?>
        <a href="../Controllers/Match_Controller.php?action=SHOWINSCRITOS&id_partido=<?php  echo $fila['id_partido'] ?>"><span class="lnr lnr-users editar" style="font-size: 20px"></span></a>
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