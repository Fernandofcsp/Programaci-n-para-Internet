<html>

 <head>
  <title>Formulario Agregar</title>
  <script src="../jquery-3.3.1.min.js"></script>

  <script>
      function recibe() {
          var nombre = document.forma01.nombre.value;
          var apellidos = document.forma01.apellidos.value;
          var correo = document.forma01.correo.value;
          var Rol = document.forma01.Rol.value;
          var pasw = document.forma01.pasw.value;
      

      

          if(nombre!="" && apellidos!="" && pasw!="" && Rol!="0" && correo!=""){
            alert('Datos:\nNombre: '+nombre+'\nApellido(s): '+apellidos+'\nCorreo: '+correo+'\nRol: '+Rol);
                    document.forma01.method = 'REQUEST';
			        document.forma01.action = 'administradores_agrega.php';
			        document.forma01.submit();
					
				}
		  else if(nombre=="" || apellidos=="" || pasw=="" || Rol=="0" || correo==""){
					
					alert('Faltan datos por llenar');
				}

      }

  </script>

 </head>

 <body>
	<form name="forma01">
		<label>
			Nombre(s):
			<input id="campo1" type="text" name="nombre" placeholder="Escribe tu nombre" required>
		</label>
        <label>
			Apellidos:
			<input id="campo2" type="text" name="apellidos" placeholder="Escribe tu apellido" required>
		</label>
		
		<br>
		<label>Correo:</label>
		<input type="email" name="correo" value="@gmail.com">
		<br>

		<label for="Rol">Rol:</label>
		<select name="Rol">
			<option value="0" selected>Selecciona</option>
			<option value="1">Usuario</option>
			<option value="2">Administrador</option>			
		</select>
		<br>
		<label for="pasw">Contrasena:</label>
		<input type="password" name="pasw">
		<br>
		<input onClick="recibe(); return false;" type="submit" value="Agregar">
	</form>
	
 </body>

</html>