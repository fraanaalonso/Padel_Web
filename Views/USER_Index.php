<?php


class Index{

	function __construct()
	{
		$this->execute();
	}


	function execute(){
		include 'HeaderPost.php';
		include 'MenuLateral.php';
	/*	include '../Idiomas/Strings_' . $_SESSION['idioma'] . '.php';*/
		include 'Footer.php';
	}


}




?>