<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=buscaAsistencia" method="POST" accept-charset="utf-8">
		<label for="buscar"></label>
		<input type="text" id="buscar" name="buscarAsistencia" placeholder="Ingrese código o nombre">
		<input class="#" type="submit" value="Buscar">
	</form>

	<a class="" href="principal.php">Regresar</a>

	<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Hora</th>
					<th>Tipo</th>
					<th>Fecha</th>
					<th>Grupo</th>
					<th>Salon</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr>";
					echo "<td>".$dato['id']."</td>";
					echo "<td>".$dato['nombre']."</td>";
					echo "<td>".$dato['apellidos']."</td>";
					echo "<td>".$dato['hora']."</td>";
					echo "<td>".$dato['tipo']."</td>";
					echo "<td>".$dato['fecha']."</td>";
					echo "<td>".$dato['grupo']."</td>";
					echo "<td>".$dato['salon']."</td>";				
					echo "</tr>";
				}

			?>

				
			</tbody>
		</table>
	
</body>
</html>