<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaGrupo" method="POST" id="frmModGru" name="frmModGru" class='text-dark' accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <div class="col-3">
            <label for="nombre_grupo">Nombre del Grupo</label>
            <input type="text" class="border border-secondary form-control" name="nombre_grupo" value="<?= $data['objeto']['nombre_grupo']; ?>">
        </div>


    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Modificar" name="modifGrupo">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraGrupos">Regresar</a>
    
</form> 
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>