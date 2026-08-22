<?php $turno = !empty($user_data["turno"]) ? turno($user_data["turno"]) : false; ?>

<!DOCTYPE html>
<html lang="es" data-topbar-color="dark" data-menu-color="light" data-layout="topnav" data-skin="modern">

<head>
    <meta charset="utf-8">
    <title><?php echo SITE_TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css" type="text/css">
    <link href="assets/plugins/datatables/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">

    <script src="assets/js/config.js"></script>

    <link href="assets/css/vendors.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.css" rel="stylesheet" type="text/css">
</head>


<body style=" background-image: url(assets/images/bgs/bg-pattern.png)">
<div class="wrapper">

<!-- 1er Header -->
<header class="app-topbar">
<div class="container-fluid topbar-menu">

    <div class="d-flex align-items-center gap-2">
        <div class="logo-topbar d-none d-sm-block">
            <a href="<?php echo SITE_HTTP; ?>" class="logo-light"><span class="logo-lg"><img style="height: 35px" src="assets/images/logos/logo-dark.png"></span></a>
            <a href="<?php echo SITE_HTTP; ?>" class="logo-dark"><span class="logo-lg"><img style="height: 35px" src="assets/images/logos/logo-light.png"></span></a>
        </div>

        <!-- Horizontal Menu Toggle Button -->
        <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <i style="font-size: 30px" class="ti ti-menu-4"></i>
        </button>

        <!-- Search -->
        <div class="app-search d-none d-xl-flex">
            <input type="search" class="form-control topbar-search" disabled="disabled" name="search" placeholder="Buscar algo...">
            <i data-lucide="search" class="app-search-icon text-muted"></i>
        </div>
    </div>

    <div class="d-flex align-items-center gap-2">
        <div class="topbar-item d-none d-sm-flex">
        <?php

            if($turno){

                echo '<a href="cerrar_turno.php" class="btn btn-sm btn-danger rounded-pill"><i class="ti ti-alarm align-middle me-1 fs-xl"></i> Cerrar turno</a>';

            }else{

                echo'
                <a data-bs-toggle="modal" data-bs-target="#abrir-turno" class="btn btn-sm btn-secondary rounded-pill">
                    <i class="ti ti-alarm align-middle me-1 fs-xl"></i> Abir turno
                </a>';
            }
         ?>
        </div>

        <div class="topbar-item d-none d-sm-flex ms-1">
            <a class="topbar-link" href=""><i data-lucide="settings" class="fs-xxl"></i></a>
        </div>

        <div class="topbar-item d-sm-flex">
        <button class="topbar-link" id="light-dark-mode" type="button">
            <i data-lucide="moon" class="fs-xxl mode-light-moon"></i><i data-lucide="sun" class="fs-xxl mode-light-sun"></i>
        </button>
        </div>

        <div class="topbar-item d-none d-sm-flex ms-1">
            <a class="topbar-link" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Actualizar la base de datos" href="">
                <i data-lucide="database" class="fs-xxl"></i>
            </a>
        </div>

        <div class="topbar-item d-none d-sm-flex ms-1">
            <a class="topbar-link" href="" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Sincronizar con la nube">
                <i data-lucide="cloud" class="fs-xxl"></i>
            </a>
        </div>

        <div class="topbar-item d-none d-sm-flex ms-1">
            <a class="topbar-link" href="acciones.php?actualizar" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Actualizar la aplicacion">
                <i data-lucide="monitor-down" class="fs-xxl"></i>
            </a>
        </div>

        <div class="topbar-item nav-user"><a class="py-1 px-2 rounded bg-dark bg-opacity-50"><?php echo $user_data["nombre"] ?? ""; ?></a></div>


    </div>

</div>
</header>

<!-- Links Menu -->
<header class="topnav">
<nav class="navbar navbar-expand-lg">
<nav class="container-fluid">
<div class="collapse navbar-collapse" id="topnav-menu-content">
<ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link" href="index.php"><span class="menu-icon"><i class="ti ti-home"></i></span><span class="menu-text">Inicio</span></a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="ipv.php"><span class="menu-icon"><i class="ti ti-presentation-analytics"></i></span><span class="menu-text">IPV</span></a>
    </li>

    <li class="nav-item ">
    <?php

        $area_data = area($user_data["area"]);
        $id_area = $user_data["area"];
        $enlacex = base64_encode("venta|$id_area");

    ?>
    <a class="nav-link" href="operaciones.php?x=<?php echo $enlacex; ?>">
        <span class="menu-icon"><i class="ti ti-package-export"></i></span>
        <span class="menu-text">Venta</span>
    </a>
    </li>

</ul>
</div>
</nav>
</nav>
</header>


<?php include SITE_DIRECTORY."/bararaq/components/modales/abrir_turno.php"; ?>

<div class="content-page">
    <div class="container-fluid"> <?php include "bararaq/content/$content"; ?> </div>

    <footer class="footer">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 text-center text-md-start">© <?php echo getdate()["year"]; ?>  <span class="fw-semibold">CAGDE</span></div>
        <div class="col-md-6"><div class="text-md-end d-none d-md-block"></div></div>
    </div>
    </div>
    </footer>
</div>


    <script src="assets/js/vendors.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="assets/plugins/select2/select2.min.js"></script>
    <script src="assets/js/mathjs.js"></script>
    <script src="assets/js/form-wizard.js"></script>

    <script src="assets/plugins/datatables/dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>
    <script src="assets/plugins/datatables/select.bootstrap5.min.js"></script>

    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/gcio.js?v=1.6"></script>
    <script><?php echo $js_scripts; ?></script>
    <script src="assets/js/operaciones.js?v=1.6"></script>
    <script src="assets/js/cerrar_turno.js?v=1.2"></script>


</div>
</body>
</html>