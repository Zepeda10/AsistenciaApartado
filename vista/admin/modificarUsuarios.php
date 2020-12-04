<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaUsuario" method="POST" id="frmModUsu" name="frmModUsu" accept-charset="utf-8">

    <fieldset>
        <legend>Agregar Usuario</legend>
        <input type="hidden" name="id" value="<?= $data['objeto']['id']; ?>">

        <label for="tipo_usuario">Tipo Usuario</label>
        <select name="tipo_usuario">
            <option value="Admin">Administrador</option>
            <option value="Usuario">Usuario</option>
        </select>

        <label for="apodo">Apodo</label>
        <input type="text" name="apodo" value="<?= $data['objeto']['apodo']; ?>">

        <label for="pass">Contraseña</label>
        <input type="text" name="pass" value="<?= $data['objeto']['pass']; ?>">

    </fieldset>

    <input class="#" type="submit" value="Modificar" name="modifUsuario">
    <a class="#" href="principal.php?c=controlador&a=muestraUsuarios">Regresar</a>
    
</form> 
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>