<?php


include "../bararaq/resources/init.php";


/* ------------------------------------------------------------------------------
*   API Gateway
* ---------------------------------------------------------------------------- */

if( !empty($_GET["request"]) ){

    switch($_GET["request"]){


        case "registrar_operacion":

            echo registrar_operacion(json_decode(file_get_contents('php://input'), true));
            break;
    }

}else{ echo 34404; }


?>