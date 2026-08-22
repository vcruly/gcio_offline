<?php


function monedas(){

    $monedas = [];

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query("SELECT * FROM monedas");
    while( $row = $rs->fetchArray() ){ $monedas[] = $row; }
    $db->close();

    return $monedas;
}


function moneda($id){

    $query = $id ? "SELECT * FROM monedas WHERE id = '$id' " : "SELECT * FROM monedas WHERE estado = 'activada'";

    $db = new SQLite3(INVENTARIO);
    $rs = $db->query($query);
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


 ?>