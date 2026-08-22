<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $mercancias = mercancias();
    $categorias = categorias();
    $operaciones = [];
    $areas = areas();
    $monedas = monedas();
    $socios = socios();

    $js_scripts = " datatable_basic(); flatpickr.localize(flatpickr.l10ns.es); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

if( !empty($_POST["buscar"]) ){ $operaciones = buscar_operaciones($_POST); }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "registros.php";
    include "bararaq/structure/basic.php";

 ?>