<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Reportes</li>
    <li style="text-transform: capitalize;" class="breadcrumb-item active"><?php echo $_GET["tipo"]; ?></li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">Reportes de <?php echo $_GET["tipo"]; ?></h4>
    <p class="text-muted mb-0">Datos y estadisticas de las operaciones de la entidad</p>
</div>
</div>

<form method="post">
<div class="card">
<div class="card-body">
<div class="card-header border-light justify-content-between mb-2 px-0">
    <span class="fw-semibold">Filtros para la busqueda:</span>
    <button type="submit" class="btn btn-light"><i class="ti ti-search me-1"></i>Buscar registros</button>
</div>
<div class="row align-items-center">

    <div class="col-md-2 mb-3">
    <label class="form-label">Fecha</label>
    <select id="fechas" class="form-control" name="fecha">
        <option selected="selected" value="hoy">Hoy</option>
        <option value="ayer">Ayer</option>
        <option value="esta semana">Esta semana</option>
        <option value="semana pasada">Semana pasada</option>
        <option value="este mes">Este mes</option>
        <option value="mes pasado">El mes pasado</option>
        <option value="fecha personalizada">Fecha personalizada</option>
    </select>
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label">Desde</label>
        <input type="text" id="desde" name="desde" class="form-control" disabled="disabled" data-provider="flatpickr" autocomplete="off"
               data-default-date=""  data-date-format="Y-m-d">
    </div>

    <div class="col-md-2 mb-3">
        <label class="form-label">Hasta</label>
        <input type="text" id="hasta" name="hasta" class="form-control" disabled="disabled" data-provider="flatpickr" autocomplete="off"
               data-default-date="" data-date-format="Y-m-d">
    </div>

    <input type="text" hidden="hidden" name="buscar" value="1">
    <input type="text" hidden="hidden" name="tipo" value="<?php echo $_GET["tipo"]; ?>">

</div>
</div>
</div>
</form>

<div class="card">
<div class="card-body">
<table id="productos" data-tables="basic" class="table table-bordered dt-responsive align-middle mb-0">

    <thead class="thead-sm text-uppercase fs-xxs bg-light align-middle bg-opacity-25">
    <tr>
        <th class="text-muted">No.</th>
        <th class="text-muted">Fecha</th>
        <th class="text-muted">Mercancia</th>
        <th class="text-muted">Socio</th>
        <th class="text-muted">Area</th>
        <th class="text-muted">Operador</th>
        <th class="text-muted">Cantidad</th>
        <th class="text-muted">Medida</th>
        <th class="text-muted">Precio</th>
        <th class="text-muted">Costo</th>
        <th class="text-muted">Importe</th>
    </tr>
    </thead>

    <tbody>
    <?php

        for($i = 0; $i < count($operaciones); $i++){

            echo "
            <tr>
                <td>{$operaciones[$i]["id"]}</td>
                <td>{$operaciones[$i]["fecha"]}</td>
                <td>
                    <div class='d-flex'>
                    <div>
                        <h5 class='mb-1'><a class='link-reset'>{$operaciones[$i]["nombre"]}</a></h5>
                        <p class='text-muted mb-0 fs-xxs'>{$operaciones[$i]["categoria"]}</p>
                    </div>
                    </div>
                </td>
                <td>{$operaciones[$i]["socio"]}</td>
                <td>{$operaciones[$i]["area"]}</td>
                <td>{$operaciones[$i]["operador"]}</td>
                <td>{$operaciones[$i]["cantidad"]}</td>
                <td>{$operaciones[$i]["medida"]}</td>
                <td>{$operaciones[$i]["precio"]}</td>
                <td>{$operaciones[$i]["costo"]}</td>
                <td>{$operaciones[$i]["total"]}</td>
            </tr>";
        }
    ?>
    </tbody>

</table>
</div>
</div>


</div>
</div>




