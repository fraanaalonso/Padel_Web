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
      array_push($categorias, $this->parejasPorCategoriaArray[$i]['id_categoria']);
    }
    $this->categorias = array_values(array_unique($categorias)); //Elimina duplicados y comprime el array
    $this->render();
  }

  function render(){
    include '../Views/HeaderPost.php';
?>


      <table class="table mb-5">
        <thead>
          <tr>
            <th colspan="4">
              <h3 class="display-3 text-center">Campeonato: <?php echo $this->datosCampeonato['id_campeonato']; ?></h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="1"><strong>Fecha Inicio</strong></td>
            <td colspan="1"><strong>Fecha Fin</strong></td>
            <td colspan="1"><strong>Nivel</strong></td>
          </tr>
          <tr>
            <td colspan="1"><?php echo $this->datosCampeonato['fecha_inicio']; ?></td>
            <td colspan="1"><?php echo $this->datosCampeonato['fecha_fin']; ?></td>
            <td colspan="1"><?php echo $this->datosCampeonato['id_normativa']; ?></td>
          </tr>
        </tbody>
      </table>
      <?php
      for($i = 0; $i < sizeof($this->categorias); $i++){
        ?>
        <table class="table my-5">
          <thead>
            <tr>
              <th class="bg-dark" colspan="3">
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
              if($this->parejasPorCategoriaArray[$j]['id_categoria'] === $this->categorias[$i]){
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

      <h1 class="display-5 text-center">¿Deseas crear el calendario de enfretamientos con las parejas actuales?</h1>
        <div class="text-center py-5">
          <form method="post" action="/index.php?controller=Campeonato&amp;action=generarCalendario">
            <input type="hidden" name="idCampeonato" value="<?php echo $this->datosCampeonato['idCampeonato']; ?>"/>
            <input type="submit" class="btn btn-dark" value="Generar Calendario">
          </form>
        </div>


<?php
    include '../Views/Footer.php';
  }
}

?>
