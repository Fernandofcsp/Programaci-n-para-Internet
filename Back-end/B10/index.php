<?php
session_start();
if ($_SESSION['idU']){
	echo "<script>location.href='bienvenido.php';</script>";
	}
?>
<html>

 <head>
  <title>Formulario Login</title>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/Estilos.css">

  <script>
	  function validacion(){
		var user = $('#correo').val();
		var pass = $('#pasw').val();
			
		$.ajax({
			url      : './funciones/ValidaUsuario.php',
			type     : 'post',
			data     : 'user='+user+'&pass='+pass,
			success  : function(resultband) {
				
				if (resultband==0){  //bandera
					window.location.href = 'bienvenido.php';
				} else if(resultband== 1){
					$('#mensaje').html('Error, usuario inexistente o contrasena incorrecta').show(); //Permite que se vuelva a mostrar despues de ser ocultado
					setTimeout(function(){$('#mensaje').html('').show();},5000);
				}
			}, error: function() {
				alert('Error archivo no encontrado...');
			}
		});	
	  }
      function recibe() {
		var correo = $('#correo').val();
		var pasw = $('#pasw').val();
		
		  if(pasw=="" || correo==""){
			$('#mensaje').html('Faltan campos por llenar').show(); //Permite que se vuelva a mostrar despues de ser ocultado		
			//$('#mensaje').slideUp(5000); //oculta de abajo hacia arriba
			setTimeout(function(){ $('#mensaje').html('').show();},5000);	
		  }	else{validacion();}
	  }
	  
  </script>

 </head>

 <body>
	<form name="forma01">
	<div></div><br>
	<h1 class="div2" style="text-align:center;color:white;font-weight:thin;margin:0 0 40px;">Inicia Sesion</h1>
<div class="rejilla">
  <div class="div2"><input  type="email" name="correo"  id="correo" placeholder="Usuario(email)" ></div>
  <div></div>
  <div class="div2"><input type="password" name="pasw" id="pasw" placeholder="Password"></div>
  <div></div>
  <div class="div2"><input onClick="recibe(); return false;" type="submit" value="Entrar"></div>
  <div></div>
  <div class="div2" id="mensaje" style="color:#F00;font-size:16px;" ></div>
</div>
	</form>
	
 </body>

</html>