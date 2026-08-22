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

<body class="d-flex flex-column min-vh-100">


<?php include "bararaq/content/$content"; ?>


<footer class="footer">
<div class="container-fluid">
<div class="row">
    <div class="col-md-6 text-center text-md-start">&copy; <span class="fw-semibold"><script>document.write(new Date().getFullYear())</script> </span></div>
    <div class="col-md-6"><div class="text-md-end d-none d-md-block"><span class="fw-bold">CAGDE</span></div></div>
</div>
</div>
</footer>

    <script src="assets/js/vendors.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/plugins/moment/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script src="assets/plugins/datatables/dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.select.min.js"></script>
    <script src="assets/plugins/datatables/select.bootstrap5.min.js"></script>

    <script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/gcio.js?v=1.4"></script>
    <script><?php echo $js_scripts; ?></script>

</body>

</html>