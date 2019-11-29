<?php


/**
* 
*/
class SHOWGRUPOS_CAMPEONATO 
{
	
	function __construct($fila, $grupo1)
	{
		$this->execute($fila, $grupo1);
	}




	function execute($fila, $grupo1){

	include_once '../Views/HeaderPost.php';

?>
<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

<div>
<table border="1">


	
	<tr bgcolor="red">
	    <th>ID  Pareja</th>
     <th>Campeonato</th>
     <th>Grupo</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>


	<?php

	while ($fila = $grupo1->fetch_assoc()) {
    if(minInscritos($fila['id_campeonato'], $fila['nivel'], $fila['categoria'])){

	  echo "<tr>";
      echo "<td>".$fila["pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["grupo"]."</td>";
      echo "<td>".$fila["capitan"]."</td>";
      echo "<td>".$fila["socio"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";

?>



<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>

<a href="../Controllers/Championship_Controller.php?action=OCTAVOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-chevron-right-circle editar"></span></a>
</span></a>


</td>





<?php

echo "</tr>";
}
 		
	}


 
?>




<?php

	}
}

?>