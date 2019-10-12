

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
    <link rel="stylesheet" type="text/css" href="../img/icon/style.css">
  
</head>



<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">
    <a href="../Controllers/User_Controller.php"><li><span class="lnr lnr-home icon1"></span><h4 class="text1">Usuarioa</h4></li></a>  
    <li><span class="lnr lnr-dice icon2"></span><h4 class="text2">Mis Reservas</h4></li>
    <li><span class="lnr lnr-bookmark icon3"></span><h4 class="text3">Pistas</h4></li>
    <li><span class="lnr lnr-map icon4"></span><h4 class="text4">Campeonatos</h4></li>
    <li><span class="lnr lnr-license icon5"></span><h4 class="text5">Liga regular</h4></li>
    <li><span class="lnr lnr-eye icon6"></span><h4 class="text6">Enfrentamiento</h4></li> 
    <li><span class="lnr lnr-heart icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-envelope icon8"></span><h4 class="text8">FAQ</h4></li> 
    <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>
  </div>

  <script src="../Functions/js/jquery.js"></script>
<script src="../Functions/js/script.js"></script>
  
  
</main>


        
