<?php


/**
* 
*/
class SHOWGRUPOS_CAMPEONATO 
{
	
	function __construct($fila, $grupo1, $grupo2, $grupo3, $grupo4, $grupo5, $grupo6, $grupo7, $grupo8, $grupo9)
	{
		$this->execute($fila, $grupo1, $grupo2, $grupo3, $grupo4, $grupo5, $grupo6, $grupo7, $grupo8, $grupo9);
	}




	function execute($fila, $grupo1, $grupo2, $grupo3, $grupo4, $grupo5, $grupo6, $grupo7, $grupo8, $grupo9){

	include_once '../Views/HeaderPost.php';

?>
<div class="iconos-superiores">

    <a href="../Controllers/Championship_Controller.php"><span class="lnr lnr-exit" style="font-size: 35px"></span></a>

</div>

<div>
<table border="1">
	
	<tr bgcolor="red">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>


	<?php

	while ($fila = $grupo1->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";

?>



<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>


</td>





<?php

echo "</tr>";
 		
	}


 
?>



	
	<tr style="background-color: #2DCCD3">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo2->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";


?>

<td colspan="12">

  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>


  <a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

	<tr style="background-color: #B7D32D">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Categoría</th>
	</tr>
<?php
	while ($fila = $grupo3->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
    

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

	<tr style="background-color: #FFB533">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo4->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
      

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>


	<tr style="background-color: #33FFE3">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo5->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
      

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

	<tr style="background-color: #C1FF33">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo6->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";


?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>


  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

	<tr style="background-color: #338AFF">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo7->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
      

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

	<tr style="background-color: #FF33DA">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo8->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
      

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

  <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
	}

	?>


	<tr style="background-color: #FF336B">
	 <th>ID  Pareja</th>
     <th>ID  Campeonato</th>
     <th>Login Capitan</th>
     <th>Login Acompañante</th>
     <th>ID Categoria</th>
     <th>ID Nivel</th>
     <th>Calendario</th>
	</tr>
<?php
	while ($fila = $grupo9->fetch_assoc()) {

	  echo "<tr>";
      echo "<td>".$fila["id_pareja"]."</td>";
      echo "<td>".$fila["id_campeonato"]."</td>";
      echo "<td>".$fila["login1"]."</td>";
      echo "<td>".$fila["login2"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      echo "<td>".$fila["nivel"]."</td>";
      

?>

<td colspan="12">
  <a href="../Controllers/Championship_Controller.php?action=GENERARCALENDARIO&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-calendar-full iconCalendar"></span></a>

 <a href="../Controllers/Championship_Controller.php?action=SHOWENFRENTAMIENTOS&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-eye borrar"></span></a>
</span></a>

<a href="../Controllers/Clash_Controller.php?action=SHOWRANKING&id_campeonato=<?php  echo $fila['id_campeonato'] ?>&categoria=<?php  echo $fila['categoria'] ?>&nivel=<?php  echo $fila['nivel'] ?>"><span class="lnr lnr-list editar"></span></a>
</span></a>
</td>
<?php

echo "</tr>";
		
	}

	?>

</table>

</div>



<?php

	}
}

?>