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

        <table>
           <tr>
            <th>Login</th>
            <td><?php echo $valores[0];?></td>
          </tr>
           <tr>
            <th>Password</th>
            <td><?php echo $valores[1];?></td>
          </tr>
           <tr>
            <th>DNI</th>
            <td><?php echo $valores[2];?></td>
          </tr>
           <tr>
            <th>Nombre</th>
            <td><?php echo $valores[3];?></td>
          </tr>
           <tr>
            <th>Apellidos</th>
            <td><?php echo $valores[4];?></td>
            </tr>
           <tr>
            <th>Telefono</th>
            <td><?php echo $valores[5];?></td>
            </tr>
           <tr>
            <th>Email</th>
            <td><?php echo $valores[6];?></td>
            </tr>
           <tr>
            <th>Fecha de Nacimiento</th>
            <td><?php echo $valores[7];?></td>
            </tr>
           <tr>
            <th>Foto</th>
            <td><?php echo $valores[8];?></td>
            </tr> 
           <tr>
            <th>Sexo</th>
            <td><?php echo $valores[9];?></td>
            </tr>
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>

