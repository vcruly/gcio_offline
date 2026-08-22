<?php


function agregarCategoria($data){

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("INSERT INTO categorias VALUES(?,?)");
    $ps->bindValue(1, generar_id($data["nombre"]), SQLITE3_TEXT);
    $ps->bindValue(2, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(3, date("Y-m-d H:i"), SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function actualizarCategoria($data){

    $id = $data["actualizar"];

    $db = new SQLite3(INVENTARIO);
    $ps = $db->prepare("UPDATE categorias SET nombre = ? WHERE id = '$id' ");
    $ps->bindValue(1, $data["nombre"], SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function eliminarCategoria($id){

    $db = new SQLite3(INVENTARIO);
    $db->exec("DELETE FROM categorias WHERE id = '$id'");
    $db->exec("UPDATE productos SET categoria = '' WHERE categoria = '$id' ");
    $db->close();
}


 ?>