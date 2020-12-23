<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 <div class="container">

	<form action="principal.php?c=controlador&a=buscaUsuario" method="POST" class='text-dark' accept-charset="utf-8">
		<div class="row">
			<label for="buscar"></label>
			<div class="col-3">
				<input type="text" class="border border-secondary form-control" id="buscar" name="buscarUsuario" placeholder="Ingrese código o nombre">
			</div>
			<input class="btn btn-secondary" type="submit" value="Buscar">
		
		</div>
	</form>

	<a class="btn btn-danger mr-1 my-4" href="principal.php?c=controlador&a=nuevoUsuario">Agregar</a>
	<a class="btn btn-outline-success mr-1 my-4" href="principal.php">Regresar</a>

	<table class="table table-striped">
			<thead class="bg-primary">
				<tr class="text-light">
					<th class="text-center">Id</th>
					<th class="text-center">Tipo</th>
					<th class="text-center">Apodo</th>
					<th class="text-center">Contraseña</th>
					<th class="text-center">Actualizar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr class='text-dark'>";
					echo "<td class='text-center'>".$dato['id']."</td>";
					echo "<td class='text-center'>".$dato['tipo_usuario']."</td>";
					echo "<td class='text-center'>".$dato['apodo']."</td>";
					echo "<td class='text-center'>".$dato['pass']."</td>";
					

					echo "<td class='text-center'><a href='principal.php?c=controlador&a=editarUsuario&id=".$dato['id']."' class='btn btn-success btn-sm'><i class='fas fa-marker'></i></a></td>";

					echo "<td class='text-center'><a onclick = 'confirmarEliminar(event)' href='principal.php?c=controlador&a=borraUsuario&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i></a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	</div>

	<div id="paginacion">Pág...
     	<?php 
     		for($i=1; $i<=$data['pagina']; $i++){
     			echo "<a href = '?c=controlador&a=muestraUsuarios&pagina=$i'>"." ".$i."</a>";
     		}

     	?>    	
     </div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>