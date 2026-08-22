<div class="page-title-head d-flex align-items-center">
<div class="flex-grow-1"></div>
<div class="text-end">
<ol class="breadcrumb m-0 py-0">
    <li class="breadcrumb-item"><a href="<?php echo SITE_HTTP."/index.php"; ?>">Inicio</a></li>
</ol>
</div>
</div>

<?php echo $msg; ?>

<div class="row justify-content-center">
<div class="col-12">

<div class="d-flex align-items-sm-center flex-sm-row flex-column mb-3">
<div class="flex-grow-1">
    <h4 class="fs-xl mb-1">Bienvenido</h4>
    <p class="text-muted mb-0"><?php echo $user_data["nombre"]; ?></p>
</div>
</div>

<?php

    if($turno){

        echo "
        <div class='row'>
            <div class='col-xl-4'>
            <div class='card border-top-0'>

                <div class='position-relative card-side-img overflow-hidden rounded-top' style='height: 180px; background-image: url(assets/images/bgs/sidenav-bg.jpg);'>
                <div class='p-4 card-img-overlay rounded-start-0 auth-overlay d-flex rounded-top align-items-center justify-content-center'>
                    <h4 class='text-white m-0'>Tiene un turno abierto!</h4>
                </div>
                </div>


                <div class='card-body position-relative'>
                <div class='d-flex justify-content-start gap-3'>
                    <div class='avatar avatar-xxl' style='margin-top: -60px;'>
                        <a><img src='assets/images/icons/checkmark.png' alt='User Profile' class='img-fluid img-thumbnail rounded-circle'></a>
                    </div>
                    <div>
                        <h5 class='text-nowrap fw-bold mb-1'><a class='text-reset text-decoration-none'>Inicio: {$turno["inicio"]}</a></h5>
                        <p class='text-muted mb-0'>Fonde de caja: &#36;{$turno["fondo_inicio"]} CUP</p>
                    </div>
                </div>
                </div>

            </div>
            </div>
        </div>";
    }


 ?>

</div>
</div>







