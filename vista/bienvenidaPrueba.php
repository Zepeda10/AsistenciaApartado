<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "admin/HeaderPrueba.php";
 ?>

 	<div class="container">
 			<h2>Bienvenido (a), <?= $_SESSION['user']; ?> </h2>
 		<h2>Esta es la página principal de todos los usuarios (ADMIN), solo es una prueba</h2>
 		<!--
		<a href="principal.php?c=controlador&a=muestraDocentes">Docentes</a>
		<a href="principal.php?c=controlador&a=muestraGrupos">Grupos</a>
		<a href="principal.php?c=controlador&a=muestraSalones">Salones</a>
		<a href="principal.php?c=controlador&a=muestraUsuarios">Usuarios</a>
		<a href="principal.php?c=controlador&a=muestraApartados">Apartados</a>
		<a href="principal.php?c=controlador&a=muestraAsistencias">Asistencias</a>
		<a href="CierraSesion.php">Cerrar Sesión</a>
	-->
 		
 	</div>

	
	
 <?php 
 	require_once "admin/FooterPrueba.php";
 ?>