<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=guardarGrupo" method="POST" id="frmRegGrupo" name="frmRegGrupo" accept-charset="utf-8">

    <fieldset>
        <legend>Registrar Grupo</legend>
        <input type="hidden" name="id" value="#">

        <label for="nombre_grupo">Grupo</label>
        <input type="text" name="nombre_grupo" placeholder="Grupo" required>
        
    </fieldset>

    <input class="#" type="submit" value="Agregar" name="registrarGrupo">
    <a class="#" href="principal.php?c=controlador&a=muestraGrupos">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>