

<?php


require '../Functions/Autenticacion.php';
if (session_status() == PHP_SESSION_NONE) {//Sino existe la sesion, se comienza
        session_start();
    }

    
    //$admin = mysql_query("SELECT * FROM USER WHERE rol_id = '$rol'");


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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>



<?php
if(autenticado()){
   
    if(comprobarPermisos($_SESSION['login'])==1){

?>

<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">


    <a href="../Controllers/Post_Controller.php"><li><span class="lnr lnr-earth icon10"></span><h4 class="text1">Novedades</h4></li></a> 
    <a href="../Controllers/User_Controller.php"><li><span class="lnr lnr-users icon1"></span><h4 class="text1">Deportistas</h4></li></a>  
    <a href="../Controllers/Court_Controller.php"><li><span class="lnr lnr-page-break icon2"></span><h4 class="text2">Pistas</h4></li></a>
    <li><span class="lnr lnr-book icon3"></span><h4 class="text3">Reservas</h4></li>
    <a href="../Controllers/Championship_Controller.php"><li><span class="lnr lnr-license icon4"></span><h4 class="text4">Campeonatos</h4></li></a>
    <li><span class="lnr lnr-rocket icon6"></span><h4 class="text6">Enfrentamiento</h4></li> 
    <li><span class="lnr lnr-heart icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-question-circle icon8"></span><h4 class="text8">FAQ</h4></li> 
    <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>
  </div>

  <script src="../Functions/js/jquery.js"></script>
<script src="../Functions/js/script.js"></script>
  
  
</main>


</body>
</html>

<?php
}
?>

<?php
if(comprobarPermisos($_SESSION['login'])==2){
?>

<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">
     <a href="../Controllers/Post_Controller.php"><li><span class="lnr lnr-earth icon10"></span><h4 class="text1">Novedades</h4></li></a> 
     <a href="../Controllers/Court_Controller.php"><li><span class="lnr lnr-page-break icon2"></span><h4 class="text2">Pistas</h4></li></a>
    
     <li><span class="lnr lnr-book icon3"></span><h4 class="text3">Reservas</h4></li>


     
    <a href="../Controllers/Championship_Controller.php"><li><span class="lnr lnr-license icon4"></span><h4 class="text4">Campeonatos</h4></li></a>
     <li><span class="lnr lnr-rocket icon6"></span><h4 class="text6">Enfrentamiento</h4></li>
     <li><span class="lnr lnr-heart icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-question-circle icon8"></span><h4 class="text8">FAQ</h4></li> 
    <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>


    </div>
    </main>


</body>

</html>

<?php
}
 if(comprobarPermisos($_SESSION['login'])==3){
?>

<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">
     <a href="../Controllers/Post_Controller.php"><li><span class="lnr lnr-earth icon10"></span><h4 class="text1">Novedades</h4></li></a> 
     <a href="../Controllers/Court_Controller.php"><li><span class="lnr lnr-page-break icon2"></span><h4 class="text2">Pistas</h4></li></a>
     <?php
        if($_SESSION['login']){
     ?>
     <li><span class="lnr lnr-book icon3"></span><h4 class="text3">Reservas</h4></li>


     <?php
        }
     ?>
     <a href="../Controllers/Championship_Controller.php"><li><span class="lnr lnr-license icon4"></span><h4 class="text4">Campeonatos</h4></li></a>
     <li><span class="lnr lnr-rocket icon6"></span><h4 class="text6">Enfrentamiento</h4></li>
     <li><span class="lnr lnr-heart icon7"></span><h4 class="text7">Sobre Nosotros</h4></li> 
    <li><span class="lnr lnr-question-circle icon8"></span><h4 class="text8">FAQ</h4></li> 
    <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>


    </div>
    </main>


</body>

</html>

<?php
}
 if(comprobarPermisos($_SESSION['login'])==4){

?>

<body>
  
<header><span class="lnr lnr-menu show"></span></header>

<main>


  <div class="content-menu">
     <a href="../Controllers/Post_Controller.php"><li><span class="lnr lnr-earth icon10"></span><h4 class="text1">Novedades</h4></li></a> 
      <a href="../Functions/Desconect.php"><li ><span class="lnr lnr-exit icon9"></span><h4  class="text9">Salir</h4></li> </a>
     
    </div>
   
  </main>
  
 </body>   
</html>



<?php
}
}
else{
    header("Location: ../Login_Controller.php");
}
?>

