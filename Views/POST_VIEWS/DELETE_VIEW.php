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
      
   
    

         <form name="x" method="post" action="../Controllers/Post_Controller.php?action=DELETE">

           <input type="hidden" name="id_noticia" value="<?php echo $valores[0];?>">
          
        </form>



        
            <button type="submit" onclick="x.submit()"> <a href="#"><span class="lnr lnr-trash" style="font-size: 35px"></span></a></button>
            <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

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
      
        </table>



       
       
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
