<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $js_scripts = " themeToggle(); ";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

if(!empty($_GET)){

    switch($_GET){


        #Actualizar aplicacion
        case "actualizar": break;

        #Sincronizar cambios locales con la nube
        case "sincronizar": break;

        #Actualizar la base de datos
        case "database": break;

    }


}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "acciones.php";
    include "bararaq/structure/basic.php";

 ?>