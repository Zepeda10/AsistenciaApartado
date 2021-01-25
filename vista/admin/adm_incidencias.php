<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 <div class="container">

	<form action="principal.php?c=controlador&a=buscaIncidencia" method="POST" accept-charset="utf-8">
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarIncidencia" placeholder="Ingrese número o nombre">
			</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">	
		</div>		
		
	</form>

	<form action="principal.php?c=controlador&a=muestraReporte" method="POST" accept-charset="utf-8">
		<div class="row ml-1">
			<input class="btn btn-danger mr-1 my-4" type="submit" value="Generar Reporte">
			<div class="col-3 mt-4">
				<input type="text" class="border border-secondary form-control" id="nombrePre" name="nombrePre" placeholder="Nombre Prefecto">
			</div>	

			<div class="col-2 mt-4">
				<input type="text" class="border border-secondary form-control" id="turno" name="turno" placeholder="Turno">
			</div>

			<a class="btn btn-danger ml-5 mr-4 my-4" href="principal.php?c=controlador&a=nuevaIncidencia">Agregar</a>
		<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>	
		</div>

	</form>
	

<div class="table-responsive">
	<table class="table table-condensed table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<th class="text-center">No.</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Hora Inicio</th>
					<th class="text-center">No asistió</th>
					<th class="text-center">Llegó tarde</th>
					<th class="text-center">Salió antes</th>
					<th class="text-center">Cambio de aula</th>
					<th class="text-center">No dio clases</th>
					<th class="text-center">Observaciones</th>
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
					echo "<td>".$dato['hora_inicio']."</td>";
					echo "<td>".$dato['no_asistio']."</td>";
					echo "<td>".$dato['llego_tarde']."</td>";
					echo "<td>".$dato['salio_antes']."</td>";
					echo "<td>".$dato['cambio_aula']."</td>";
					echo "<td>".$dato['no_clases']."</td>";
					echo "<td>".$dato['observaciones']."</td>";
					

					echo "<td class='text-center'><a href='principal.php?c=controlador&a=editarIncicendia&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td class='text-center'><a onclick = 'confirmarEliminar(event)' href='principal.php?c=controlador&a=borraIncidencia&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
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
     			echo "<a href = '?c=controlador&a=muestraIncidencias&pagina=$i'>"." ".$i."</a>";
     		}

     	?>    	
     </div>

	
 <?php 
 	require_once "FooterPrueba.php";
 ?>

