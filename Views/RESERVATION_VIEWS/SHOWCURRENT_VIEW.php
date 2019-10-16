<?php

class DELETE_VIEW
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>



<div class="iconos-superiores">
            <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>          

</div>



        <table>
           <tr>
            <th>Identificador de Reserva</th>
            <td><?php echo $valores[0];?></td>
          </tr>
           <tr>
            <th>Identificador de Pista</th>
            <td><?php echo $valores[1];?></td>
          </tr>

          <tr>
            <th>Login</th>
            <td><?php echo $valores[2];?></td>
            </tr>
           <tr>

            <tr>
            <th>Fecha</th>
            <td><?php echo $valores[3];?></td>
            </tr>
           <tr>

           <tr>
            <th>Hora de Reserva</th>
            <td><?php echo $valores[4];?></td>
          </tr>
           <tr>
            <th>Tiempo</th>
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

