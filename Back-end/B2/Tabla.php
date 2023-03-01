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
		<title>B2. Eliminar administradores</title>
        <script src="../jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Estiloceldas.css">
		  <script>
			function eliminarFilas(fila) {
				if(confirm("¿Estas seguro?")){
					$.ajax({
						url      : 'administradores_elimina.php',
						type     : 'post',
						dataType : 'text',
						//data   : 'id=55&var2=89&var3=adios',
						data     : 'id='+fila,
						success  : function(resultband) {
							if (resultband==1){  //bandera
								nombreFila = "filas"+fila;
								fila = document.getElementById(nombreFila);  //Obtiene el nombre de la fila
								$(fila).hide();  //Oculta la fila
								$('#mensaje').html('Fila eliminada').show(); //Permite que se vuelva a mostrar despues de ser ocultado
								$('#mensaje').hide(3000); //temporizador de 3 segundos
							} else {
								$('#mensaje').html('Error en la eliminacion.');
								alert('No se borro');
							}
						}, error: function() {
							alert('Error archivo no encontrado...');
						}
					});
				}
			}
  </script>
	</head>

	<body bgcolor= "gray">

        <div class=contenedor-tabla id = "dsTable" border="1" width="960" height="800" align="center" valign="middle">
        <div class=contenedor-fila height="50" align="center">
			<div class=contenedor-cabecera colspan="5">Lista de Administradores</div>
		</div>
		<div id="mensaje" style="color:#F00;font-size:16px;"></div>
		<div class=contenedor-fila id="filacampos" height="200" align="center" valign="middle">
			<div class=contenedor-id width="100px">ID</div>
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
		$concatenacion = 'filas' . $id;
        echo "<div class=contenedor-fila id=$concatenacion height=\"200\" align=\"center\" valign=\"middle\">";
        echo "<div class=contenedor-iddatos width=\"100px\">$id</div>";
        echo "<div class=contenedor-columna width=\"33.33%\">$nombre $apellidos</div>";
        echo "<div class=contenedor-columna width=\"33.33%\">$correo</div>";
        echo "<div class=contenedor-roldatos width=\"33.33%\">$rol</div>";
        echo "<div class=contenedor-botondatos width=\"33.33%\"> <input type=\"button\" value=\"Eliminar\" href=\"javascript:void(0);\" onclick = \"eliminarFilas($id);\"  ></div>";
        //echo "<div class=contenedor-columna width=\"33.33%\"><input type=\"button\" id =\"deleteDep\" value=\"Eliminar\" onclick = \"location='administradores_elimina.php?id=$id'\" ></div>";
        echo "</div>";
        }
        ?>

        <div class=contenedor-fila height="50" align="center">
			<div class=contenedor-cabecera colspan="3"><a href="Formulario.php">Agregar Nuevo Usuario</a></div>
		</div>
	</div>
	</body>

</html>