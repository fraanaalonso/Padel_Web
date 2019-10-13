
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<?php




class MESSAGE
{
	private $mensaje;
	private $retroceder;
	
	function __construct($mensaje, $retroceder)
	{
		$this->mensaje = $mensaje;
		$this->retroceder = $retroceder;
		$this->execute();
	}

	function execute(){

	include 'HeaderPost.php';
		


?>


<div class="mensaje">
	
	<?php
	$retroceder = '../img/salir.png';

	 echo '<a href=\'' . $this->retroceder . "'>" . "<img src=\"$retroceder\"  width=\"50\" />";



	?>
</div>


<?php

include 'Footer.php';

?>


<?php
}
}
?>

