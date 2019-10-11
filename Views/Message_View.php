
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<?php

include_once '../Models/USER_MODEL.php';
$login = new USER_MODEL($_REQUEST['login'],'','','','','','','','','','');

class MESSAGE_VIEW
{
	private $mensaje
	private $retroceder;
	
	function __construct($mensaje, $retroceder)
	{
		$this->mensaje = $mensaje;
		$this->retroceder = $retroceder;
		$this->execute();
	}

	function execute(){

		if ($_SESSION['login'] == $login){

		include 'HeaderPost.php';

		}
		else{
			include 'HeaderPrev.php';
		}


?>


<div class="mensaje">
	
	<?php
	$retroceder = '../img/retroceder.jpg';

	 echo '<a href=\'' . $this->retroceder . "'>" . "<img src=\"$retroceder\"  width=\"60\" />";


	?>
</div>


<?php

include 'Footer.php';

?>


<?php
}
}
?>

