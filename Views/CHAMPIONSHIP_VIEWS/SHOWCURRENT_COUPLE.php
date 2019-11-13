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


<div class="iconos-superiores">

<a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

 
</div>




      <table>

         <tr>
            <th>ID Categoria</th>
            <td><?php echo $valores[0];?></td>
          </tr>


           <tr>
            <th>ID Pareja</th>
            <td><?php echo $valores[1];?></td>
          </tr>

          <tr>
            <th>ID Campeonato</th>
            <td><?php echo $valores[2];?></td>
          </tr>
           

           <tr>
            <th>Login Capitán</th>
            <td><?php echo $valores[3];?></td>
          </tr>

          <tr>
            <th>Login Acompañante</th>
            <td><?php echo $valores[4];?></td>
          </tr>

          <tr>
            <th>ID Grupo</th>
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
