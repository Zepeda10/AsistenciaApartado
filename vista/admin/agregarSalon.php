<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=guardarSalon" method="POST" id="frmRegSalon" name="frmRegSalon" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="">

        <div class="col-3">
            <input type="text" class="border border-secondary form-control" name="nombre_salon" placeholder="Salón" required>
        </div>

    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Agregar" name="registrarSalon">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraGrupos">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>