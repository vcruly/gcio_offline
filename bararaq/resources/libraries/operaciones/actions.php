<?php


function registrar_operacion($data){

    switch($data["tipo"]){

        case "venta":

            $id = "VNT-".count(operaciones());
            completar_operacion($data["productos"], $data["area"], $id, "-");
            break;


        case "compra":

            $id = "CMP-".count(operaciones());
            completar_operacion($data["productos"], $data["area"], $id, "+");
            break;


        case "salida":

            $id = "SLD-".count(operaciones());
            completar_operacion($data["productos"], $data["area"], $id, "-");
            break;


        case "ajuste":

            $id = "AJT-".count(operaciones());
            completar_operacion($data["productos"], $data["area"], $id, "+");
            break;


        case "merma":

            $id = "MRM-".count(operaciones());
            completar_operacion($data["productos"], $data["area"], $id, "-");
            break;
    }


    $db = new SQLite3(DATA);
    $ps = $db->prepare("INSERT INTO operaciones VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $ps->bindValue(1, $id, SQLITE3_TEXT);
    $ps->bindValue(2, $data["tipo"], SQLITE3_TEXT);
    $ps->bindValue(3, date('Y-m-d H:i'), SQLITE3_TEXT);
    $ps->bindValue(4, $data["socio"], SQLITE3_TEXT);
    $ps->bindValue(5, $data["area"], SQLITE3_TEXT);
    $ps->bindValue(6, $data["operador"], SQLITE3_TEXT);
    $ps->bindValue(7, $data["nota"], SQLITE3_TEXT);
    $ps->bindValue(8, $data["moneda"], SQLITE3_TEXT);
    $ps->bindValue(9, $data["total"], SQLITE3_TEXT);
    $ps->bindValue(10, $data["detalles"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(11, $data["usuario"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(12, $data["efectivo"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(13, $data["transferencia"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(14, $data["turno"] ?? "", SQLITE3_TEXT);
    $ps->execute();
    $db->close();

    return $id;
}


#Guarda el resto de los datos de la operacion en las demas tablas (productos_operaciones y productos_area)
#Son los pasos extras en el registro de operaciones
function completar_operacion($productos, $area, $id_operacion, $accion = "+"){

    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));
    $db->exec('BEGIN TRANSACTION;');


for($i = 0; $i < count($productos); $i++){

    $id_producto = $productos[$i]["id"];
    $nombre = $productos[$i]["nombre"];
    $cantidad = $productos[$i]["cantidad"];
    $precio = $productos[$i]["precio"];
    $costo = $productos[$i]["costo"];
    $codigo = $productos[$i]["codigo"];
    $medida = $productos[$i]["medida"];
    $categoria = categoria(mercancia($id_producto)["categoria"])["nombre"];


/* ------------------------------------------------------------------------------
*   Inicio y final de la mercancia en el area
* ---------------------------------------------------------------------------- */

    #Cantidad inicial de la mercancia antes de la operacion en el area
    $rs = $db->query("SELECT * FROM productos_areas WHERE id_producto = '$id_producto' AND area = '$area' ");

    #El producto existe en el area, hay que actualizar la cantidad dependiendo de la operacion
    if( $row = $rs->fetchArray() ){

        $inicio_area = $row["cantidad"];
        eval("\$final_area = $inicio_area $accion $cantidad;");
        $db->exec("UPDATE productos_areas SET cantidad = cantidad $accion cantidad WHERE id_producto = '$id_producto' AND area = '$area'  ");


    #El producto no existe en el area, se crea con la cantidad de la operacion
    }else{

        $inicio_area = 0;
        $final_area = $cantidad;
        $db->exec("INSERT INTO productos_areas VALUES ('$id_producto', '$nombre', '$area', $cantidad)");
    }


/* ------------------------------------------------------------------------------
*   Inicio y final de la mercancia a nivel general
* ---------------------------------------------------------------------------- */

    #Cantidad inicial de la mercancia antes de la operacion a nivel general
    $rs = $db->query("SELECT * FROM mercancias WHERE id = '$id_producto'");
    $row = $rs->fetchArray();
    $inicio_mercancia = $row["cantidad"];

    #Cantidad final de la mercancia despues de la operacion a nivel general
     eval("\$final_mercancia = $inicio_mercancia $accion $cantidad;");

    $db->exec("UPDATE mercancias SET cantidad = cantidad $accion $cantidad WHERE id = '$id_producto' ");


/* ------------------------------------------------------------------------------
*   Registro del producto de la operacion
* ---------------------------------------------------------------------------- */

    $db->exec("INSERT INTO productos_operaciones VALUES (
        '$id_producto',
        '$nombre',
        '$id_operacion',
        $cantidad,
        '$codigo',
        '$categoria',
        '$medida',
        '$costo',
        '$precio',
        $inicio_mercancia,
        $final_mercancia,
        $inicio_area,
        $final_area
    )");


} #End for

    $db->exec('COMMIT;');
    $db->close();
}


 ?>