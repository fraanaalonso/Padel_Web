

<?php

/**
* 
*/
class ADD_PAY
{
	
	function __construct($datos){
		$this->execution($datos);
	}


	function execution($datos){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/User_Controller.php?action=PLAN"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<form method="post" action="../Controllers/User_Controller.php?action=SOCIO">
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
                            <input type="text" class="form-control" id="cardNumber" pattern="^[0-9]{16}" placeholder="8888 7777 6666 5555"
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
                                    <input type="text" class="form-control" id="expityMonth" pattern="^[0-9]{2}" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" pattern="^[0-9]{2}" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <a for="cvCode">
                                    CÓDIGO CV</a>
                                <input type="password" class="form-control" id="cvCode" pattern="^[0-9]{3}" placeholder="CV" required />
                            </div>
                        </div>
                    </div>

                      <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-eur"></span>Total a pagar: <?php echo $datos[2] ?></a>
                </li>
            </ul>
            <br/>
           <input type="hidden" name="fecha" value="<?php echo date("Y/m/d", time()) ?>">
           <input type="hidden" name="plan" value="<?php echo $datos[0] ?>">
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
