

<?php


/**
* 
*/
class POST_MODEL
{
	var $id;
	var $titulo;
	var $subtitulo;
	var $cuerpo;
	
	function __construct($id,$titulo, $subtitulo, $cuerpo)
	{
		$this->id = $id;
		$this->titulo = $titulo;
		$this->subtitulo = $subtitulo;
		$this->cuerpo = $cuerpo;

		$this->mysqli = ConectarDB();
	}




	function ADD(){

		if (($this->id <> '')){ 

        $sql = "SELECT * FROM NEW WHERE (id = '$this->id')";

		if (!$result = $this->mysqli->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO NEW (
					id,
					titulo,
					subtitulo,
					cuerpo
					) 
						VALUES (
						'$this->id',
						'$this->titulo',
						'$this->subtitulo',
						'$this->cuerpo'
						)";
					
				
				if (!$this->mysqli->query($sql)) { 
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




}


?>