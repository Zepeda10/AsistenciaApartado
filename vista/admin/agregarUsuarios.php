<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=guardarUsuario" method="POST" id="frmRegUsu" name="frmRegUsu" accept-charset="utf-8">

    <fieldset>
        <legend>Agregar Usuario</legend>

        <label for="id">Id Usuario</label>
        <input type="text" name="id" placeholder="Id Usuario" required>

        <label for="tipo_usuario">Tipo Usuario</label>
        <select name="tipo_usuario" multiple>
            <option value=""></option>
            option
        </select>

        <label for="apodo">Apodo</label>
        <input type="text" name="apodo" placeholder="Apodo" required>

        <label for="pass">Contraseña</label>
        <input type="text" name="pass" placeholder="Contraseña" required>

    </fieldset>
 
    <input class="#" type="submit" value="Agregar" name="registrarUsuario">
    <a class="#" href="principal.php?c=controlador&a=muestraUsuarios">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>