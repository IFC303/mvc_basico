<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<?php
    if (isset($datos['rol']->id_rol)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>

<a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header"><?php echo $accion ?> Rol</h2>

    <form method="post" class="card-body">
        <div class="mt-3 mb-3">
            <label for="nombre">Id: <sup>*</sup></label>
            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $datos['rol']->id_rol ?>">
        </div>
        <div class="mb-3">
            <label for="rol">Rol: <sup>*</sup></label>
            <select name="rol" id="rol" class="form-select form-select-lg">
                <?php foreach($datos['listaRoles'] as $rol): ?>
                    <?php if ($rol->id_rol == $datos['rol']->id_rol):?>
                        <option value="<?php echo $rol->id_rol?>" selected><?php echo $rol->rol?></option>
                    <?php else: ?>
                        <option value="<?php echo $rol->id_rol?>"><?php echo $rol->rol?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Rol">
    </form>
    
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
