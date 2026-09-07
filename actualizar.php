<?php

/*$bat = 'C:/GCIO/scripts/actualizar.bat';

exec("cmd /c \"$bat\" 2>&1", $output);
print_r($output);*/


header('Content-Type: application/json; charset=utf-8');
$updater = 'C:\\GCIO\\scripts\\updater.bat';

if(!file_exists($updater)){

    echo json_encode(['success' => false, 'message' => 'No se encontro el actualizador.']);
    exit;
}

$command = 'start "" /B "' . $updater . '"';
pclose(popen($command, 'r'));

echo json_encode(['success' => true, 'message' => 'Actualizacion iniciada.']);


 ?>