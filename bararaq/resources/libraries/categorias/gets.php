<?php


function categorias(){

    $categorias = [];

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM categorias ");
    while($row = $rs->fetchArray()){ $categorias[] = $row; }
    $db->close();

    return $categorias;
}


function categoria($id){

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM categorias WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


 ?>