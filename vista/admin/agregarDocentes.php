<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=guardarDocente" method="POST" id="frmRegDocen" name="frmRegDocen" accept-charset="utf-8">

    <fieldset>
        <legend>Agregar Docente</legend>
        <input type="hidden" name="id" value="">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="Apellidos" required>

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" required>

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" placeholder="Teléfono" required>

        <label for="hora_entrada">Hora Entrada</label>
        <input type="text" name="hora_entrada" placeholder="Hora de entrada" required>

        <label for="hora_salida">Hora Salida</label>
        <input type="text" name="hora_salida" placeholder="Hora de Salida" required>

    </fieldset>

    <input class="#" type="submit" value="Agregar" name="registrarDocente">
    <a class="#" href="principal.php?c=controlador&a=muestraDocentes">Regresar</a>
    
</form>
	
</body>
</html>