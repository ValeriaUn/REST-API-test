<?php

CONST LOCAL = __DIR__ . '\db-local.php';

$local = file_exists(LOCAL) ? require_once LOCAL : [];
$config = [
    'host' => '',
    'name' => '',
    'user' => '',
    'password' => ''
];

return array_merge($config, $local);