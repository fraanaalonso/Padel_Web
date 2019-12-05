

<?php

/**
* 
*/
class PAY_CHAMPIONSHIP
{
	
	function __construct($datos){
		$this->execution($datos);
	}


	function execution($datos){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<form method="post" action="../Controllers/Championship_Controller.php?action=REGISTRAR">
<div class="formulario">

        <div class="col-xs-12 col-md-18">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        DETALLES DE PAGO
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <a for="cardNumber">
                            NÚMERO DE TARJETA</a>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="8888 7777 6666 5555"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <a for="expityMonth">
                                    FECHA DE EXPIRACIÓN</a>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <a for="cvCode">
                                    CÓDIGO CV</a>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>

                      <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-eur"></span>Total a pagar: 34.99 </a>
                </li>
            </ul>
            <br/>
            <input type="hidden" name="id_campeonato" value="<?php echo $datos[0]?>">
            <input type="hidden" name="fecha_inicio" value="<?php echo $datos[1]?>">
            <input type="hidden" name="fecha_limite" value="<?php echo $datos[2]?>">
            <input type="hidden" name="id_normativa" value="<?php echo $datos[3]?>">
            <input type="hidden" name="id_nivel" value="<?php echo $datos[4]?>">
            <input type="hidden" name="id_categoria" value="<?php echo $datos[5]?>">
            <input type="hidden" name="login1" value="<?php echo $datos[7]?>">
            <input type="hidden" name="login2" value="<?php echo $datos[6]?>">
            <input type="hidden" name="password" value="<?php echo $datos[8]?>">
            <input type="hidden" id="id_pareja" name="id_pareja" value="<?php echo 0 ?>" class="form-control" >
            <button type="submit" class="btn btn-primary">Pagar</button>

                    </form>
                </div>
            </div>
          
        </div>
 
</div>
</form>

<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>
