

<?php
session_start();
include_once '../Models/USER_MODEL.php';
$login = $_SESSION['login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pádel Web</title>
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <link rel="stylesheet" type="text/css" href="../img/icon/style.css">
  
</head>



<body>
  
<header><span class="lnr lnr-menu chusquinhadas"></span>

  <a class="navbar-brand" href="#"><strong>PÁDELESEI</strong><img src="../img/logo.png" width="40" height="40"></a>

<span></span><a class="sesion" href="#"><strong>Bienvenido <?php $_SESSION['login']?></strong><img  width="40" height="40"></a>
</header>
<main>


  <div class="content-menu">
    <li><span class="lnr lnr-home icon1"></span><h4 class="text1">Inicio</h4></li>  
    <li><span class="lnr lnr-film-play icon2"></span><h4 class="text2">Mis Reservas</h4></li>
    <li><span class="lnr lnr-picture icon3"></span><h4 class="text3">Pistas</h4></li>
    <li><span class="lnr lnr-briefcase icon4"></span><h4 class="text4">WCP</h4></li>
    <li><span class="lnr lnr-license icon5"></span><h4 class="text5">Liga regular</h4></li>
    <li><span class="lnr lnr-envelope icon6"></span><h4 class="text6">Enfrentamiento</h4></li> 
    <li><span class="lnr lnr-envelope icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-envelope icon8"></span><h4 class="text8">FAQ</h4></li> 
    <li ><a href="../Functions/logout.php"></a><span class="lnr lnr-envelope icon9"></span><h4  class="text9">Salir</h4></li> 
  </div>
  
</main>


<script type="text/javascript" src="../Functions/js/query.js"></script>
<script type="text/javascript" src="../Functions/js/script.js"></script>
        

</body>
</html>