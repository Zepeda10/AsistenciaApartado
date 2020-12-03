<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="principal.php?c=controlador&a=actualizaDocente" method="POST" id="frmModDocen" name="frmModDocen" accept-charset="utf-8">

    <fieldset>
        <legend>Modificar Docente</legend>
        <input type="hidden" name="id" value="<?= $data['objeto']['id']; ?>">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= $data['objeto']['nombre']; ?>">

        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" value="<?= $data['objeto']['apellidos']; ?>">

        <label for="email">Email</label>
        <input type="text" name="email" value="<?= $data['objeto']['email']; ?>">

        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" value="<?= $data['objeto']['telefono']; ?>">

        <label for="hora_entrada">Hora Entrada</label>
        <input type="text" name="hora_entrada" value="<?= $data['objeto']['hora_entrada']; ?>">

        <label for="hora_salida">Hora Salida</label>
        <input type="text" name="hora_salida" value="<?= $data['objeto']['hora_salida']; ?>">

    </fieldset>

    <input class="#" type="submit" value="Modificar" name="modifDocente">
    <a class="#" href="principal.php?c=controlador&a=muestraDocentes">Regresar</a>
    
</form>
	
</body>
</html>