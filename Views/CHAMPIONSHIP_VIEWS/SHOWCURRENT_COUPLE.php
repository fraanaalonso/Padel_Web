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
            <th> Categoria</th>
            <td><?php echo $valores['categoria'];?></td>
          </tr>


           <tr>
            <th>ID Pareja</th>
            <td><?php echo $valores['id_pareja'];?></td>
          </tr>

          <tr>
            <th>ID Campeonato</th>
            <td><?php echo $valores['id_campeonato'];?></td>
          </tr>
           

           <tr>
            <th>Login Capitán</th>
            <td><?php echo $valores['login1'];?></td>
          </tr>

          <tr>
            <th>Login Acompañante</th>
            <td><?php echo $valores['login2'];?></td>
          </tr>

          <tr>
            <th> Nivel</th>
            <td><?php echo $valores['nivel'];?></td>
          </tr>
     
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
