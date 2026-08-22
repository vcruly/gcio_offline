<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
    <li class="breadcrumb-item active">Cerrar turno</li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<form method="post">
<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">Cerrar turno</h4>
    <p class="text-muted mb-0">Fondo, extracciones y reporte de ventas</p>
</div>
</div>


<div class="row">
<div class="col-12">
<div class="card">

<div class="card-header d-flex justify-content-between">
    <h4 class="card-title">Monto en CUP: <span id="monto" class="text-danger"><?php echo $monto; ?></span></h4>
    <h4 class="card-title">Extracciones: <span class="me-4" id="extracciones">0</span> Restante: <span id="restante"><?php echo $monto; ?></span></h4>
    <input value="1" name="extracciones" hidden="hidden" id="input-extracciones">
</div>

<div class="card-body">
<div class="row">

    <div class="col-md-2 mb-3"><label class="form-label">1000 x</label><input name="b1000" id="b1000" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">500 x</label><input name="b500" id="b500" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">200 x</label><input name="b200" id="b200" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">100 x</label><input name="b100" id="b100" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">50 x</label><input name="b50" id="b50" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">20 x</label><input name="b20" id="b20" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">10 x</label><input name="b10" id="b10" type="number" class="form-control b"></div>
    <div class="col-md-2 mb-3"><label class="form-label">5 x</label><input name="b5" id="b5" type="number" class="form-control b"></div>

    <hr>
    <div class="col-md-4 mb-3">
        <label class="form-label">Fondo de caja inicial</label>
        <input value="<?php echo $reporte_turno["fondo_inicio"]; ?>" type="number" disabled="disabled" class="form-control">
    </div>
    <div class="col-md-4 mb-3"><label class="form-label">Fondo de caja final</label><input name="fondo" value="0" type="number" class="form-control"></div>

</div>
</div>
</div>
</div>
</div>

<input name="cerrar" value="1" type="text" hidden="hidden">
<div class="text-end"><button type="submit" class="btn btn-primary"><i data-lucide="save" class="fs-sm me-2"></i> Guardar</button></div>

</div>
</div>
</form>






