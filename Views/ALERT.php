
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<?php




class ALERT
{
	private $mensaje;
	
	function __construct($mensaje)
	{
		$this->mensaje = $mensaje;
		$this->execute();
	}

	function execute(){

	include 'HeaderPost.php';
		


?>


<div class="mensaje">
	
	
	<?php
	
	 echo $this->mensaje;
	 echo "<br>";
	 echo "<br>";
	 



	?>
</div>

<?php

include 'Footer.php';

?>


<?php
}
}
?>

