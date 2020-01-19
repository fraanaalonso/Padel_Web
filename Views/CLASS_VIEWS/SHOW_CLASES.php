
<?php 

class SHOW_CLASES
{


  
  function __construct($fila, $resultado, $codigo)
  {
    $this->mostrarDatos($fila, $resultado, $codigo);
  }
  
  function mostrarDatos($fila, $resultado, $codigo){
    include '../Views/HeaderPost.php';




  
   

  
?>


<?php
if(comprobarPermisos($_SESSION['login'])==1){
?>
<div class="iconos-superiores">
      
    <a href="../Controllers/School_Controller.php?action=ADD"><span class="lnr lnr-file-add" style="font-size: 35px"></span></a>

<?php
}
?>
    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

 
<div class="formulario">
 

    

        
<form method="post" action = "../Controllers/School_Controller.php?action=ADDCLASE&codigo=<?php echo $codigo?>">

  <button type="submit" class="btn btn-light"><span class="lnr lnr-file-add" style="font-size: 35px;"></span></button>
       <p>
<?php


$i = 1;
while($fila = $resultado->fetch_assoc()){


?>
        <input type="checkbox" value="<?php echo $i ?>" id="box<?php echo $i ?>" name="id_clase[]">
        <label for="box<?php echo $i ?>" align="justify"><strong style="font-size: 60px"><?php echo $fila['id_clase']?></strong>
        </label> <br><br> <strong ><?php echo $fila['descripcion']?></strong>
  
        <br>
        <br>
        <br>
        <br>
        
      
<?php

$i++;
}
?>
    
</form>

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