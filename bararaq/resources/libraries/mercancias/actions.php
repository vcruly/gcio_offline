<?php

function agregarMercancia($data, $imagen = false){

    if($imagen && $imagen["size"] != 0){

        $tmp_name = $imagen["tmp_name"];
        $imagen = generar_numerico().image_file_type($tmp_name);
        move_uploaded_file($tmp_name, CAGDE_DIRECTORY."/assets/images/mercancias/$imagen");

    }else{ $imagen = ""; }


    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("INSERT INTO mercancias VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $ps->bindValue(1, generar_id($data["nombre"]), SQLITE3_TEXT);
    $ps->bindValue(2, trim(strtolower($data["nombre"])), SQLITE3_TEXT);
    $ps->bindValue(3, $data["codigo"].count(mercancias()), SQLITE3_TEXT);
    $ps->bindValue(4, $data["descripcion"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(5, $data["categoria"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(6, $imagen, SQLITE3_TEXT);
    $ps->bindValue(7, 0, SQLITE3_INTEGER);
    $ps->bindValue(8, 1, SQLITE3_TEXT);
    $ps->bindValue(9, 1, SQLITE3_TEXT);
    $ps->bindValue(10, 0, SQLITE3_INTEGER);
    $ps->bindValue(11, "activado", SQLITE3_TEXT);
    $ps->bindValue(12, date('Y-m-d H:i'), SQLITE3_TEXT);
    $ps->bindValue(13, $data["medida"], SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function actualizarMercancia($data, $imagen = false){

    $id = $data["actualizar"];
    $imagen_db = mercancia($id)["imagen"] ?? "";

    if($imagen && $imagen["size"] != 0){

        $tmp_name = $imagen["tmp_name"];
        unlink(CAGDE_DIRECTORY."/assets/images/mercancias/$imagen_db");
        $imagen = generar_numerico().image_file_type($tmp_name);
        move_uploaded_file($tmp_name, CAGDE_DIRECTORY."/assets/images/mercancias/$imagen");

    }else{ $imagen = $imagen_db; }


    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("
        UPDATE mercancias SET
        nombre = ?,
        codigo = ?,
        descripcion = ?,
        categoria = ?,
        imagen = ?,
        medida = ?
        WHERE id = '$id'
    ");

    $ps->bindValue(1, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(2, $data["codigo"], SQLITE3_TEXT);
    $ps->bindValue(3, $data["descripcion"], SQLITE3_TEXT);
    $ps->bindValue(4, $data["categoria"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(5, $imagen, SQLITE3_TEXT);
    $ps->bindValue(6, $data["medida"], SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function eliminarMercancia($id){

    $imagen = mercancia($id)["imagen"];

    if(!empty($imagen)){ unlink(CAGDE_DIRECTORY."/assets/images/mercancias/$imagen"); }

    $db = new SQLite3(INVENTARIO);
    $db->exec("DELETE FROM mercancias WHERE id = '$id'");
    $db->close();
}


 ?>