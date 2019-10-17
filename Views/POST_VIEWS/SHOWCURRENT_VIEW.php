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

<div class="noticia">

<div class="titulo">
  <strong style="font-size: 50px">
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
