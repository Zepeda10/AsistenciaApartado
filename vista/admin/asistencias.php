<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">
 
	<form action="principal.php?c=controlador&a=buscaAsistencia" method="POST" accept-charset="utf-8">
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarAsistencia" placeholder="Ingrese código o nombre">
		</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">
		
		</div>
	</form>

	<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>

	<table class="table table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<th class="text-center">Id</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellidos</th>
					<th class="text-center">Hora</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Fecha</th>
					<th class="text-center">Grupo</th>
					<th class="text-center">Salon</th>
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
					echo "<td>".$dato['hora']."</td>";
					echo "<td>".$dato['tipo']."</td>";
					echo "<td>".$dato['fecha']."</td>";
					echo "<td>".$dato['grupo']."</td>";
					echo "<td>".$dato['salon']."</td>";	

					echo "<td class='text-center'><a onclick = 'confirmarEliminar(event)' href='principal.php?c=controlador&a=borraAsistencia&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";

					echo "</tr>";
				}

			?>

				
			</tbody>
		</table>
	</div>

		<div id="paginacion">Pág...
     	<?php 
     		for($i=1; $i<=$data['pagina']; $i++){
     			echo "<a href = '?c=controlador&a=muestraAsistencias&pagina=$i'>"." ".$i."</a>";
     		}

     	?>    	
     </div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>