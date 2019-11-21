

<?php



/**
* 
*/
class PAYMENT_MODEL
{
	var $id_pago;
	var $concepto;
	var $login;
	var $bd;
	
	function __construct($id_pago,$concepto, $login)
	{
		$this->id_pago = $id_pago;
		$this->concepto = $concepto;
		$this->login = $login;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}


		





	function añadirPago(){


        $sql = "SELECT * FROM PAYMENT WHERE (id_pago = '$this->id_pago')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO PAYMENT (
					id_pago,
					concepto,
					login
					) 
						VALUES (
						'$this->id_pago',
						'$this->concepto',
						'$this->login'
						
						)";
					
				
				if (!$this->bd->query($sql)) { 
					return 'Error en la inserción';
				}
				else{ 
					return 'Pago Realizado'; 
				}
				
			}
			else 
				return 'Ya existe en la base de datos'; 
		}
    

	}




	function SEARCH(){

	$sql = "select
					*
					
					FROM PAYMENT";

   
   
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
}




function RellenaDatos()
		{	
		    $sql = "SELECT * FROM PAYMENT  WHERE (concepto = '$this->concepto') AND (id_pago = '$this->id_pago') AND (login = '$this->login')";

		    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ 
		return $resultado;
	}
		}













}


?>