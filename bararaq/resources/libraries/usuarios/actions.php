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


#Login online. Una vez todo este bien. Se registra el mismo de forma local
function descargar_usuario($post_data){

    #Envio de credenciales a la nube
    $ch = curl_init(API_GCIO);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data)); #convierte el array a "code=104&producto=..."
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($ch);
    curl_close($ch);


    if($respuesta == 3312 || $respuesta == 34404){

        return false;

    }else{

        $user_data = json_decode($respuesta, true);

        $db = new SQLite3(DATA);
        $ps = $db->prepare("INSERT INTO usuarios VALUES(?,?,?,?,?,?,?,?,?)");
        $ps->bindValue(1, $user_data["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $user_data["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $user_data["rol"], SQLITE3_TEXT);
        $ps->bindValue(4, $user_data["email"], SQLITE3_TEXT);
        $ps->bindValue(5, $user_data["password"], SQLITE3_TEXT);
        $ps->bindValue(6, $user_data["creado"], SQLITE3_TEXT);
        $ps->bindValue(7, $user_data["estado"], SQLITE3_TEXT);
        $ps->bindValue(8, "", SQLITE3_TEXT);
        $ps->bindValue(9, $user_data["area"], SQLITE3_TEXT);
        $ps->execute();
        $db->close();

        return $user_data;
    }
}


 ?>