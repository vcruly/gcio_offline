<?php


#------------------------------------------ AREAS ------------------------------------------#

    include "libraries/areas/actions.php";
    include "libraries/areas/gets.php";

#--------------------------------------- CATEGORIAS ----------------------------------------#

    include "libraries/categorias/actions.php";
    include "libraries/categorias/gets.php";

#---------------------------------------- GENERAL -----------------------------------------#

    include "libraries/general/globals.php";
    include "libraries/general/HTMLPurifier.standalone.php";
    include "libraries/general/medidas.php";
    include "libraries/general/monedas.php";
    include "libraries/general/utiles.php";

#------------------------------------------ IPV -------------------------------------------#

    include "libraries/ipv/gets.php";

#--------------------------------------- MERCANCIAS ---------------------------------------#

    include "libraries/mercancias/actions.php";
    include "libraries/mercancias/gets.php";

#-------------------------------------- OPERACIONES ---------------------------------------#

    include "libraries/operaciones/actions.php";
    include "libraries/operaciones/gets.php";

#---------------------------------------- SEGURIDAD ----------------------------------------#

    include "libraries/seguridad/acceso.php";
    include "libraries/seguridad/generacion.php";
    include "libraries/seguridad/proteccion.php";

#----------------------------------------- SOCIOS ------------------------------------------#

    include "libraries/socios/actions.php";
    include "libraries/socios/gets.php";

#----------------------------------------- TURNOS ------------------------------------------#

    include "libraries/turnos/actions.php";
    include "libraries/turnos/gets.php";


#---------------------------------------- USUARIOS -----------------------------------------#

    include "libraries/usuarios/gets.php";
    include "libraries/usuarios/actions.php";


?>