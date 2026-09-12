<?php


function abrir_turno($fondo, $nota, $user_data){

    $id = masker("", 5, 1, "right").random_int(1, 9999);
    $id_usuario = $user_data["id"];
    $operador = $user_data["nombre"];
    $fecha = date("Y-m-d H:i");

    $db = new SQLite3(DATA);
    $db->exec("INSERT INTO turnos VALUES('$id', '$fecha', '', '$fondo', '0', '$id_usuario', '$operador', '$nota', '', '', '0', '0', '0')");
    $db->close();

    actualizarUsuario($id_usuario, "turno", $id);
}


function cerrar_turno($user_data, $post_data){

    $id_turno = $user_data["turno"];
    $reporte_turno = reporte_turno($user_data["turno"]);

    $desglose = json_encode([

        "b1000" => $post_data["b1000"],
        "b500" => $post_data["b500"],
        "b200" => $post_data["b200"],
        "b100" => $post_data["b100"],
        "b50" => $post_data["b50"],
        "b20" => $post_data["b20"],
        "b10" => $post_data["b10"],
        "b5" => $post_data["b5"]
    ]);


    $db = new SQLite3(DATA);
    $ps = $db->prepare("UPDATE turnos SET cierre = ?, fondo_cierre = ?, nota_cierre = ?, desglose = ?, efectivo = ?, transferencia = ?, extracciones = ? WHERE id = ? ");
    $ps->bindValue(1, date("Y-m-d H:i"), SQLITE3_TEXT);
    $ps->bindValue(2, $post_data["fondo"] ?? 0, SQLITE3_TEXT);
    $ps->bindValue(3, $post_data["nota"] ?? "", SQLITE3_TEXT);
    $ps->bindValue(4, $desglose, SQLITE3_TEXT);
    $ps->bindValue(5, $reporte_turno["efectivo"], SQLITE3_TEXT);
    $ps->bindValue(6, $reporte_turno["transferencia"], SQLITE3_TEXT);
    $ps->bindValue(7, $post_data["extracciones"], SQLITE3_TEXT);
    $ps->bindValue(8, $id_turno, SQLITE3_TEXT);
    $ps->execute();
    $db->close();

    actualizarUsuario($user_data["id"], "turno", "");

    return reporte_turno($user_data["turno"]);
}


function eliminarTurno($id){

    $db = new SQLite3(DATA);
    $db->exec("DELETE FROM turnos WHERE id = '$id' ");
    $db->close();
}



 ?>