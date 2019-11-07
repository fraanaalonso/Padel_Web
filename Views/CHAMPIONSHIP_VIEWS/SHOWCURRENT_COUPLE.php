<?php

class SHOWCURRENT_COUPLE
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
            <th>Capitán</th>
            <td><?php echo $valores[3];?></td>
          </tr>

          <tr>
            <th>Socio</th>
            <td><?php echo $valores[4];?></td>
          </tr>
     
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
