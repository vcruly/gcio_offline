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
                <h5 class="text-uppercase fw-semibold">Actualizacion de la aplicacion</h5>
                <p class="text-muted mb-0 fs-base">
                <?php

                    if(empty($output)){ print_r($output); }
                    else{ echo "No se pudo actualizar. Contacte al soporte o revise su coneccion a internet."; };

                ?>
                </p>
            </div>
        </div>

        <ul class="list-unstyled mb-3">
        <?php

            for($i = 0; $i < count($output); $i++){

                echo "<li class='d-flex align-items-center mb-2'><span class='ti ti-check fs-lg text-success me-2'></span> {$output[$i]}</li>";
            }
         ?>
         </ul>

    </div>

    <div class="card-footer">
    <p class="d-flex flex-wrap gap-3 text-muted mb-0 align-items-center justify-content-between fs-sm">
        <span><i class="ti ti-message-reply"></i> <a href="#!" class="link-reset"><?php echo file_get_contents("v.txt"); ?></a></span>
        <span><i class="ti ti-clock"></i> Hora: <?php echo date("h:i:s A"); ?></span>
        <span><i class="ti ti-users"></i> Usuario: <?php echo $user_data["nombre"]; ?></span>
        <?php

            if(empty($output)){ echo "<span class='d-flex align-items-center gap-1'><span class='badge text-bg-danger'>ERROR</span></span>"; }
            else{ echo "<span class='d-flex align-items-center gap-1'><span class='badge text-bg-success'>OK</span></span>"; }

         ?>
    </p>
    </div>

</div>
</div>
</div>
</div>
</div>

