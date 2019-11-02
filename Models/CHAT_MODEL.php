<?php







/**
* 
*/
class CHAT_MODEL
{
	var $id_chat;
	var $login;
	var $mensaje;
	var $fecha_mensaje;
	var $hora_mensaje;
	var $bd;
	
	function __construct($id_chat,$login, $mensaje, $fecha_mensaje, $hora_mensaje)
	{
		$this->id_chat = $id_chat;
		$this->login = $login;
		$this->mensaje = $mensaje;
		$this->fecha_mensaje = $fecha_mensaje;
		$this->hora_mensaje = $hora_mensaje;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_chat <> '')){ 

        $sql = "SELECT * FROM CHAT WHERE (id_chat = '$this->id_chat')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO CHAT (
				
					login,
					mensaje,
					fecha_mensaje,
					hora_mensaje
					
					) 
						VALUES (
						'$this->login',
						'$this->mensaje',
						'$this->fecha_mensaje',
						'$this->hora_mensaje'
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

	$sql = "SELECT * FROM CHAT  WHERE (id_chat = '$this->id_chat') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE CHAT  SET 
				id_chat = '$this->id_chat',
				login = '$this->login',
				mensaje = '$this->mensaje',
				fecha_mensaje = '$this->fecha_mensaje',
				hora_mensaje = '$this->hora_mensaje'
				
				WHERE ( id_chat = '$this->id_chat')";

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
					
					FROM CHAT";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM CHAT  WHERE 
		   (id_chat = '$this->id_chat')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM CHAT  WHERE 
		       (id_chat = '$this->id_chat')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM CHAT  WHERE (id_chat = '$this->id_chat')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}


	}




?>