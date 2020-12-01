<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=actualizaApartado" method="POST" id="frmModApart" name="frmModApart" accept-charset="utf-8">

    <fieldset>
        <legend>Reservar Aula</legend>
        <input type="hidden" name="id" value="<?= $data['objeto']['id']; ?>">

        <label for="id_salon">Id Salón</label>
        <input type="text" name="id_salon" value="<?= $data['objeto']['id_salon']; ?>">

        <label for="id_docente">Id docente</label>
        <input type="text" name="id_docente" value="<?= $data['objeto']['id_docente']; ?>">

        <label for="nombre_salon">Salón</label>
        <select name="nombre_salon">
        	<option value=""></option>
        </select>

        <label for="hora_inicio">Hora Inicio</label>
        <input type="text" name="hora_inicio" value="<?= $data['objeto']['hora_inicio']; ?>">

        <label for="hora_fin">Hora Fin</label>
        <input type="text" name="hora_fin" value="<?= $data['objeto']['hora_fin']; ?>">

        <label for="nombre_docente">Nombre</label>
        <input type="text" name="nombre_docente" value="<?= $data['objeto']['nombre_docente']; ?>">

        <label for="apellido_docente">Apellidos</label>
        <input type="text" name="apellido_docente" value="<?= $data['objeto']['apellido_docente']; ?>">


    </fieldset>

    <input class="#" type="submit" value="Modificar" name="modifApartado">
    <a class="#" href="principal.php?c=controlador&a=muestraApartados">Regresar</a>
    
</form>
	
</body>
</html>