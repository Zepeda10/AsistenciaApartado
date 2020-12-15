<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

 <div class="container">

	<form action="principal.php?c=controlador&a=guardarApartado" method="POST" id="frmRegApart" name="frmRegApart" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <div class="row my-2">
            <div class="col-3">
                <label for="id_salon">Id Salón</label>
                <input type="text" class="border border-secondary form-control" name="id_salon" placeholder="Id salón" required>
            </div>

            <div class="col-3">
                <label for="id_docente">Id docente</label>
                <input type="text" class="border border-secondary form-control" name="id_docente" placeholder="Id Docente" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="nombre_salon">Salón</label>
                <select name="nombre_salon" class="border border-secondary custom-select mr-sm-2">
            	   <option value=""></option>
                </select>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="hora_inicio">Hora Inicio</label>
                <input type="text" class="border border-secondary form-control" name="hora_inicio" placeholder="Hora de Inicio" required>
             </div>
       
            <div class="col-3">
                <label for="hora_fin">Hora Fin</label>
                <input type="text" class="border border-secondary form-control" name="hora_fin" placeholder="Hora de finalización" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="nombre_docente">Nombre</label>
                <input type="text" class="border border-secondary form-control" name="nombre_docente" placeholder="Nombre" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="apellido_docente">Apellidos</label>
                <input type="text" class="border border-secondary form-control" name="apellido_docente" placeholder="Apellidos" required>
            </div>
        </div>



    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Agregar" name="registrarApartado">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraApartados">Regresar</a>

</form>

</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>