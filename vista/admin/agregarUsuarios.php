<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>
 
  <div class="container">

	<form action="principal.php?c=controlador&a=guardarUsuario" method="POST" id="frmRegUsu" name="frmRegUsu" accept-charset="utf-8" class='text-dark'>

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="">

        <div class="row my-2">
            <div class="col-3">
                <label for="apodo">Apodo</label>
                <input type="text" class="border border-secondary form-control" name="apodo" placeholder="Apodo" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="pass">Contraseña</label>
                <input type="text" class="border border-secondary form-control" name="pass" placeholder="Contraseña" required>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="tipo_usuario">Tipo Usuario</label>
                <select name="tipo_usuario" class="border border-secondary custom-select mr-sm-2">
                    <option disabled selected>Privilegios</option>
                    <option value="Admin">Admin</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>
        </div>

    </fieldset>
 
    <input class="btn btn-danger mr-1 my-4" type="submit" value="Agregar" name="registrarUsuario">
    <a class="btn btn-outline-success mr-1 my-4 " href="principal.php?c=controlador&a=muestraUsuarios">Regresar</a>
    
</form>
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>