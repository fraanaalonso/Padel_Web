
<?php 

class SHOWINSCRITOS
{


	
	function __construct($resultado)
	{
		$this->mostrarDatos($resultado);
	}
	
	function mostrarDatos($resultado){
    include '../Views/HeaderPost.php';




  
   

  
?>


<div class="iconos-superiores">
      
      <?php
      if(comprobarPermisos($_SESSION['login']) == 1){
      ?>
    <a href="../Controllers/Match_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

  <?php

}
  ?>
    <a href="../Controllers/Match_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Match_Controller.php?action=SHOWMYPROMOTIONS"><span class="lnr lnr-list" style="font-size: 35px"></span></a>
    <a href="../Controllers/Match_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


 


 <table border="1">
  <thead>
  <tr>
    <th>Jugadores Inscritos en la Promoción</th>

  </tr>

</thead>

<?php
 
  
  while ($fila = mysqli_fetch_array($resultado))
  {
      echo "<tr>";
      echo "<td>".$fila[0]."</td>";
 
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