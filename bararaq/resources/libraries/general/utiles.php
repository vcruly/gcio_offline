<?php


function mostrar_alerta($tipo = "success", $mensaje = "<span class='fw-semibold'>Todo bien!</span> La operacion ha sido exitosa"){

    return
        "<div class='alert alert-$tipo border-0 alert-dismissible fade show border-$tipo'>$mensaje
         <button type='button' class='btn-close' data-bs-dismiss='alert'></button></div>";
}


 ?>