<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['roles'] as $rol): ?>
                <tr>
                    <td><?php echo $rol->id_rol ?></td>
                    <td><?php echo $rol->rol ?></td>
                    <td>
                        <a href="<?php echo RUTA_URL?>/roles/editar/<?php echo $rol->id_rol ?>">Editar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/roles/borrar/<?php echo $rol->id_rol ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/roles/agregar/">+</a>
    </div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
