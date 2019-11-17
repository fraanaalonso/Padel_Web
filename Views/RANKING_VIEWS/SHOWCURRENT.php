<?php

class SHOWCURRENT_VIEW
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      
     
?>





      <table>


           <tr>
            <th>ID Pareja</th>
            <td><?php echo $valores[0];?></td>
          </tr>

           <tr>
            <th>Partidos Jugados</th>
            <td><?php echo $valores[1];?></td>
            </tr>
           <tr>


           <tr>
            <th>Partidos Ganados</th>
            <td><?php echo $valores[2];?></td>
          </tr>


           <tr>
            <th>Puntos</th>
            <td><?php echo $valores[3];?></td>
          </tr>


     
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
