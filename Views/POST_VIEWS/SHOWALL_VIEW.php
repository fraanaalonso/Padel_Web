
<?php 

class SHOWALL_VIEW
{


	
	function __construct($fila, $resultado)
	{
		$this->mostrarDatos($fila, $resultado);
	}
	
	function mostrarDatos($fila, $resultado){
    include '../Views/HeaderPost.php';
  
   

  
?>

<div class="iconos-superiores">
<?php
if(comprobarPermisos($_SESSION['login'])==1){
?>      
    <a href="../Controllers/Post_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

<?php
}
?>    
    <a href="../Controllers/Post_Controller.php?action=SEARCH"><span class="lnr lnr-magnifier" style="font-size: 35px"></span></a>
    <a href="../Controllers/Post_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="container" style="position: absolute; top: 150px; left: 300px;">
<div class="col-md-12">
<?php 

while($fila = $resultado->fetch_assoc()){
?>
    <h1><?php echo $fila['titulo']; ?></h1>
    <h2><?php echo $fila['subtitulo']; ?></h2>
    <p><?php echo substr($fila["cuerpo"], 0, 120) ?></p>
    <div>
<span class="badge">Publicado <?php echo $fila['fecha']?> <?php echo $fila['hora']?></span><div class="pull-right"><a href="../Controllers/Post_Controller.php?action=SHOWCURRENT&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-eye añadir"></span></a> <?php
        if(comprobarPermisos($_SESSION['login'])==1){
        ?>
        <a href="../Controllers/Post_Controller.php?action=EDIT&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-pencil editar"></span></a>
        <a href="../Controllers/Post_Controller.php?action=DELETE&id_noticia=<?php  echo $fila['id_noticia'] ?>"><span class="lnr lnr-trash borrar"></span></a>

        <?php
      }
        ?></div>         
     </div>
    <hr>


        




<?php
}
?>
</div>
</div>






<div>
<?php
include '../Views/Footer.php';

?>
</div>
<?php

  } 
}


?>