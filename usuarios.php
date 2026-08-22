<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control(1,2);

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $usuarios = usuarios();
    $roles = roles();
    $areas = areas();

    $js_scripts = " datatable_basic(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Agregar usuario
if( !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["agregar"]) && $_POST["agregar"] == 1 ){

    agregarUsuario($_POST);
    $msg = mostrar_alerta();
    $usuarios = usuarios();


#Agregar usuario
}else if( !empty($_POST["actualizar"]) ){

    editar_usuario($_POST, $user_data);
    $msg = mostrar_alerta();
    $usuarios = usuarios();


#Eliminar usuario
}else if( !empty($_POST["eliminar"]) ){

    eliminarUsuario($_POST["eliminar"]);
    $msg = mostrar_alerta();
    $usuarios = usuarios();
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "usuarios.php";
    include "bararaq/structure/basic.php";

 ?>