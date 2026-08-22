<?php


function agregarSocio($data){

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("INSERT INTO socios VALUES(?,?,?,?)");
    $ps->bindValue(1, generar_id($data["nombre"]), SQLITE3_TEXT);
    $ps->bindValue(2, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(3, $data["direccion"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(4, date('Y-m-d H:i'), SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function actualizarSocio($data){

    $id = $data["actualizar"];

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("UPDATE socios SET nombre = ?, direccion = ? WHERE id = '$id' ");
    $ps->bindValue(1, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(2, $data["direccion"], SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function eliminarSocio($id){

    $db = new SQLite3(INVENTARIO);
    $db->exec("DELETE FROM socios WHERE id = '$id'");
    $db->close();
}


 ?>