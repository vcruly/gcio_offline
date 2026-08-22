<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1, 2, 3);

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = " datatable_basic(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Agregar
if( !empty($_POST["agregar"]) ){ agregarCategoria($_POST); $msg = mostrar_alerta(); }

#Elminar
if( !empty($_POST["eliminar"]) ){ eliminarCategoria($_POST["eliminar"]); $msg = mostrar_alerta(); }

#Actualizar / Editar
if( !empty($_POST["actualizar"]) ){ actualizarCategoria($_POST); $msg = mostrar_alerta(); }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $categorias = categorias();
    $content = "categorias.php";
    include "bararaq/structure/basic.php";

 ?>