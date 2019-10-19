<?php



$nombre_imagen = $_FILES['foto']['name'];
$tipo_imagen = $_FILES['foto']['type'];
$tamanho_imagen = $_FILES['foto']['size'];





if($tamanho_imagen<=3000000 ){

if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" || $tipo_imagen=="image/gif"){
//Ruta de la carpeta destino en el servidor
$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/Padel_Web/img/fotos_perfil/';


//Movemos la imagen del directorio temporal al directorio escogido
move_uploaded_file($_FILES['foto']['tmp_name'], $carpeta_destino.$nombre_imagen);

}

}else{
	echo "Sólo se puede subir imágenes jpg/jpeg/gif/png";
}


else {
	echo "El tamaño es demasiado grande"
}









?>