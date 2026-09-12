<?php


function actualizarCategorias($categorias){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las categorias anteriores
    $db->exec("delete from categorias");

    #Operaciones por lotes para insertar las nuevas categorias
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO categorias VALUES(?,?,?)");

    for($i = 0; $i < count($categorias); $i++){

        $ps->bindValue(1, $categorias[$i]["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $categorias[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $categorias[$i]["fecha"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}


 ?>