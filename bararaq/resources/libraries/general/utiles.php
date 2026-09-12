<?php


function mostrar_alerta($tipo = "success", $mensaje = "<span class='fw-semibold'>Todo bien!</span> La operacion ha sido exitosa"){

    return
        "<div class='alert alert-$tipo border-0 alert-dismissible fade show border-$tipo'>$mensaje
         <button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
}


function versiones(){

    $db = new SQLite3(DATA);
    $rs = $db->query("select * from versiones");
    $row = $rs->fetchArray();
    $db->close();

    return $row;
}

function actualizarversion($campo, $valor){

   $db = new SQLite3(DATA);
   $db->exec("update versiones set $campo = $valor");
   $db->close();
}


 ?>