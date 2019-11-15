<?php

class GENERARCALENDARIO_View{

  var $datosCampeonato;
  var $categorias;
  var $parejasPorCategoriaArray;

  function __construct($datosCampeonato, $parejasPorCategoria){
    $this->datosCampeonato = $datosCampeonato;
    $parejasPorCategoriaArray = array();
    while($actual = $parejasPorCategoria->fetch_array()){
      array_push($parejasPorCategoriaArray, $actual);
    }
    $this->parejasPorCategoriaArray = $parejasPorCategoriaArray;
    $categorias = array();
    for($i = 0; $i < sizeof($this->parejasPorCategoriaArray); $i++){
      array_push($categorias, $this->parejasPorCategoriaArray[$i]['categoria']);
    }
    $this->categorias = array_values(array_unique($categorias)); //Elimina duplicados y comprime el array
    $this->render();
  }

  function render(){
    include '../Views/HeaderPost.php';
?>

<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

    
  
    
      <?php
      for($i = 0; $i < sizeof($this->categorias); $i++){
        ?>
        <table>

        <thead>
          <tr>
            <th colspan="4">
              <h3 class="display-3 text-center">Campeonato: <?php echo $this->datosCampeonato['id_campeonato']; ?></h3>
            </th>
          </tr>
        </thead>
          <thead>
            <tr>
              <th colspan="3">
                <h3 class="display-4 text-light text-center">Categoría: <?php echo $this->categorias[$i]; ?>
              </th>
            </tr>
            <tr>
              <th colspan="1">Pareja</th>
              <th colspan="1">Capitán</th>
              <th colspan="1">Compañero</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for($j = 0; $j < sizeof($this->parejasPorCategoriaArray); $j++){
              if($this->parejasPorCategoriaArray[$j]['categoria'] === $this->categorias[$i]){
            ?>
            <tr>
              <td colspan="1"><?php echo utf8_encode($this->parejasPorCategoriaArray[$j]['id_pareja']); ?></td>
              <td colspan="1"><?php echo utf8_encode($this->parejasPorCategoriaArray[$j]['login1']); ?></td>
              <td colspan="1"><?php echo utf8_encode($this->parejasPorCategoriaArray[$j]['login2']); ?></td>
            </tr>
            <?php
              } //Fin if
            } //Fin for
             ?>
          </tbody>
        </table>

      <?php 
    } 
      ?>
     
          <form method="post" action="/index.php?controller=Campeonato&amp;action=generarCalendario">
            <input type="hidden" name="id_campeonato" value="<?php echo $this->datosCampeonato['id_campeonato']; ?>"/>
            <input style="position: " type="submit"  value="Generar Calendario">
          </form>



<?php
    include '../Views/Footer.php';
  }
}

?>
