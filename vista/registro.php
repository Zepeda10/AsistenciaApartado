<?php 

    if($_SESSION['tipo']!="Usuario"){
        header("Location: index.php");
    }

?>

<?php 
    date_default_timezone_set('America/Mexico_City'); // por ejemplo por poner algo
    $fecha = Date("Y-m-d");
    $hora = Date("H:i:s");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Registrar Asistencia</title>
    <script src="jquery/jquery-3.5.1.js"></script>
	<link rel="stylesheet" href="css/style-registro.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cerrar">
        <a href="CierraSesion.php">Cerrar Sesión</a>
    </div>
    
    <div class="contenedor">
    	<form action="principal.php?c=controlador&a=guardarAsistencia" method="POST" id="frmRegAsis" name="frmRegAsis" class="form" accept-charset="utf-8">

            <div class="form-header">
                <h1 class="form-title">REGISTRO DE ASISTENCIA</h1>
            </div>

                 <input type="hidden" name="id" value="">
                <label for="id_docente" class="form-label">Id Docente</label>
                <input type="text" id="id_docente" class="form-input" name="id_docente" placeholder="Id Docente" onkeyup="buscarMaestro(event,this,this.value)" autofocus>
                <label id="leyenda">Presione 'Enter' para visualizar nombre</label>
                

                 <label for="codigo" id="resultado_error"></label>


                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" class="form-input" name="nombre" placeholder="Nombre" readonly="true">

                <div class="ape">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" id="apellidos" class="form-input" name="apellidos" placeholder="Apellidos" readonly="true">
                </div>

                
                <label for="grupo" class="form-label">Grupo</label>
                <select name="grupo" id="grupo" class="form-input">
                    <?php
                       foreach ($data['objeto'] as $dato){
                            echo "<option value='".$dato['nombre_grupo']."'>".$dato['nombre_grupo']."</option>";
                       }
                   ?>
                </select>

                <div class="salo">
                    <label for="salon" class="form-label">Salón</label>
                    <select name="salon" id="salon" class="form-input">
                        <?php
                           foreach ($data['objeto2'] as $dato){
                                echo "<option value='".$dato['nombre_salon']."'>".$dato['nombre_salon']."</option>";
                           }
                       ?>
                    </select>                     
                </div>
                

                <label for="hora" class="form-label">Hora</label>
                <input type="text" name="hora" id="hora" class="form-input" value='<?php echo $hora; ?>' readonly="true">

                <div class ="fec">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" name="fecha" id="fecha" class="form-input" value='<?php echo $fecha; ?>' readonly="true">
                    
                </div>


                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" id="tipo" class="form-input" name="tipo" readonly="true">

                

  

            <button type="button" id="btnRegistrar">REGISTRAR</button>
        
        </form>
    </div>

<script>
        $(document).ready(function(){
            $("#btnRegistrar").click(function(){ 
                 $("#frmRegAsis").submit();
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
                                        $("#nombre").val(resultado.datos.nombre);
                                        $("#apellidos").val(resultado.datos.apellidos);
                                        $("#tipo").val(resultado.tipo);

                                    }else{
                                        $("#id_docente").val('');
                                        $("#nombre").val('');                          
                                        $("#apellidos").val('');
                                        $("#tipo").val('');
                                        console.log("noo");
                                    }
                                }
                            }

                    });
 
                }

            }

        }



    </script>
	
</body>
</html>