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
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarApartado" placeholder="Ingrese salón o nombre docente">
			</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">		
		</div>
		
	</form>

	<a class="btn btn-danger mr-1 my-4" href="principal.php?c=controlador&a=nuevoApartado">Agregar</a>
	<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>

<div class="table-responsive">
	<table class="table table-condensed table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<!-- <th class="text-center">Id Salón</th> -->
					<!-- <th class="text-center">Id Docente</th> -->
					<th class="text-center">Salón</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Hora Inicio</th>
					<th class="text-center">Hora Fin</th>
					<th class="text-center">Nombre Docente</th>
					<th class="text-center">Apellidos Docente</th>
					<th class="text-center">Motivo</th>
					<th class="text-center">Observaciones</th>
					<th class="text-center">Actualizar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr class='text-dark'>";
					//echo "<td>".$dato['id_salon']."</td>";
					//echo "<td>".$dato['id_docente']."</td>";
					echo "<td>".$dato['nombre_salon']."</td>";
					echo "<td>".$dato['fecha']."</td>";
					echo "<td>".$dato['hora_inicio']."</td>";
					echo "<td>".$dato['hora_fin']."</td>";
					echo "<td>".$dato['nombre_docente']."</td>";
					echo "<td>".$dato['apellido_docente']."</td>";
					echo "<td>".$dato['motivo']."</td>";
					echo "<td>".$dato['observaciones']."</td>";
					

					echo "<td class='text-center'><a href='principal.php?c=controlador&a=editarApartado&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td class='text-center'><a onclick = 'confirmarEliminar(event)' href='principal.php?c=controlador&a=borraApartado&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	</div>
	</div>

	<div id="paginacion">Pág...
     	<?php 
     		for($i=1; $i<=$data['pagina']; $i++){
     			echo "<a href = '?c=controlador&a=muestraApartados&pagina=$i'>"." ".$i."</a>";
     		}

     	?>    	
     </div>

	
 <?php 
 	require_once "FooterPrueba.php";
 ?>

