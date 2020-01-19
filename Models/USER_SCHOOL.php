

<?php
include_once '../includes/db.php';



/**
* 
*/
class USER_SCHOOL
{
	var $codigo;
	var $login;
	var $bd;
	
	function __construct($codigo, $login)
	{
		$this->codigo = $codigo;
		$this->login = $login;
	
		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}

		

function numMembers($capacidad){

	$consulta = "SELECT * FROM USER_SCHOOL WHERE codigo = '$this->codigo'";
	$result = $this->bd->query($consulta);


	if ($result->num_rows == $capacidad){
		return true;
	}
	else{
		return false;
	}
}





function inscribirEscuela(){



        $sql = "SELECT * FROM USER_SCHOOL WHERE (codigo = '$this->codigo') AND (login = '$this->login')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO USER_SCHOOL (
					codigo,
					login
					) 
						VALUES (
						'$this->codigo',
						'$this->login'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Se ha inscrito a la escuela'; 
				}
				
			}
			else 
				return 'Ya está inscrito en la escuela'; 
		}
   

	}









}










?>