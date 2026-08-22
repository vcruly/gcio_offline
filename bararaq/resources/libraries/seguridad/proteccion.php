<?php


#HTML purifier
function purifier($dirty_html){

    $purifier = new HTMLPurifier();
    $clean_html = $purifier->purify($dirty_html);

    return $clean_html;
}


#Extensiones de imagenes permitidas
function image_file_type($imagen){

    # 2 = JPEG/JPG
    # 3 = PNG
    # 18 = WEBP
    # $allow_file_types = [ 2, 3, 18 ];

    switch( exif_imagetype($imagen) ){

        case 2: return ".jpg"; break;

        case 3: return ".png"; break;

        case 18: return ".webp"; break;

        default: return false; break;
    }
}



?>