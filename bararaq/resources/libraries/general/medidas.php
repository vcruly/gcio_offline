<?php


function medidas(){

    $medidas = [];

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM medidas");
    while( $row = $rs->fetchArray() ){ $medidas[] = $row; }
    $db->close();

    return $medidas;
}


function medida($id){

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM medidas WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


 ?>