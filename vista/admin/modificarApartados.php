<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaApartado" method="POST" id="frmModApart" name="frmModApart" class='text-dark' accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
         <input type="hidden" name="id" value="<?= $data['objeto']['id']; ?>">
          <input type="hidden" name="id_salon" value="<?= $data['objeto']['id_salon']; ?>">
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
                <input type="text" name="id_docente" class="border border-secondary custom-select mr-sm-2" value="<?= $data['objeto']['id_docente']; ?>" onkeyup="buscarMaestro(event,this,this.value)" autofocus>
              </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="hora_inicio">Hora Inicio</label>
                <input type="time" class="border border-secondary form-control" name="hora_inicio" value="<?= $data['objeto']['hora_inicio']; ?>">
            </div>
       
            <div class="col-3">
                <label for="hora_fin">Hora Fin</label>
                <input type="time" class="border border-secondary form-control" name="hora_fin" value="<?= $data['objeto']['hora_fin']; ?>">
            </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="nombre_docente">Nombre</label>
                <input type="text" class="border border-secondary form-control" name="nombre_docente" id="nombre_docente" value="<?= $data['objeto']['nombre_docente']; ?>">
        </div>
        </div>

        <div class="row my-2">
            <div class="col-6">
                <label for="apellido_docente">Apellidos</label>
                <input type="text" class="border border-secondary form-control" name="apellido_docente" id="apellido_docente" value="<?= $data['objeto']['apellido_docente']; ?>">
        </div>
        </div>


    </fieldset>

    <button class="btn btn-danger mr-1 my-4" type="button" name="modifApartado" id="modifApartado">Apartar</button>
    <a class="btn btn-outline-success mr-1 my-4" href="principal.php?c=controlador&a=muestraApartados">Regresar</a>
    
</form>

</div>

<script>
        $(document).ready(function(){
            $("#modifApartado").click(function(){ 
                 $("#frmModApart").submit();
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