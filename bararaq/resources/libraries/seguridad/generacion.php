<?php


function generar_numerico(){ $numerico = bin2hex(random_int(1,9999).getdate()[0].random_int(1,9999)).random_int(1,9999); return $numerico; }


function generar_id($data = null){

    $id =
        chr(rand(97,122)).
        random_int(1,999).
        bin2hex(chr(getdate()[0])).
        bin2hex(random_int(1,99999)).

        bin2hex($data ?? random_int(1,99999). random_int(1,99999)).

        chr(rand(97,122)).
        getdate()[0].
        chr(rand(97,122)).
        random_int(1,999).
        dechex(rand(65,90)).
        chr(rand(97,122)).
        dechex(rand(65,90)).
        chr(rand(97,122)).
        dechex(rand(65,90)).
        getdate()["seconds"].
        dechex(rand(65,90));

        return $id;
}


function masker(String $string, int $lenght = 7, int $mask = 0, String $side = nullable){

    $masquerade = '';
    $masquerade2 = '';

    switch ($mask){

        case 0:
            $mask = 'abcdefghijklmnopqrstuvwxyz';
            $mask_lenght = 25;
            break;

        case 1:
            $mask = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $mask_lenght = 25;
            break;

        case 2:
            $mask = '0123456789abcdefghijklmnopqrstuvwxyz';
            $mask_lenght = 35;
            break;

        case 3:
            $mask = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $mask_lenght = 35;
            break;

        case 4:
            $mask = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $mask_lenght = 60;
            break;

        default:
        return 'Error. Expected values are from 0 to 4';

    }

    #Default Maskquing
    for ($i = 0; $i < $lenght; $i++){ $masquerade .= $mask[random_int(0, $mask_lenght)]; }


    #Siding
    if ($side == 'left' || $side == null){

        return $masquerade.$string;

    }else if ($side == 'right'){

        return $string.$masquerade;

    }else if ($side == 'both'){

        for ($i = 0; $i < $lenght; $i++){ $masquerade2 .= $mask[random_int(0, $lenght)]; }

        return $masquerade.$string.$masquerade2;

    }else { return 'Error. Expected values are left, right, both'; }

#End
}


function custom_masker(String $string, int $lenght, String $mask, $side = nullable){

    $masquerade = '';
    $masquerade2 = '';
    $mask_lenght = count(str_split($mask))-1;

    for ($i = 0; $i < $lenght; $i++){ $masquerade .= $mask[random_int(0, $mask_lenght)]; }

    #Siding
    if ($side == 'left' || $side == null){

        return $masquerade.$string;

    }else if ($side == 'right'){

        return $string.$masquerade;

    }else if ($side == 'both'){

        for ($i = 0; $i < $lenght; $i++){ $masquerade2 .= $mask[random_int(0, $mask_lenght)]; }

        return $masquerade.$string.$masquerade2;
    }

#End
}


/* ------------------------------------------------------------------------------
*   V4
*
*   Random_bytes(16) genera 16 bytes criptográficamente seguros
*   Se ajustan los bits para cumplir con la RFC 4122 (versión 4 y variante)
*   vsprintf y bin2hex convierten los bytes en el formato estándar con guiones
*
* ---------------------------------------------------------------------------- */
function generar_uuid() {

    $data = random_bytes(16);

    #Ajustar los bits según la especificación RFC 4122
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // versión 4
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // variante

    #Formatear en el estilo estándar 8-4-4-4-12
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


?>