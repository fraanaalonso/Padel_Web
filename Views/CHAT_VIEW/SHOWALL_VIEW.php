
<!------ Include the above in your HEAD tag ---------->

<?php
  /**
   * 
   */
  class SHOWALL_VIEW
  {
    
    function __construct($fila, $resultado, $valor)
    {
     $this->execution($fila, $resultado, $valor); 

    }

    function execution($fila, $resultado, $valor){
      include '../Views/HeaderPost.php';

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link rel="stylesheet" type="text/css" href="../../css/chat.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

</head>

<div class="iconos-superiores">

    <a href="../Controllers/Chat_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px;"></span></a>

</div>
         





          <div class="inbox_chat" style="position: absolute; top: 200px; left: 500px; width: 70%; border: 1px;">
<?php 

while ($fila = $resultado->fetch_assoc()){
  if ($_SESSION['login'] != $fila['login']){
?>


             <div class="incoming_msg">
              
              <div class="received_msg">
                <div class="incoming_msg_img"><?php echo $fila['login']; ?> </div>
                <div class="received_withd_msg">
                  <p><?php echo $fila['mensaje'] ?></p>
                  <span class="time_date">  <?php echo $fila['hora_mensaje'] ?>   |  <?php echo $fila['fecha_mensaje'] ?> </span></div>
              </div>


            </div>

<?php
}

else{
?>
              <div class="outgoing_msg">
                
              <div class="sent_msg">
                <div class="incoming_msg_img" style="width: 5%; right: 0;"><?php echo $fila['login']; ?> </div>
                <p><?php echo $fila['mensaje'] ?></p>
                <span class="time_date"> <?php echo $fila['hora_mensaje'] ?>    |     <?php echo $fila['fecha_mensaje'] ?></span>
                 </div>
            </div>



<?php
}
}
?>
            
        </div>

          <div class="type_msg" style="width: 50%; left: 500px; top:0;">
            <div class="input_msg_write">
              <form method="post" action="../Controllers/Chat_Controller.php?action=ADD">
                <input type="hidden"  name="id_chat" value="" />
              <input type="text" class="write_msg" name="mensaje" placeholder="Escribe un mensaje" />
              <input type="hidden"  name="login" value="<?php echo $_SESSION['login']; ?>" />
              <input type="hidden"  name="fecha_mensaje" size="10" value="<?php echo date("d/m/Y", time())?>"  />
              <input type="hidden"  name="hora_mensaje" size="5" value="<?php echo date('G:i');?>"  />
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </form>
            </div>
          </div>



        </div>




<?php

  include '../Views/Footer.php';

}


}
?>