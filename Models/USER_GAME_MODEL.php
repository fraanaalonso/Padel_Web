

<?php



/**
* 
*/
class USER_GAME_MODEL
{
	var $login;
	var $id_partido;
	var $bd;
	
	function __construct($login,$id_partido)
	{
		$this->login = $login;
		$this->id_partido = $id_partido;
	


		include_once '../includes/db.php';
		$this->bd = ConectarDB();

	}



	function DELETEMYPROMOTION(){

		$sql = "SELECT * FROM USER_GAME  WHERE 
		   (id_partido = '$this->id_partido') AND (login = '$this->login')";
		    
		    $result = $this->bd->query($sql);
		    
		    if ($result->num_rows == 1)
		    {
		    
		       $sql = "DELETE FROM USER_GAME  WHERE 
		       (id_partido = '$this->id_partido') AND (login = '$this->login')";
		       
		        $this->bd->query($sql);
		        
		    	return "Borrado correctamente";
		    } 
		    else{
		        return "No existe";
		    }
	}







}


?>