<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=buscaApartado" method="POST" accept-charset="utf-8">
		<label for="buscar"></label>
		<input type="text" id="buscar" name="buscarApartado" placeholder="Ingrese salón o nombre docente">
		<input class="#" type="submit" value="Buscar">
	</form>

	<a class="" href="principal.php?c=controlador&a=nuevoApartado">Agregar</a>
	<a class="" href="principal.php">Regresar</a>

	<table>
			<thead>
				<tr>
					<th>Id Salón </th>
					<th>Id Docente</th>
					<th>Salón</th>
					<th>Hora Inicio</th>
					<th>Hora Fin</th>
					<th>Nombre Docente</th>
					<th>Apelidos Docente</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr>";
					echo "<td>".$dato['id_salon']."</td>";
					echo "<td>".$dato['id_docente']."</td>";
					echo "<td>".$dato['nombre_salon']."</td>";
					echo "<td>".$dato['hora_inicio']."</td>";
					echo "<td>".$dato['hora_fin']."</td>";
					echo "<td>".$dato['nombre_docente']."</td>";
					echo "<td>".$dato['apellido_docente']."</td>";
					

					echo "<td><a href='principal.php?c=controlador&a=editarApartado&id=".$dato['id']."'>Editar</a></td>";

					echo "<td><a href='principal.php?c=controlador&a=borraApartado&id=".$dato['id']."'>Eliminar</a></td>";
					
					echo "</tr>";
				}

			?>

				


			</tbody>
		</table>
	
</body>
</html>