<?php


function turno($id){

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM turnos WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


function turnos(){

    $turnos = [];

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM turnos");
    while( $row = $rs->fetchArray() ){ $turnos[] = $row; }
    $db->close();

    return $turnos;
}


function reporte_turno($id_turno){

    $datos = [];
    $operaciones = [];
    $transferencia = 0;
    $efectivo = 0;
    $turno_data = turno($id_turno);

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM operaciones WHERE turno = '$id_turno' ");
    while( $row = $rs->fetchArray() ){ $operaciones[] = $row; }
    $db->close();


    for($i = 0; $i < count($operaciones); $i++){

        if( !empty($operaciones[$i]["transferencia"]) ){ $transferencia += $operaciones[$i]["transferencia"]; }

        if( !empty($operaciones[$i]["efectivo"]) ){ $efectivo += $operaciones[$i]["efectivo"]; }
    }


    return [

        "balance" => $efectivo + $turno_data["fondo_inicio"] - $turno_data["fondo_cierre"],
        "efectivo" => $efectivo,
        "transferencia" => $transferencia,
        "extracciones" => $turno_data["extracciones"],
        "total" => $efectivo + $transferencia,
        "id_turno" => $id_turno,
        "inicio" => $turno_data["inicio"],
        "cierre" => $turno_data["cierre"],
        "fondo_inicio" => $turno_data["fondo_inicio"],
        "fondo_cierre" => $turno_data["fondo_cierre"]
    ];
}


 ?>