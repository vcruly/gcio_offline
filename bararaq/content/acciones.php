<div class="row justify-content-center mt-5">
<div class="col-xxl-10">
<div class="row">
<div class="col-12">
<div class="card mb-1">

    <div class="card-body">
    <div class="d-flex gap-4 align-items-center">
    <div class="flex-grow-1">
        <p class="text-muted text-uppercase mb-2 fw-semibold">Actualizacion de la aplicacion</p>
        <h4 class="fs-lg mb-2">
            <a href="" class="link-reset"></a>
        </h4>
        <p class="text-muted mb-0 mt-4">
        <?php

            if(!empty($output)){ print_r($output); }
            else{ echo "No se pudo actualizar. Contacte al soporte o revise su coneccion a internet."; };

        ?>
        </p>
    </div>
    </div>
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

