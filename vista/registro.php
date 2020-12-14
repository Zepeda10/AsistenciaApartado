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
	<link rel="stylesheet" href="">
</head>
<body>
    <a href="CierraSesion.php">Cerrar Sesión</a>

	<form action="principal.php?c=controlador&a=guardarAsistencia" method="POST" id="frmRegAsis" name="frmRegAsis" accept-charset="utf-8">

    <fieldset>
        <legend>Asistencia</legend>
         <input type="hidden" name="id" value="">
        <label for="nombre">Id Docente</label>
        <input type="text" name="id_docente" placeholder="Id Docente" required="">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="Apellidos" required>

        <label for="hora">Hora</label>
        <input type="text" name="hora" value='<?php echo $hora; ?>' readonly="true">

        <label for="tipo">Tipo</label>
        <input type="text" name="tipo" placeholder="Tipo" required>

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

    <input class="#" type="submit" value="Registrar" name="registrarAsistencia">
    
</form>
	
</body>
</html>