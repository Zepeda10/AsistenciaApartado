<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=guardarApartado" method="POST" id="frmRegApart" name="frmRegApart" accept-charset="utf-8">

    <fieldset>
        <legend>Reservar Aula</legend>

        <label for="id_salon">Id Salón</label>
        <input type="text" name="id_salon" placeholder="Id salón" required>

        <label for="id_docente">Id docente</label>
        <input type="text" name="id_docente" placeholder="Id Docente" required>

        <label for="nombre_salon">Salón</label>
        <select name="nombre_salon">
        	<option value=""></option>
        </select>

        <label for="hora_inicio">Hora Inicio</label>
        <input type="text" name="hora_inicio" placeholder="Hora de Inicio" required>

        <label for="hora_fin">Hora Fin</label>
        <input type="text" name="hora_fin" placeholder="Hora de finalización" required>

        <label for="nombre_docente">Nombre</label>
        <input type="text" name="nombre_docente" placeholder="Nombre" required>

        <label for="apellido_docente">Apellidos</label>
        <input type="text" name="apellido_docente" placeholder="Apellidos" required>


    </fieldset>

    <input class="#" type="submit" value="Agregar" name="registrarApartado">
    <a class="#" href="principal.php?c=controlador&a=muestraApartados">Regresar</a>
    
</form>
	
</body>
</html>