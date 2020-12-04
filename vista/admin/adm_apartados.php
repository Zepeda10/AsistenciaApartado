<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 <div class="container">

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
					

					echo "<td><a href='principal.php?c=controlador&a=editarApartado&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td><a href='principal.php?c=controlador&a=borraApartado&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
					echo "</tr>";
				}

			?>

				


			</tbody>
		</table>
	</div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>