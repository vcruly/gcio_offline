<?php

/* ------------------------------------------------------------------------------
*   Registros IPV
*
*   Totalizacion de las operaciones sobre el listado de mercancias en un rago de fecha o fecha fija
*
*   Es decir poner la sumatoria de cada operacion por cada producto
*   Merma un total 12 para la yuca, Entrada 25, y asi por cada operacion
*
* ---------------------------------------------------------------------------- */


function ipv($post_data){

    $mercancias = mercancias();
    $operaciones = [];

    switch($post_data["fecha"]){

        case "hoy":
            $desde = date("Y-m-d 00:00:00");
            $hasta = date("Y-m-d 23:59:59");
            break;


        case "ayer":
            $desde = date('Y-m-d 00:00:00', strtotime('-1 day'));
            $hasta = date('Y-m-d 23:59:59', strtotime('-1 day'));
            break;


        case "esta semana":
            $desde = date('Y-m-d 00:00:00', strtotime('monday this week'));
            $hasta = date('Y-m-d 23:59:59', strtotime('sunday this week'));
            break;


        case "semana pasada":
            $desde = date('Y-m-d 00:00:00', strtotime('monday last week'));
            $hasta = date('Y-m-d 23:59:59', strtotime('sunday last week'));
            break;


        case "este mes":
            $desde = date('Y-m-01 00:00:00');
            $hasta = date('Y-m-t 23:59:59');
            break;


        case "mes pasado":
            $desde = date('Y-m-01 00:00:00', strtotime('first day of last month'));
            $hasta = date('Y-m-t 23:59:59', strtotime('last day of last month'));
            break;

        case "fecha personalizada":
            $desde = $post_data["desde"]." 00:00:00";
            $hasta = $post_data["hasta"]." 23:59:59";
            break;
    }


    # Buscar las operaciones en un rango de fecha de cada producto en listado de mercancias
    # Separar un totalizar estas operaciones por producto
    # Es decir, cuantas cantidades de x producto en la operacion entrada en tal fecha
    # Sacar tambien el total del primer dia y el total del dia final

    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));
    $db->exec('BEGIN TRANSACTION;');

    for($i = 0; $i < count($mercancias); $i++){

        $nombre = $mercancias[$i]["nombre"];
        $datos[] = $nombre;

        $rs = $db->query("
            SELECT * FROM operaciones AS ope JOIN productos_operaciones AS po ON po.operacion = ope.id
            WHERE po.nombre = '$nombre' AND ope.fecha BETWEEN '$desde' AND '$hasta'
        ");


        # Se agrupan las operaciones por nombre de mercancia
        # yuca[operaciones de la yuca...]

        while($row = $rs->fetchArray()){ $operaciones[$nombre][] = $row; }
    }

    $db->exec('COMMIT;');
    $db->close();

    return $operaciones;
}



 ?>