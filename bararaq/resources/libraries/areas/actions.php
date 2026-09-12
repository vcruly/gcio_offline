<?php


function actualizarAreas($areas){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las areas anteriores
    $db->exec("delete from areas");

    #Operaciones por lotes para insertar las nuevas areas
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO areas VALUES(?,?,?,?,?,?)");

    for($i = 0; $i < count($areas); $i++){

        $ps->bindValue(1, $areas[$i]["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $areas[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $areas[$i]["codigo"], SQLITE3_TEXT);
        $ps->bindValue(4, $areas[$i]["fecha"], SQLITE3_TEXT);
        $ps->bindValue(5, $areas[$i]["formula_costo"], SQLITE3_TEXT);
        $ps->bindValue(6, $areas[$i]["tipo_costo"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}


 ?>