<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Editar</li>
    <li class="breadcrumb-item active">Areas</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
    <div class="flex-grow-1">
        <h4 class="fs-xl mb-1">Administrar categorias</h4>
        <p class="text-muted mb-0">Crear, editar, eliminar y gestionar el listado de categorias para el inventario</p>
    </div>

    <div class="text-end">
        <a data-bs-toggle="modal" data-bs-target="#agregarCategoria" class="btn btn-success"><i class="ti ti-plus me-1"></i> Agregar categoria</a>
    </div>

    <div id="agregarCategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <form enctype="multipart/form-data" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Nueva categoria</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-12"><label class="form-label">Nombre *</label><input required="required" name="nombre" type="text" class="form-control"></div>

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
        <th class="text-muted">Categoria</th>
        <th class="text-muted">Fecha</th>
        <th class="text-muted">Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php

        for($i = 0; $i < count($categorias); $i++){

            echo "
            <tr>
                <td>{$categorias[$i]["nombre"]}</td>
                <td>{$categorias[$i]["fecha"]}</td>
                <td>
                <div class='d-flex justify-content-center gap-1'>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#actualizarCategoria-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-edit fs-lg'></i>
                    </a>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#eliminarCategoria-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-trash fs-lg'></i>
                    </a>
                </div>
                </td>
            </tr>";

            include "bararaq/components/modales/actualizarCategoria.php";
            include "bararaq/components/modales/eliminarCategoria.php";

        }

    ?>


    </tbody>

</table>
</div>
</div>


</div>
</div>





