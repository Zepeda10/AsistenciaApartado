<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="ValidaLogin.php" method="POST" id="frmRegAsis" name="frmRegAsis" accept-charset="utf-8">

    <fieldset>
        <legend>Iniciar Sesión</legend>
        <input type="hidden" name="id" value="">

        <label for="apodo">Usuario</label>
        <input type="text" name="apodo" placeholder="Nombre" required>

        <label for="pass">Contraseña</label>
        <input type="text" name="pass" placeholder="Contraseña" required>


    </fieldset>

    <input class="#" type="submit" value="Ingresar" name="iniciarSesion">
    
</form>
	
</body>
</html>