<?php


function medidas(){

    $medidas = [];

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM medidas");
    while( $row = $rs->fetchArray() ){ $medidas[] = $row; }
    $db->close();

    return $medidas;
}


function medida($id){

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM medidas WHERE id = '$id' ");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


function actualizarMedidas($medidas){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las medidas anteriores
    $db->exec("delete from medidas");

    #Operaciones por lotes para insertar las nuevas medidas
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO medidas VALUES(?,?)");

    for($i = 0; $i < count($medidas); $i++){

        $ps->bindValue(1, $medidas[$i]["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $medidas[$i]["nombre"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}


 ?>