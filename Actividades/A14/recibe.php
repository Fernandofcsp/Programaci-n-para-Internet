<?php
	$nombre      = $_POST['nombre'];
	$correo      = $_POST['correo'];
	$sexo        = $_POST['sexo'];
	$boletin     = $_POST['boletin'];
	$comentario  = $_POST['comentario'];
	$carrera     = $_POST['carrera'];
	$pasw        = $_POST['pasw'];
	$promedio    = $_POST['promedio'];
	$fecha       = $_POST['fecha'];
	//$rol      = $_GET['rol'];
	//$rol      = $_REQUEST['rol'];
	$carrera_txt  = ($carrera == 1) ? 'Ing. Informática' : 'Ing. Computación';
	$sexo_txt  = ($sexo == 'M') ? 'Masculino' : 'Femenino';
	$boletin_txt  = ($boletin == 1) ? 'Si' : 'No';
	
	echo "Bienvenido $nombre <br>";
	echo "$correo / $carrera_txt <br>";
	echo "Genero $sexo_txt <br>";
	echo "Fecha de nacimiento: $fecha <br>";
	echo "Contraseña: $pasw <br>";
	echo "Tu promedio: $promedio <br>";
	echo "Recibir boletin $boletin_txt <br>";
	echo "Tu comentario: $comentario <br>";
	
	echo"<br><br><img src=\"./images/avatar.jpg\" width=\"80\" height=\"80\">";
?>
