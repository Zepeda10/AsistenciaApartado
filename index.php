<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="css/style-login.css">
</head>
<body>

    <div class="login-box">

        <img class="avatar" src="img/user5.jpg" alt="Logo Usuario">
        <h1>Iniciar Sesión</h1>

    	<form action="ValidaLogin.php" method="POST" id="frmRegAsis" name="frmRegAsis" autocomplete="off" accept-charset="utf-8">

            <input type="hidden" name="id" value="">
            <label for="apodo">Usuario</label>
            <input type="text" name="apodo" placeholder="Nombre" autocomplete="off" required>

            <label for="pass">Contraseña</label>
            <input type="password" name="pass" placeholder="Contraseña" autocomplete="off" required>

            <input class="#" type="submit" value="Ingresar" name="iniciarSesion">
        
        </form>
    </div>
	
</body>
</html>