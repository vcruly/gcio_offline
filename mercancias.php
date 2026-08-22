<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1, 2, 3);

#------------------------------------------------ INIT SCRIPT / PAGE DATA ------------------------------------------------#

    $categorias = categorias();
    $medidas = medidas();

    $js_scripts = " datatable_basic(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Agregar
if( !empty($_POST["agregar"]) ){

    agregarMercancia($_POST, $_FILES["imagen"]);
    $msg = mostrar_alerta();
}

#Elminar
if( !empty($_POST["eliminar"]) ){

    eliminarMercancia($_POST["eliminar"]);
    $msg = mostrar_alerta();
}

#Actualizar / Editar
if( !empty($_POST["actualizar"]) ){

    actualizarMercancia($_POST, $_FILES["imagen"]);
    $msg = mostrar_alerta();
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $mercancias = mercancias();
    $content = "mercancias.php";
    include "bararaq/structure/basic.php";


 ?>