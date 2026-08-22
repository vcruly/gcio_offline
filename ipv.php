<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    #All access
    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    #Array de operaciones de cada mercancia
    $ipv = ipv(["fecha" => "hoy"]);

    $js_scripts = " datatable_basic(); flatpickr.localize(flatpickr.l10ns.es); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

if( !empty($_POST["buscar"]) ){ $ipv = ipv($_POST); }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "ipv.php";
    include "bararaq/structure/basic.php";

 ?>