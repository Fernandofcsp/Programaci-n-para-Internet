<?php
require "./funciones/conecta.php";
$con = conecta();

$file_name = $_FILES['archivo']['name'];
$file_tmp  = $_FILES['archivo']['tmp_name'];
$cadena    = explode(".", $file_name);
$ext       = $cadena[1];
$dir       = "../archivos/";
$file_enc  = md5_file($file_tmp);

if($file_name != ''){
        $fileName1 = "$file_enc.$ext";
        copy($file_tmp, $dir.$fileName1);
}

//recibe variables
$nombre        = $_POST['nombre'];
$codigo        = $_POST['codigo'];
$descripcion   = $_POST['descripcion'];
$costo         = $_POST['costo'];
$stock         = $_POST['stock'];
$archivo_n     = $file_name;
$archivo       = $file_enc.'.'.$ext;

//verifica existencia y ayuda a validar que no se envien datos al formulario si el codigo ya existe
$sql = "SELECT * FROM productos
WHERE codigo = '$codigo'";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);
if ($num < 1){
//inserta en BD
$sql = "INSERT INTO productos VALUES 
(0, '$nombre', '$codigo', '$descripcion', '$costo', '$stock', '$archivo_n', '$archivo', '1', '0')";
        $res = mysql_query($sql, $con);

echo "<script>location.href='productos_lista.php';</script>";
die();
}




?>