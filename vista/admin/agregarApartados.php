<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>
<script src="jquery/jquery-3.5.1.js"></script>

 <div class="container">

	<form action="principal.php?c=controlador&a=guardarApartado" method="POST" id="frmRegApart" name="frmRegApart" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>

        <div class="row my-2">
            <div class="col-3">
                <label for="nombre_salon">Salón</label>
                <select name="nombre_salon" class="border border-secondary custom-select mr-sm-2">
                   <?php
                        foreach ($data['objeto2'] as $dato){
                            echo "<option value='".$dato['nombre_salon']."'>".$dato['nombre_salon']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-3">
                <label for="id_docente">Id docente</label>
                <input type="text" class="border border-secondary form-control" id="id_docente" name="id_docente" placeholder="Id Docente" onkeyup="buscarMaestro(event,this,this.value)" autofocus>
            </div>
        </div>

        <div class="row my-2">
            
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="hora_inicio">Hora Inicio</label>
                <input type="time" class="border border-secondary form-control" name="hora_inicio" placeholder="Hora de Inicio" required>
             </div>
       
            <div class="col-3">
                <label for="hora_fin">Hora Fin</label>
                <input type="time" class="border border-secondary form-control" name="hora_fin" placeholder="Hora de finalización" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="nombre_docente">Nombre</label>
                <input type="text" class="border border-secondary form-control" id="nombre_docente" name="nombre_docente" placeholder="Nombre" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="apellido_docente">Apellidos</label>
                <input type="text" class="border border-secondary form-control" id="apellido_docente" name="apellido_docente" placeholder="Apellidos" required>
            </div>
        </div>



    </fieldset>

    <button class="btn btn-danger mr-1 my-4" type="button" id="registrarApartado" name="registrarApartado">Apartar</button>
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraApartados">Regresar</a>

</form>

</div>



<script>
        $(document).ready(function(){
            $("#registrarApartado").click(function(){ 
                 $("#frmRegApart").submit();
            });
        });

        function buscarMaestro(e,tagCodigo,id){
            var enterKey = 13;

            if(id!=''){     
                if(e.which==enterKey){

                    console.log("malandro");

                    $.ajax({
                        url:'principal.php?c=controlador&a=muestraNombre&id='+id,
                        dataType: 'json',
                            success: function(resultado){
                                if(resultado==0){
                                    $(tagCodigo).val('');
                                }else{
                                    $(tagCodigo).removeClass('has-error');
                                    $("#resultado_error").html(resultado.error);

                                    if(resultado.existe){
                                        $("#nombre_docente").val(resultado.datos.nombre);
                                        $("#apellido_docente").val(resultado.datos.apellidos);

                                    }else{
                                        $("#id_docente").val('');
                                        $("#nombre_docente").val('');                          
                                        $("#apellido_docente").val('');
                                        console.log("noo");
                                    }
                                }
                            }

                    });
 
                }

            }

        }

    </script>

	
 <?php 
    require_once "FooterPrueba.php";
 ?>