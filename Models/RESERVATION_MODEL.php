

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
	var $bd;
	
	function __construct($id_reserva,$id_pista, $login)
	{
		$this->id_reserva = $id_reserva;
		$this->id_pista = $id_pista;
		$this->login = $login;
	

		$this->bd = ConectarDB();
	}


	








	function ADD(){

		if (($this->id_reserva <> '')){ 

        $sql = "SELECT * FROM RESERVATION WHERE (id_reserva = '$this->id_reserva')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO RESERVATION (
					id_reserva,
					id_pista,
					login
					
					) 
						VALUES (
						'$this->id_reserva',
						'$this->id_pista',
						'$this->login'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Inserción realizada con éxito'; 
				}
				
			}
			else 
				return 'Ya existe en la base de datos'; 
		}
    }
    else{ 
    	
        return 'Introduzca un valor'; 
	
	}

	}








function EDIT(){

	$sql = "SELECT * FROM RESERVATION  WHERE (id_reserva = '$this->id_reserva') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE RESERVATION  SET 
				id_reserva = '$this->id_reserva',
				id_pista = '$this->id_pista',
				login = '$this->login'
				
				WHERE ( id_reserva = '$this->id_reserva')";

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
					id_reserva,
					id_pista,
					login
					
					
					FROM RESERVATION WHERE

					
						((id_reserva LIKE '$this->id_reserva') &&
						(id_pista LIKE'$this->id_pista') &&
						(login LIKE'$this->login'))";

   
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
		   (id_reserva = '$this->id_reserva')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM RESERVATION  WHERE 
		       (id_reserva = '$this->id_reserva')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM RESERVATION  WHERE (id_reserva = '$this->id_reserva')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}



	


	function AÑADIRRESERVA(){


		
		$sql = "INSERT INTO RESERVATION 
							(id_reserva, id_pista, login) 
				VALUES 
							('$this->id_reserva', '$this->id_pista', '$this->login')";


		if(!$this->bd->query($sql)){
					return "Error al realizar la reserva";
		}else{
					return "Reserva realizada";
						}





	}


}

?>