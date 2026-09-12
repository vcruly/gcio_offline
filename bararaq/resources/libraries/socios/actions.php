<?php


function actualizarSocios($socios){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las mercancias anteriores
    $db->exec("delete from socios");

    #Operaciones por lotes para insertar las nuevas mercancias
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO socios VALUES(?,?,?,?)");

    for($i = 0; $i < count($socios); $i++){

        $ps->bindValue(1, $socios[$i]["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $socios[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $socios[$i]["direccion"], SQLITE3_TEXT);
        $ps->bindValue(4, $socios[$i]["fecha"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}


 ?>