<div class="row justify-content-center mt-5">
<div class="col-12">
<div class="row justify-content-center">
<div class="col-8">
<div class="card mb-1">

    <div class="card-body">

        <div class="d-flex align-items-center mb-4">
            <div class="flex-shrink-0">
            <div class="avatar-xl rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center">
                <i class="ti ti-device-desktop-down fs-24 text-primary"></i>
            </div>
            </div>

            <div class="ms-3">
                <h5 class="text-uppercase fw-semibold">Sincronizacion de operaciones</h5>
                <p class="text-muted mb-0 fs-base">Operaciones pendientes</p>
            </div>
        </div>

        <ul class="list-unstyled mb-3">
        <?php

            echo '<li>Operaciones sincronizadas: '.(int)$resultado_sinc["sincronizadas"].'</li>';
            echo '<li>Operaciones pendientes: '.(int)$resultado_sinc["pendientes"].'</li>';

            if($resultado_sinc["error"] !== ""){ echo '<li class="text-danger">'.htmlspecialchars($resultado_sinc["error"], ENT_QUOTES, 'UTF-8').'</li>';
            }
            else if($resultado_sinc["sincronizadas"] === 0){  echo '<li>No hay operaciones pendientes de sincronizar.</li>'; }

         ?>
         </ul>

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

