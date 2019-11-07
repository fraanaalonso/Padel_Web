<?php



class User_Modelo
{


	var $login;
 	var $password;
 	var $dni;
 	var $nombre;
 	var $apellido;
 	var $telefono;
 	var $email;
 	var $fecha;
 	var $sexo;
 	var $pais;
 	var $foto;
 	var $rol_id;
	//var $bd; 





	function __construct($login, $nombre, $apellido, $password, $dni, $email, $pais, $sexo, $telefono, $fecha, $foto, $rol_id){

		$this->login = $login;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->password = $password;
		$this->dni = $dni;
		$this->email = $email;
		$this->pais = $pais;
		$this->sexo = $sexo;
		$this->telefono = $telefono;
		$this->fecha = $fecha;
		$this->foto = $foto;
		$this->rol_id = $rol_id;



		include_once '../includes/db.php';
		$this->bd = ConectarDB();
	}


	function getIdRol(){
		return $this->rol_id;
	}



	function ADD(){


		if (($this->login <> '')){ 

        $sql = "SELECT * FROM USER WHERE (login = '$this->login')";

		if (!$result = $this->bd->query($sql)){ 
			return 'No se ha podido conectar con la base de datos';
		}
		else { 

			if ($result->num_rows == 0){ 
				

				$sql = "INSERT INTO USER (
					login,
					nombre,
					apellido,
					password,
					dni,
					email,
					pais,
					sexo,
					telefono,
					fecha,
					foto,
					rol_id
					) 
						VALUES (
						'$this->login',
						'$this->nombre',
						'$this->apellido',
						'$this->password',
						'$this->dni',
						'$this->email',
						'$this->pais',
						'$this->sexo',
						'$this->telefono',
						'$this->fecha',
						'$this->foto',
						'$this->rol_id'
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



	function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM USER  WHERE (login = '$this->login') ";
    // se ejecuta la query
    $result = $this->bd->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    
    if ($result->num_rows == 1)
    	
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
    	
		$sql = "UPDATE USER  SET 
						

					login = '$this->login',
					nombre = '$this->nombre',
					apellido = '$this->apellido',
					password = '$this->password',
					dni = '$this->dni',
					email = '$this->email',
					pais = '$this->pais',
					sexo = '$this->sexo',
					telefono = '$this->telefono',
					fecha = '$this->fecha',
					foto = '$this->foto',
					rol_id = '$this->rol_id'
				
				WHERE ( login = '$this->login')";


		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->bd->query($sql))){
			return 'Error en la modificación'; 
		}
		else{ // si no hay problemas con la modificación se indica que se ha modificado
			return 'Modificado correctamente';
		}
    }

    else{ // si no se encuentra la tupla se manda el mensaje de que no existe la tupla
    	
    	return 'No existe en la base de datos';
    }
}




	function SEARCH()
{ 	// construimos la sentencia de busqueda con LIKE y los atributos de la entidad
    $sql = "select * from USER ";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


} // fin metodo SEARCH



