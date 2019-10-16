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
      
   
    

         <form name="x" method="post" action="../Controllers/Court_Controller.php?action=DELETE">

           <input type="hidden" name="id_pista" value="<?php echo $valores[0];?>">
          
        </form>


          <button type="submit" onclick="x.submit()" class="btn btn-light"><a href="#"><span class="lnr lnr-trash" style="font-size: 35px"></span></a></button>
          <a href="../Controllers/Court_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>



      <table>
           <tr>
            <th>Identificador de Pista</th>
            <td><?php echo $valores[0];?></td>
          </tr>
           <tr>
            <th>Ubicación</th>
            <td><?php echo $valores[1];?></td>
          </tr>

          <tr>
            <th>Número de Pista</th>
            <td><?php echo $valores[2];?></td>
            </tr>
           <tr>

            <tr>
            <th>Terreno</th>
            <td><?php echo $valores[3];?></td>
            </tr>
           <tr>

           <tr>
            <th>Precio</th>
            <td><?php echo $valores[4];?></td>
          </tr>

           <tr>
            <th>Estado</th>
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

