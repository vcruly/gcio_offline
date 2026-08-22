<?php

function agregarArea($data){

    $formula_costo = !empty($data["formula_costo"]) ? $data["formula_costo"] : 0;

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("INSERT INTO areas VALUES(?,?,?,?,?,?)");
    $ps->bindValue(1, generar_id($data["nombre"]), SQLITE3_TEXT);
    $ps->bindValue(2, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(3, $data["codigo"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(4, date('Y-m-d H:i'), SQLITE3_TEXT);
    $ps->bindValue(5, $formula_costo, SQLITE3_TEXT);
    $ps->bindValue(6, isset($data["tipo_costo"]) ? "formula" : "digito", SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function actualizarArea($data){

    $id = $data["actualizar"];
    $formula_costo = !empty($data["formula_costo"]) ? $data["formula_costo"] : 0;

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("UPDATE areas SET nombre = ?, codigo = ?, formula_costo = ?, tipo_costo = ? WHERE id = '$id' ");
    $ps->bindValue(1, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(2, $data["codigo"], SQLITE3_TEXT);
    $ps->bindValue(3, $data["formula_costo"], SQLITE3_TEXT);
    $ps->bindValue(4, isset($data["tipo_costo"]) ? "formula" : "digito", SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function eliminarArea($id){

    $db = new SQLite3(INVENTARIO);
    $db->exec("DELETE FROM areas WHERE id = '$id'");
    $db->exec("DELETE FROM productos_areas WHERE area = '$id'");
    $db->close();
}


 ?>