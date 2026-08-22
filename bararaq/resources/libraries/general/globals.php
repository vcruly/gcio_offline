<?php

#---------------------------------------- GENERALS ----------------------------------------#

    const SITE_COOKIE = "_GCIOF_";
    const SITE_TITLE = "Gestion y Control de Inventarios Offline";

#----------------------------------- LOCATIONS & ROUTES -----------------------------------#

    #Desarrollo
    if($_SERVER["SERVER_PORT"] == 80){

        define("SITE_HTTP", "http://localhost/gcio_offline");
        define("LOCALHOST", "http://localhost");
        define("SITE_DIRECTORY", $_SERVER["DOCUMENT_ROOT"]."/gcio_offline/");


    #Produccion
    }else{

        define("SITE_HTTP", "http://localhost:1991");
        define("LOCALHOST", "http://localhost:1991");
        define("SITE_DIRECTORY", $_SERVER["DOCUMENT_ROOT"]);
    }


    define("LIBRARIES_DIRECTORY", SITE_DIRECTORY."/bararaq/resources/libraries/");
    define("DB_DIRECTORY", SITE_DIRECTORY."/bararaq/resources/databases/");

#---------------------------------------- DATABASES ----------------------------------------#

    define("GENERAL", DB_DIRECTORY."general.db");
    define("INVENTARIO", DB_DIRECTORY."inventario.db");

 ?>