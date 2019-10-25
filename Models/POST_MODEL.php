

<?php


class POST_MODEL
{
	var $id_noticia;
	var $titulo;
	var $subtitulo;
	var $cuerpo;
	
	
	function __construct($id_noticia,$titulo, $subtitulo, $cuerpo)
	{
		$this->id_noticia = $id_noticia;
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->cuerpo = $cuerpo;
	


		include_once '../includes/db.php';

		$this->bd = ConectarDB();
	}




	function ADD(){

		if (($this->id_noticia <> '')){ 

        $sql = "SELECT * FROM NEW WHERE (id_noticia = '$this->id_noticia')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO NEW (

					titulo,
					subtitulo,
					cuerpo
		
					) 
						VALUES (
						
						'$this->titulo',
						'$this->subtitulo',
						'$this->cuerpo'
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

	$sql = "SELECT * FROM NEW  WHERE (id_noticia = '$this->id_noticia') ";
    

    $result = $this->bd->query($sql);
    
    if ($result->num_rows == 1)
    	
    {	
    	
		$sql = "UPDATE NEW  SET 
				id_noticia = '$this->id_noticia',
				titulo = '$this->titulo',
				subtitulo = '$this->subtitulo',
				cuerpo = '$this->cuerpo'
				
				WHERE ( id_noticia = '$this->id_noticia')";

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
					id_noticia,
					titulo,
					subtitulo,
					cuerpo
		
					
					FROM NEW";

   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function DELETE()
		{	
		   $sql = "SELECT * FROM NEW  WHERE 
		   (id_noticia = '$this->id_noticia')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM NEW  WHERE 
		       (id_noticia = '$this->id_noticia')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else
		        return "No existe";
		} 



function RellenaDatos()
		{	
		    $sql = "SELECT * FROM NEW  WHERE (id_noticia = '$this->id_noticia')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}

		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}


		function generarCodigo($longitud){

		$key='';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern)-1;

		for ($i=0; $i < $longitud ; $i++) $key .= $pattern {mt_rand(0, $max)};

		return $key;	
	}







}

?>