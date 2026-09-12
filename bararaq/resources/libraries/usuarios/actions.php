<?php


function actualizarUsuario($id, $campo, $valor) {

    $db = new SQLite3(DATA);
    $db->exec("UPDATE usuarios SET '$campo' = '$valor' WHERE id = '$id' ");
    $db->close();
}


function eliminarUsuario($id) {

    $db = new SQLite3(DATA);
    $db->exec("DELETE FROM usuarios WHERE id = '$id' ");
    $db->close();
}




 ?>