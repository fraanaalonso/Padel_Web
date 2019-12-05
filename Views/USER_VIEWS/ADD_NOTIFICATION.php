
<?php

/**
* 
*/
class ADD_NOTIFICATION
{
	
	function __construct(){
		$this->execution();
	}




	function execution(){


		include '../Views/HeaderPost.php';
		
?>

	
	<div class="formulario">
	<div class="row justify-content-center">
		<div class="col-20 col-md-16 col-lg-10 pb-10">


                    <!--Form with header-->

                    <form action="../Controllers/Notification_Controller.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Notificaciones</h3>
                                    <p class="m-0">Usuarios Registrados</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Notificacion" name="cuerpo" id="cuerpo" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" value="Enviar" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


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