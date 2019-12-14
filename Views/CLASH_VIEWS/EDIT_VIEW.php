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






        <form method="post" name="enfrentamiento" action="../Controllers/Clash_Controller.php?action=EDIT">
          <table>
           

              <input type="hidden" id="resultado" name="resultado"  value="<?php echo $valores[4] ?>" >
              
          

           <tr>
            <th>Set 1</th>
            <td>

              <input type="text" id="set1" required= name="set1" pattern="^[6]-[0-4]" value="<?php echo substr($valores[4],0,3) ?>" >
              
            </td>


            


          </tr>

           <tr>
            <th>Set 2</th>
            <td>

              <input type="text" id="set2" required name="set2" pattern="^[6]-[0-4]" value="<?php echo substr($valores[4],8) ?>" >
              
            </td>


            


          </tr>


           <tr>
            <th>Set 3</th>
            <td>

              <input type="text" required id="set3" name="set3" pattern="^[6]-[0-4]" value="<?php echo  substr($valores[4],8,9) ?>" >
              
            </td>


            


          </tr>
          <input type="hidden"   name="id_enfrentamiento" value="<?php echo $valores[0] ?>">
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
            <th>Numero de Sets Pareja 1</th>
            <td>

              <input type="text" id="setP1"  name="numSetsPareja1" pattern="^[0-3]" value="<?php echo $valores[5] ?>">
              
            </td>
          </tr>

          <tr>
            <th>Numero de Sets Pareja 2</th>
            <td>

              <input type="text" id="setP2"  name="numSetsPareja2" pattern="^[0-3]" value="<?php echo $valores[6] ?>">
              
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
           

          

        <input type="hidden" readonly name="tipo" value="<?php echo $valores[9] ?>">
        <input type="hidden" readonly name="id_grupo" value="<?php echo $valores[10] ?>">
           




          <button type="submit" class="btn btn-light"><span class="lnr lnr-file-pencil" style="font-size: 35px;"></span></button>

           

        </form>
      </table>


         <button type="submit" onclick="javascript:procesar(); javascript:validarNumero();"  style=" width: 20%; position: absolute; top: 800px; left: 700px; " class="btn btn-light"><span class="lnr lnr-pencil" style="font-size: 35px; text-align: center;"></span></button>
              





       
       
  <script type="text/javascript">
    
    function procesar(){
      set1 = document.getElementById('set1').value;
      set2 = document.getElementById('set2').value;
      set3 = document.getElementById('set3').value;

      resultado = set1 + '/' + set2 + '/' + set3;

      document.getElementById('resultado').value = resultado;

      //document.forms.enfrentamiento.submit();
    }


    function validarNumero(){
      num1 = document.getElementById('setP1').value;
      num2 = document.getElementById('setP2').value;
      suma = num1+num2;

      if (num1 == num2) {
        alert('Resultado por sets no válido');
        return false;
      }
     if(num1 > num2 && suma < 3){
        alert('Resultado no válido');
        return false;
      }
     if(num2 > num1 && suma < 3){
        alert('Resultado no válido');
        return false;
      }

      else{
        return true;
      }
    }
  </script>




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>

