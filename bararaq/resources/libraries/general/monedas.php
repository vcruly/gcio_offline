<?php


function monedas(){

    $monedas = [];

    $db = new SQLite3(DATA);
    $rs = $db->query("SELECT * FROM monedas");
    while( $row = $rs->fetchArray() ){ $monedas[] = $row; }
    $db->close();

    return $monedas;
}


function moneda($id){

    $query = $id ? "SELECT * FROM monedas WHERE id = '$id' " : "SELECT * FROM monedas WHERE estado = 'activada'";

    $db = new SQLite3(DATA);
    $rs = $db->query($query);
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}


function actualizarMonedas($monedas){

    #Inicializacion
    $db = new SQLite3(DATA);
    $db->exec(file_get_contents(LIBRARIES_DIRECTORY."/general/pragmas_sqlite.sql"));

    #Se eliminan todas las monedas anteriores
    $db->exec("delete from monedas");

    #Operaciones por lotes para insertar las nuevas monedas
    $db->exec('BEGIN TRANSACTION;');
    $ps = $db->prepare("INSERT INTO monedas VALUES(?,?,?,?,?,?)");

    for($i = 0; $i < count($monedas); $i++){

        $ps->bindValue(1, $monedas[$i]["id"], SQLITE3_TEXT);
        $ps->bindValue(2, $monedas[$i]["nombre"], SQLITE3_TEXT);
        $ps->bindValue(3, $monedas[$i]["siglas"], SQLITE3_TEXT);
        $ps->bindValue(4, $monedas[$i]["simbolo"], SQLITE3_TEXT);
        $ps->bindValue(5, $monedas[$i]["valor"], SQLITE3_TEXT);
        $ps->bindValue(6, $monedas[$i]["estado"], SQLITE3_TEXT);
        $ps->execute();
    }

    $db->exec('COMMIT;');
    $db->close();
}


 ?>