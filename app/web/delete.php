<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../models/User.php';

$database = (new \src\models\DB())->getConnection();
$user = new \src\models\User($database);

$data = json_decode(file_get_contents("php://input"));
$statusCode = 200;
$status = 'Ok';

if (!$user->delete($data->id)) {
    $statusCode = 503;
    $status = 'Error';
}

http_response_code($statusCode);

echo json_encode(['status' => $status]);exit;