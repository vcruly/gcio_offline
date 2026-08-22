<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Usuarios</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
    <div class="flex-grow-1">
        <h4 class="fs-xl mb-1">Administrar usuarios</h4>
        <p class="text-muted mb-0">Crear, editar, eliminar y gestionar los usuarios del sistema</p>
    </div>

    <div class="text-end">
        <a data-bs-toggle="modal" data-bs-target="#agregarUsuario" class="btn btn-success"><i class="ti ti-plus me-1"></i> Agregar usuario</a>
    </div>

    <div id="agregarUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Nuevo usuario</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6"><label class="form-label">Nombre *</label><input required="required" name="nombre" type="text" class="form-control"></div>
            <div class="mb-3 col-md-6"><label class="form-label">Password *</label><input required="required" name="password" type="text" class="form-control"></div>
            <div class="mb-3 col-12"><label class="form-label">Email *</label><input required="required" name="email" type="email" class="form-control"></div>


            <div class="mb-3 col-md-6"><label class="form-label">Rol *</label>
            <select id="rol" name="rol" class="form-control">
            <?php

                for($i = 0; $i < count($roles); $i++){

                    $nombre = $roles[$i]["nombre"];
                    $id = $roles[$i]["id"];

                    echo "<option value='$id'>$nombre</option>";
                }
             ?>
            </select>
            </div>

            <div class="mb-3 col-md-6"><label class="form-label">Area </label>
            <select id="area" name="area" disabled="disabled" class="form-control">
            <?php

                for($i = 0; $i < count($areas); $i++){

                    $nombre = $areas[$i]["nombre"];
                    $id = $areas[$i]["id"];

                    echo "<option value='$id'>$nombre</option>";
                }
             ?>
            </select>
            </div>

            <input type="text" hidden="hidden" name="agregar" value="1">

        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
    </div>
    </div>
    </div>
</div>


<div class="card">
<div class="card-body">
<table id="productos" data-tables="basic" class="table table-bordered dt-responsive align-middle mb-0">

    <thead class="thead-sm text-uppercase fs-xxs bg-light align-middle bg-opacity-25">
    <tr>
        <th class="text-muted">Nombre</th>
        <th class="text-muted">Email</th>
        <th class="text-muted">Rol</th>
        <th class="text-muted">Fecha</th>
        <th class="text-muted">Area</th>
        <th class="text-muted">Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php

        for($i = 0; $i < count($usuarios); $i++){

            $rol = rol($usuarios[$i]["rol"]);
            $area = area($usuarios[$i]["area"])["nombre"] ?? "";

            echo "
            <tr>
                <td>{$usuarios[$i]["nombre"]}</td>
                <td>{$usuarios[$i]["email"]}</td>
                <td>$rol</td>
                <td>{$usuarios[$i]["creado"]}</td>
                <td>$area</td>
                <td>
                <div class='d-flex justify-content-center gap-1'>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#actualizarUsuario-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-edit fs-lg'></i>
                    </a>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#eliminar-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-trash fs-lg'></i>
                    </a>
                </div>
                </td>
            </tr>";

            $titulo_eliminar = "usuario";
            $id_eliminar = $usuarios[$i]["id"];
            $nombre_eliminar = $usuarios[$i]["nombre"];

            include "bararaq/components/modales/actualizarUsuario.php";
            include "bararaq/components/modales/eliminar.php";

        }

    ?>


    </tbody>

</table>
</div>
</div>


</div>
</div>





