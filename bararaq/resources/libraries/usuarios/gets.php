<?php


function user_data($campo, $valor){
                    
    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM usuarios WHERE $campo = '$valor'");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


 ?>