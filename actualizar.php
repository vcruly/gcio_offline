<?php

$bat = 'C:/GCIO/scripts/actualizar.bat';

exec("cmd /c \"$bat\" 2>&1", $output);
print_r($output);


 ?>