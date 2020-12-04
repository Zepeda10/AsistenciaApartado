<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 	<div class="container">

	<form action="principal.php?c=controlador&a=buscaDocente" method="POST" accept-charset="utf-8">
		<label for="buscar"></label>
		<input type="text" id="buscar" name="buscarDocente" placeholder="Ingrese código o nombre">
		<input class="#" type="submit" value="Buscar">
	</form>

	<a class="" href="principal.php?c=controlador&a=nuevoDocente">Agregar</a>
	<a class="" href="principal.php">Regresar</a>

	<table>
			<thead>
				<tr>
					<th>Id </th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Email</th>
					<th>Teléfono</th>
					<th>Entrada</th>
					<th>Salida</th>
					<th>Actualizar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr>";
					echo "<td>".$dato['id']."</td>";
					echo "<td>".$dato['nombre']."</td>";
					echo "<td>".$dato['apellidos']."</td>";
					echo "<td>".$dato['email']."</td>";
					echo "<td>".$dato['telefono']."</td>";
					echo "<td>".$dato['hora_entrada']."</td>";
					echo "<td>".$dato['hora_salida']."</td>";
					

					echo "<td><a href='principal.php?c=controlador&a=editarDocente&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td><a href='principal.php?c=controlador&a=borraDocente&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	</div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>