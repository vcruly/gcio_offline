<?php

function actualizarMercancias($mercancias){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las mercancias anteriores
    $db->exec("delete from mercancias");

    #Operaciones por lotes para insertar las nuevas mercancias
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO mercancias VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

    for($i = 0; $i < count($mercancias); $i++){

        $ps->bindValue(1, $mercancias[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(2, $mercancias[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $mercancias[$i]["codigo"], SQLITE3_TEXT);
        $ps->bindValue(4, $mercancias[$i]["descripcion"], SQLITE3_TEXT);
        $ps->bindValue(5, $mercancias[$i]["categoria"], SQLITE3_TEXT);
        $ps->bindValue(6, $mercancias[$i]["imagen"], SQLITE3_TEXT);
        $ps->bindValue(7, $mercancias[$i]["alerta"], SQLITE3_INTEGER);
        $ps->bindValue(8, $mercancias[$i]["precio"], SQLITE3_TEXT);
        $ps->bindValue(9, $mercancias[$i]["costo"], SQLITE3_TEXT);
        $ps->bindValue(10, $mercancias[$i]["cantidad"], SQLITE3_INTEGER);
        $ps->bindValue(11, $mercancias[$i]["estado"], SQLITE3_TEXT);
        $ps->bindValue(12, $mercancias[$i]["fecha"], SQLITE3_TEXT);
        $ps->bindValue(13, $mercancias[$i]["medida"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}




 ?>