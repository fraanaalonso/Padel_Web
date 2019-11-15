<?php

class EDIT_VIEW
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>



<div class="iconos-superiores">
            <a href="./Championship_Controller.php?action=GENERARCALENDARIO&id_enfrentamiento=<?php echo $valores[0] ?>&id_campeonato=<?php echo $valores[1] ?>&categoria=<?php echo $valores[8] ?>&nivel=<?php echo $valores[9] ?>"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>          

</div>



        <table>
           <tr>
            <th>ID Entrenamiento</th>
            <td>

              <?php echo $valores[0] ?>
              
            </td>
          </tr>
           <tr>
            <th>ID Campeonato</th>
            <td>

                <?php echo $valores[1] ?>
              
            </td>
          </tr>

          <tr>
            <th>Pareja 1</th>
            <td>

                <?php echo $valores[2] ?>
              
            </td>
          </tr>

          <tr>
            <th>Pareja 2</th>
            <td>

                <?php echo $valores[3] ?>
              
            </td>
          </tr>

          <tr>
            <th>Numero de Sets Pareja 1</th>
            <td>

              <input type="text"  name="numSetsPareja1" value="<?php echo $valores[6] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Numero de Sets Pareja 2</th>
            <td>

              <input type="text"  name="numSetsPareja2" value="<?php echo $valores[7] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Hora Comienzo</th>
            <td>

                <?php echo $valores[4] ?>
            </td>
          </tr>

          <tr>
            <th>Fecha</th>
            <td>

               <?php echo $valores[5] ?>
            </td>
          </tr>

          <tr>
            <th>Categoria</th>
            <td>

                <?php echo $valores[8] ?>
            </td>
          </tr>


          <tr>
            <th>Nivel</th>
            <td>

                <?php echo $valores[9] ?>
            </td>
          </tr>

           

        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>

