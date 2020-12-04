<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "HeaderPrueba.php";
 ?>

 <div class="container">

	<form action="principal.php?c=controlador&a=buscaSalon" method="POST" accept-charset="utf-8">
		<label for="buscar"></label>
		<input type="text" id="buscar" name="buscarSalon" placeholder="Ingrese código o nombre">
		<input class="#" type="submit" value="Buscar">
	</form>

	<a class="" href="principal.php?c=controlador&a=nuevoSalon">Agregar</a>
	<a class="" href="principal.php">Regresar</a>

	<table>
			<thead>
				<tr>
					<th>Id </th>
					<th>Salón</th>			
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>

				<?php

				foreach ($data['objeto'] as $dato){
					echo "<tr>";
					echo "<td>".$dato['id']."</td>";
					echo "<td>".$dato['nombre_salon']."</td>";
			
					echo "<td><a href='principal.php?c=controlador&a=borraSalon&id=".$dato['id']."' class='btn btn-danger btn-sm'><i class='far fa-trash-alt'></i> </a></td>";
					
					echo "</tr>";
				}

			?>

			</tbody>
		</table>
	</div>
	
 <?php 
 	require_once "FooterPrueba.php";
 ?>