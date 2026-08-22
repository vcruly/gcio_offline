<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

    if( empty($user_data["turno"]) ){ header("location: index.php"); }

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $reporte_turno = reporte_turno($user_data["turno"]);
    $monto = $reporte_turno["efectivo"];

    $js_scripts = " const monto = '$monto'; ";
    $msg = "";
    $content = "cerrar_turno.php";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Cerrar turno
if( !empty($_POST["cerrar"]) ){

    $reporte_turno = cerrar_turno($user_data, $_POST);

    $user_data = access_control();
    $content = "reporte_turno.php";
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    include "bararaq/structure/basic.php";

 ?>