<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

    <form action="principal.php?c=controlador&a=guardarIncidencia" method="POST" id="frmRegDocen" name="frmRegDocen" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="">

        <div class="col-4">
            <div class="row my-2">
                <label for="nombre">Nombre Completo</label>
                <input type="text" class="border border-secondary form-control" name="nombre" placeholder="Nombre" required>
            </div>
         </div>
        </div>

         <div class="col-8">
            <div class="col-4">
                <label for="hora_inicio">Hora Inicio</label>
                <input type="time" class="border border-secondary form-control" name="hora_inicio" placeholder="Hora Inicio">
            </div>

            <div class="col-4">
                <label for="hora_fin">Hora Fin</label>
                <input type="time" class="border border-secondary form-control" name="hora_fin" placeholder="Hora Fin">
            </div>


                <div class="col-5 my-3">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="no_asistio">
                        <label class="form-check-label" for="no_asistio">No asistió</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="salio_antes">
                        <label class="form-check-label" for="salio_antes">Salió antes</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cambio_aula">
                        <label class="form-check-label" for="cambio_aula">Cambio de aula</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"  name="no_clases">
                        <label class="form-check-label" for="no_clases">No dio clases</label>
                    </div>

                </div>

                    <div class="row my-2">
            <div class="col-6">
                <label for="observaciones">Observaciones</label>
                <textarea class="border border-secondary form-control" id="observaciones" name="observaciones" placeholder="Hasta 200 caracteres"></textarea>
            </div>
        </div>
        </div>



    </fieldset>

    <div class="col-3">

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Agregar" name="registrarIncidencia">
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraIncidencias">Regresar</a>
    </div>
    
</form>
</div>
</div>
    
 <?php 
    require_once "FooterPrueba.php";
 ?>