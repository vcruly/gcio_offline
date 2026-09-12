<?php


function operaciones(){

    $operaciones = [];

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM operaciones");
    while($row = $rs->fetchArray()){ $operaciones[] = $row; }
    $db->close();

    return $operaciones;
}


function buscar_operaciones($postData){

    $operaciones = [];
    $tipo_operacion = $postData["tipo"];


    switch($postData["fecha"]){

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
            $desde = $postData["desde"]." 00:00:00";
            $hasta = $postData["hasta"]." 23:59:59";
            break;

    }


    $db = new SQLite3(DATA);
    $rs = $db->query("
        SELECT * FROM operaciones AS ope JOIN productos_operaciones AS po ON po.operacion = ope.id
        WHERE ope.tipo = '$tipo_operacion' AND ope.fecha BETWEEN '$desde' AND '$hasta'
    ");
    while($row = $rs->fetchArray()){ $operaciones[] = $row; }
    $db->close();

    return $operaciones;
}


 ?>