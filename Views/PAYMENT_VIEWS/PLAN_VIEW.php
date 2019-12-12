<?php





/**
* 
*/
class Plan_View
{
	
	function __construct($fila, $resultado)
	{
		$this->execution($fila, $resultado);
	}


	function execution($fila, $resultado){
	include '../Views/HeaderPost.php';
?>




<div class="formulario">


    <div class="row">
    	      	 <?php

while ($fila = $resultado->fetch_assoc()){
 ?>

 
        <div class="col-xs-12 col-md-3">
  
            <div class="panel panel-primary">


                <div class="panel-heading">
                    <h3 class="panel-title">
                         <?php echo $fila['tipo']?></h3>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h1><?php echo $fila['precio']?>€</h1>
                        
                    </div>
                   
                </div>

         <form method="post" action="../Controllers/User_Controller.php?action=PAY&id_plan=<?php echo $fila['id_plan'] ?>">       
                <div class="panel-footer">

                    <button type="submit" class="btn btn-success">Suscríbete</button>
                </div>
        </form>

            </div>

        </div>


       

 <?php
}
?>


    </div>
  
</div>
















<?php


	include '../Views/Footer.php';

	}
}
?>