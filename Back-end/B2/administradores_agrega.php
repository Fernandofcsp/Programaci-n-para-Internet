<?php
//administradores_elimina.php
require "conecta.php";
$con = conecta();

//recibe variables
$nombre        = $_REQUEST['nombre'];
$apellidos     = $_REQUEST['apellidos'];
$correo        = $_REQUEST['correo'];
$Rol           = $_REQUEST['Rol'];
$pasw          = $_REQUEST['pasw'];
$archivo_n     = '';
$archivo       = '';
$passEnc       = md5 ($pasw);

//inserta en BD

$sql = "INSERT INTO administradores VALUES 
(0, '$nombre', '$apellidos', '$correo', '$passEnc', '$Rol', '$archivo_n', '$archivo', '1', '0')";
        $res = mysql_query($sql, $con);

echo "<script>location.href='administradores_lista.php';</script>";
die();

?>