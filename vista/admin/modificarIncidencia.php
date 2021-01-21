<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaIncidencia" method="POST" id="frmModInc" name="frmModInc" class='text-dark' accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="col-3">
            <label for="no_asistio">No asistió</label>
            <input type="text" class="border border-secondary form-control" name="no_asistio" value="<?= $data['objeto']['no_asistio']; ?>">
        </div>

        <div class="col-3">
            <label for="salio_antes">Salió antes</label>
            <input type="text" class="border border-secondary form-control" name="salio_antes" value="<?= $data['objeto']['salio_antes']; ?>">
        </div>

        <div class="col-3">
            <label for="cambio_aula">Cambio de aula</label>
            <input type="text" class="border border-secondary form-control" name="cambio_aula" value="<?= $data['objeto']['cambio_aula']; ?>">
        </div>

        <div class="col-3">
            <label for="no_clases">No dio clases</label>
            <input type="text" class="border border-secondary form-control" name="no_clases" value="<?= $data['objeto']['no_clases']; ?>">
        </div>

         <div class="col-3">
            <label for="observaciones">Observaciones</label>
            <textarea class="border border-secondary form-control" id="observaciones" name="observaciones" placeholder="observaciones" ><?= $data['objeto']['observaciones']; ?></textarea>
        </div>


    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Modificar" name="modifIncidencia">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraIncidencias">Regresar</a>
    
</form> 
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>