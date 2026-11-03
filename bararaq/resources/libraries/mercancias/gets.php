<?php


function mercancia($id){

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM mercancias WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


function mercancias(){

    $mercancias = [];

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM mercancias ");
    while($row = $rs->fetchArray(SQLITE3_ASSOC)){ $row["medida"] = medida($row["medida"])["nombre"]; $mercancias[] = $row; }
    $db->close();

    return $mercancias;
}

 ?>