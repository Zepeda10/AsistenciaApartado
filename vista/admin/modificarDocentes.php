<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>
 
  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaDocente" method="POST" id="frmModDocen" name="frmModDocen" class='text-dark' accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" class="border border-secondary form-control" value="<?= $data['objeto']['id']; ?>">

        <div class="col-6">
            <div class="row my-2">
                <label for="nombre">Nombre</label>
                <input type="text" class="border border-secondary form-control" name="nombre" value="<?= $data['objeto']['nombre']; ?>">
            </div>

            <div class="row my-2">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="border border-secondary form-control" name="apellidos" value="<?= $data['objeto']['apellidos']; ?>">
            </div>

            <div class="row my-2">
                <label for="email">Email</label>
                <input type="text" class="border border-secondary form-control" name="email" value="<?= $data['objeto']['email']; ?>">
                </div>

            <div class="row my-2">
                <label for="telefono">Teléfono</label>
                <input type="text" class="border border-secondary form-control" name="telefono" value="<?= $data['objeto']['telefono']; ?>">
            </div>
        </div>

         <div class="row my-2">
             <div class="col-3">
                <label for="hora_entrada">Hora Entrada</label>
                <input type="text" class="border border-secondary form-control" name="hora_entrada" value="<?= $data['objeto']['hora_entrada']; ?>">
            </div>

            <div class="col-3 ml-3">
                <label for="hora_salida">Hora Salida</label>
                <input type="text" class="border border-secondary form-control" name="hora_salida" value="<?= $data['objeto']['hora_salida']; ?>">
            </div>
        </div>

    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Modificar" name="modifDocente">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraDocentes">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>