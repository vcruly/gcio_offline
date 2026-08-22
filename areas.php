<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1, 2);

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = " datatable_basic(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Agregar
if( !empty($_POST["agregar"]) ){ agregarArea($_POST); $msg = mostrar_alerta();  }

#Elminar
if( !empty($_POST["eliminar"]) ){ eliminarArea($_POST["eliminar"]); $msg = mostrar_alerta(); }

#Actualizar / Editar
if( !empty($_POST["actualizar"]) ){ actualizarArea($_POST); $msg = mostrar_alerta(); }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $areas = areas();
    $content = "areas.php";
    include "bararaq/structure/basic.php";


 ?>