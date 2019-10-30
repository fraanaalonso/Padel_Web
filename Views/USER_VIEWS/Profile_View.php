<?php



/**
 * 
 */
class Profile_View 
{
	
	function __construct($datos_usuario)
	{
		$this->execute($datos_usuario);
	}

	function execute($datos_usuario){
		include '../Views/HeaderPost.php';

?>

<div class="formulario">

<?php
require_once('../Functions/funciones.php');
 obtenerFoto($datos_usuario['foto']);

?>
<div style="font-size: 30px; position: absolute;">
<?php
 echo "Usuario: ";
 echo $datos_usuario['login'];
?>

</div>

<?php

?>


<?php

?>


<?php

?>


<?php

?>


<?php

?>
















</div>


<?php
include '../Views/Footer.php';
}
}
?>