<?php 

    if($_SESSION['tipo']!="Usuario"){
        header("Location: index.php");
    }

?>

<?php 
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
	<link rel="stylesheet" href="">
</head>
<body>
    <a href="CierraSesion.php">Cerrar Sesión</a>

	<form action="principal.php?c=controlador&a=guardarAsistencia" method="POST" id="frmRegAsis" name="frmRegAsis" accept-charset="utf-8">

    <fieldset>
        <legend>Asistencia</legend>
         <input type="hidden" name="id" value="">
        <label for="nombre">Id Docente</label>
        <input type="text" id="id_docente" name="id_docente" placeholder="Id Docente" onkeyup="buscarMaestro(event,this,this.value)" autofocus>

         <label for="codigo" id="resultado_error"></label>

        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre" readonly="true">

        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" readonly="true">

        <label for="hora">Hora</label>
        <input type="text" name="hora" value='<?php echo $hora; ?>' readonly="true">

        <label for="tipo">Tipo</label>
        <input type="text" id="tipo" name="tipo" placeholder="Tipo" readonly="true">

        <label for="fecha">Fecha</label>
        <input type="text" name="fecha" value='<?php echo $fecha; ?>' readonly="true">


        <label for="grupo">Grupo</label>
        <select name="grupo">
            <?php
               foreach ($data['objeto'] as $dato){
                    echo "<option value='".$dato['nombre_grupo']."'>".$dato['nombre_grupo']."</option>";
               }
           ?>
        </select>


        <label for="salon">Salón</label>
        <select name="salon">
        	<?php
               foreach ($data['objeto2'] as $dato){
                    echo "<option value='".$dato['nombre_salon']."'>".$dato['nombre_salon']."</option>";
               }
           ?>
        </select>  

    </fieldset>

    <button type="button" id="btnRegistrar">Registrar</button>
    
</form>

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