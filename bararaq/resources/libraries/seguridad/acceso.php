<?php


function access_control(...$roles) {

    if( !empty($_COOKIE[SITE_COOKIE]) && $user_data = user_data("id", $_COOKIE[SITE_COOKIE]) ){

        return $user_data;

    }else{ header("location: ".SITE_HTTP."/login.php"); }
}


function login($email, $password) {

    if( $user_data = user_data("email", $email) ){

        if( $user_data["estado"] == "activado" && password_verify($password, $user_data["password"]) ){

            setcookie(SITE_COOKIE, $user_data["id"], [
                "expires" => time() + (9999 * 24 * 60 * 60),
                "path" => "/",
                "secure" => false,
                "httponly" => true,
            ]);

            return $user_data;

        }else { return false; }

    }else { return false; }
}


?>