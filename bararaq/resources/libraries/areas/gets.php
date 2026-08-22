<?php


function areas(){

    $areas = [];

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM areas ");
    while($row = $rs->fetchArray()){ $areas[] = $row; }
    $db->close();

    return $areas;
}

function area($id){

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM areas WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}



 ?>