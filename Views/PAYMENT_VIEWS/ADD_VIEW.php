

<?php

/**
* 
*/
class ADD_PAY
{
	
	function __construct($id_pista, $login, $hora_inicio, $fecha, $precio){
		$this->execution($id_pista, $login, $hora_inicio, $fecha, $precio);
	}


	function execution($id_pista, $login, $hora_inicio, $fecha, $precio){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/Reservation_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<form method="post" action="../Controllers/Reservation_Controller.php?action=RESERVAR">
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
                        <label for="cardNumber">
                            NÚMERO DE TARJETA</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="8888 7777 6666 5555"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    FECHA DE EXPIRACIÓN</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CÓDIGO CV</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>

                      <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="glyphicon glyphicon-eur"></span>Total a pagar: <?php echo $precio ?></a>
                </li>
            </ul>
            <br/>
            <input type="hidden" name="id_pista" value="<?php echo $id_pista?>">
            <input type="hidden" name="login" value="<?php echo $login?>">
            <input type="hidden" name="hora_inicio" value="<?php echo $hora_inicio?>">
            <input type="hidden" name="fecha" value="<?php echo $fecha?>">
            <input type="hidden" name="precio" value="<?php echo $precio?>">
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
