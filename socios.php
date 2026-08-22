<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = " datatable_basic(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Agregar
if( !empty($_POST["agregar"]) ){ agregarSocio($_POST); $msg = mostrar_alerta();  }

#Elminar
if( !empty($_POST["eliminar"]) ){ eliminarSocio($_POST["eliminar"]); $msg = mostrar_alerta(); }

#Actualizar / Editar
if( !empty($_POST["actualizar"]) ){ actualizarSocio($_POST); $msg = mostrar_alerta(); }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $socios = socios();
    $content = "socios.php";
    include "bararaq/structure/basic.php";

 ?>