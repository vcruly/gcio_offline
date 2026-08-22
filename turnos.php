<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1, 2);

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $turnos = turnos();

    $js_scripts = "";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Eliminar turno
if( !empty($_POST["eliminar"]) ){

    eliminarTurno($_POST["eliminar"]);
    $turnos = turnos();
    $msg = mostrar_alerta();

}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "turnos.php";
    include "bararaq/structure/basic.php";

 ?>