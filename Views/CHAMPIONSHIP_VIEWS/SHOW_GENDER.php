<?php

class SHOWGENDER
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>



<div class="iconos-superiores">
      
   <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



      <table>
           <tr>
            <th>Identificador Categoria</th>
            <td><?php echo $valores[0];?></td>
          </tr>

           <tr>
            <th>Categoría</th>
            <td><?php echo $valores[1];?></td>
            </tr>
           <tr>

          
     
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>

