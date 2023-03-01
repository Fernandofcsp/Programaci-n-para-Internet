<?php
//administradores_lista.php
require "conecta.php";
$con = conecta();

$sql = "SELECT *
		FROM administradores
		WHERE status = 1 AND eliminado = 0 AND rol = 2";
$res = mysql_query($sql, $con);
$num = mysql_num_rows($res);

?>
<html>

	<head>
		<title>B1. Lista de Administradores</title>
        <script src="../jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Estiloceldas.css">
	</head>

	<body>

        <div class=contenedor-tabla id = "dsTable" border="1" width="960" height="800" align="center" valign="middle">
        <div class=contenedor-fila height="50" align="center">
			<div class=contenedor-cabecera colspan="3">Lista de Administradores</div>
		</div>
		<div class=contenedor-fila id="filacampos" height="200" align="center" valign="middle">
			<div class=contenedor-id width="33.33%">ID</div>
			<div class=contenedor-nombre width="33.33%">Nombre completo</div>
            <div class=contenedor-correo width="33.33%">Correo</div>
            <div class=contenedor-rol width="33.33%">Rol</div>
            <div class=contenedor-boton width="33.33%">Boton para eliminar</div>
        </div>

        <?php
        for ($i = 0; $i < $num; $i++){
            $id          = mysql_result($res, $i, "id");
            $nombre      = mysql_result($res, $i, "nombre");
            $apellidos   = mysql_result($res, $i, "apellidos");
            $correo   = mysql_result($res, $i, "correo");
            $rol   = mysql_result($res, $i, "rol");
        if($rol == 2){
            $rol = 'Administrador';
        }
        echo "<div class=contenedor-fila id=\"fila\" height=\"200\" align=\"center\" valign=\"middle\">";
        echo "<div class=contenedor-columna width=\"33.33%\">$id</div>";
        echo "<div class=contenedor-columna width=\"33.33%\">$nombre $apellidos</div>";
        echo "<div class=contenedor-columna width=\"33.33%\">$correo</div>";
        echo "<div class=contenedor-columna width=\"33.33%\">$rol</div>";
        echo "<div class=contenedor-columna width=\"33.33%\"><input type=\"button\" id =\"deleteDep\" value=\"Eliminar\" onclick = \"location='administradores_elimina.php?id=$id'\" ></div>";
        echo "</div>";
        }
        ?>

        <div class=contenedor-fila height="50" align="center">
			<div class=contenedor-cabecera colspan="3"><a href="Formulario.php">Agregar Nuevo Usuario</a></div>
		</div>

	</div>
	</body>

</html>