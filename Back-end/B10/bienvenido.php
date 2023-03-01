<?php
session_start();
$idU=$_SESSION['idU'];
$nombre=$_SESSION['nombre'];
$correo=$_SESSION['correo'];

if (!$_SESSION['idU']){
echo "<script>location.href='index.php';</script>";
}
?>
<html>
 <head>
  <title>Inicio</title>
  <link rel="stylesheet" type="text/css" href="./css/Estilos.css">
  <script src="./js/jquery-3.3.1.min.js"></script>
 </head>
 <body>
  <?php include("Menu.php"); ?>
  <br><br><br>
  <h1>Bienvenido al sistema de administracion </h1>
  <h1>..........</h1>
  <h1>........</h1>
  <h1>......</h1>
  <h1>....</h1>
 </body>
</html>