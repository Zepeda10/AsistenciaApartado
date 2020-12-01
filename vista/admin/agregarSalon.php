<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=guardarSalon" method="POST" id="frmRegSalon" name="frmRegSalon" accept-charset="utf-8">

    <fieldset>
        <legend>Registrar Salón</legend>
        <input type="hidden" name="id" value="#">

        <label for="nombre_salon">Salón</label>
        <input type="text" name="nombre_salon" placeholder="Salón" required>

    </fieldset>

    <input class="#" type="submit" value="Agregar" name="registrarSalon">
    <a class="#" href="principal.php?c=controlador&a=muestraGrupos">Regresar</a>
    
</form>
	
</body>
</html>