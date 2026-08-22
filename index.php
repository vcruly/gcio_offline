<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = " themeToggle(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

#Abrir turno
if( !empty($_POST["fondo"]) ){

    abrir_turno($_POST["fondo"], $_POST["nota"] ?? "", $user_data);
    $user_data = access_control();
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "index.php";
    include "bararaq/structure/basic.php";

 ?>