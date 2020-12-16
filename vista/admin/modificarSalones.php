<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaSalon" method="POST" id="frmModGru" name="frmModGru" accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="col-3">
            <label for="nombre_grupo">Nombre del Grupo</label>
            <input type="text" class="border border-secondary form-control" name="nombre_salon" value="<?= $data['objeto']['nombre_salon']; ?>">
        </div>


    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Modificar" name="modifSalon">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraSalones">Regresar</a>
    
</form> 
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>