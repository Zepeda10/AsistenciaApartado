<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
 	require_once "admin/HeaderPrueba.php";
 ?>

      <!--Agregamos nuestro archivo externo de estilos -->
    <link rel="stylesheet" href="css/style-reloj.css">

    <!--Agregamos archivo JQuery -->
    <script type="text/javascript" src="jquery/jquery.min.js"> </script>

    <!--Agregamos nuestro archivo con la funcion del reloj -->
     <script type="text/javascript" src="jquery/clock.js"></script>


 	<div class="container">
 		<h2>Bienvenido (a), <?= $_SESSION['user']; ?> </h2>
 		<div id="clock"></div>
 		
 	</div>

	
	
 <?php 
 	require_once "admin/FooterPrueba.php";
 ?>