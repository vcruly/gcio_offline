<div class="row justify-content-center mt-5">
<div class="col-12">
<div class="row justify-content-center">
<div class="col-8">
<div class="card mb-1">

    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0">
            <div class="avatar-xl rounded-circle bg-warning-subtle d-flex align-items-center justify-content-center">
                <i class="ti ti-alert-triangle fs-24 text-warning"></i>
            </div>
            </div>

            <div class="ms-3">
                <h5 class="text-uppercase fw-semibold">Alerta de actualizacion</h5>
                <p class="text-muted mb-0 fs-base">No se han encontrado datos del area, medidas o mercancias. Actualice la base de datos.</p>
            </div>
        </div>


    </div>

    <div class="card-footer">
    <p class="d-flex flex-wrap gap-3 text-muted mb-0 align-items-center justify-content-between fs-sm">
        <span><i class="ti ti-message-reply"></i> <a href="#!" class="link-reset"><?php echo file_get_contents("v.txt"); ?></a></span>
        <span><i class="ti ti-clock"></i> Hora: <?php echo date("h:i:s A"); ?></span>
        <span><i class="ti ti-users"></i> Usuario: <?php echo $user_data["nombre"]; ?></span>
    </p>
    </div>

</div>
</div>
</div>
</div>
</div>

