<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $output = [];
    $content = "";
    $js_scripts = "";
    $msg = "";

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#

if(!empty($_GET["x"])){

    switch($_GET["x"]){


        #Actualizar aplicacion
        case "app": exec("cmd /c C:/GCIO/scripts/actualizar.bat 2>&1", $output); $content = "acciones_app.php"; break;

        #Sincronizar el registro de operaciones locales con la nube
        case "sinc": $content = "acciones_sinc.php"; break;

        #Actualizar la base de datos. Listado de mercancias, medidas, socios
        case "db":

            $content = "acciones_db.php";
            $versiones = versiones();

            $datos = [
                "request" => "db",
                "datos" => [
                    "mercancias" => $versiones["mercancias"],
                    "medidas" => $versiones["medidas"],
                    "socios" => $versiones["socios"],
                    "monedas" => $versiones["monedas"],
                    "categorias" => $versiones["categorias"],
                    "areas" => $versiones["areas"]
                ]
            ];

            $ch = curl_init(API_GCIO);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datos)); #convierte el array a "code=104&producto=..."
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($ch);
            curl_close($ch);
            $respuesta = json_decode($respuesta, true);
            break;

    }
}

#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#

    include "bararaq/structure/basic.php";

 ?>