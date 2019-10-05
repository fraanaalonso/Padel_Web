<?php

session_start();
session_destroy();
session_start();
header('Location: ../index.php');//Esto te manda al index

?>
