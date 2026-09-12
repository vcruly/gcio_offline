<?php


function area($id){

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM areas WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}



 ?>