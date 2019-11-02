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

<h2 class="cabecera" style="position: absolute; top: 200px;  padding-left: 500px;"><strong style="font-size: 100px;">Pádel Times</strong></h2>


<div class="noticia">

<div id="titulo">
  <strong style="font-size: 30px">
  <?php
    echo $valores['titulo'];
  ?>
</strong>
</div>


<div class="subtitulo">
  <strong style="font-size: 20px">
  <?php
    echo $valores['subtitulo'];
  ?>
</strong>
  

</div>


<p class="cuerpo" style="resize: none;" rows="30" cols="185">
  
  <?php
    echo $valores['cuerpo'];
  ?>

</p>


</div>           
  




<?php
include '../Views/Footer.php';

?>


<?php

  } 
}


?>
