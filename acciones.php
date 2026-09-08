<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    //$user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $output = "";
    $js_scripts = " themeToggle(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

if(!empty($_GET)){

    switch($_GET){


        #Actualizar aplicacion
        case "actualizar": exec("cmd /c C:/GCIO/scripts/actualizar.bat 2>&1", $output); break;

        #Sincronizar cambios locales con la nube
        case "sincronizar": break;

        #Actualizar la base de datos
        #Pide el esquema listado de mercancias
        case "db": break;

    }
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "acciones.php";
    include "bararaq/structure/basic.php";

 ?>