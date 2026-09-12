<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = "";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Abrir turno
if( !empty($_POST["fondo"]) ){

    abrir_turno($_POST["fondo"], $_POST["nota"] ?? "", $user_data);
    $user_data = access_control();


#Actualizar password de usuario
}else if( !empty($_POST["password"]) ){

    actualizarUsuario($user_data["id"], "password", password_hash($_POST["password"], PASSWORD_BCRYPT));
    $msg = mostrar_alerta();
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "index.php";
    include "bararaq/structure/basic.php";

 ?>