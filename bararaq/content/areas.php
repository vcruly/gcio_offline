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
        <h4 class="fs-xl mb-1">Administrar areas</h4>
        <p class="text-muted mb-0">Crear, editar, eliminar y gestionar el listado de areas para el inventario</p>
    </div>

    <div class="text-end">
        <a data-bs-toggle="modal" data-bs-target="#agregarArea" class="btn btn-success"><i class="ti ti-plus me-1"></i> Agregar area</a>
    </div>

    <div id="agregarArea" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <form method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Agregar area</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6"><label class="form-label">Nombre *</label><input required="required" name="nombre" type="text" class="form-control"></div>

            <div class="mb-3 col-md-6"><label class="form-label">Codigo</label><input name="codigo" type="text" class="form-control"></div>

            <div class="mb-3 col-12">
                <label class="form-label">
                <div class="form-check form-switch form-check-reverse form-check-success">
                    <label class="form-check-label" for="switch1">Precio de venta por formula</label>
                    <input type="checkbox" name="tipo_costo" class="form-check-input" id="switch1" checked>
                </div>
                </label>

                <input name="formula_costo" style="text-transform: uppercase;" oninput="this.value=this.value.toUpperCase()" type="text" class="form-control">

                <div class="alert alert-secondary p-3 d-flex mt-2 mb-0" role="alert">
                <div>
                    <h4 class="alert-heading">CC = Valor del costo de compra</h4>
                    <p>Ejemplo:</p>
                    <hr class="border-secondary border-opacity-25">
                    <p class="mb-0">7 + 5 * CC <br> CC + 1 (CC/100)</p>
                </div>
                </div>
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
        <th class="text-muted">Area</th>
        <th class="text-muted">Codigo</th>
        <th class="text-muted">Fecha</th>
        <th class="text-muted">Acciones</th>
    </tr>
    </thead>

    <tbody><b></b>
    <?php

        for($i = 0; $i < count($areas); $i++){

            echo "
            <tr>
                <td>{$areas[$i]["nombre"]}</td>
                <td>{$areas[$i]["codigo"]}</td>
                <td>{$areas[$i]["fecha"]}</td>
                <td>
                <div class='d-flex justify-content-center gap-1'>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#actualizarArea-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-edit fs-lg'></i>
                    </a>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#eliminarArea-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-trash fs-lg'></i>
                    </a>
                </div>
                </td>
            </tr>";

            include "bararaq/components/modales/actualizarArea.php";
            include "bararaq/components/modales/eliminarArea.php";
        }
    ?>
     </tbody>

</table>
</div>
</div>


</div>
</div>
