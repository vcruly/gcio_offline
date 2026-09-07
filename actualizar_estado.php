<?php

header('Content-Type: application/json; charset=utf-8');

$statusFile = 'C:\\GCIO\\scripts\\update_status.txt';
$logFile    = 'C:\\GCIO\\scripts\\update_log.txt';

$result = [
    'progress' => 0,
    'state'    => 'idle',
    'message'  => '',
    'log'      => ''
];


// =========================================================
// ESTADO
// =========================================================

if (file_exists($statusFile)) {

    $lines = file($statusFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {

        $parts = explode('=', $line, 2);

        if (count($parts) !== 2) {
            continue;
        }

        $key   = $parts[0];
        $value = $parts[1];

        switch ($key) {

            case 'PROGRESS':
                $result['progress'] = (int)$value;
                break;

            case 'STATE':
                $result['state'] = $value;
                break;

            case 'MESSAGE':
                $result['message'] = $value;
                break;
        }
    }
}


// =========================================================
// LOG
// =========================================================

if (file_exists($logFile)) {
    $result['log'] = file_get_contents($logFile);
}


echo json_encode(
    $result,
    JSON_UNESCAPED_UNICODE
);