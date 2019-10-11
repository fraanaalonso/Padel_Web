
<?php

include_once './Functions/Autenticacion.php';
session_start()

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pádel Web
    </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

       <!--Iconos tipo solid font-awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script src='main.js'></script>


</head>
<body>

    <!--Navegación-->

    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><strong>PÁDELESEI</strong><img src="img/logo.png" width="40" height="40"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#about">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#services">SERVICIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#testimonials">TESTIMONIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#ubicacion">UBICACION</a>
      </li>
    </ul>
  </div>
</nav>
        
    </section>


    <!--Control Deslizante-->

    <div id="slider">

    <div id="headerSlider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img s class="d-block w-100" src="img/banner1.jpg">
      <div class="carousel-caption">
          <h5>Aprende a Jugar</h5>
      </div>
    </div>
    
    <div class="carousel-item">
      <img  class="d-block w-100" src="img/banner2.jpg">
            <div class="carousel-caption">
          <h5>Recibe Clases</h5>
      </div>
  </div>
    <div class="carousel-item">
      <img  class="d-block w-100" src="img/banner3.jpg">
            <div class="carousel-caption">
          <h5>Entrena Duro</h5>
      </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    </div>


    <section id="about">
        
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>El Pádel</h2>
                    <div class="about-content">
                        Creemos que el deporte reporta muchas beneficios para la salud. Por lo tanto, es de vital importancia promover todo tipo de actividades deportivas. Entre esas actividades, está el pádel. Es un deporte que combina plenitud física y buenos reflejos. Eso combinado con una buena coordinanción con tu compañero de equipo, lo hacen el deporte perfecto para pasar una tarde entretenida con amigos y familiaress.
                    </div>

                    <button type="button" class="btn btn-primary"> Leer Más>></button>
                </div>

                <div class="col-md-6">
                    <h2>Acceso</h2>
					<form action="./Controllers/Register_Controller.php">
                    <button type="submit" class="btn btn-primary">Registro</button><br>
					</form>


					<form action="./Controllers/Login_Controller.php">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button><br>
					</form>



                </div>
               
            </div>
        
        </div>
    </section>


    <!---Servicios-->

    <section id="services">

        <div class="container">
            <h1> Nuestros Servicios </h1>
            <div class="row services" id="row">
            <div class="col-md-3 text-center">
                <div class="icon" >
                    <img src="img/reserva.png" width="40px" height="40px">
                </div>
                <h3>Reserva Pistas</h3>
                <p>
                    La Reserva de Pistas es de 10:00 hasta las 21:30
                </p>
            </div>   

             <div class="col-md-3 text-center">
                <div class="icon">
                    <img src="img/promotion.png" width="40px" height="40px">
                </div>
                <h3>Promocion de Partidos</h3>
                <p>
                    Se ofertarán partidos una vez por semana
                </p>
            </div>   

             <div class="col-md-3 text-center">
                <div class="icon">
                    <img src="img/campeonato.png" width="40px" height="40px">
                </div>
                <h3>Campeonatos y Ligas</h3>
                <p>
                    Se disputarán campeonatos entre parejas. Previo aviso a través de la plataforma
                </p>
            </div>   

            </div>
        </div>
        
    </section>


    <!---Testimonios-->

    <section id="testimonials">
        
        <div class="container">
            <h1>Testimonios</h1>

            <div class="row">
                    <div class="col-md-4 text-center">

                    	<div class="profile">
                    		<img src="img/user1.jpg" class="user">
                    		<blockquote>Experiencia Increíble</blockquote>
                    		<h3>Carlos Somoza - <span>Founder</span></h3>
                    	</div>
                        
                    </div>

                     <div class="col-md-4 text-center">

                      <div class="profile">
                        <img src="img/user2.jpg" class="user">
                        <blockquote>Las instalaciones están en muy buenas condiciones</blockquote>
                        <h3>Miguel de la Torre - <span>Founder</span></h3>
                      </div>
                        
                    </div>

                     <div class="col-md-4 text-center">

                      <div class="profile">
                        <img src="img/user3.jpg" class="user">
                        <blockquote>Me aburre el pádel</blockquote>
                        <h3>Fran Alonso - <span>Founder</span></h3>
                      </div>
                        
                    </div>
            </div>
        </div>
    </section>


    <section id="ubicacion">

      <div class="container">
         <h1><img src="./img/google.png" width="50px" height="50px"></img>Ubicación</h1>
        <div class="row">

         <div id="mapa">

          <p></p>
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.88743147561!2d-7.855478699999962!3d42.344923300000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2ffebeb1855a8f%3A0xbb2380c0a6827554!2sESEI%20-%20Escola%20Superior%20de%20Enxe%C3%B1er%C3%ADa%20Inform%C3%A1tica!5e0!3m2!1ses!2ses!4v1570292307476!5m2!1ses!2ses" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
         </div>


       </div>

      </div>
      
    </section>


    <!---Footer-->

    <section id="footer">

      <div class="container text-center">

        <p>Hecho con <i class="fa fa-heart-o " ></i> Pádel ESEI</p>
        
      </div>
      
    </section>


</body>
</html>