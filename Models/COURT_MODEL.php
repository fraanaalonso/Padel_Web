

<?php


class COURT_MODEL
{
	var $id_pista;
	var $descripcion;
	var $ubicacion;
	var $precio;
	var $bd;
	
	function __construct($id_pista,$descripcion, $ubicacion, $precio)
	{
		$this->id_pista = $id_pista;
		$this->descripcion = $descripcion;
		$this->ubicacion = $ubicacion;
		$this->precio = $precio;

		
		include_once '../includes/db.php';

		$this->bd = ConectarDB();
	}


	function generarCodigo($longitud){

		$key='';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;

		for ($i=0; $i < $longitud ; $i++) $key .= $pattern {mt_rand(0, $max)};

		return $key;	
	}



	




	function ADD(){

		if (($this->id_pista <> '')){ 

        $sql = "SELECT * FROM COURT WHERE (id_pista = '$this->id_pista')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COURT (
					id_pista,
					descripcion,
					ubicacion,
					precio
					) 
						VALUES (
						'$this->id_pista',
						'$this->descripcion',
						'$this->ubicacion',
						'$this->precio'
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

	$sql = "SELECT * FROM COURT  WHERE (id_pista = '$this->id_pista') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE COURT  SET 
				id_pista = '$this->id_pista',
				descripcion = '$this->descripcion',
				ubicacion = '$this->ubicacion',
				precio = '$this->precio'
				
				WHERE ( id_pista = '$this->id_pista')";

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
					
					FROM COURT";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM COURT  WHERE 
		   (id_pista = '$this->id_pista')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM COURT  WHERE 
		       (id_pista = '$this->id_pista')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	

			if(esSocio($_SESSION['login'])){

				$sql = "SELECT id_pista, descripcion, ubicacion, ROUND(precio/1.3, 1) as precio FROM COURT  WHERE (id_pista = '$this->id_pista')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}


			}
			else{
		    $sql = "SELECT * FROM COURT  WHERE (id_pista = '$this->id_pista')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}

		}
		}







}



?>
