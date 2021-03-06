

<?php
include_once '../includes/db.php';
include_once '../Models/COURT_MODEL.php';


/**
* 
*/
class RESERVATION_MODEL
{
	var $id_reserva;
	var $id_pista;
	var $login;
	var $hora_inicio;
	var $fecha;
	var $precio;
	var $bd;
	
	function __construct($id_reserva,$id_pista, $login, $hora_inicio, $fecha, $precio)
	{
		$this->id_reserva = $id_reserva;
		$this->id_pista = $id_pista;
		$this->login = $login;
		$this->hora_inicio = $hora_inicio;
		$this->fecha = $fecha;
		$this->precio = $precio;
		$this->bd = ConectarDB();
	}


	

	function getReservas(){
		$sql = "SELECT COUNT(*) FROM RESERVATION";
	$resultado =$this->bd->query($sql);
	$result = $resultado->fetch_array();
	return $result;
	}






	function ADD(){

        $sql = "SELECT * FROM RESERVATION WHERE (id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO RESERVATION (
					id_reserva,
					id_pista,
					login,
					hora_inicio,
					fecha,
					precio
					
					) 
						VALUES (
						'$this->id_reserva',
						'$this->id_pista',
						'$this->login',
						'$this->hora_inicio',
						'$this->fecha',
						'$this->precio'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Reserva Realizada'; 
				}
				
			}
			else 
				return 'Ya existe en la base de datos'; 
		}
  

	}








function EDIT(){

	$sql = "SELECT * FROM RESERVATION  WHERE (id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE RESERVATION  SET 
				id_reserva = '$this->id_reserva',
				id_pista = '$this->id_pista',
				login = '$this->login',
				hora_inicio = '$this->hora_inicio',
				fecha = '$this->fecha',
				precio = '$this->precio'
				
				WHERE ( id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista')";

        if (!($resultado = $this->bd->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ 

			return 'Modificado correctamente';
		}
    }

    else{ 
    	
    	return 'No existe en la base de datos';
    }

}



function SEARCH(){

	$sql = "select
					*
					
					
					FROM RESERVATION";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM RESERVATION  WHERE 
		   (id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM RESERVATION  WHERE 
		       (id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else{
		        return "No existe";
		    }
		} 



function getReservation(){

	$sql = "SELECT * FROM reservation where hora_inicio = '$this->hora_inicio' and fecha ='$this->fecha' and id_pista = '$this->id_pista'";

	$result = $this->bd->query($sql);
		    
    if ($result->num_rows == 1){
    	return false;
    }
    else{
    	return true;
    }


}


function RellenaDatos()
		{	




		    $sql = "SELECT * FROM RESERVATION  WHERE (id_reserva = '$this->id_reserva') AND (id_pista = '$this->id_pista')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}

		
		}


function promedioSemanal(){
	$sql = "SELECT COUNT(*)/7 FROM RESERVATION";
	$resultado = $this->bd->query($sql);
	$result = $resultado->fetch_array();
	return $result;
}







	



}

?>