

<?php

include_once '../Models/USER_MODEL.php';
$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pádel Web</title>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" type="text/css" href="../css/style3.css">
    <link rel="stylesheet" type="text/css" href="../img/icon/style.css">
    <script src="../Functions/js/validaciones.js"></script>
</head>



<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">
    <a href="../Controllers/User_Controller.php"><li><span class="lnr lnr-users icon1"></span><h4 class="text1">Deportistas</h4></li></a>  
    <a href="../Controllers/Court_Controller.php"><li><span class="lnr lnr-page-break icon2"></span><h4 class="text2">Pistas</h4></li></a>
    <li><span class="lnr lnr-book icon3"></span><h4 class="text3">Reservas</h4></li>
    <li><span class="lnr lnr-license icon4"></span><h4 class="text4">Campeonatos</h4></li>
    <li><span class="lnr lnr-dice icon6"></span><h4 class="text6">Enfrentamiento</h4></li> 
    <li><span class="lnr lnr-heart icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-question-circle icon8"></span><h4 class="text8">FAQ</h4></li> 
    <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>
  </div>

  <script src="../Functions/js/jquery.js"></script>
<script src="../Functions/js/script.js"></script>
  
  
</main>


</body>
</html>


        
