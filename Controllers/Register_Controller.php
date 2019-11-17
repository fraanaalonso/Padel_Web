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

          

          $ruta =$ruta."/".$nombre_foto; //img/nombre.jpg

          move_uploaded_file($archivo, $ruta);
         

          
        $respuesta = $usuario->register();

            
          if ($respuesta == 'true') {

            $respuesta = $usuario->registrar();

            include '../Views/Message_View_Prev.php';
            new MESSAGE($respuesta, './Login_Controller.php');
                      }
          else{
            include '../Views/Message_View_Prev.php';
            new MESSAGE($respuesta, './Login_Controller.php');
          }

}




?>