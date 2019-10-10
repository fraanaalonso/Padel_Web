<?php
include_once '../includes/db.php';


class USER_MODEL {


	var $login;
 	var $password;
 	var $dni;
 	var $nombre;
 	var $apellido;
 	var $telefono;
 	var $email;
 	var $fecha;
 	var $foto;
 	var $sexo;
 	var $pais;
	var $bd; 





	function __construct($login, $nombre, $apellido, $password, $dni, $email, $pais, $sexo, $telefono, $fecha, $foto){

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



		
		$this->mysqli = ConectarDB();
	}



	function ADD(){


		if (($this->login <> '')){ 

        $sql = "SELECT * FROM USER WHERE (login = '$this->login')";

		if (!$result = $this->mysqli->query($sql)){ 
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
					foto
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
						'$this->foto'
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

/*

	function EDIT()
{
	// se construye la sentencia de busqueda de la tupla en la bd
    $sql = "SELECT * FROM USER  WHERE (login = '$this->login') ";
    // se ejecuta la query
    $result = $this->mysqli->query($sql);
    // si el numero de filas es igual a uno es que lo encuentra
    
    if ($result->num_rows == 1)
    	
    {	// se construye la sentencia de modificacion en base a los atributos de la clase
    	
		$sql = "UPDATE USUARIO  SET 
						login = '$this->login',
						password = '$this->password',
					    dni = '$this->dni',
						nombre = '$this->nombre',
						apellidos = '$this->apellidos',
						telefono = '$this->telefono',
						email = '$this->email',
						FechaNacimiento = '$this->FechaNacimiento',
						fotopersonal = '$this->fotopersonal',
						sexo = '$this->sexo'
				
				WHERE ( login = '$this->login')";


		// si hay un problema con la query se envia un mensaje de error en la modificacion
        if (!($resultado = $this->mysqli->query($sql))){
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
    $sql = "select login,
    				password,
    				dni,
                    nombre,
					apellidos,
					telefono,
					email,
					FechaNacimiento,
					fotopersonal,
					sexo
       	    from USUARIO where 

    				((dni LIKE '%$this->dni%') &&
    				(login LIKE '%$this->login%') &&
    				(password LIKE '%$this->password%') &&
	 				(nombre LIKE '%$this->nombre%') &&
	 				(apellidos LIKE '%$this->apellidos%') &&
	 				(telefono LIKE '%$this->telefono%') &&
	 				(email LIKE '%$this->email%') &&
	 				(FechaNacimiento LIKE '%$this->FechaNacimiento%') &&
	 				(fotopersonal LIKE '%$this->fotopersonal%') &&
	 				(sexo LIKE '%$this->sexo%'))";

    // si se produce un error en la busqueda mandamos el mensaje de error en la consulta
    if (!($resultado = $this->mysqli->query($sql))){
		return 'Error en la consulta sobre la base de datos';
	}
    else{ // si la busqueda es correcta devolvemos el recordset resultado
		return $resultado;
	}
} // fin metodo SEARCH





		// funcion DELETE()
		// comprueba que exista el valor de clave por el que se va a borrar,si existe se ejecuta el borrado, sino
		// se manda un mensaje de que ese valor de clave no existe
		function DELETE()
		{	// se construye la sentencia sql de busqueda con los atributos de la clase
		    $sql = "SELECT * FROM USUARIO  WHERE (login = '$this->login') ";
		    // se ejecuta la query
		    $result = $this->mysqli->query($sql);
		    // si existe una tupla con ese valor de clave
		    if ($result->num_rows == 1)
		    {
		    	// se construye la sentencia sql de borrado
		        $sql = "DELETE FROM USUARIO  WHERE (login = '$this->login')";
		        // se ejecuta la query
		        $this->mysqli->query($sql);
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
		    $sql = "SELECT * FROM USUARIO  WHERE (login = '$this->login')";
		    // Si la busqueda no da resultados, se devuelve el mensaje de que no existe
		    if (!($resultado = $this->mysqli->query($sql))){
				return 'No existe en la base de datos'; // 
			}
		    else{ // si existe se devuelve la tupla resultado
				$result = $resultado->fetch_array();
				return $result;
			}
		} // fin del metodo RellenaDatos()




		// funcion login: realiza la comprobación de si existe el usuario en la bd y despues si la pass
// es correcta para ese usuario. Si es asi devuelve true, en cualquier otro caso devuelve el 
// error correspondiente


*/
function loginExiste(){

	
	$sql = "SELECT *
			FROM USER
			WHERE (
				(login = '$this->login') 
			)";
	$resultado = $this->mysqli->query($sql);
	if ($resultado->num_rows == 0){
		return 'El login no existe';
	}
	else{
		$tupla = $resultado->fetch_array();
		if ($tupla['password'] == $this->password){
			return true;
		}
		else{
			return 'La contraseña para este usuario no es correcta';
		}
	}
}
	




function register(){

		$sql = "select * from USER where login = '".$this->login."'";

		$result = $this->mysqli->query($sql);
		if ($result->num_rows == 1){  // existe el usuario
				return 'El usuario ya existe';
			}
		else{
	    		return true; //no existe el usuario
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
					foto
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
						'$this->foto'
						)";
			
		if (!$this->mysqli->query($sql)) {
			return 'Error en la inserción';
		}
		else{
			return 'Inserción realizada con éxito'; //operacion de insertado correcta
		}		
	}






}

?>