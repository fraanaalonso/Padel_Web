
<?php

/**
* 
*/
class INSCRIP_ESCUELA_VIEW
{
	
	function __construct($valores, $usuario){
		$this->execution($valores, $usuario);
	}


	function execution($valores, $usuario){
		include '../Views/HeaderPost.php';

?>


<div class="iconos-superiores">

    <a href="../Controllers/School_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>


<div class="formulario">
			

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="../Controllers/School_Controller.php?action=INSCRIBIR&codigo=<?php echo $valores['codigo']?>&login=<?php echo $_SESSION['login']?>">
                    <fieldset>
                       

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="lnr lnr-apartment" style="font-size: 35px"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" readonly placeholder="<?php echo $valores['codigo']?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"  style="font-size: 35px"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" readonly placeholder="<?php echo $_SESSION['login']?>"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="lnr lnr-envelope" style="font-size: 35px"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" readonly placeholder="<?php echo $usuario['email']?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square" style="font-size: 35px"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" readonly placeholder="<?php echo $usuario['telefono']?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="lnr lnr-question-circle" style="font-size: 35px"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Escribe aquí cualquier sugerencia al entrenador..." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Inscribir</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
			
			
	

</div>




<?php
include '../Views/Footer.php';
?>


<?php

}
}

?>