	function BUSCAR()
{ 	// construimos la sentencia de busqueda con LIKE y los atributos de la entidad
    $sql = "select login,
					nombre,
					apellido,
					password,
					dni,
					email,
					pais,
					sexo,
					telefono,
					fecha,
					foto,
					rol_id from USER WHERE

   					((login LIKE '%$this->login%') &&
   					(nombre LIKE '%$this->nombre%') &&
   					(apellido LIKE '%$this->apellido%') &&
   					(password LIKE '%$this->password%') &&
   					(dni LIKE '%$this->dni%') &&
    				(email LIKE '%$this->email%') &&
    				(pais LIKE '%$this->pais%') &&
	 				(sexo LIKE '%$this->sexo%') &&
	 				(telefono LIKE '%$this->telefono%') &&
	 				(fecha LIKE '%$this->fecha%') &&
	 				(foto LIKE '%$this->foto%') &&
	 				(rol_id LIKE '%$this->rol_id%'))";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}


} // fin metodo SEARCH




function getDBDatos($login){

	$sql = "SELECT * FROM USER WHERE login = '".$login."'";

	if (!($resultado = $this->bd->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}

	else{
		$sominho = $this->bd->query($sql);
		$delinha = mysqli_fetch_assoc($sominho);

		return [$delinha['login'],
				$delinha['nombre'],
				$delinha['apellido'],
				$delinha['password'],
				$delinha['dni'],
				$delinha['email'],
				$delinha['pais'],
				$delinha['sexo'],
				$delinha['telefono'],
				$delinha['fecha'],
				$delinha['foto'],
				$delinha['rol_id'],];
	}
}



		// funcion DELETE()
		// comprueba que exista el valor de clave por el que se va a borrar,si existe se ejecuta el borrado, sino
		// se manda un mensaje de que ese valor de clave no existe
		function DELETE()
		{	// se construye la sentencia sql de busqueda con los atributos de la clase
		    $sql = "SELECT * FROM USER  WHERE (login = '$this->login') ";
		    // se ejecuta la query
		    $result = $this->bd->query($sql);
		    // si existe una tupla con ese valor de clave
		    if ($result->num_rows == 1)
		    {
		    	// se construye la sentencia sql de borrado
		        $sql = "DELETE FROM USER  WHERE (login = '$this->login')";
		        // se ejecuta la query
		        $this->bd->query($sql);
		        // se devuelve el mensaje de borrado correcto
		    	return "Borrado correctamente";
		    } // si no existe el login a borrar se devuelve el mensaje de que no existe
		    else
		        return "No existe";
		} // fin metodo DELETE

		// funcion RellenaDatos()
		// Esta función obtiene de la entidad de la bd todos los atributos a partir del valor de la clave que esta
		// en el atributo de la clase
		function RellenaDatos()
		{	// se construye la sentencia de busqueda de la tupla
		    $sql = "SELECT * FROM USER  WHERE (login = '$this->login')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		    if (!($resultado = $this->bd->query($sql))){
				return 'No existe en la base de datos'; // 
			}
		    else{ // si existe se devuelve la tupla resultado
				$result = $resultado->fetch_array();
				return $result;
			}
		} // fin del metodo RellenaDatos()




		// funcion login: realiza la comprobación de si existe el USER en la bd y despues si la pass
// es correcta para ese USER. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente



function loginExiste(){

	
	$login = mysqli_real_escape_string($this->bd, $this->login);	
		
		$sql = "SELECT password FROM USER WHERE login = '$login'";
		
		$resultado = $this->bd->query($sql);
		
		if(!$resultado){
			return 'No se ha podido conectar con la BD';
		}else if($resultado->num_rows == 0){
			return 'Login incorrecto';
		}else{
			if($this->password == $resultado->fetch_assoc()["password"]){
				return 'true';
			}else{
				return 'Contraseña incorrecta';
			}
		}
}



	function comprobarAdmin()
		{	// se construye la sentencia de busqueda de la tupla
		    $sql = "SELECT * FROM USER  WHERE (rol_id = '$this->rol_id')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		   $resultado = $this->bd->query($sql);
			$result = $resultado->fetch_array();

			if($result[10] == 1){
				return true;
				
			
				}

			else{
				return false;
			}
		}		







	




function register(){

		$sql = "select * from USER where login = '".$this->login."'";

		$result = $this->bd->query($sql);
		if ($result->num_rows == 1){  // existe el USER
				return 'El usuario'.$login.'ya existe';
			}
		else{
	    		return true; //no existe el USER
		}

	}

function registrar(){

			
		$sql = "INSERT INTO USER (
					login,
					nombre,
					apellido,
					password,
					dni,
					email,
					pais,
					sexo,
					telefono,
					fecha,
					foto,
					rol_id
					) 
						VALUES (
						'$this->login',
						'$this->nombre',
						'$this->apellido',
						'$this->password',
						'$this->dni',
						'$this->email',
						'$this->pais',
						'$this->sexo',
						'$this->telefono',
						'$this->fecha',
						'$this->foto',
						'$this->rol_id'
						)";
			
		if (!$this->bd->query($sql)) {
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}





function getDBDatosUser(){

	include_once '../Models/USER_MODEL.php';

	$sql = "SELECT * FROM USER";		
	$resultado = $this->bd->query($sql);

	return $resultado;
}



}

?>