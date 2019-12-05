<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/PHPMailer/Exception.php';
require '../includes/PHPMailer/PHPMailer.php';
require '../includes/PHPMailer/SMTP.php';
include_once '../Views/Message_View.php';
include_once '../Models/USER_MODEL.php';

$emails = new User_Modelo('','','','','','','','','','','','');
$respuesta = $emails->getEmails();
$longitud = count($respuesta);
$asunto = $_POST['asunto'];
$msg = $_POST['cuerpo'];

// Instantiation and passing `true` enables exceptions

for($i = 0; $i < $longitud-1; $i++){
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'eseipadel19@gmail.com';                     // SMTP username
    $mail->Password   = 'esei19padel';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('eseipadel19@gmail.com', 'ESEI PADEL');
    $mail->addAddress($respuesta[$i]);     // Add a recipient



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $msg;

    $mail->send();

}

if($mail){
    new MESSAGE('Mensaje Enviado', '../Controllers/User_Controller.php?action=EMAIL');
}
else{
    new MESSAGE('Mensaje no enviado', '../Controllers/User_Controller.php?action=EMAIL');
}

?>