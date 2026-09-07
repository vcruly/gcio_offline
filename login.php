<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $js_scripts = "";
    $msg = "";

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#


#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

    if( !empty($_POST["email"]) && !empty($_POST["password"]) ){

        #Buscar primero en el usuario local, si esta verificado, proceder al login offline
        #Si el usuario no existe local o no esta verificado, hacer el login online

        $userData = login($_POST["email"], $_POST["password"]);

        if($userData){ header("location:".SITE_HTTP); }else{ $msg = "<div class='alert alert-danger text-center' role='alert'>Error! Credenciales incorrectas</div>"; }
    }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "login.php";
    include "bararaq/structure/plain.php";


 ?>