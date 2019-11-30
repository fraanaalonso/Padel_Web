s<?php

class EDIT_VIEW
{
  
  function __construct($valores)
  {

    $this->mostrarTupla($valores);
  }

  function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>






        <form method="post" action="../Controllers/Clash_Controller.php?action=EDIT">
          <table>
           <tr>
            <th>ID Entrenamiento</th>
            <td>

              <input type="text" readonly  name="id_enfrentamiento" value="<?php echo $valores[0] ?>">
              
            </td>
          </tr>
           <tr>
            <th>ID Campeonato</th>
            <td>

                <input type="text" readonly  name="id_campeonato" value="<?php echo $valores[1] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Pareja 1</th>
            <td>

               <input type="text" readonly  name="id_pareja1" value="<?php echo $valores[2] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Pareja 2</th>
            <td>

                <input type="text" readonly  name="id_pareja2" value="<?php echo $valores[3] ?>">
              
            </td>
          </tr>


          <tr>
            <th>Resultado</th>
            <td>

                <input type="text" readonly  name="resultado" value="<?php echo $valores[4] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Numero de Sets Pareja 1</th>
            <td>

              <input type="text"  name="numSetsPareja1" value="<?php echo $valores[5] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Numero de Sets Pareja 2</th>
            <td>

              <input type="text"  name="numSetsPareja2" value="<?php echo $valores[6] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Hora Comienzo</th>
            <td>

                <input type="text" readonly name="hora_inicio" value="<?php echo $valores[7] ?>">
            </td>
          </tr>

          <tr>
            <th>Fecha</th>
            <td>

               <input type="text" readonly name="fecha" value="<?php echo $valores[8] ?>">
            </td>
          </tr>

          <tr>
            <th>Categoria</th>
            <td>

                <input type="text" readonly name="categoria" value="<?php echo $valores[9] ?>">
            </td>
          </tr>


          <tr>
            <th>Nivel</th>
            <td>

                <input type="text" readonly name="nivel" value="<?php echo $valores[10] ?>">
            </td>
          </tr>

          

        <input type="hidden" readonly name="tipo" value="<?php echo $valores[11] ?>">
           




          <button type="submit" class="btn btn-light"><span class="lnr lnr-file-pencil" style="font-size: 35px;"></span></button>

           

        </form>
      </table>


         <button type="submit" style=" width: 20%; position: absolute; top: 800px; left: 700px; " class="btn btn-light"><span class="lnr lnr-pencil" style="font-size: 35px; text-align: center;"></span></button>
              


<script type="text/javascript">
  


</script>




       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>

