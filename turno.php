<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1, 2);

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $reporte_turno = reporte_turno($_GET["id"]);

    $js_scripts = "";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#


#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "reporte_turno.php";
    include "bararaq/structure/basic.php";

 ?>