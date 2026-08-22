<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item">Operaciones</li>
    <li style="text-transform: capitalize" class="breadcrumb-item active"><?php echo $tipo_operacion; ?></li>
</ol>
</div>
</div>

<div id="msg"></div>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 style="text-transform: capitalize" class="fs-xl mb-1"><?php echo $tipo_operacion; ?></h4>
    <p class="text-muted mb-0">Operacion sobre el area de la entidad</p>
</div>
</div>

<div class="card">
<div class="card-body">

<div class="d-flex justify-content-between mb-4">
    <ul class="list-group list-group-flush"><li class="list-group-item bg-light border"><?php echo date("d/m/Y"); ?></li></ul>

    <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="ti ti-building-warehouse me-1 align-middle fs-xl"></i> Area: <?php echo $area_data["nombre"]; ?></li>
        <li class="list-group-item"><i class="ti ti-coin me-1 align-middle fs-xl"></i>Moneda: <?php echo $moneda["siglas"]; ?></li>
        <li class="list-group-item"><i class="ti ti-user me-1 align-middle fs-xl"></i> Operador: <?php echo $user_data["nombre"]; ?></li>
    </ul>
</div>

<div class="row g-2">
    <div class="col-md-2 mb-3">
    <label class="form-label">Socio</label>
    <select id="socio" class="form-select">
    <?php

        for($i = 0; $i < count($socios); $i++){

            $nombre = $socios[$i]["nombre"];
            echo "<option value='$nombre'>$nombre</option>";
        }
     ?>
    </select>
    </div>

    <div class="col-md-6 mb-3"><label class="form-label">Observaciones</label><input class="form-control" id="nota"></div>
</div>


<style>
.autocomplete-box { position: relative; }

.lista-autocomplete {
    position: absolute;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    background: white;
    border: 1px solid #ccc;
    z-index: 999;
}

.lista-autocomplete div {
    padding: 5px;
    cursor: pointer;
}

.lista-autocomplete div:hover,
.lista-autocomplete .activo {
    background: #0d6efd;
    color: white;
}
</style>

<hr>
<?php if($formula){ echo "<div class='d-flex justify-content-end'><span class='badge badge-label badge-default'>Precio de venta = $formula</span></div>"; } ?>

<table id="tabla" class="table align-middle my-5">

    <thead class="bg-light align-middle bg-opacity-25 thead-sm">
    <tr class="text-uppercase fs-xxs">
        <th>#</th>
        <th>Mercancia</th>
        <th>Codigo</th>
        <th>Medida</th>
        <th>Cantidad</th>
        <th>Costo de compra</th>
        <th>Precio de venta</th>
        <th>Importe</th>
        <th style="width: 1%;">Actions</th>
    </tr>
    </thead>

    <tbody></tbody>
</table>

  <div class="float-end"><label class="form-label fw-bold">Total</label> <input type="number" class="form-control bg-light" id="total" readonly value="0.00"></div>

</div>
</div>

<input type="text" id="operacion" value="<?php echo $tipo_operacion; ?>" hidden="hidden">
<input type="text" id="moneda" value="<?php echo $moneda["siglas"]; ?>" hidden="hidden">
<input type="text" id="operador" value="<?php echo $user_data["nombre"]; ?>" hidden="hidden">

<button id="btnLimpiar" class="btn btn-link mb-4">Limpiar</button>
<button type="button" data-bs-toggle="modal" data-bs-target="#guardarOperacion" class="btn btn-primary mb-4">
    <i data-lucide="save" class="fs-sm me-2"></i>Guardar operacion
</button>

<div id="guardarOperacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<form method="post">
    <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Pago</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <div class="row g-2">

        <div class="mb-3 col-md-6"><label class="form-label">Pago en efectivo </label>
            <input value="0" name="efectivo" id="efectivo" type="text" class="form-control">
        </div>

        <div class="mb-3 col-md-6"><label class="form-label">Pago por transferencia </label>
            <input value="0" name="transferencia" id="transferencia" type="text" class="form-control">
        </div>

    </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="enviarDatos()" id="aceptar" class="btn btn-primary">aceptar</button>
    </div>
</form>
</div>
</div>
</div>

</div>
</div>

<!-- ?? Datalist global -->
<datalist id="lista_productos"></datalist>

<input type="text" hidden="hidden" id="area" value="<?php echo $area_data["nombre"]; ?>">



