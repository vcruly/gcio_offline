<?php


function actualizarUsuario($id, $campo, $valor) {

    $db = new SQLite3(GENERAL);
    $db->exec("UPDATE usuarios SET '$campo' = '$valor' WHERE id = '$id' ");
    $db->close();
}


function agregarUsuario($user_data){

    $db = new SQLite3(GENERAL);
    $ps = $db->prepare("INSERT INTO usuarios VALUES(?,?,?,?,?,?,?,?,?)");
    $ps->bindValue(1, generar_id($user_data["email"]), SQLITE3_TEXT);
    $ps->bindValue(2, $user_data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(3, $user_data["rol"], SQLITE3_TEXT);
    $ps->bindValue(4, $user_data["email"], SQLITE3_TEXT);
    $ps->bindValue(5, password_hash($user_data["password"], PASSWORD_BCRYPT), SQLITE3_TEXT);
    $ps->bindValue(6, date("Y-m-d"), SQLITE3_TEXT);
    $ps->bindValue(7, "activado", SQLITE3_TEXT);
    $ps->bindValue(8, "", SQLITE3_TEXT);
    $ps->bindValue(9, $user_data["area"] ?? "", SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function editar_usuario($data, $user_data){

    $id = $data["actualizar"];
    $password = $data["password"] ? password_hash($data["password"], PASSWORD_BCRYPT) : $user_data["password"];

    $db = new SQLite3(GENERAL);
    $ps = $db->prepare("UPDATE usuarios SET nombre = ?, rol = ?, email = ?, password = ?, area = ? WHERE id = '$id' ");
    $ps->bindValue(1, $data["nombre"], SQLITE3_TEXT);
    $ps->bindValue(2, $data["rol"], SQLITE3_TEXT);
    $ps->bindValue(3, $data["email"], SQLITE3_TEXT);
    $ps->bindValue(4, $password, SQLITE3_TEXT);
    $ps->bindValue(5, $data["area"], SQLITE3_TEXT);
    $ps->execute();
    $db->close();
}


function eliminarUsuario($id) {

    $db = new SQLite3(GENERAL);
    $db->exec("DELETE FROM usuarios WHERE id = '$id' ");
    $db->close();
}




 ?>