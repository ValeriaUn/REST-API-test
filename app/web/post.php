<?php

namespace src\web;

use \src\models\DB;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../models/User.php';
require_once '../models/DB.php';

$database = (new DB())->getConnection();
$user = new \src\models\User($database);

// get posted data
$data = (object)$_POST;
$statusCode = 200;
$status = 'Ok';
$result = [];

if (!empty($data->email) && !empty($data->password)) {
    $result = $user->create($data->email, $data->password);
} else {
    $statusCode = 400;
    $status = 'Error';
}

http_response_code($statusCode);

echo json_encode(['status' => $status, 'user' => $result]);
exit;