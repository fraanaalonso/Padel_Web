
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

<div class="container" style="position: absolute; top: 0; padding-top: 200px; left: 500px;">
<h3 class=" text-center">CHAT</h3>
<div class="messaging">



      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recientes</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <form method="post" action="../Controllers/Chat_Controller.php?action=SEARCH">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span>
                </form>
                 </div>
            </div>
          </div>





          <div class="inbox_chat">
<?php 

while ($fila = $resultado->fetch_assoc()){
?>
            <div class="chat_list active_chat">
              <div class="chat_people">



                <div class="chat_img"><?php obtenerFotoReducida($valor['foto']); ?></div>
                <div class="chat_ib">
                  <h5><?php echo $fila['login'] ?><span class="chat_date"><?php  echo $fila['fecha_mensaje']?></span></h5>
                  <p><?php echo  $fila['mensaje']?></p>
                  <a href="../Controllers/Chat_Controller.php?action=SHOWCURRENT&id_chat=<?php  echo $fila['id_chat'] ?>"><span class="lnr lnr-eye añadir"></span>
                  <?php
                    if($_SESSION['login']){
                   ?>
                    <a href="../Controllers/Chat_Controller.php?action=DELETE&id_chat=<?php  echo $fila['id_chat'] ?>"><span class="lnr lnr-trash añadir"></span></a>

                    <?php
                  }
                    ?>
                </div>
              </div>
            </div>

<?php
}
?>
            
          </div>


        </div>





  
      
      
      
    </div>


  </div>




<?php

  include '../Views/Footer.php';

}


}
?>