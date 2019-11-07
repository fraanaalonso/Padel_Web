<?php



session_start();

  if(!isset($_REQUEST['login']))
  {
    include '../Views/Register_View.php';
    $register = new Register();
  }

  else{
    
  include '../Models/USER_MODEL.php';
   $usuario = new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['password'], $_REQUEST['dni'],$_REQUEST['email'],$_REQUEST['pais'],$_REQUEST['sexo'],$_REQUEST['telefono'],$_REQUEST['fecha'], $_FILES['foto']['name'], $_REQUEST['rol_id']);

          $nombre_foto = $_FILES['foto']['name'];
          $archivo = $_FILES['foto']['tmp_name'];
          $tipo_imagen = $_FILES['foto']['type'];
          $tamanho_imagen = $_FILES['foto']['size'];
          $ruta = "../img/fotosPerfil";

          if($tamanho_imagen<=3000000 )
          {

          if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif")

          {

          $ruta =$ruta."/".$nombre_foto; //img/nombre.jpg

          move_uploaded_file($archivo, $ruta);
          }
          else{
            echo "Sólo se puede subir imágenes jpg/jpeg/gif/png";
          }


          }

          


          else {
            echo "El tamaño es demasiado grande";
          }

          
     $respuesta = $usuario->register();

            
          if ( $respuesta == true) {

            $respuesta = $usuario->registrar();

            include '../Views/Message_View.php';
            new MESSAGE($respuesta, './Login_Controller.php');
                      }
          else{
            include '../Views/Message_View.php';
            new MESSAGE($respuesta, './Login_Controller.php');
          }

}




?>