<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $js_scripts = "";
    $msg = "Utilice sus credenciales si ya tiene cuenta registrada";

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#


#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

    if( !empty($_POST["email"]) && !empty($_POST["password"]) ){

        #Login online. Descarga de cuenta
        if(!empty($_POST["request"])){

            $userData = descargar_usuario($_POST);

            if($userData){

                login($_POST["email"], $_POST["password"]);

                header("location:".SITE_HTTP);

            }else{$msg = "<div class='alert alert-danger text-center' role='alert'>Error! Credenciales incorrectas o usuario invalido</div>"; }


        #Login offline. La cuenta ya esta en el sistema
        }else{

            $user_data = login($_POST["email"], $_POST["password"]);

            if($user_data){ header("location:".SITE_HTTP);
            }else{ $msg = "<div class='alert alert-danger text-center' role='alert'>Error! Credenciales incorrectas o usuario invalido</div>"; }
        }
    }

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    $content = "login.php";
    include "bararaq/structure/plain.php";


 ?>