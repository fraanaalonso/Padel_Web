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



      <?php
      for($i = 0; $i < sizeof($this->categorias); $i++){
        ?>
        <table>
          <thead>
            <tr>
              <th colspan="3">
                <h3>Categoría: <?php echo $this->categorias[$i]; ?>
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

        <div class="text-center py-5">
          <form method="post" action="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO">
            <input type="hidden" name="idCampeonato" value="<?php echo $this->datosCampeonato['idCampeonato']; ?>"/>
            <input type="submit" value="Generar Calendario">
          </form>
        </div>


<?php
    include '../Views/Footer.php';
  }
}

?>
