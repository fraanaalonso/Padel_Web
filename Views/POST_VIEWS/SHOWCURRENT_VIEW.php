<?php


class SHOWCURRENT_VIEW
{
	
	function __construct($valores)
	{

		$this->mostrarTupla($valores);
	}

	function mostrarTupla($valores){
    include '../Views/HeaderPost.php';
 
      


  

     
?>
   
  
<div class="iconos-superiores">

    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="lineanegra"></div>

<h2 class="cabecera">Pádel Times</h2>


<div class="lineanegra2">
  
  <ul>
    <li >Fecha: </li>
    <li >Autor: </li>
  </ul>

</div>

<div class="noticia">

<div id="titulo">
  <strong>
  <?php
    echo $valores[1];
  ?>
</strong>
</div>


<div class="subtitulo">
  <strong style="font-size: 30px">
  <?php
    echo $valores[2];
  ?>
</strong>
  

</div>


<div class="cuerpo">
  
  <strong style="font-size: 30px">
  <?php
    echo $valores[3];
  ?>
</strong>
</div>


</div>           
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
