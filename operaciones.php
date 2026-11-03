<?php

#---------------------------------------- GLOBAL DATA & EXTERNAL LIBRARIES LOAD ----------------------------------------#

    include "bararaq/resources/init.php";

#-------------------------------------------------- ACCESS & SECURITY --------------------------------------------------#

    $user_data = access_control();

#------------------------------------------------ INIT SCRIPT/PAGE DATA ------------------------------------------------#

    $get_data = explode("|", base64_decode($_GET["x"]));
    $id_area = $get_data[1];
    $tipo_operacion = $get_data[0];
    $id_usuario = $user_data["id"];
    $turno = $user_data["turno"] ?? "";

    $area_data = area($id_area);
    $medidas = medidas();

    #Error de datos. Se responde con una alerta de actualizacion
    if( $area_data && $medidas && $mercancias = mercancias() ){

        $mercancias = json_encode(mercancias(), true);
        $moneda = moneda(false);
        $socios = socios();
        $formula = $area_data["tipo_costo"] == "formula" && $tipo_operacion == "compra" ? $area_data["formula_costo"] : false;
        $js_scripts = " const mercancias =  $mercancias; formula = '$formula'; const usuario = '$id_usuario'; const turno = '$turno'; ";
        $msg = "";
        $content = "operaciones.php";

    }else{ $content = "error_datos.php"; }

#--------------------------------------------------- FUNCTIONALITIES ---------------------------------------------------#


#------------------------------------------------- STRUCTURE & TEMPLATE ------------------------------------------------#


    include "bararaq/structure/basic.php";

 ?>