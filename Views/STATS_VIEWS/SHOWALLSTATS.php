<?php 

/**
* 
*/
class SHOWALLSTATS
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
            <th>Reservas Activas</th>
            <td><?php echo $valores[1];?></td>
          </tr>
           <tr>
            <th>Promociones Activas</th>
            <td><?php echo $valores[2];?></td>
          </tr>

          <tr>
            <th>Usuarios Registrados</th>
            <td><?php echo $valores[0];?></td>
            </tr>
           <tr>

            <tr>
            <th>Campeonatos Activos</th>
            <td><?php echo $valores[3];?></td>
            </tr>
           <tr>

           <tr>
            <th>Promedio de Reservas Semanales</th>
            <td><?php echo $valores[7];?></td>
          </tr>

          <tr>
            <th>Promedio de Promociones Semanales</th>
            <td><?php echo $valores[4];?></td>
            </tr>
           <tr>
           
            <th>Número de Hombres Registrados</th>
            <td><?php echo $valores[5];?></td>
            </tr>
           
            <th>Numero de Mujeres Registradas</th>
            <td><?php echo $valores[6];?></td>
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
