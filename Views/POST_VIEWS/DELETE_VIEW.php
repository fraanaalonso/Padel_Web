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
    <div class="iconos_superiores">
      <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-undo icon7"></span></a>
    </div>
        <table>
           <tr>
            <th>Codigo</th>
            <td><?php echo $valores[0];?></td>
          </tr>
           <tr>
            <th>Titulo</th>
            <td><?php echo $valores[1];?></td>
          </tr>
           <tr>
            <th>Subtitulo</th>
            <td><?php echo $valores[2];?></td>
          </tr>
           <tr>
            <th>Contenido</th>
            <td><?php echo $valores[3];?></td>
          </tr>
           <tr>
            <th>Login</th>
            <td><?php echo $valores[4];?></td>
            </tr>
      
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
