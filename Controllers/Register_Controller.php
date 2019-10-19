<?php



session_start();

  if(!isset($_REQUEST['login']))
  {
    include '../Views/Register_View.php';
    $register = new Register();
  }

  else{
    
  include '../Models/USER_MODEL.php';
   $usuario = new User_Modelo($_REQUEST['login'],$_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['password'], $_REQUEST['dni'],$_REQUEST['email'],$_REQUEST['pais'],$_REQUEST['sexo'],$_REQUEST['telefono'],$_REQUEST['fecha'], $_REQUEST['rol_id']);



          
     $respuesta = $usuario->register();

            
          if ( $respuesta == true) {

            $respuesta = $usuario->registrar();

            include '../Views/Message_View_Prev.php';
            new MESSAGE_Prev($respuesta, './Login_Controller.php');
                      }
          else{
            include '../Views/Message_View_Prev.php';
            new MESSAGE_Prev($respuesta, './Login_Controller.php');
          }

}




?>