<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

 <?php 
    require_once "HeaderPrueba.php";
 ?>

  <div class="container">

	<form action="principal.php?c=controlador&a=actualizaUsuario" method="POST" id="frmModUsu" name="frmModUsu" class='text-dark' accept-charset="utf-8">

    <fieldset>
        <legend><?php echo $data["titulo"] ?></legend>
        <input type="hidden" name="id" value="<?= $data['objeto']['id']; ?>">

        <div class="row my-2">
            <div class="col-3">

                <label for="tipo_usuario">Tipo Usuario</label>
                <select name="tipo_usuario" class="border border-secondary custom-select mr-sm-2">
                    <option value="Admin">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
        </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="apodo">Apodo</label>
                <input type="text" class="border border-secondary form-control" name="apodo" value="<?= $data['objeto']['apodo']; ?>">
             </div>
        </div>

        <div class="row my-2">
            <div class="col-3">
                <label for="pass">Contraseña</label>
                <input type="text" class="border border-secondary form-control" name="pass" value="<?= $data['objeto']['pass']; ?>">
             </div>
        </div>

    </fieldset>

    <input class="btn btn-danger mr-1 my-4" type="submit" value="Modificar" name="modifUsuario">
    <a class="btn btn-outline-success mr-1 my-4 " href="principal.php?c=controlador&a=muestraUsuarios">Regresar</a>
    
</form> 
</div>
	
 <?php 
    require_once "FooterPrueba.php";
 ?>