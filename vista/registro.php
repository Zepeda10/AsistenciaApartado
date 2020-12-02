<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=guardarAsistencia" method="POST" id="frmRegAsis" name="frmRegAsis" accept-charset="utf-8">

    <fieldset>
        <legend>Asistencia</legend>
        <input type="hidden" name="id" value="">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Nombre" required>

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="Apellidos" required>



        <label for="hora">Hora</label>
        <input type="text" name="hora" placeholder="Hora" required>

        <label for="tipo">Tipo</label>
        <input type="text" name="tipo" placeholder="Tipo" required>

        <label for="fecha">Fecha</label>
        <input type="text" name="fecha" placeholder="Fecha" required>



        <label for="grupo">Grupo</label>
        <select name="">
        	<option value="grupo"></option>
        </select>

        <label for="salon">Salón</label>
        <select name="">
        	<option value="salon"></option>
        </select>  

    </fieldset>

    <input class="#" type="submit" value="Registrar" name="registrarAsistencia">
    <a class="#" href="#">Regresar (pendiente)</a>
    
</form>
	
</body>
</html>