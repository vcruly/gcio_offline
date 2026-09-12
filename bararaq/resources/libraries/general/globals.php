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
        define("API_GCIO", "http://localhost/gcio/api/");


    #Produccion
    }else{

        define("SITE_HTTP", "http://localhost:1991");
        define("LOCALHOST", "http://localhost:1991");
        define("SITE_DIRECTORY", $_SERVER["DOCUMENT_ROOT"]);
        define("API_GCIO", "gcio.net/api/");
    }


    define("LIBRARIES_DIRECTORY", SITE_DIRECTORY."/bararaq/resources/libraries/");
    define("DB_DIRECTORY", SITE_DIRECTORY."/bararaq/resources/databases/");

#---------------------------------------- DATABASES ----------------------------------------#

    define("DATA", DB_DIRECTORY."data.db");

 ?>