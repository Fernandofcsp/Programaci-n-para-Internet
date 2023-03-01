<html>

 <head>
  <title>Formulario Agregar</title>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/Estilos.css">


  <script>
	  function validacion(codigo){
		
		if (codigo != ''){
		$.ajax({
			url      : './funciones/VerificaCodigo.php',
			type     : 'post',
			dataType : 'text',
			data     : 'codigo='+codigo,
			success  : function(resultband) {
				if (resultband==1){  //bandera
					$('#mensaje').html('Error, el codigo '+codigo+' ya existe').show(); 
					setTimeout(function(){ $('#mensaje').html('').show();},5000);
					$('#destino').val(resultband);
					//var destino = $('#destino').val();
					//alert(destino);
				} else {
					$('#mensaje').html('').show();
					setTimeout(function(){ $('#mensaje').html('').show();},5000);
					$('#destino').val(resultband);
					//var destino = $('#destino').val();
					//alert(destino);
				}
			}, error: function() {
				alert('Error archivo no encontrado...');
			}
		});	
	  }	  
	  }
      function recibe() {
          var nombre = document.forma01.nombre.value;
          var codigo		= document.forma01.codigo.value;
          var descripcion	= document.forma01.descripcion.value;
          var costo 		= document.forma01.costo.value;
          var stock 		= document.forma01.stock.value;
		  var archivo 		= document.forma01.archivo.file;
		  var vArchivo 		= document.getElementById('archivo').value;
		  //var valide		= document.getElementById('destino').value;
		  var valide = $('#destino').val();
          if(nombre!="" && codigo!="" && descripcion!="" && costo!="" && stock!="" && vArchivo!=0 && valide !=1){
			document.forma01.method = 'post';
			document.forma01.enctype = 'multipart/form-data';
			document.forma01.action = 'productos_salva.php';
			document.forma01.submit();
		  }
		  else if(nombre=="" || codigo=="" || descripcion=="" || costo=="" || stock=="" || vArchivo==0 || valide == 1){
			
			if(nombre!="" && codigo!="" && descripcion!="" && costo!="" && stock!="" && vArchivo!=0 && valide == 1){
				validacion(codigo);
			}else{
				$('#mensaje').html('Faltan campos por llenar').show(); 		
				setTimeout(function(){ $('#mensaje').html('').show();},5000);
			}
			
		  }
	  }

  </script>
	<meta charset="utf-8"/> <!--elimina el ï»¿ al inicio-->
 </head>

 <body>
 	<?php include("Menu.php"); ?>
	<br><br>
	<form name="forma01">
	<div style="font-size: 30px;margin:0 135 40px;" align="left" ><input type="button" id ="regresar" value="Regresar al Listado" onclick = "location='productos_lista.php'"></div>
	<h1 class="div2" style="text-align:center;color:white;font-weight:thin;margin:0 0 40px;">Registro de Producto</h1>
	<table border="2" bordercolor="black" bgcolor="white" width="1000" height="50"style="margin: 0 auto;" >
	<tr>
	<td colspan="3" style="background-color:#85929E;height:25px;">Nombre</td>
	</tr>
	<tr>
	<td colspan="3"><input size="120" id="campo1" type="text" name="nombre" placeholder="Nombre"></td>
	</tr>
	<tr>
	<td style="background-color:#85929E;height:25px;">Codigo</td>
	<td style="background-color:#85929E;height:25px;">Costo</td>
	<td style="background-color:#85929E;height:25px;">Stock</td>
	</tr>
	<tr>
	<td><input size="25" id="campo2" type="text" name="codigo" placeholder="Codigo" onBlur="validacion(value);"></td>
	<td><input size="25" type="text" name="costo" placeholder="Costo"></td>
	<td><input size="25" type="text" name="stock" placeholder="Stock"></td>
	</tr>
	<tr>
	<td colspan="3" style="background-color:#85929E;height:25px;">Descripcion</td>
	</tr>
	<tr>
	<td colspan="3"><textarea  type="text" name="descripcion" rows="10" cols="140" placeholder="Descripcion del producto"></textarea></td>
	</tr>
  </table>
<div class="rejilla">
 
  <h1 class="div2">Agregar imagen del Producto</h1>
	<div></div>
	<h1 class="div2"><input type="file"  id="archivo" name="archivo" id="archivo"></h1>
	<div></div>
  <div></div>
  <div></div>
  <div class="div2"><input onClick="recibe(); return false;" type="submit" value="Registrar Producto"></div>
  <div></div>
  <div class="div2" id="mensaje" style="color:#F00;font-size:16px;" ></div>
  <div id="destino" style="color:#F00;font-size:16px;"></div>
</div>
	
	
 </body>

</html>