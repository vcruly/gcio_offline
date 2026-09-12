<?php


function socios(){

    $socios = [];

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM socios");
    while( $row = $rs->fetchArray() ){ $socios[] = $row; }
    $db->close();

    return $socios;
}


 ?>