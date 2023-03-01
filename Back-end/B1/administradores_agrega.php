<?php
//administradores_elimina.php
require "conecta.php";
$con = conecta();

$nombre        = $_REQUEST['nombre'];
$apellidos     = $_REQUEST['apellidos'];
$correo        = $_REQUEST['correo'];
$Rol           = $_REQUEST['Rol'];
$pasw          = $_REQUEST['pasw'];

if ($nombre!="" && $apellidos!="" && $pasw!="" && $Rol!="0" && $correo!=""){
    $sql = "INSERT INTO administradores (id, nombre, apellidos, correo, pass, rol, archivo_n, archivo, status, eliminado) 
        VALUES ('NULL', '$nombre', '$apellidos', '$correo', '$pasw', '$Rol', '', '', '1', '0')";
        $res = mysql_query($sql, $con);
}
echo "<script>location.href='Tabla.php?removido=true';</script>";
die();

?>