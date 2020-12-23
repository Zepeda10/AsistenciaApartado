<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 <div class="container">

	<form action="principal.php?c=controlador&a=buscaGrupo" method="POST" accept-charset="utf-8">
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarGrupo" placeholder="Ingrese código o nombre">
		</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">
		
		</div>
	</form>

	<a class="btn btn-danger mr-1 my-4" href="principal.php?c=controlador&a=nuevoGrupo">Agregar</a>
	<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>

	<table class="table table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<th class="text-center">Id </th>
					<th class="text-center">Nombre Grupo</th>
					<th class="text-center">Actualizar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr class='text-dark'>";
					echo "<td class='text-center'>".$dato['id']."</td>";
					echo "<td class='text-center'>".$dato['nombre_grupo']."</td>";
			
					echo "<td class='text-center'><a href='principal.php?c=controlador&a=editarGrupo&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td class='text-center'><a onclick = 'confirmarEliminar(event)' href='principal.php?c=controlador&a=borraGrupo&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
				
					echo "</tr>";
				}

			?>

			</tbody>
		</table>

	</div>

	<div id="paginacion">Pág...
     	<?php 
     		for($i=1; $i<=$data['pagina']; $i++){
     			echo "<a href = '?c=controlador&a=muestraGrupos&pagina=$i'>"." ".$i."</a>";
     		}

     	?>    	
     </div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>