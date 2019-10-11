
<?php

session_start();
session_destroy();
header('Location:../Controllers/Index_Controller.php');

?>
