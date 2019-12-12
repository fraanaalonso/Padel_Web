<?php 

/**
* 
*/
class SHOWCURRENT_VIEW
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>


  
<div class="iconos-superiores">

    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


       
        <table>
           <tr>
            <th>Administrador</th>
            <td><?php echo $valores[3];?></td>
          </tr>
          <tr>
            <th>Nombre Escuela</th>
            <td><?php echo $valores[1];?></td>
            </tr>
           
          <tr>
            <th>Ubicación</th>
            <td><?php echo $valores[2];?></td>
          </tr>

          <tr>
            <th>Capacidad Máxima</th>
            <td><?php echo $valores[4];?></td>
            </tr>


          <tr>
            <th>Numero de Clases</th>
            <td><?php echo $valores[5];?></td>
            </tr>
           

           


          

     
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
