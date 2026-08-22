<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item active">Turno</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">
<form method="post">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">Balance de turno</h4>
    <p class="text-muted mb-0">Datos y estadisticas del inicio y cierre</p>
</div>
</div>


<div class="row mt-3">
<div class="col-12">
<div class="card">
<div class="card-body p-0">
<div class="row g-0">


<div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-0 ">
<div class="px-4 py-3 border-end border-dashed">

    <div class="d-flex justify-content-between mb-3 border-bottom pb-3 border-dashed">
        <h4 class="card-title"><span class="badge badge-soft-success fs-xs badge-label">Inicio de turno</span></h4>
    </div>

    <ul class="list-group list-group-flush mt-3">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
            <div>
                <span class="badge text-bg-light avatar-md me-2"><span class="avatar-title"><i class="ti ti-calendar-time fs-xl"></i></span></span>
                Fecha
            </div>
            <span class="text-muted"><?php echo $reporte_turno["inicio"]; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
            <div>
                <span class="badge text-bg-light avatar-md me-2"><span class="avatar-title"><i class="ti ti-cash-register fs-xl"></i></span></span>
                Fondo de caja inicial
            </div>
            <span class="text-muted">$<?php echo $reporte_turno["fondo_inicio"]; ?></span>
        </li>
    </ul>
</div>
</div>


<!-- Resumen -->
<div class="col-xxl-6 order-xl-3 order-xxl-1">
<div class="px-4 py-3 border-end border-dashed">
<div class="d-flex justify-content-between mb-3 border-bottom pb-3 border-dashed">
    <h4 class="card-title">ID: VHS44</h4>
    <h4 class="card-title">Area: La Favorita</h4>
</div>

<div class="row g-2 text-center mb-3">

    <div class="col-4">
    <div class="bg-light bg-opacity-75 p-2 mb-2">
        <h5 class="m-0"><span>Efectivo: </span>$<span class="fw-bold"><?php echo $reporte_turno["efectivo"]; ?></span></h5>
    </div>
    </div>

    <div class="col-4">
    <div class="bg-light bg-opacity-75 p-2">
        <h5 class="m-0"><span>Transferencia: </span>$<span class="fw-bold"><?php echo $reporte_turno["transferencia"]; ?></span></h5>
    </div>
    </div>

    <div class="col-4">
    <div class="bg-light bg-opacity-75 p-2">
        <h5 class="m-0"><span>Extracciones: </span>$<span class="fw-bold"><?php echo $reporte_turno["extracciones"]; ?></span></h5>
    </div>
    </div>

    <hr>

    <div class="col-12">
    <div class="bg-light bg-opacity-75 p-2">
        <h5 class="m-0 text-danger"><span>Balance: </span>$<span><?php echo $reporte_turno["balance"]; ?></span></h5>
    </div>
    </div>

    <div class="col-12">
    <div class="bg-light bg-opacity-75 p-2">
        <h5 class="m-0 text-danger"><span>Total: </span>$<span><?php echo $reporte_turno["total"]; ?></span></h5>
    </div>
    </div>

</div>

</div>
</div>


<div class="col-xxl-3 col-xl-6 order-xl-1 order-xxl-3 ">
<div class="px-4 py-3 border-end border-dashed">

    <div class="d-flex justify-content-between mb-3 border-bottom pb-3 border-dashed">
        <h4 class="card-title"><span class="badge badge-soft-danger fs-xs badge-label">Cierre de turno</span></h4>
    </div>

    <ul class="list-group list-group-flush mt-3">
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
            <div>
                <span class="badge text-bg-light avatar-md me-2"><span class="avatar-title"><i class="ti ti-calendar-time fs-xl"></i></span></span>
                Fecha
            </div>
            <span class="text-muted"><?php echo $reporte_turno["cierre"]; ?></span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
            <div>
                <span class="badge text-bg-light avatar-md me-2"><span class="avatar-title"><i class="ti ti-cash-register fs-xl"></i></span></span>
                Fondo de caja final
            </div>
            <span class="text-muted">$<?php echo $reporte_turno["fondo_cierre"]; ?></span>
        </li>
    </ul>
</div>
</div>


</div>
</div>
</div>
</div>
</div>



</form>
</div>
</div>







