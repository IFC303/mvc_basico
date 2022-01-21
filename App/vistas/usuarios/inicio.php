<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($datos['usuarios'] as $usuario): ?>
                <tr>
                    <td><?php echo $usuario->id_usuario ?></td>
                    <td><?php echo $usuario->nombre ?></td>
                    <td><?php echo $usuario->email ?></td>
                    <td><?php echo $usuario->telefono ?></td>
                    <td><?php echo $usuario->id_rol ?></td>
                    <td>
                        <a href="<?php echo RUTA_URL?>/usuarios/editar/<?php echo $usuario->id_usuario ?>">Editar</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="<?php echo RUTA_URL?>/usuarios/borrar/<?php echo $usuario->id_usuario ?>">Borrar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <div class="col text-center">
        <a class="btn btn-success" href="<?php echo RUTA_URL?>/usuarios/agregar/">+</a>
    </div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php' ?>
