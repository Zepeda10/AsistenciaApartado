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
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarDocente" placeholder="Ingrese código o nombre">
			</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">
		
		</div>
	</form>

	<a class="btn btn-danger mr-1 my-4" href="principal.php?c=controlador&a=nuevoDocente">Agregar</a>
	<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>


	<table class="table table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<th class="text-center">Id </th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellidos</th>
					<th class="text-center">Email</th>
					<th class="text-center">Teléfono</th>
					<th class="text-center">Entrada</th>
					<th class="text-center">Salida</th>
					<th class="text-center">Actualizar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr class='text-dark'>";
					echo "<td>".$dato['id']."</td>";
					echo "<td>".$dato['nombre']."</td>";
					echo "<td>".$dato['apellidos']."</td>";
					echo "<td>".$dato['email']."</td>";
					echo "<td>".$dato['telefono']."</td>";
					echo "<td>".$dato['hora_entrada']."</td>";
					echo "<td>".$dato['hora_salida']."</td>";
					

					echo "<td class='text-center'><a href='principal.php?c=controlador&a=editarDocente&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td class='text-center'><a href='principal.php?c=controlador&a=borraDocente&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	</div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>