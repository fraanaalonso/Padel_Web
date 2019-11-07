<?php





/**
* 
*/
class COUPLE_MODEL
{
	var $id_pareja;
	var $id_grupo;
	var $login1;
	var $id_categoria;
	var $login2;
	var $bd;
	
	function __construct($id_pareja,$id_categoria, $id_grupo, $login1, $login2)
	{
		$this->id_pareja = $id_pareja;
		$this->id_categoria = $id_categoria;
		$this->id_grupo = $id_grupo;
		$this->login1 = $login1;
		$this->login2 = $login2;


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}




	function REGISTRARPAREJA(){

		if (($this->id_pareja <> '')){ 

        $sql = "SELECT * FROM COUPLE WHERE (id_pareja = '$this->id_pareja')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO COUPLE (

					id_categoria,
					id_grupo,
					login1,
					login2
					) 
						VALUES (

						'$this->id_categoria',
						'$this->id_grupo',
						'$this->login1',
						'$this->login2'
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Pareja registrada con éxito'; 
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


	


	function SEARCH(){

	$sql = "select
					*
					
					FROM COUPLE";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function RellenaDatos()
		{	
		    $sql = "SELECT * FROM COUPLE  WHERE (id_pareja = '$this->id_pareja')";

		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; 
			}
			
		    else{ 

			$result = $resultado->fetch_array();
				return $result;
			}
		}



function obtenerUltimoInscrito(){
	$sql = "SELECT id_pareja FROM COUPLE ORDER BY id_pareja DESC LIMIT 1";
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