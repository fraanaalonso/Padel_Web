<?php



session_start();

  if(!isset($_REQUEST['login']))
  {
    include '../Views/Register_View.php';
    $register = new Register();
  }

  else{
    
  include '../Models/USER_MODEL.php';
   $usuario = new USER_MODEL($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['password'], $_REQUEST['dni'],$_REQUEST['email'],$_REQUEST['pais'],$_REQUEST['sexo'],$_REQUEST['telefono'],$_REQUEST['fecha'],$_REQUEST['foto']);

     $respuesta = $usuario->Register();

            
          if ( $respuesta == true) {

            $respuesta = $usuario->registrar();
            header("Location: Login_Controller.php");
                      }
          else{
            header("Location: Login_Controller.php");
          }

}




?>