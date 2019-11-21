

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


<form method="post" action="../Controllers/Reservation_Controller.php?action=PAY">
<div class="formulario">

        <div class="col-xs-12 col-md-18">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Remember
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
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
                                    CV CODE</label>
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
