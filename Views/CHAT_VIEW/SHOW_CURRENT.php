

<?php 

/**
* 
*/
class SHOWCURRENT_VIEW
{
	
	function __construct($valores)
	{

		$this->mostrarTupla($valores);
	}

	function mostrarTupla($valores){
    
 
      include '../Views/HeaderPost.php';


  

     
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link rel="stylesheet" type="text/css" href="../../css/chat.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">

</head>







	<div>


<div class="iconos-superiores">

    <a href="../Controllers/Chat_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px;"></span></a>

</div>
         <div class="mesgs" style="position: absolute; top: 150px; padding-top: 200px; left: 500px;">

          <div class="msg_history">


            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo $valores['mensaje'] ?></p>
                  <span class="time_date">  <?php echo $valores['hora_mensaje'] ?>   |  <?php echo $valores['fecha_mensaje'] ?> </span></div>
              </div>
            </div>
           


            
          
          </div>

          <div class="type_msg">
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
