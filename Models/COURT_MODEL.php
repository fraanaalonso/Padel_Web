

<?php


class COURT_MODEL
{
	var $id_pista;
	var $ubicacion;
	var $num_pista;
	var $terreno;
	var $precio;
	var $estado;
	var $bd;
	
	function __construct($id_pista,$ubicacion, $num_pista, $terreno, $precio, $estado)
	{
		$this->id_pista = $id_pista;
		$this->ubicacion = $ubicacion;
		$this->num_pista = $num_pista;
		$this->terreno = $terreno;
		$this->precio = $precio;
		$this->estado = $estado;

		
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
					ubicacion,
					num_pista,
					terreno,
					precio, 
					estado
					) 
						VALUES (
						'$this->id_pista',
						'$this->ubicacion',
						'$this->num_pista',
						'$this->terreno',
						'$this->precio',
						'$this->estado'
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
				ubicacion = '$this->ubicacion',
				num_pista = '$this->num_pista',
				terreno = '$this->terreno',
				precio = '$this->precio',
				estado = '$this->$estado'
				
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
		    $sql = "SELECT * FROM COURT  WHERE (id_pista = '$this->id_pista')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}




function ocupadaPista(){

	$sql = "UPDATE Pista SET `estado` = '2' WHERE HERE (id_pista = '$this->id_pista')";
			
			$resultado = $this->bd->query($sql);
			
			if(!$resultado){
					return "Error en la modificación";
				}else{
					return "Modificado correctamente";
				}



}


function librePista(){
	$sql = "UPDATE COURT SET `estado` = '1'  WHERE id_pista = '".$this-> id_pista."'";


		$resultado = $this->bd->query($sql);
			
		if(!$resultado){
			return "Error en la modificación";
		}else{
			return "Modificado correctamente";
			}


}	

}



?>
