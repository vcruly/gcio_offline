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
    $ps = $db->prepare("INSERT INTO operaciones VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $ps->bindValue(1, $id, SQLITE3_TEXT);
    $ps->bindValue(2, $data["tipo"], SQLITE3_TEXT);
    $ps->bindValue(3, date('Y-m-d H:i'), SQLITE3_TEXT);
    $ps->bindValue(4, $data["socio"], SQLITE3_TEXT);
    $ps->bindValue(5, $data["area"], SQLITE3_TEXT);
    $ps->bindValue(6, area($data["area"])["nombre"], SQLITE3_TEXT);
    $ps->bindValue(7, $data["operador"], SQLITE3_TEXT);
    $ps->bindValue(8, $data["nota"], SQLITE3_TEXT);
    $ps->bindValue(9, $data["moneda"], SQLITE3_TEXT);
    $ps->bindValue(10, $data["total"], SQLITE3_TEXT);
    $ps->bindValue(11, $data["detalles"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(12, $data["usuario"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(13, $data["efectivo"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(14, $data["transferencia"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(15, $data["turno"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(16, "", SQLITE3_TEXT);
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


#El endpoint debe confirmar cada operacion con {"success":true}.
#Se envia como formulario: request=sinc y datos[...], incluidos datos[productos].
function sincronizar_operaciones(){

    $resultado = ["sincronizadas" => 0, "pendientes" => 0, "error" => ""];
    $db = new SQLite3(DATA);
    $db->enableExceptions(true);
    $db->busyTimeout(5000);

    try {
        $rs = $db->query("SELECT * FROM operaciones WHERE sincronizada IS NULL OR TRIM(sincronizada) = ''");
        $operaciones = [];
        while($operacion = $rs->fetchArray(SQLITE3_ASSOC)){
            $operaciones[] = $operacion;
        }
        $rs->finalize();
        $resultado["pendientes"] = count($operaciones);

        foreach($operaciones as $operacion){
            $ps = $db->prepare("SELECT * FROM productos_operaciones WHERE operacion = :id");
            $ps->bindValue(":id", $operacion["id"], SQLITE3_TEXT);
            $rs = $ps->execute();
            $operacion["productos"] = [];
            while($producto = $rs->fetchArray(SQLITE3_ASSOC)){
                $operacion["productos"][] = $producto;
            }
            $rs->finalize();
            $ps->close();

            $ch = curl_init(API_GCIO);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query(["request" => "sinc", "datos" => $operacion]),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_TIMEOUT => 30
            ]);
            $respuesta = curl_exec($ch);
            $estado = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $confirmacion = $respuesta === false ? null : json_decode($respuesta, true);

            if($respuesta === false || $estado < 200 || $estado >= 300 ||
                !is_array($confirmacion) || ($confirmacion["success"] ?? null) !== true){
                $resultado["error"] = "El servidor no confirmo la sincronizacion. Las operaciones pendientes se conservan para reintentar.";
                break;
            }

            $ps = $db->prepare("UPDATE operaciones SET sincronizada = :fecha WHERE id = :id AND (sincronizada IS NULL OR TRIM(sincronizada) = '')");
            $ps->bindValue(":fecha", date("Y-m-d H:i:s"), SQLITE3_TEXT);
            $ps->bindValue(":id", $operacion["id"], SQLITE3_TEXT);
            $ps->execute();
            $ps->close();
            $resultado["sincronizadas"]++;
            $resultado["pendientes"]--;
        }
    } catch(Throwable $error){
        error_log("Sincronizacion de operaciones: ".$error->getMessage());
        $resultado["error"] = "No se pudo completar la sincronizacion. Vuelva a intentarlo.";
    } finally {
        $db->close();
    }

    return $resultado;
}


 ?>