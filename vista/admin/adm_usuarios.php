<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=buscaUsuario" method="POST" accept-charset="utf-8">
		<label for="buscar"></label>
		<input type="text" id="buscar" name="buscarUsuario" placeholder="Ingrese código o nombre">
		<input class="#" type="submit" value="Buscar">
	</form>

	<a class="" href="principal.php?c=controlador&a=nuevoUsuario">Agregar</a>
	<a class="" href="principal.php">Regresar</a>

	<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Tipo</th>
					<th>Apodo</th>
					<th>Contraseña</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr>";
					echo "<td>".$dato['id']."</td>";
					echo "<td>".$dato['tipo_usuario']."</td>";
					echo "<td>".$dato['apodo']."</td>";
					echo "<td>".$dato['pass']."</td>";
					

					echo "<td><a href='principal.php?c=controlador&a=editarUsuario&id=".$dato['id']."'>Editar</a></td>";

					echo "<td><a href='principal.php?c=controlador&a=borraUsuario&id=".$dato['id']."'>Eliminar</a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	
</body>
</html>