<div class="row justify-content-center mt-5">
<div class="col-12">
<div class="row justify-content-center">
<div class="col-8">
<div class="card mb-1">

<?php

$estado_actualizacion = "No se ha actualizado nada. Todo sigue igual";
$mercancias = "";
$medidas = "";
$socios = "";
$monedas = "";
$categorias = "";
$areas = "";

if(!empty($respuesta)){

    $estado_actualizacion = "La descarga de nuevos elementos fue correcta";


    if(!empty($respuesta["mercancias"])){

        $mercancias = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Listado de mercancias</li>';
        actualizarMercancias($respuesta["mercancias"]);
        actualizarVersion("mercancias", $respuesta["v_mercancias"]);
    }

    if(!empty($respuesta["medidas"])){

        $medidas = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Medidas de productos</li>';
        actualizarMedidas($respuesta["medidas"]);
        actualizarVersion("medidas", $respuesta["v_medidas"]);
    }

    if(!empty($respuesta["socios"])){

        $socios = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Socios</li>';
        actualizarSocios($respuesta["socios"]);
        actualizarVersion("socios", $respuesta["v_socios"]);
    }

    if(!empty($respuesta["monedas"])){

        $monedas = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Monedas</li>';
        actualizarMonedas($respuesta["monedas"]);
        actualizarVersion("monedas", $respuesta["v_monedas"]);
    }

    if(!empty($respuesta["categorias"])){

        $categorias = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Categorias</li>';
        actualizarCategorias($respuesta["categorias"]);
        actualizarVersion("categorias", $respuesta["v_categorias"]);
    }

    if(!empty($respuesta["areas"])){

        $areas = '<li class="d-flex align-items-center mb-2"><span class="ti ti-check fs-lg text-success me-2"></span> Areas</li> ';
        actualizarAreas($respuesta["areas"]);
        actualizarVersion("areas", $respuesta["v_areas"]);
    }
}
 ?>

<div class="card-body">

    <div class="d-flex align-items-center mb-4">
        <div class="flex-shrink-0">
        <div class="avatar-xl rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center">
            <i class="ti ti-database-cog fs-24 text-primary"></i>
        </div>
        </div>

        <div class="ms-3">
            <h5 class="text-uppercase fw-semibold">Actualizacion de la base de datos</h5>
            <p class="text-muted mb-0 fs-base"><?php echo $estado_actualizacion; ?></p>
        </div>
    </div>

    <ul class="list-unstyled mb-3"><?php echo $mercancias.$medidas.$socios.$monedas.$categorias.$areas; ?></ul>

</div>

    <div class="card-footer">
    <p class="d-flex flex-wrap gap-3 text-muted mb-0 align-items-center justify-content-between fs-sm">
        <span><i class="ti ti-message-reply"></i> <a href="#!" class="link-reset"><?php echo file_get_contents("v.txt"); ?></a></span>
        <span><i class="ti ti-clock"></i> Hora: <?php echo date("h:i:s A"); ?></span>
        <span><i class="ti ti-users"></i> Usuario: <?php echo $user_data["nombre"]; ?></span>
        <?php if(!empty($respuesta)){ echo "<span class='d-flex align-items-center gap-1'><span class='badge text-bg-success'>OK</span></span>"; } ?>
    </p>
    </div>

</div>
</div>
</div>
</div>
</div>

