<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Editar</li>
    <li class="breadcrumb-item active">Mercancias</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
    <div class="flex-grow-1">
        <h4 class="fs-xl mb-1">Administar mercancias</h4>
        <p class="text-muted mb-0">Operaciones y gestion del listado de mercancias de la entidad</p>
    </div>

    <div class="text-end">
        <a data-bs-toggle="modal" data-bs-target="#agregarMercancia" class="btn btn-success"><i class="ti ti-plus me-1"></i> Agregar mercancia</a>
    </div>

    <div id="agregarMercancia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <form enctype="multipart/form-data" method="post">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">Nueva mercancia</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row g-2">

            <div class="mb-3 col-md-6"><label class="form-label">Nombre *</label><input required="required" name="nombre" type="text" class="form-control"></div>

            <div class="mb-3 col-md-6">
            <label class="form-label">Codigo</label>
            <div class="input-group">
                <input name="codigo" id="codigo" required="required" type="text" class="form-control">
                <button type="button" onclick="generar_codigo('codigo')" class="btn btn-soft-secondary" type="button">Generar</button>
            </div>
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Categoria</label>
                <select name="categoria" class="form-control">
                <?php for($i = 0; $i < count($categorias); $i++){ echo "<option value='{$categorias[$i]["id"]}'>{$categorias[$i]["nombre"]}</option>"; } ?>
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label class="form-label">Medida</label>
                <select name="medida" class="form-control">
                <?php for($i = 0; $i < count($medidas); $i++){ echo "<option value='{$medidas[$i]["id"]}'>{$medidas[$i]["nombre"]}</option>"; } ?>
                </select>
            </div>

            <div class="mb-3 col-12"><label class="form-label">Imagen</label><input name="imagen" type="file" accept="image/*" class="form-control"></div>

            <div class="mb-3 col-12"><label class="form-label">Descripcion</label><textarea name="descripcion" rows="3" class="form-control"></textarea></div>

            <input type="text" hidden="hidden" name="agregar" value="1">
            <input type="text" hidden="hidden" name="precio" value="0">
            <input type="text" hidden="hidden" name="costo" value="0">

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
        <th class="text-muted">Categoria</th>
        <th class="text-muted">Codigo</th>
        <th class="text-muted">Medida</th>
        <th class="text-muted">Fecha</th>
        <th class="text-muted">Acciones</th>
    </tr>
    </thead>

    <tbody>
    <?php

        for($i = 0; $i < count($mercancias); $i++){

            $imagen = !empty($mercancias[$i]["imagen"])
                ? "<img style='height: 40px; width: 100%;' src='assets/images/productos/{$mercancias[$i]["imagen"]}' class='img-fluid rounded'>" : "";

            $categoria = categoria($mercancias[$i]["categoria"])["nombre"] ?? "";
            $medida = medida($mercancias[$i]["medida"])["nombre"] ?? "";

            $estado = $mercancias[$i]["estado"] == "activo"
                ? "<span class='badge badge-soft-success fs-xxs'>Activo</span>" : "<span class='badge badge-soft-light fs-xxs'>Inactivo</span>";

            echo "
            <tr>
                <td class='text-center'>{$mercancias[$i]["nombre"]}</td>
                <td class='text-center'>$categoria</td>
                <td class='text-center'>{$mercancias[$i]["codigo"]}</td>
                <td>$medida</td>
                <td>{$mercancias[$i]["fecha"]}</td>
                <td>
                <div class='d-flex justify-content-center gap-1'>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#actualizarMercancia-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-edit fs-lg'></i>
                    </a>
                    <a href='#' data-bs-toggle='modal' data-bs-target='#eliminarMercancia-$i' class='btn btn-light btn-icon btn-sm rounded-circle'>
                        <i class='ti ti-trash fs-lg'></i>
                    </a>
                </div>
                </td>
            </tr>";

            include "bararaq/components/modales/actualizarMercancia.php";
            include "bararaq/components/modales/eliminarMercancia.php";
        }

    ?>
    </tbody>

</table>
</div>
</div>


</div>
</div>




