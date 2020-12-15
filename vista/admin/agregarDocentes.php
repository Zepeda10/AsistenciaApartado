<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=guardarDocente" method="POST" id="frmRegDocen" name="frmRegDocen" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="">

        <div class="col-6">
            <div class="row my-2">
                <label for="nombre">Nombre</label>
                <input type="text" class="border border-secondary form-control" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="row my-2">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="border border-secondary form-control" name="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="row my-2">
                <label for="email">Email</label>
                <input type="text" class="border border-secondary form-control" name="email" placeholder="Email" required>
            </div>

            <div class="row my-2">
                <label for="telefono">Teléfono</label>
                <input type="text" class="border border-secondary form-control" name="telefono" placeholder="Teléfono" required>
            </div>
        </div>

         <div class="row my-2">
             <div class="col-3">
                <label for="hora_entrada">Hora Entrada</label>
                <input type="time" class="border border-secondary form-control" name="hora_entrada" placeholder="Hora de entrada" required>
            </div>

            <div class="col-3 ml-3">
                <label for="hora_salida">Hora Salida</label>
                <input type="time" class="border border-secondary form-control" name="hora_salida" placeholder="Hora de Salida" required>
            </div>
        </div>

    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Agregar" name="registrarDocente">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraDocentes">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>