
function validar() {


	var nombre, apellido, email, password, login, dni, sexo, fecha, foto, telefono, pais, expresion;


	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	email = document.getElementById("email").value;
	password = document.getElementById("password").value;
	login = document.getElementById("login").value;
	dni = document.getElementById("dni").value;
	sexo = document.getElementById("sexo").value;
	fecha = document.getElementById("fecha").value;
	foto = document.getElementById("foto").value;
	telefono = document.getElementById("telefono").value;
	pais = document.getElementById("pais").value;
	id_noticia = document.getElementById("id_noticia").value;
	titulo = document.getElementById("titulo").value;
	subtitulo = document.getElementById("subtitulo").value;
	cuerpo = document.getElementById("cuerpo").value;
	expresion = /\w+@\w+\.+[a-z]/;


	if(nombre === "" || apellido === "" || email === "" || password === "" || login === "" || dni === "" || sexo === "" || fecha === "" || foto === "" || telefono === "" || pais === "" ||
		id_noticia === "" || titulo === "" || subtitulo === "" || cuerpo === ""){
		alert("Todos los campos son obligatorios");
		return false;
	}

	else if(nombre.length>50){
		alert("El Nombre excede el tamaño permitido");
		return false;
	}

	else if(login.length>20 || password.length>20){
		alert("El login y la password execeden el tamaño permitido");
		return false;
	}

	else if(dni.length>9){
		alert("El dni execede el tamaño permitido");
		return false;
	}


	else if(apellido.length>50){
		alert("El apellido execede el tamaño permitido");
		return false;
	}


	else if(email.length>30){
		alert("El email execede el tamaño permitido");
		return false;
	}
	
	else if(!expresion.test(email)){

		alert("El correo no es válido");
		return false;

	}


	else if(telefono.length> 11){
		alert("El telefono execede el tamaño permitido");
		return false;
	}

	else if(isNaN(telefono)){
		alert("El teléfono no es un número");
		return  false;
	}


}